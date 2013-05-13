<?php
/**
 * @package dkNote
 * @since dkNote 1.0
 */
?>
<div class="span3">
<aside class="sidebar-wrapper">
<div class="sidebar seperated">
 <?php if (!dynamic_sidebar('Sidebar1')) : ?>
 <?php endif; ?>
</div>
<div class="sidebar seperated">
  <?php if (!dynamic_sidebar('Sidebar2')) : ?>
  <?php endif; ?>
</div>
<div class="sidebar seperated">
 <?php if (!dynamic_sidebar('Sidebar3')) : ?>
 <?php endif; ?>
</div>
<div class="sidebar seperated">
 <?php if (!dynamic_sidebar('Sidebar4')) : ?>
 <?php endif; ?>
</div>
<div class="sidebar">
 <?php if (!dynamic_sidebar('Sidebar5')) : ?>
 <?php endif; ?>
</div>
</aside>
</div>
