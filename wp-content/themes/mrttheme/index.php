<?php 
/**
 * @package dkNote
 * @since dkNote 1.0
 */
get_header(); ?>
<section class="dh1">
  <div class = sidebar>
   <?php if (!dynamic_sidebar('LeftSidebar')) : ?>
   <?php endif; ?>
  </div>
</section>
<section class="dh8">
  <div class="sidebar seperated">
   <?php if (!dynamic_sidebar('MainContent')) : ?>
   <?php endif; ?>
  </div>
</section>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
