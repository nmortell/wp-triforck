<?php
/**
 *@package mrttheme
 *@since mrttheme 1.0
 *
 */
?>
<div class="sidebar" id="main">
<div class="sidebar row-fluid span12">
<!--get involved content, no drag and drop-->
	<div class="span3">
		<a>
			<img class="call-to" src="http://127.0.0.1:9040/wp-content/themes/mrttheme/images/community-btn.png"/>
			<h2>The Community</h2>
			<p class="btn-txt">Lorem ipsum dolor sit cons ectetur adipiscing.</p>
		</a>
	</div>
	<div class=" call-to span3">
		<a>
			<img src="http://127.0.0.1:9040/wp-content/themes/mrttheme/images/homes-btn.png"/>
			<h2>The Homes</h2>
			<p class="btn-txt">Phasellus quis lectus at posuere neque.</p>
		</a>
        </div>
	<div class="call-to span3">
		<a>
			<img src="http://127.0.0.1:9040/wp-content/themes/mrttheme/images/volunteer-btn.png"/>
			<h2>Volunteer</h2>
			<p class="btn-txt">Lorem ipsum dolor sit cons ectetur adipiscing.</p>
		</a>
        </div>
	<div class="call-to span3">
		<a>
			<img src="http://127.0.0.1:9040/wp-content/themes/mrttheme/images/donate-btn.png"/>
			<h2>Donate</h2>
			<p class="btn-txt">Phasellus quis lectus at psuere neque.</p>
		</a>
        </div>
</div>
<div class="span12 horizontal-grey"></div>
<div class="sidebar span12">
<?php if (!dynamic_sidebar('Video-bar')) : ?>
<?php endif; ?>
</div>
<div class="span12 horizontal-grey"></div>
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
<div class="span12 horizontal-grey"></div>
<div class="sidebar">
<?php if (!dynamic_sidebar('Top-Stories')) : ?>
<?php endif; ?>
</div>
</div>
