<!-- This file is used to markup the public facing widget. -->

	<ul class="share">							

		<li class="twitter">
			<a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php echo  urlencode( $twitterurl ); ?>" data-text="<?php echo _e($twitter, self::locale); ?>">Tweet</a>
			<script type="text/javascript" src="//platform.twitter.com/widgets.js"></script>
		</li>									

		<li class="facebook">					
			<div id="fb-root"></div>
			<script>(function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) {return;}
			  js = d.createElement(s); js.id = id;
			  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
			  fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));</script>		
			<div class="fb-like" data-href="<?php echo $facebook; ?>" data-send="false" data-layout="button_count" data-width="450" data-show-faces="false"></div>
		</li>

		<li class="googleplus">
			<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>
			<g:plusone size="medium" href="<?php echo $google_plus; ?>"></g:plusone>
		</li>	

		<li class="pinterest">
		<a href="http://pinterest.com/pin/create/button/?url=<?php echo urlencode( $pinterest ); ?>" class="pin-it-button" count-layout="horizontal"><img border="0" src="//assets.pinterest.com/images/PinExt.png" title="Pin It" /></a>
			<!--<a href="http://pinterest.com/pin/create/button/?url=http%3A%2F%2Fbrankic1979.com%2Ficons%2F&media=http%3A%2F%2Fbrankic1979.com%2Ficons%2Fimages%2Ficons2.png&description=A%20set%20of%20350%20pixel%20perfect%20glyphs%20icons%2C%20perfect%20for%20apps%2C%20websites%20or%20just%20about%20anything%20you%20can%20think%20of.%20You%20may%20use%20this%20icon%20set%20for%20both%20personal%20and%20commercial%20use%2C%20which%20means%20this%20resource%20can%20be%20used%20in%20any%20project%20without%20worrying%20about%20licensing." class="pin-it-button" count-layout="horizontal"><img border="0" src="//assets.pinterest.com/images/PinExt.png" title="Pin It" /></a>-->
		</li>				

	</ul><!--END share-->
