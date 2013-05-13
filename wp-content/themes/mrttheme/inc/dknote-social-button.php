<?php
/**
 * dkNote Widgets
 *
 * This file contains social widget
 * @since dkNote 1.0
 */
 
// Register Social Widgets
add_action( 'widgets_init', 'dknote_social_widget' );
function dknote_social_widget() {
	register_widget( 'dknote_Social' );
}

// dkNote Social Widget
class dknote_Social extends WP_Widget {
	//  Setting up the widget
	function dknote_Social() {
		$widget_ops  = array( 'classname' => 'dknote_social', 'description' => __('dkNote social button Widget', 'dknote') );
		$control_ops = array( 'id_base' => 'dknote_social' );
		$this->WP_Widget( 'dknote_social', __('dkNote Social Button', 'dknote'), $widget_ops, $control_ops );
	}

	function widget( $args, $instance ) {
		global $shortname;
		extract( $args );

		$dknote_social_title = apply_filters('widget_title', $instance['dknote_social_title']);
		$social_fb = of_get_option('dknote_fb_username');
		$social_twitter = of_get_option('dknote_twitter_username');
		$social_gplus = of_get_option('dknote_gplus_username');
		$social_tumblr = of_get_option('dknote_tumblr_username');
		$social_github = of_get_option('dknote_github_username');
		$social_feed = of_get_option('dknote_feedburner_username');
		echo $before_widget;
		echo $before_title . $dknote_social_title . $after_title; ?>
		
		<nav class="social-bar">
        <ul>
        	<?php
            if($social_fb != '')
            	echo '<li><a target="_blank" href="' . esc_attr($social_fb) . '" class="social facebook">Facebook</a></li>';        	
        	if($social_twitter != '')
            	echo '<li><a target="_blank" href="' . esc_attr($social_twitter) .'" class="social twitter">Twitter</a></li>';
            if($social_gplus != '')
            	echo '<li><a target="_blank" href="' . esc_attr($social_gplus) . '" class="social google">Google+</a></li>';
            if($social_tumblr != '')
            	echo '<li><a target="_blank" href="' . esc_attr($social_tumblr) . '" class="social tumblr">Tumblr</a></li>';
            if($social_github != '')
            	echo '<li><a target="_blank" href="' . esc_attr($social_github) . '" class="social github">Github</a></li>';
            if($social_feed != '')
            	echo '<li><a target="_blank" href="' . esc_attr($social_feed) . '" class="social feed">Feedburner</a></li>'; 
            ?>
        </ul>
        </nav>
	<?php
	echo $after_widget;
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['dknote_social_title'] = strip_tags( $new_instance['dknote_social_title'] );
		return $instance;
	}

	function form( $instance ) {
		global $shortname;
		$instance = wp_parse_args( (array) $instance, array('dknote_social_title' => __('Social Media', 'dknote')) );
	?>
        <p>
            <label for="<?php echo $this->get_field_id( 'dknote_social_title' ); ?>"><?php _e('Widget Title:', 'dknote'); ?></label>
            <input id="<?php echo $this->get_field_id( 'dknote_social_title' ); ?>" class="widefat" name="<?php echo $this->get_field_name( 'dknote_social_title' ); ?>" value="<?php echo $instance['dknote_social_title']; ?>" />
        </p>

	<?php
	}
}
?>
