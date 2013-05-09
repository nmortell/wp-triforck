<?php
/**
 *@package mrttheme
 *@since mrttheme 1.0
 *
 */
?>
<div class="sidebar" id="main">
<div class="sidebar span8">
<!--get involved content, no drag and drop-->
</div>
<div class="horizontal-grey"></div>
<div class="sidebar span8">
<?php if (!dynamic_sidebar('Video-bar')) : ?>
<?php endif; ?>
</div>
<div class="horizontal-grey"></div>
<div class="sidebar">
	<div class="row-fluid span12">
	<div class="span6">
		<?php if (!dynamic_sidebar('instagram-bar')) : ?>
		<?php endif; ?>
	</div>
	<div class="span6">
		<?php if (!dynamic_sidebar('twitter-bar')) : ?>
		<?php endif; ?>
	</div>
	</div>
</div>
<div class="horizontal-grey"></div>
<div class="sidebar">
<?php if (!dynamic_sidebar('Top-Stories')) : ?>
<?php endif; ?>
</div>
</div>
