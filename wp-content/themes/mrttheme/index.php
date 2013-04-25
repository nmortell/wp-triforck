<?php 
/**
 * @package dkNote
 * @since dkNote 1.0
 */
get_header(); ?>
</div>
<div class="row-fluid">
<section class="span1">
  <div class = sidebar>
   <?php if (!dynamic_sidebar('LeftSidebar')) : ?>
   <?php endif; ?>
  </div>
</section>
<section class="span8">
  <div class="sidebar" id="main">
   <?php if (!dynamic_sidebar('MainContent')) : ?>
   <?php endif; ?>
  </div>
</section>
<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>
