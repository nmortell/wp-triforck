<?php
/**
 * @package dkNote
 * @since dkNote 1.0
 */
?>
<div class="span3 sidebar-wrapper">
<div class="sidebar advert span3">
 <?php if (!dynamic_sidebar('Sidebar1')) : ?>
 <?php endif; ?>
</div>
<div class="horizontal-grey span3"></div>
<div class="sidebar volunteer-sidebar span3 ">
  <?php if (!dynamic_sidebar('Sidebar2')) : ?>
  <?php endif; ?>
</div>
<div class="horizontal-grey span3"></div>
<div class="sidebar span3">
 <?php if (!dynamic_sidebar('Sidebar3')) : ?>
 <?php endif; ?>
</div>
<div class="horizontal-grey span3"></div>
<div class="sidebar advert span3">
 <?php if (!dynamic_sidebar('Sidebar5')) : ?>
 <?php endif; ?>
</div>
</div>
