<?php
/*
Plugin Name: Webloggerz Social Media Wigdet
Plugin URI: http://webloggerz.com/download-social-media-widget-for-wordpress/
Description: Webloggerz Social Media Wigdet : A beautiful widget to be used in sidebar or footer, it allows you to add your Twitter , Facebook, Google Plus and Feeds Subscription in it .
Version: 2.0
Author: Ansh Gupta
Author URI: http://webloggerz.com/
License: GPLv2
*/
/*  Copyright 2013  Ansh Gupta 
	You need written confirmation by Anshit Gupta before using or modifying
	the code in any of your project.

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
 //Registering the function 
function webl_facebook_fans( $page_link ){
	$face_link = @parse_url($page_link);

	if( $face_link['host'] == 'www.facebook.com' || $face_link['host']  == 'facebook.com' ){
		$page_name = substr(@parse_url($page_link, PHP_URL_PATH), 1);
		$data = @json_decode(@file_get_contents("https://graph.facebook.com/".$page_name));
		
		$fans = $data->likes;
		
		if( get_option( 'fans_count') < $fans )
			update_option( 'fans_count' , $fans );
			
		if( $fans == 0 && get_option( 'fans_count') )
			$fans = get_option( 'fans_count');
				
		elseif( $fans == 0 && !get_option( 'fans_count') )
			$fans = 0;
			
		return $fans;
	}
}
class webloggerzsocial extends WP_Widget {

	function webloggerzsocial() {
		$widget_ops = array('classname' => 'webloggerz', 'description' => __(' Add Twitter, Facebook, G+ and Feeds in Sidebar Widget By Ansh Gupta | Webloggerz.com'));
		$control_ops = array('width' => 250, 'height' => 350);
		$this->WP_Widget('webloggerzsocial', __('Webloggerz Social Media Wigdet'), $widget_ops, $control_ops);
	}
//adding the css
	function addhead() {
		$siteurl = get_option('siteurl');
		$url = $siteurl . '/wp-content/plugins/' . basename(dirname(__FILE__)) . '/widgetstyles.css';
		echo "<link rel='stylesheet' type='text/css' href='$url' />\n";
	}
		
	
	function widget( $args, $instance ) {

		$facebook_page = $instance['facebook'] ;
		$rss_id = $instance['rss'] ;
		$twitter_id =  $instance['twitter'] ;
		$colbox_width = $instance['colbox'];
		$gplus_id = $instance['gplus'];
		$gpluspage_id = $instance['gpluspage'];
		$gbox_width = $instance['gbox'];
		$author_credit_opt = $instance['author_credit'];
		$counter = 0;
		if( $rss_id ) $counter ++ ;
		if( $twitter_id ) $counter ++ ;
		if( $facebook_page ) $counter ++ ;

		?>
		<div class="webloggerz-widget">
			<ul style="width:<?php echo $colbox_width; ?>px;">
			<?php if( $rss_id ):
					//$rss = rss_count( $rss_id ); ?>
				<li class="rss-subscribers">
					<a href="<?php echo $rss_id ?>" target="_blank">
						<span><?php _e('Subscribe' , 'wpm' ) ?><?php __('Subscribers' , 'wpm' ) ?></span>
						<small><?php _e('To RSS Feed' , 'wpm' ) ?></small>
					</a>
				</li>
			<?php endif; ?>
            <?php if( $facebook_page ): ?>
				<li class="facebook-fans">
                    <a href="<?php echo $facebook_page ?>" target="_blank">					
                        <span><?php echo @number_format( webl_facebook_fans( $facebook_page ) ) ?></span>
						<small><?php _e('Fans' , 'wpm' ) ?></small>
				    </a>
				</li>
			<?php endif; ?>
			<?php if( $twitter_id ): 
                 $twurl = "https://twitter.com/users/show/".$twitter_id;
                 $response = file_get_contents ( $twurl );
                 $t_profile = new SimpleXMLElement ( $response );
                 $tcount = $t_profile->followers_count;?>
			
      			<li class="twitter-followers">
                    <a href="<?php echo 'https://twitter.com/'.$twitter_id; ?>" target="_blank">
                        <span><?php echo $tcount; ?></span>
						<small><?php _e('Followers' , 'wpm' ) ?></small>
			        </a>
				</li>
			<?php endif; ?>
			</ul>
            <?php if( $gplus_id ): ?>
			    <div class="googleplus_widget">
                    <span>
				<div class="g-plus"  data-width="<?php echo $gbox_width; ?>" data-height="69" data-href="<?php echo 'https://plus.google.com/'.$gplus_id; ?>" data-rel="author"></div>
	<span>
		    </div>
			<?php endif; ?>
			<?php if( $gpluspage_id ): ?>
			<div class="googleplus_widget2">
			
			<div class="g-plus" data-width="<?php echo $gbox_width; ?>" data-href=<?php echo 'https://plus.google.com/'.$gpluspage_id; ?> data-rel="publisher"></div>
			</div>
 			<?php endif; ?>
			<!-- gplus script -->
<script type='text/javascript'>
			  (function() {
				var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
				po.src = 'https://apis.google.com/js/plusone.js';
				var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
			  })();
			</script>
			<?php if( $author_credit_opt ): ?>
			<div class="author-credit">
			 <a href="http://webloggerz.com/download-social-media-widget-for-wordpress/" target="_blank" title="Get Social Media Widget">Get This Widget</a>
			</div>
			<?php endif; ?>
		</div>
		
	<?php 
	}

	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		$instance['facebook'] = $new_instance['facebook'] ;
		$instance['rss'] =  $new_instance['rss'] ;
		$instance['twitter'] =  $new_instance['twitter'] ;
        $instance['colbox'] = $new_instance['colbox'] ; 
		$instance['gplus'] =  $new_instance['gplus'] ;
		$instance['gpluspage'] =  $new_instance['gpluspage'] ;
		$instance['gbox'] =  $new_instance['gbox'] ;
		
        $instance['author_credit'] =   isset($new_instance['author_credit']) ? 1 : 0 ;

		return $instance;
	}

	function form( $instance ) {
		$instance = wp_parse_args( (array) $instance, array( 'rss' => 'web-bloggerz', 'facebook' => 'http://facebook.com/webloggerz', 'twitter' => 'webloggerz', 'colbox' => '310', 'gplus' => '102182186419905223120', 'gpluspage' => '100302322511288585262', 'gbox' => '300', 'author_credit'=>1 ) ); 
		$rss = $instance['rss'];
		$facebook = format_to_edit($instance['facebook']);
		$twitter = format_to_edit($instance['twitter']);
		$colbox = format_to_edit($instance['colbox']);
		$gplus = format_to_edit($instance['gplus']);
		$gpluspage = format_to_edit($instance['gpluspage']);
		$gbox = format_to_edit($instance['gbox']);

		$author_credit = format_to_edit($instance['authr_credit']);

		
		?>

		<p>
			<label for="<?php echo $this->get_field_id( 'rss' ); ?>">Feed URL : </label>
			<input id="<?php echo $this->get_field_id( 'rss' ); ?>" name="<?php echo $this->get_field_name( 'rss' ); ?>" value="<?php echo $instance['rss']; ?>" class="widefat" type="text" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'facebook' ); ?>">Facebook Page URL : </label>
			<input id="<?php echo $this->get_field_id( 'facebook' ); ?>" name="<?php echo $this->get_field_name( 'facebook' ); ?>" value="<?php echo $instance['facebook']; ?>" class="widefat" type="text" />
			<small>Link must be like http://www.facebook.com/username/ or http://www.facebook.com/PageID/</small>

		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'twitter' ); ?>">Twitter Username : </label>
			<input id="<?php echo $this->get_field_id( 'twitter' ); ?>" name="<?php echo $this->get_field_name( 'twitter' ); ?>" value="<?php echo $instance['twitter']; ?>" class="widefat" type="text" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id( 'colbox' ); ?>">Colored Column Width (eg:300) : </label>
			<input id="<?php echo $this->get_field_id( 'colbox' ); ?>" name="<?php echo $this->get_field_name( 'colbox' ); ?>" value="<?php echo $instance['colbox']; ?>" class="widefat" type="text" />
		</p>
        <p>
			<label for="<?php echo $this->get_field_id( 'gplus' ); ?>">Google Plus Author ID : </label>
			<input id="<?php echo $this->get_field_id( 'gplus' ); ?>" name="<?php echo $this->get_field_name( 'gplus' ); ?>" value="<?php echo $instance['gplus']; ?>" class="widefat" type="text" />
		</p>
        <p>
			<label for="<?php echo $this->get_field_id( 'gpluspage' ); ?>">Google Plus Page ID : </label>
			<input id="<?php echo $this->get_field_id( 'gpluspage' ); ?>" name="<?php echo $this->get_field_name( 'gpluspage' ); ?>" value="<?php echo $instance['gpluspage']; ?>" class="widefat" type="text" />
		</p>
        <p>
			<label for="<?php echo $this->get_field_id( 'gbox' ); ?>">Google Box Width : (eg:320) </label>
			<input id="<?php echo $this->get_field_id( 'gbox' ); ?>" name="<?php echo $this->get_field_name( 'gbox' ); ?>" value="<?php echo $instance['gbox']; ?>" class="widefat" type="text" />
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('author_credit'); ?>">Give credit to the plugin's author?: </label>
			<input type="checkbox" <?php checked( $instance['author_credit'], 1 ); ?> id="<?php echo $this->get_field_id('author_credit'); ?>" name="<?php echo $this->get_field_name('author_credit'); ?>" value="<?php echo $instance['showfoot_id']; ?>" />			
		</p>
        <p>
			<label>If you liked this plugin, Please like on facebook ,G+:  </label><br />
            <iframe src="//www.facebook.com/plugins/like.php?href=https%3A%2F%2Fwww.facebook.com%2Fwebloggerz&amp;send=false&amp;layout=button_count&amp;width=100&amp;show_faces=false&amp;font=trebuchet+ms&amp;colorscheme=light&amp;action=like&amp;height=21&amp;appId=300097030090548" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:100px; height:21px;" allowTransparency="true"></iframe>
			<iframe src="//www.facebook.com/plugins/follow.php?href=https%3A%2F%2Fwww.facebook.com%2Fgupta.anshit&amp;layout=button_count&amp;show_faces=false&amp;colorscheme=light&amp;font&amp;width=100&amp;appId=300097030090548" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:100px; height:21px" allowTransparency="true"></iframe>
<!-- Place this tag where you want the badge to render. -->
<div class="g-plus" data-width="269" data-height="69" data-href="https://plus.google.com/102182186419905223120" data-rel="author"></div>

<!-- Place this tag after the last badge tag. -->
<script type="text/javascript">
  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script>
			<?php
	}			
		
}
add_action('widgets_init', create_function('', 'return register_widget(\'webloggerzsocial\');'));
add_action('wp_head', array('webloggerzsocial', 'addhead'));