<?php
/**
 *@package mrttheme
 *@since mrttheme 1.0
 *
 */
?>
<div class="sidebar row span8">
<!--get involved content, no drag and drop-->
	<h3 class="call-to">get involved</h3>
	<div class="span2 call-to">
		<a>
		<img class="call-to" src="http://127.0.0.1:9040/wp-content/theme		s/mrttheme/images/community-btn.png"/>
		</a>
			<h2>Community</h2>
			<p class="btn-txt">Lorem ipsum dolor sit cons ectetur ad			ipiscing.</p>
			<a href="">See More</a>
	</div>
	<div class=" call-to span2">
		<a>
			<img class="call-to" src="http://127.0.0.1:9040/wp-content/themes/mrttheme/images/homes-btn.png"/>
		</a>
			<h2>Homes</h2>
			<p class="btn-txt">Phasellus quis lectus at posuere neque.</p>
			<a href="">See More</a>
        </div>
	<div class="call-to span2">
		<a href="http://rebuildingtogether.org/help/volunteer/">
			<img class="call-to" src="http://127.0.0.1:9040/wp-content/themes/mrttheme/images/volunteer-btn.png"/>
		</a>
			<h2>Volunteer</h2>
			<p class="btn-txt">Lorem ipsum dolor sit cons ectetur adipiscing.</p>
		<a href="http://rebuildingtogether.org/help/volunteer/">See More</a>
        </div>
	<div class="call-to span2">
		<a href="http://rebuildingtogether.org/donate">
			<img class="call-to"src="http://127.0.0.1:9040/wp-content/themes/mrttheme/images/donate-btn.png"/>
		</a>
			<h2>Donate</h2>
			<p class="btn-txt">Phasellus quis lectus at psuere neque.</p>
		<a href="http://rebuildingtogether.org/donate">See More</a>
        </div>
</div>
<div class="span8 horizontal-grey"></div>
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
