<?php
if ( ! isset( $content_width ) )
	$content_width = 584;
function artblogazine_posted_on() {
	printf( __( '<span class="sep">Posted on </span><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a><span class="by-author"> <span class="sep"> by </span> <span class="author vcard"><a class="url fn n" href="%5$s" title="%6$s" rel="author">%7$s</a></span></span>', 'artblogazine' ),
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		sprintf( esc_attr__( 'View all posts by %s', 'artblogazine' ), get_the_author() ),
		esc_html( get_the_author() )
	);
}

        $options = get_option('artblogazine_theme_options');	
	  define('HEADER_TEXTCOLOR', '');
        define('HEADER_IMAGE', '%s/images/default-logo.png'); // %s is the template dir uri
        define('HEADER_IMAGE_WIDTH', 300); // use width and height appropriate for your theme
        define('HEADER_IMAGE_HEIGHT', 100);
        define('NO_HEADER_TEXT', true);
        function artblogazine_admin_header_style() {
            ?><style type="text/css">
                #headimg {
                    border: none !important;
                    width: <?php echo HEADER_IMAGE_WIDTH; ?>px;
                    height: <?php echo HEADER_IMAGE_HEIGHT; ?>px;
                }
            </style><?php
        }

ob_start('artblogazine_save');
function artblogazine_save($artd_buffer) {
	global $global_styles, $single_styles;	
	$data = "\n".$single_styles.$global_styles;
    $artd_buffer = str_replace('</head>', $data."\n</head>", $artd_buffer);	 
    return $artd_buffer;
}

function artblogazine_inline($data) {
	global $post, $global_styles, $single_styles;
	if(is_single() or is_page()) 
		$single_styles .= str_replace( '#postid', $post->ID, get_post_meta($post->ID, 'artblogazine_ideamdhas_single', true) )."\n";
	
	return $data;
}

function artblogazine_save_postdata( $post_id ) {
 	
  	if ( !wp_verify_nonce( $_POST['artblogazine-ideamdhas-nonce'], basename(__FILE__) ) )
    	return $post_id;
  
  	if ( 'page' == $_POST['post_type'] ) {
    	if ( !current_user_can( 'edit_page', $post_id ) )
      		return $post_id;
  	} else {
    	if ( !current_user_can( 'edit_post', $post_id ) )
      		return $post_id;
  	}

  	
	delete_post_meta( $post_id, 'artblogazine_ideamdhas_single' );
	
	
	if(trim($_POST['single-code']) != '')
		add_post_meta( $post_id, 'artblogazine_ideamdhas_single', ($_POST['single-code']));
	

	return true;
}

function artblogazine_admin_head() { ?>	
<?php
}
function artblogazine_add_meta_box() {
		if( current_user_can('edit_posts') )
    		add_meta_box( 'artblogazine-ideamdhas-box', __( 'Costum style blogazine', 'artblogazine' ), 
                'artblogazine_meta_box', 'post', 'normal' );
		if( current_user_can('edit_pages') )
    		add_meta_box( 'artblogazine-ideamdhas-box', __( 'Costum style blogazine', 'artblogazine' ), 
                'artblogazine_meta_box', 'page', 'normal' );
	}

function artblogazine_meta_box() {
	global $post;
?>
<form action="artblogazine-ideamdhas_submit" method="get" accept-charset="utf-8">
	<?php
	
  	echo '<input type="hidden" name="artblogazine-ideamdhas-nonce" id="artblogazine-ideamdhas-nonce" value="' . 
		wp_create_nonce(basename(__FILE__) ) . '" />'; ?>

	<script type="text/javascript" charset="utf-8">
	/* <![CDATA[ */
	jQuery(document).ready(function() {
		jQuery('.help').click(function() {
			var anchor = this.href.substr( this.href.indexOf('#') );
			jQuery(this).hide();
			jQuery(anchor).toggle();
			return false;
		});
		

		jQuery('#artblogazine-ideamdhas-box textarea').focus(function() {
			jQuery('#location').attr('class', this.id);
			var location = jQuery('#location').attr('class');
		});
		
		jQuery('#style-insert').click(function() {
			var location = jQuery('#location').attr('class');
			edInsertContent(location, '<' + 'style type="text/css" media="screen"'+'>'+"\n\n"+'<'+'/style'+'>');
		});
		jQuery('#script-insert').click(function() {
			var location = jQuery('#location').attr('class');
			edInsertContent(location, '<'+'script type="text/javascript" charset="utf-8"'+'>'+"\n\n"+'<'+'/script'+'>');
		});
		
		
		function edInsertContent(which, myValue) {
		    myField = document.getElementById(which);
			//IE suppart
			if (document.selection) {
				myField.focus();
				sel = document.selection.createRange();
				sel.text = myValue;
				myField.focus();
			}
			//MOZILLA/NETSCAPE suppart
			else if (myField.selectionStart || myField.selectionStart == '0') {
				var startPos = myField.selectionStart;
				var endPos = myField.selectionEnd;
				var scrollTop = myField.scrollTop;
				myField.value = myField.value.substring(0, startPos)
				              + myValue 
		                      + myField.value.substring(endPos, myField.value.length);
				myField.focus();
				myField.selectionStart = startPos + myValue.length;
				myField.selectionEnd = startPos + myValue.length;
				myField.scrollTop = scrollTop;
			} else {
				myField.value += myValue;
				myField.focus();
			}
		}
	});
	
	/* ]]> */
	</script>
<p><?php _e( 'You can enter an internal CSS code and javascript', 'artblogazine' ); ?></p>
	<input type="hidden" name="location" id="location" />
	<input type="button" name="style-insert" class="button" value="<?php _e( 'Insert &lt;style&gt; Tag', 'artblogazine' ); ?>" id="style-insert" /> 
	<input type="button" name="script-insert" class="button" value="<?php _e( 'Insert &lt;script&gt; Tag', 'artblogazine' ); ?>" id="script-insert" />

<textarea style="width:100%;height:400px;min-height:100%" id="single-code" name="single-code" rows="8" cols="40"><?php esc_attr_e( get_post_meta( $post->ID,'artblogazine_ideamdhas_single', true ) ); ?></textarea>

</form>
<?php
}
function artblogazine_widgets_init() {
register_sidebar(array(
'name' => __('footer left','artblogazine'),
'description' => __('footer left area', 'artblogazine'),
'before_widget' => '',
'after_widget' => '',
'before_title' => '<h3>',
'after_title' => '</h3>'
));
register_sidebar(array(
'name' => __('footer midlle','artblogazine'),
'description' => __('footer midle area', 'artblogazine'),
'before_widget' => '',
'after_widget' => '',
'before_title' => '<h3>',
'after_title' => '</h3>'
));
register_sidebar(array(
'name' => __('footer right','artblogazine'),
'description' => __('fotter right area', 'artblogazine'),
'before_widget' => '',
'after_widget' => '',
'before_title' => '<h3>',
'after_title' => '</h3>'
));		
}
function artblogazine_excerpt_length( $length ) {
	return 100;
}
function artblogazine_continue_reading_link() {
	return '<span class="read-more"><a href="'. esc_url(get_permalink()) . '">' . __( 'Read more &raquo;', 'artblogazine' ) . '</a></span>';
}
function artblogazine_excerpt_more( $more ) {
	return ' &hellip;' . artblogazine_continue_reading_link();
}
function artblogazine_enqueue_scripts_styles( ) {
        wp_enqueue_style( 'default', get_template_directory_uri() . '/style.css', array(), '1.0.2');
     
    }
function artblogazine_enqueue_comment_reply() {
    if ( is_singular() && comments_open() && get_option('thread_comments')) { 
            wp_enqueue_script('comment-reply'); 
        }
    }