<?php
/**
 *@package mrttheme
 *@since mrttheme 1.0
 *
 */
?>
<div class="sidebar row span8">
<div class="sidebar span8 homes-slider">
	<?php echo do_shortcode("[slider id='109' name='Home Projects Slider']");?>
	<?php if (!dynamic_sidebar('Homes-Slider')) : ?>
        <?php endif; ?>
</div>
<div class="sidebar span8 videoplayer">
<?php if (!dynamic_sidebar('Video-bar')) : ?>
<?php endif; ?>
</div>
<div class="span8 horizontal-grey"></div>
<div class="sidebar">
	<div class="row span8 social-area">
	<div class="span4 instagram-feed">
		<?php if (!dynamic_sidebar('instagram-bar')) : ?>
		<?php endif; ?>
	</div>
	<div class="span4 twitter-feed">
		<?php if (!dynamic_sidebar('twitter-bar')) : ?>
		<?php endif; ?>
	</div>
	</div>
</div>
<div class="span8 horizontal-grey"></div>
<div class="span8 top-story-margin">
<div class="sidebar top-story">
<?php if (!dynamic_sidebar('Top-Stories')) : ?>
<?php endif; ?>
</div>
</div>
