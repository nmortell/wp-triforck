<div class="alignleft">
         <?php $options = get_option('artblogazine_theme_options');					           		
                echo '<ul class="icons">';
		
			
                if ($options['twitter_uid']) echo '<li class="twitter"><a href="' . $options['twitter_uid'] . '">'
                    .'<img src="' . get_stylesheet_directory_uri() . '/images/twitter.png" alt="Twitter">'
                    .'</a></li>';

                if ($options['facebook_uid']) echo '<li class="facebook"><a href="' . $options['facebook_uid'] . '">'
                    .'<img src="' . get_stylesheet_directory_uri() . '/images/facebook.png" alt="Facebook">'
                    .'</a></li>';
  
                if ($options['linkedin_uid']) echo '<li class="linkedin"><a href="' . $options['linkedin_uid'] . '">'
                    .'<img src="' . get_stylesheet_directory_uri() . '/images/linkedin.png" alt="LinkedIn">'
                    .'</a></li>';
					
                if ($options['youtube_uid']) echo '<li class="youtube"><a href="' . $options['youtube_uid'] . '">'
                    .'<img src="' . get_stylesheet_directory_uri() . '/images/youtube.png" alt="YouTube">'
                    .'</a></li>';
					
                if ($options['stumble_uid']) echo '<li class="stumble"><a href="' . $options['stumble_uid'] . '">'
                    .'<img src="' . get_stylesheet_directory_uri() . '/images/stumbleupon.png" alt="stumble">'
                    .'</a></li>';
					
                if ($options['rss_uid']) echo '<li class="rss"><a href="' . $options['rss_uid'] . '">'
                    .'<img src="' . get_stylesheet_directory_uri() . '/images/rss.png" alt="rss">'
                    .'</a></li>';
       
                if ($options['google_plus_uid']) echo '<li class="google"><a href="' . $options['google_plus_uid'] . '">'
                    .'<img src="' . get_stylesheet_directory_uri() . '/images/google.png" alt="google">'
                    .'</a></li>';
                if ($options['blogger_uid']) echo '<li class="blogger"><a href="' . $options['blogger_uid'] . '">'
                    .'<img src="' . get_stylesheet_directory_uri() . '/images/blogger.png" alt="blogger">'
                    .'</a></li>';
                if ($options['deviantart_uid']) echo '<li class="deviantart"><a href="' . $options['deviantart_uid'] . '">'
                    .'<img src="' . get_stylesheet_directory_uri() . '/images/deviantart.png" alt="deviantart">'
                    .'</a></li>';

                if ($options['delicious_uid']) echo '<li class="delicious"><a href="' . $options['delicious_uid'] . '">'
                    .'<img src="' . get_stylesheet_directory_uri() . '/images/delicious.png" alt="delicious">'
                    .'</a></li>';

                echo '</ul>';
         ?>
   </div>      