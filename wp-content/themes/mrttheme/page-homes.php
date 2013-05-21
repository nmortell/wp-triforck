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
   <?php get_sidebar("homes"); ?>
</section>
<?php get_sidebar(); ?>
</div>
<div class="push"></div>
</section>

<?php get_footer(); ?>
