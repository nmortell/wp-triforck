<?php
function artblogazine_templates() {
	$themes = get_themes();
	$theme = get_current_theme();
	$templates = $themes[$theme]['Template Files'];
	$post_templates = array();

	$base = array(trailingslashit(get_template_directory()), trailingslashit(get_stylesheet_directory()));

	foreach ((array)$templates as $template) {
		$template = WP_CONTENT_DIR . str_replace(WP_CONTENT_DIR, '', $template); 
		$basename = str_replace($base, '', $template);

		
		if (false !== strpos($basename, '/'))
			continue;

		$template_data = implode('', file( $template ));

		$name = '';
		if (preg_match( '|blogazine style:(.*)$|mi', $template_data, $name))
			$name = _cleanup_header_comment($name[1]);

		if (!empty($name)) {
			if(basename($template) != basename(__FILE__))
				$post_templates[trim($name)] = $basename;
		}
	}

	return $post_templates;

}


function artblogazine_post_templates_dropdown() {
	global $post;
	$post_templates = artblogazine_templates();
	
	foreach ($post_templates as $template_name => $template_file) { 
		if ($template_file == get_post_meta($post->ID, '_wp_post_template', true)) { $selected = 'selected'; } else { $selected = ''; }
		$opt = '<option value="' . esc_attr( $template_file ) . '"' . $selected . '>' . esc_attr( $template_name ) . '</option>';
		echo $opt;
	}
}

function artblogazine_get_post_template($template) {
	global $post;
	$custom_field = get_post_meta($post->ID, '_wp_post_template', true);
	if(!empty($custom_field) && file_exists(get_template_directory() . "/{$custom_field}")) { 
		$template = get_template_directory() . "/{$custom_field}"; }
	return $template;
}


function artblogazine_pt_add_custom_box() {
	if(artblogazine_templates() ) {
		add_meta_box( 'artblogazine_pt_post_templates', __( 'blogazine style', 'artblogazine' ), 
			'artblogazine_pt_inner_custom_box', 'post', 'normal', 'high' ); 
	}
}   
function artblogazine_pt_inner_custom_box() {
	global $post;
	
	echo '<input type="hidden" name="artblogazine_pt_noncename" id="artblogazine_pt_noncename" value="' . wp_create_nonce( basename(__FILE__) ) . '" />';
	
	echo '<label class="hidden" for="post_template">' . __("Post Template", 'artblogazine' ) . '</label><br />';
	echo '<select name="_wp_post_template" id="post_template" class="dropdown">';
	echo '<option value="">Default</option>';
	artblogazine_post_templates_dropdown();
	echo '</select>';
	echo '<p>' . __('Please select the style you want by clicking the dropdown menu above. There are two styles to blogazine if you do not select it, then it will be the default single post, still confused? Just visit my blog http://amdhas.tk', 'artblogazine' ) . '</p>';
}

function artblogazine_pt_save_postdata($post_id, $post) {
	
	
	if ( !wp_verify_nonce( $_POST['artblogazine_pt_noncename'], basename(__FILE__) )) {
	return $post->ID;
	}

	
	if ( 'page' == $_POST['post_type'] ) {
		if ( !current_user_can( 'edit_page', $post->ID ))
		return $post->ID;
	} else {
		if ( !current_user_can( 'edit_post', $post->ID ))
		return $post->ID;
	}

	
	$mydata['_wp_post_template'] = $_POST['_wp_post_template'];
	
	foreach ($mydata as $key => $value) { 
		if( $post->post_type == 'revision' ) return; 
		$value = implode(',', (array)$value); 
		if(get_post_meta($post->ID, $key, FALSE)) { 
			update_post_meta($post->ID, $key, $value); 
		} else { 
			add_post_meta($post->ID, $key, $value);
		}
		if(!$value) delete_post_meta($post->ID, $key);
	}
}
?>
