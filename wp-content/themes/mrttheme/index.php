<?php 
/**
 * @package dkNote
 * @since dkNote 1.0
 */
get_header(); ?>
<div class="row">
<section class="span1">
  <div class = sidebar>
   <?php if (!dynamic_sidebar('LeftSidebar')) : ?>
   <?php endif; ?>
  </div>
</section>
<section class="span8 maincontent">
  <div class="slider">
    <?php echo do_shortcode("[slider id='42' name='Main Page Slider']");?>
  </div>
  <div class="horizontal-grey"></div>
   <?php get_sidebar("main"); ?>
</section>
<?php get_sidebar(); ?>
</div>
<div class="push"></div>
</section>
<!--<section class="footer">-->
<?php get_footer(); ?>
