<?php


/*---------------------------------------------------------------------------------*/
/* Featured Category Posts Widget */
/*---------------------------------------------------------------------------------*/


class feacpost_FeaturedCategoryPostsWidget extends WP_Widget {

   function feacpost_FeaturedCategoryPostsWidget() {
  	   $widget_ops = array('description' => 'Featured Category Posts' );
  	   $control_ops = array('width' => 500);
       parent::WP_Widget(false, $name = __('Featured Category Posts Widget', 'feacpost'), $widget_ops,$control_ops);
   }


   function widget($args, $instance) {
       extract( $args );



      if(isset($instance['feacpost_numberposts']) && !empty($instance['feacpost_numberposts'])){ $feacpost_numberposts = $instance['feacpost_numberposts'];}else {$feacpost_numberposts = '';}
      if(isset($instance['feacpost_numberposts_sub']) && !empty($instance['feacpost_numberposts_sub'])){ $feacpost_numberposts_sub = $instance['feacpost_numberposts_sub'];}else {$feacpost_numberposts_sub = '';}

      if(isset($instance['feacpost_rpwidgettitle']) && !empty($instance['feacpost_rpwidgettitle'])){$feacpost_rpwidgettitle = $instance['feacpost_rpwidgettitle'];} else {$feacpost_rpwidgettitle = '';}
		if(isset($instance['feacpost_widget_classname']) && !empty($instance['feacpost_widget_classname'])){$feacpost_widget_classname = $instance['feacpost_widget_classname'];} else {$feacpost_widget_classname = "";}
		if(isset($instance['feacpost_widget_container_type']) && !empty($instance['feacpost_widget_container_type'])){$feacpost_widget_container_type = $instance['feacpost_widget_container_type'];} else {$feacpost_widget_container_type = "";}
		if(isset($instance['feacpost_widget_title_header']) && !empty($instance['feacpost_widget_title_header'])){$feacpost_widget_title_header = $instance['feacpost_widget_title_header'];} else {$feacpost_widget_title_header = "";}
		if(isset($instance['feacpost_widget_title_header_classname']) && !empty($instance['feacpost_widget_title_header_classname'])){$feacpost_widget_title_header_classname = $instance['feacpost_widget_title_header_classname'];} else {$feacpost_widget_title_header_classname = "";}
		if(isset($instance['feacpost_featured_category']) && !empty($instance['feacpost_featured_category'])){$feacpost_featured_category = $instance['feacpost_featured_category'];}else {$feacpost_featured_category = "";}
		if(isset($instance['include_post_thumbnail']) && !empty($instance['include_post_thumbnail'])){$include_post_thumbnail = $instance['include_post_thumbnail'];}else {$include_post_thumbnail = "";}
		if(isset($instance['feacpost_post_thumbnail_id']) && !empty($instance['feacpost_post_thumbnail_id'])){$feacpost_post_thumbnail_id = $instance['feacpost_post_thumbnail_id'];}else {$feacpost_post_thumbnail_id = "";}
		if(isset($instance['feacpost_post_thumbnail_position']) && !empty($instance['feacpost_post_thumbnail_position'])){$feacpost_post_thumbnail_position = $instance['feacpost_post_thumbnail_position'];}else {$feacpost_post_thumbnail_position = "";}

		if(isset($instance['feacpost_include_post_title']) && !empty($instance['feacpost_include_post_title'])){$feacpost_include_post_title = $instance['feacpost_include_post_title'];}else {$feacpost_include_post_title = "";}
		if(isset($instance['feacpost_post_title_header']) && !empty($instance['feacpost_post_title_header'])){$feacpost_post_title_header = $instance['feacpost_post_title_header'];} else {$feacpost_post_title_header = "";}
		if(isset($instance['feacpost_post_title_header_classname']) && !empty($instance['feacpost_post_title_header_classname'])){$feacpost_post_title_header_classname = $instance['feacpost_post_title_header_classname'];} else {$feacpost_post_title_header_classname = "";}

		if(isset($instance['feacpost_include_post_author']) && !empty($instance['feacpost_include_post_title'])){$feacpost_include_post_author = $instance['feacpost_include_post_author'];}else {$feacpost_include_post_author = "";}
		if(isset($instance['feacpost_posted_by_text']) && !empty($instance['feacpost_posted_by_text'])){$feacpost_posted_by_text = $instance['feacpost_posted_by_text'];}else {$feacpost_posted_by_text = "";}


		if(isset($instance['feacpost_include_post_date']) && !empty($instance['feacpost_include_post_date'])){$feacpost_include_post_date = $instance['feacpost_include_post_date'];}else {$feacpost_include_post_date = "";}

		if(isset($instance['feacpost_author_date_div_class']) && !empty($instance['feacpost_author_date_div_class'])){$feacpost_author_date_div_class = $instance['feacpost_author_date_div_class'];}else {$feacpost_author_date_div_class = "";}


		if(isset($instance['feacpost_show_post_excerpt']) && !empty($instance['feacpost_show_post_excerpt'])){$feacpost_show_post_excerpt = $instance['feacpost_show_post_excerpt'];}else {$feacpost_show_post_excerpt = "";}
		if(isset($instance['feacpost_post_excerpt_length']) && !empty($instance['feacpost_post_excerpt_length'])){$feacpost_post_excerpt_length = $instance['feacpost_post_excerpt_length'];}else {$feacpost_post_excerpt_length = "";}

		if(isset($instance['feacpost_show_continue_reading_link']) && !empty($instance['feacpost_show_continue_reading_link'])){$feacpost_show_continue_reading_link = $instance['feacpost_show_continue_reading_link'];}else {$feacpost_show_continue_reading_link = "";}
		if(isset($instance['feacpost_continue_reading_text']) && !empty($instance['feacpost_continue_reading_text'])){$feacpost_continue_reading_text = $instance['feacpost_continue_reading_text'];}else {$feacpost_continue_reading_text = "";}



		if(isset($instance['feacpost_before_widget_code']) && !empty($instance['feacpost_before_widget_code'])){$feacpost_before_widget_code = $instance['feacpost_before_widget_code'];}else {$feacpost_before_widget_code = "";}
		if(isset($instance['feacpost_after_widget_code']) && !empty($instance['feacpost_after_widget_code'])){$feacpost_after_widget_code = $instance['feacpost_after_widget_code'];}else {$feacpost_after_widget_code = "";}
		if(isset($instance['feacpost_before_title_code']) && !empty($instance['feacpost_before_title_code'])){$feacpost_before_title_code = $instance['feacpost_before_title_code'];}else {$feacpost_before_title_code = "";}
		if(isset($instance['feacpost_after_title_code']) && !empty($instance['feacpost_after_title_code'])){$feacpost_after_title_code = $instance['feacpost_after_title_code'];}else {$feacpost_after_title_code = "";}



	    if ( function_exists('feacpost_show_category_posts') ) { feacpost_show_category_posts($widget_id,$before_widget,$after_widget,$before_title,$after_title,$feacpost_numberposts, $feacpost_rpwidgettitle,$feacpost_widget_title_header,$feacpost_widget_classname,$feacpost_widget_container_type,$feacpost_widget_title_header_classname,$feacpost_featured_category,$include_post_thumbnail,$feacpost_post_thumbnail_id,$feacpost_before_widget_code,$feacpost_after_widget_code,$feacpost_before_title_code,$feacpost_after_title_code,$feacpost_post_thumbnail_position,$feacpost_include_post_title,$feacpost_post_title_header,$feacpost_post_title_header_classname,$feacpost_include_post_author,$feacpost_include_post_date,$feacpost_show_post_excerpt,$feacpost_post_excerpt_length,$feacpost_show_continue_reading_link,$feacpost_continue_reading_text,$feacpost_author_date_div_class,$feacpost_posted_by_text,$feacpost_numberposts_sub);}

   }


   function update($new_instance, $old_instance) {
       return $new_instance;
   }

   function form($instance) {

 	$thecats = get_categories(array('type' => 'post', 'hide_empty' => 0, 'orderby' => 'name', 'order' => 'ASC', 'taxonomy' => 'category'));
 	$thethumbnailpositions = array('Above Excerpt' => 'Top', 'Float Left' => 'Left', 'Float Right' => 'Right');
 	$noyesops = array('No' => 'No', 'Yes' => 'Yes');
 	$yesnoops = array('Yes' => 'Yes', 'No' => 'No');
 	$thethumbs = feacpost_get_additional_image_sizes();



	  /* Number of posts from category to display */

	  	if(isset($instance['feacpost_numberposts']) && !empty($instance['feacpost_numberposts'])){
	   	$feacpost_numberposts = esc_attr($instance['feacpost_numberposts']);}else {$feacpost_numberposts='';}

	  	if(isset($instance['feacpost_numberposts_sub']) && !empty($instance['feacpost_numberposts_sub'])){
	   	$feacpost_numberposts_sub = esc_attr($instance['feacpost_numberposts_sub']);}else {$feacpost_numberposts_sub='';}



     /* The widget container */

       if(isset($instance['feacpost_widget_classname']) && !empty($instance['feacpost_widget_classname'])){
       $feacpost_widget_classname = esc_attr($instance['feacpost_widget_classname']);}else { $feacpost_widget_classname="";}

       if(isset($instance['feacpost_widget_container_type']) && !empty($instance['feacpost_widget_container_type'])){
	   $feacpost_widget_container_type = esc_attr($instance['feacpost_widget_container_type']);}else { $feacpost_widget_container_type="";}


     /* The Widget Title Itself */

		if(isset($instance['feacpost_rpwidgettitle']) && !empty($instance['feacpost_rpwidgettitle'])){
		$feacpost_rpwidgettitle = esc_attr($instance['feacpost_rpwidgettitle']);}else { $feacpost_rpwidgettitle='';}


      /* The Widget title Styling */

       if(isset($instance['feacpost_widget_title_header']) && !empty($instance['feacpost_widget_title_header'])){
       $feacpost_widget_title_header = esc_attr($instance['feacpost_widget_title_header']);}else { $feacpost_widget_title_header="";}

       if(isset($instance['feacpost_widget_title_header_classname']) && !empty($instance['feacpost_widget_title_header_classname'])){
       $feacpost_widget_title_header_classname = esc_attr($instance['feacpost_widget_title_header_classname']);}else { $feacpost_widget_title_header_classname="";}


      /* The Category */

       if(isset($instance['feacpost_featured_category']) && !empty($instance['feacpost_featured_category'])){
       $feacpost_featured_category = esc_attr($instance['feacpost_featured_category']);}else { $feacpost_featured_category="";}


       /* The Thumbnail */

       if(isset($instance['include_post_thumbnail']) && !empty($instance['include_post_thumbnail'])){
       $include_post_thumbnail = esc_attr($instance['include_post_thumbnail']);}else { $include_post_thumbnail="";}

       if(isset($instance['feacpost_post_thumbnail_id']) && !empty($instance['feacpost_post_thumbnail_id'])){
       $feacpost_post_thumbnail_id = esc_attr($instance['feacpost_post_thumbnail_id']);}else { $feacpost_post_thumbnail_id="";}


       if(isset($instance['feacpost_post_thumbnail_position']) && !empty($instance['feacpost_post_thumbnail_position'])){
	   $feacpost_post_thumbnail_position = esc_attr($instance['feacpost_post_thumbnail_position']);}else { $feacpost_post_thumbnail_position="";}


       /* The Post Title */

       if(isset($instance['feacpost_include_post_title']) && !empty($instance['feacpost_include_post_title'])){
       $feacpost_include_post_title = esc_attr($instance['feacpost_include_post_title']);}else { $feacpost_include_post_title="";}

       if(isset($instance['feacpost_post_title_header']) && !empty($instance['feacpost_post_title_header'])){
       $feacpost_post_title_header = esc_attr($instance['feacpost_post_title_header']);}else { $feacpost_post_title_header="";}

       if(isset($instance['feacpost_post_title_header_classname']) && !empty($instance['feacpost_post_title_header_classname'])){
       $feacpost_post_title_header_classname = esc_attr($instance['feacpost_post_title_header_classname']);}else { $feacpost_post_title_header_classname="";}



       /* The Post Author */
       if(isset($instance['feacpost_include_post_author']) && !empty($instance['feacpost_include_post_author'])){
       $feacpost_include_post_author = esc_attr($instance['feacpost_include_post_author']);}else { $feacpost_include_post_author="";}

       if(isset($instance['feacpost_posted_by_text']) && !empty($instance['feacpost_posted_by_text'])){
       $feacpost_posted_by_text = esc_attr($instance['feacpost_posted_by_text']);}else { $feacpost_posted_by_text="";}



       /* The Post Date */
       if(isset($instance['feacpost_include_post_date']) && !empty($instance['feacpost_include_post_date'])){
       $feacpost_include_post_date = esc_attr($instance['feacpost_include_post_date']);}else { $feacpost_include_post_date="";}

       /* The Post Excerpt */
       if(isset($instance['feacpost_show_post_excerpt']) && !empty($instance['feacpost_show_post_excerpt'])){
       $feacpost_show_post_excerpt = esc_attr($instance['feacpost_show_post_excerpt']);}else { $feacpost_show_post_excerpt="";}

       if(isset($instance['feacpost_post_excerpt_length']) && !empty($instance['feacpost_post_excerpt_length'])){
       $feacpost_post_excerpt_length = esc_attr($instance['feacpost_post_excerpt_length']);}else { $feacpost_post_excerpt_length="";}


		/* Author Date Div Class */

       if(isset($instance['feacpost_author_date_div_class']) && !empty($instance['feacpost_author_date_div_class'])){
       $feacpost_author_date_div_class = esc_attr($instance['feacpost_author_date_div_class']);}else { $feacpost_author_date_div_class="";}


       /* Continue Reading Link */
       if(isset($instance['feacpost_show_continue_reading_link']) && !empty($instance['feacpost_show_continue_reading_link'])){
       $feacpost_show_continue_reading_link = esc_attr($instance['feacpost_show_continue_reading_link']);}else { $feacpost_show_continue_reading_link="";}

       if(isset($instance['feacpost_continue_reading_text']) && !empty($instance['feacpost_continue_reading_text'])){
       $feacpost_continue_reading_text = esc_attr($instance['feacpost_continue_reading_text']);}else { $feacpost_continue_reading_text="";}


		/* Before Widget After Widget/Before Title After Title*/

       if(isset($instance['feacpost_before_widget_code']) && !empty($instance['feacpost_before_widget_code'])){
       $feacpost_before_widget_code = esc_attr($instance['feacpost_before_widget_code']);}else { $feacpost_before_widget_code="";}

        if(isset($instance['feacpost_after_widget_code']) && !empty($instance['feacpost_after_widget_code'])){
       $feacpost_after_widget_code = esc_attr($instance['feacpost_after_widget_code']);}else { $feacpost_after_widget_code="";}

       if(isset($instance['feacpost_before_title_code']) && !empty($instance['feacpost_before_title_code'])){
       $feacpost_before_title_code = esc_attr($instance['feacpost_before_title_code']);}else { $feacpost_before_title_code="";}

        if(isset($instance['feacpost_after_title_code']) && !empty($instance['feacpost_after_title_code'])){
       $feacpost_after_title_code = esc_attr($instance['feacpost_after_title_code']);}else { $feacpost_after_title_code="";}

       ?>
       <p>
       <label for="<?php echo $this->get_field_id('feacpost_rpwidgettitle'); ?>"><?php _e('Widget Title','feacpost'); ?>
       <input class="widefat" id="<?php echo $this->get_field_id('feacpost_rpwidgettitle'); ?>" name="<?php echo $this->get_field_name('feacpost_rpwidgettitle'); ?>" type="text" value="<?php echo $feacpost_rpwidgettitle; ?>" />
       </label>
       </p>
       <p style="margin-top:10px;">
       <label for="<?php echo $this->get_field_id('feacpost_widget_container_type'); ?>"><?php _e('Widget container type(i.e. div,li **Do not include &lt;&gt;)','feacpost'); ?>
       <input class="widefat" id="<?php echo $this->get_field_id('feacpost_widget_container_type'); ?>" name="<?php echo $this->get_field_name('feacpost_widget_container_type'); ?>" type="text" value="<?php echo $feacpost_widget_container_type; ?>" />
       </label>
       <p style="margin-top:10px;">
       <label for="<?php echo $this->get_field_id('feacpost_widget_classname'); ?>"><?php _e('Widget container class name','feacpost'); ?>
       <input class="widefat" id="<?php echo $this->get_field_id('feacpost_widget_classname'); ?>" name="<?php echo $this->get_field_name('feacpost_widget_classname'); ?>" type="text" value="<?php echo $feacpost_widget_classname; ?>" />
       </label>
       </p>
       <p style="margin-top:10px;">
       <label for="<?php echo $this->get_field_id('feacpost_widget_title_header'); ?>"><?php _e('Widget header type (ie H2,H3,H4...**Do not include &lt;&gt;)','feacpost'); ?>
       <input class="widefat" id="<?php echo $this->get_field_id('feacpost_widget_title_header'); ?>" name="<?php echo $this->get_field_name('feacpost_widget_title_header'); ?>" type="text" value="<?php echo $feacpost_widget_title_header; ?>" />
       </label>
       </p>
       <p style="margin-top:10px;">
       <label for="<?php echo $this->get_field_id('feacpost_widget_title_header_classname'); ?>"><?php _e('Widget header type class name','feacpost'); ?>
       <input class="widefat" id="<?php echo $this->get_field_id('feacpost_widget_title_header_classname'); ?>" name="<?php echo $this->get_field_name('feacpost_widget_title_header_classname'); ?>" type="text" value="<?php echo $feacpost_widget_title_header_classname; ?>" />
       </label>
       </p>
       <p style="margin-top:10px;">
       <label for="<?php echo $this->get_field_id('feacpost_before_widget_code'); ?>"><?php _e('Code Before Widget','feacpost'); ?>
       <input class="widefat" id="<?php echo $this->get_field_id('feacpost_before_widget_code'); ?>" name="<?php echo $this->get_field_name('feacpost_before_widget_code'); ?>" type="text" value="<?php echo $feacpost_before_widget_code; ?>" />
       </label>
       </p>
       <p style="margin-top:10px;">
       <label for="<?php echo $this->get_field_id('feacpost_after_widget_code'); ?>"><?php _e('Code After Widget','feacpost'); ?>
       <input class="widefat" id="<?php echo $this->get_field_id('feacpost_after_widget_code'); ?>" name="<?php echo $this->get_field_name('feacpost_after_widget_code'); ?>" type="text" value="<?php echo $feacpost_after_widget_code; ?>" />
       </label>
       </p>
       <p style="margin-top:10px;">
       <label for="<?php echo $this->get_field_id('feacpost_before_title_code'); ?>"><?php _e('Code Before Widget Title','feacpost'); ?>
       <input class="widefat" id="<?php echo $this->get_field_id('feacpost_before_title_code'); ?>" name="<?php echo $this->get_field_name('feacpost_before_title_code'); ?>" type="text" value="<?php echo $feacpost_before_title_code; ?>" />
       </label>
       </p>
       <p style="margin-top:10px;">
       <label for="<?php echo $this->get_field_id('feacpost_after_title_code'); ?>"><?php _e('Code After Widget Title','feacpost'); ?>
       <input class="widefat" id="<?php echo $this->get_field_id('feacpost_after_title_code'); ?>" name="<?php echo $this->get_field_name('feacpost_after_title_code'); ?>" type="text" value="<?php echo $feacpost_after_title_code; ?>" />
       </label>
       </p>
       <p style="margin-top:10px;">
       <label for="<?php echo $this->get_field_id('feacpost_numberposts'); ?>"><?php _e('Number of Main Posts:','feacpost'); ?>
       <input class="widefat" id="<?php echo $this->get_field_id('feacpost_numberposts'); ?>" name="<?php echo $this->get_field_name('feacpost_numberposts'); ?>" type="text" value="<?php echo $feacpost_numberposts; ?>" />
       </label>
       </p>
       <p style="margin-top:10px;">
       <label for="<?php echo $this->get_field_id('feacpost_numberposts_sub'); ?>"><?php _e('Number of Sub Posts (will only show titles in list under main posts.):','feacpost'); ?>
       <input class="widefat" id="<?php echo $this->get_field_id('feacpost_numberposts_sub'); ?>" name="<?php echo $this->get_field_name('feacpost_numberposts_sub'); ?>" type="text" value="<?php echo $feacpost_numberposts_sub; ?>" />
       </label>
       </p>
       <p style="margin-top:10px;">
       <label for="<?php echo $this->get_field_id('feacpost_featured_category'); ?>"><?php _e('Choose Category','feacpost'); ?>
		    <select id="<?php echo $this->get_field_id('feacpost_featured_category'); ?>" name="<?php echo $this->get_field_name('feacpost_featured_category'); ?>">
	                <option value="-1"<?php if(-1 == $feacpost_featured_category) { ?> selected="selected"<?php } ?>>Featured Category</option>
	                <?php
			foreach($thecats as $thecat) {
			    ?>
			    <option value="<?php echo $thecat->term_id; ?>"<?php if($thecat->term_id == $feacpost_featured_category) { ?> selected="selected"<?php } ?>><?php echo $thecat->name.' ('.$thecat->count.')'; ?></option>
			    <?php
			}
			?>
	    </select>
       </label>
       </p>
       <p style="margin-top:10px;">
       <label for="<?php echo $this->get_field_id('include_post_thumbnail'); ?>"><?php _e('Show post thumbnail?','feacpost'); ?>
		    <select id="<?php echo $this->get_field_id('include_post_thumbnail'); ?>" name="<?php echo $this->get_field_name('include_post_thumbnail'); ?>">
	                <?php
			foreach($yesnoops as $yesno) {
			    ?>
			    <option value="<?php echo $yesno; ?>"<?php if($yesno == $include_post_thumbnail) { ?> selected="selected"<?php } ?>><?php echo $yesno; ?></option>
			    <?php
			}
			?>
	    </select>
       </label>
       </p>
       <p style="margin-top:10px;">
       <label for="<?php echo $this->get_field_id('feacpost_post_thumbnail_id'); ?>"><?php _e('Select Thumbnail','feacpost'); ?>
		    <select id="<?php echo $this->get_field_id('feacpost_post_thumbnail_id'); ?>" name="<?php echo $this->get_field_name('feacpost_post_thumbnail_id'); ?>">
	                <?php
			foreach((array)$thethumbs as $name => $size) { $opval='';$opname='';if( ($size['width'] > 0) && ($size['height'] > 0) ){$opval=$name;$opname=$name.'('.$size['width'].'x'.$size['height'].')';}
			    ?>
			    <option value="<?php echo $opval; ?>"<?php if($opval == $feacpost_post_thumbnail_id) { ?> selected="selected"<?php } ?>><?php echo $opname; ?></option>
			    <?php
			}
			?>
	    </select>
       </label>
       </p>
       <p style="margin-top:10px;">
       <label for="<?php echo $this->get_field_id('feacpost_post_thumbnail_position'); ?>"><?php _e('Thumbnail Position','feacpost'); ?>
		    <select id="<?php echo $this->get_field_id('feacpost_post_thumbnail_position'); ?>" name="<?php echo $this->get_field_name('feacpost_post_thumbnail_position'); ?>">
	                <?php
			foreach($thethumbnailpositions as $thethumbnailposition) {
			    ?>
			    <option value="<?php echo $thethumbnailposition; ?>"<?php if($thethumbnailposition == $feacpost_post_thumbnail_position) { ?> selected="selected"<?php } ?>><?php echo $thethumbnailposition; ?></option>
			    <?php
			}
			?>
	    </select>
       </label>
       </p>
       <p style="margin-top:10px;">
       <label for="<?php echo $this->get_field_id('feacpost_include_post_title'); ?>"><?php _e('Include Post Title?','feacpost'); ?>
		    <select id="<?php echo $this->get_field_id('feacpost_include_post_title'); ?>" name="<?php echo $this->get_field_name('feacpost_include_post_title'); ?>">
	                <?php
			foreach($yesnoops as $yesno) {
			    ?>
			    <option value="<?php echo $yesno; ?>"<?php if($yesno == $feacpost_include_post_title) { ?> selected="selected"<?php } ?>><?php echo $yesno; ?></option>
			    <?php
			}
			?>
	    </select>
       </label>
       </p>
       <p style="margin-top:10px;">
       <label for="<?php echo $this->get_field_id('feacpost_post_title_header'); ?>"><?php _e('Post Title header type (ie H2,H3,H4...**Do not include &lt;&gt;)','feacpost'); ?>
       <input class="widefat" id="<?php echo $this->get_field_id('feacpost_post_title_header'); ?>" name="<?php echo $this->get_field_name('feacpost_post_title_header'); ?>" type="text" value="<?php echo $feacpost_post_title_header; ?>" />
       </label>
       </p>
       <p style="margin-top:10px;">
       <label for="<?php echo $this->get_field_id('feacpost_post_title_header_classname'); ?>"><?php _e('Post Title header type class name','feacpost'); ?>
       <input class="widefat" id="<?php echo $this->get_field_id('feacpost_post_title_header_classname'); ?>" name="<?php echo $this->get_field_name('feacpost_post_title_header_classname'); ?>" type="text" value="<?php echo $feacpost_post_title_header_classname; ?>" />
       </label>
       </p>

       <p style="margin-top:10px;">
       <label for="<?php echo $this->get_field_id('feacpost_include_post_author'); ?>"><?php _e('Show Post Author?','feacpost'); ?>
		    <select id="<?php echo $this->get_field_id('feacpost_include_post_author'); ?>" name="<?php echo $this->get_field_name('feacpost_include_post_author'); ?>">
	                <?php
			foreach($noyesops as $yesno) {
			    ?>
			    <option value="<?php echo $yesno; ?>"<?php if($yesno == $feacpost_include_post_author) { ?> selected="selected"<?php } ?>><?php echo $yesno; ?></option>
			    <?php
			}
			?>
	    </select>
       </label>
       </p>
       <p style="margin-top:10px;">
       <label for="<?php echo $this->get_field_id('feacpost_posted_by_text'); ?>"><?php _e('Text for Posted By if showing author','feacpost'); ?>
       <input class="widefat" id="<?php echo $this->get_field_id('feacpost_posted_by_text'); ?>" name="<?php echo $this->get_field_name('feacpost_posted_by_text'); ?>" type="text" value="<?php echo $feacpost_posted_by_text; ?>" />
       </label>
       </p>
       <p style="margin-top:10px;">
       <label for="<?php echo $this->get_field_id('feacpost_include_post_date'); ?>"><?php _e('Show Post Date?','feacpost'); ?>
		    <select id="<?php echo $this->get_field_id('feacpost_include_post_date'); ?>" name="<?php echo $this->get_field_name('feacpost_include_post_date'); ?>">
	                <?php
			foreach($noyesops as $yesno) {
			    ?>
			    <option value="<?php echo $yesno; ?>"<?php if($yesno == $feacpost_include_post_date) { ?> selected="selected"<?php } ?>><?php echo $yesno; ?></option>
			    <?php
			}
			?>
	    </select>
       </label>
       </p>
       <p style="margin-top:10px;">
       <label for="<?php echo $this->get_field_id('feacpost_author_date_div_class'); ?>"><?php _e('Class for author and date display. Uses <div></div>. **Just enter your class name','feacpost'); ?>
       <input class="widefat" id="<?php echo $this->get_field_id('feacpost_author_date_div_class'); ?>" name="<?php echo $this->get_field_name('feacpost_author_date_div_class'); ?>" type="text" value="<?php echo $feacpost_author_date_div_class; ?>" />
       </label>
       </p>
       <p style="margin-top:10px;">
       <label for="<?php echo $this->get_field_id('feacpost_show_post_excerpt'); ?>"><?php _e('Show Post Excerpt?','feacpost'); ?>
		    <select id="<?php echo $this->get_field_id('feacpost_show_post_excerpt'); ?>" name="<?php echo $this->get_field_name('feacpost_show_post_excerpt'); ?>">
	                <?php
			foreach($yesnoops as $yesno) {
			    ?>
			    <option value="<?php echo $yesno; ?>"<?php if($yesno == $feacpost_show_post_excerpt) { ?> selected="selected"<?php } ?>><?php echo $yesno; ?></option>
			    <?php
			}
			?>
	    </select>
       </label>
       </p>
       <p style="margin-top:10px;">
       <label for="<?php echo $this->get_field_id('feacpost_post_excerpt_length'); ?>"><?php _e('Length of Post Excerpt in character count:','feacpost'); ?>
       <input class="widefat" id="<?php echo $this->get_field_id('feacpost_post_excerpt_length'); ?>" name="<?php echo $this->get_field_name('feacpost_post_excerpt_length'); ?>" type="text" value="<?php echo $feacpost_post_excerpt_length; ?>" />
       </label>
       </p>
       <p style="margin-top:10px;">
       <label for="<?php echo $this->get_field_id('feacpost_show_continue_reading_link'); ?>"><?php _e('Show Continue Reading Link?','feacpost'); ?>
		    <select id="<?php echo $this->get_field_id('feacpost_show_continue_reading_link'); ?>" name="<?php echo $this->get_field_name('feacpost_show_continue_reading_link'); ?>">
	                <?php
			foreach($yesnoops as $yesno) {
			    ?>
			    <option value="<?php echo $yesno; ?>"<?php if($yesno == $feacpost_show_continue_reading_link) { ?> selected="selected"<?php } ?>><?php echo $yesno; ?></option>
			    <?php
			}
			?>
	    </select>
       </label>
       </p>
       <p style="margin-top:10px;">
       <label for="<?php echo $this->get_field_id('feacpost_continue_reading_text'); ?>"><?php _e('Text for Continue Reading Link','feacpost'); ?>
       <input class="widefat" id="<?php echo $this->get_field_id('feacpost_continue_reading_text'); ?>" name="<?php echo $this->get_field_name('feacpost_continue_reading_text'); ?>" type="text" value="<?php echo $feacpost_continue_reading_text; ?>" />
       </label>
       </p>
       <?php
   }

}

function register_feacpost_FeaturedCategoryPostsWidget(){

	register_widget('feacpost_FeaturedCategoryPostsWidget');
}

add_action('init', 'register_feacpost_FeaturedCategoryPostsWidget', 1);

function feacpost_get_additional_image_sizes() {
	global $_wp_additional_image_sizes;

	if ( $_wp_additional_image_sizes )
		return $_wp_additional_image_sizes;

	return array();
}

	function feacpost_LimitText($Text,$Min,$Max,$MinAddChar) {
	    if (strlen($Text) < $Min) {
	        $Limit = $Min-strlen($Text);
	        $Text .= $MinAddChar;
	    }
	    elseif (strlen($Text) >= $Max) {
	        $words = explode(" ", $Text);
	        $check=1;
	        while (strlen($Text) >= $Max) {
	            $c=count($words)-$check;
	            $Text=substr($Text,0,(strlen($words[$c])+1)*(-1));
	            $check++;
	        }
	    }

	    return $Text;
}

?>