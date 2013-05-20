<?php
/*
Plugin Name: YouTube SimpleGallery
Plugin URI: http://wpwizard.net/plugins/youtube-simplegallery/
Description: A YouTube Gallery Plugin, that lets you add a gallery of videos to any Page or Post. <strong>See <a href="options-general.php?page=youtube-gallery">Settings</a> for Usage.</strong>
Author: Stian Andreassen
Author URI: http://www.wpwizard.net
Version: 1.6.1
*/

global $youtube_gallery_count, $youtube_gallery_ID;
$youtube_gallery_count = 0;
$youtube_gallery_ID = 0;

add_action('wp_head', 'youtube_gallery_css');

// ADD OPTIONS PAGE
add_action('admin_menu', 'youtubegallery_admin');
function youtubegallery_admin() {
  add_options_page('YouTube SimpleGallery', 'YouTube SimpleGallery', '10', 'youtube-gallery', 'youtubegallery_options');
  
  if($_REQUEST['action'] == 'update_youtube_gallery'){
  	delete_option('youtube_gallery_option');
	add_option('youtube_gallery_option', array('width' => $_REQUEST['youtubegallery_width'], 'height' => $_REQUEST['youtubegallery_height'], 'hd' => $_REQUEST['youtubegallery_hd'], 'start' => $_REQUEST['youtubegallery_start'], 'thickbox' => $_REQUEST['youtubegallery_thickbox'], 'openlinks' => $_REQUEST['youtubegallery_openlinks'], 'pb' => $_REQUEST['youtubegallery_pb'], 'css' => $_REQUEST['youtubegallery_css'], 'jq' => $_REQUEST['youtubegallery_jq'], 'thumbwidth' => $_REQUEST['youtubegallery_thumbwidth'], 'title' => $_REQUEST['youtubegallery_title'], 'cols' => $_REQUEST['youtubegallery_cols'], 'titlecss' => $_REQUEST['youtubegallery_titlecss']));
  }
}

// Add settings link on plugin page  
function youtubegallery_settings_link($links) {  
$settings_link = '<a href="options-general.php?page=youtube-gallery">Settings</a>';  
array_push($links, $settings_link);  
return $links;  
}  

// SHOW OPTIONS
function youtubegallery_options(){
?>
<style type="text/css">
<!--
	#plugins td, #plugins th {
		border-bottom: none;
		padding: 10px;
	}
	
	#plugins th {
		text-align: right;
	}
	
	#plugins tr {
		vertical-align: top;
	}
	
	#thickboxstatus {
		border: 1px solid #dbdbdb;
		padding: 0 20px 20px;
		margin-top: 20px;
		background: #ececec;
		border-radius: 3px;
		-moz-border-radius: 3px;
		-webkit-border-radius: 3px;
	}
	
	#youtube_settings_left, #youtube_settings_right {
		float: left;
		width: 350px;
	}
	
	#youtube_settings_left {
		margin-right: 20px;
	}
	
	.youtube_code {
		font-family: Consolas, Monaco, Courier, monospace;
		margin-left: 20px;
	}
	
	.youtube_highlight {
		background: #dedede;
	}
	
	#ytsg_wrap {
		max-width: 750px;
	}
	
	#ytsg_wrap hr.transparent {
		clear: both;
		border: 1px solid transparent;
	}

	#ytsg_tabs {
		border-bottom: 1px solid #999;
	}
	
	#ytsg_tabs li {
		list-style: none;
		float: left;
		margin-right: 5px;
		margin-bottom: 5px;
	}
	
	#ytsg_tabs li a {
		text-decoration: none;
		font-size: 1.4em;
		padding: 5px 15px;
		border-radius: 5px 5px 0 0;
		-moz-border-radius: 5px 5px 0 0;
		-webkit-border-radius: 5px 5px 0 0;
	}
	
	#ytsg_tabs .ytsg_active a {
		background: #797979;
		color: #fff;
	}
	
	#ytsg_wrap .nav_hide {
		display: none;
	}
	
-->
</style>

<script type="text/javascript">
jQuery.noConflict();
jQuery(document).ready(function($){
 
	$('#ytsg_tabs a').click(function( event ){
		event.preventDefault();
		var thisdiv = $(this).attr('ID').replace('_nav', '');
		$('#ytsg_tabs').find('.ytsg_active').removeClass('ytsg_active');
		$(this).parent().addClass('ytsg_active');
		$('#message').hide();
		
		$('.ytsg_div').each(function(){
			$(this).addClass('nav_hide');
		});
		
		$('#'+thisdiv).removeClass('nav_hide');
	});
 
});
</script>

<div id="wpbody-content">
	<div class="wrap">
		<div id="icon-options-general" class="icon32"><br /></div>
		<h2>YouTube Gallery Settings</h2>
		<br />
		<?php
	    if ( $_REQUEST['update'] ) echo '<div id="message" class="updated fade"><p><strong>Settings saved.</strong></p></div>';
		$youtube_gallery_options = get_option('youtube_gallery_option');
		?>
		
<div id="ytsg_wrap">
	<ul id="ytsg_tabs">
		<li class="ytsg_active"><a href="#" id="ytsg_nav_general_settings">General Settings</a></li>
		<li><a href="#" id="ytsg_nav_usage">Usage</a></li>
		<li><a href="#" id="ytsg_nav_faq">FAQ</a></li>
		<li><a href="#" id="ytsg_nav_donate">Donate</a></li>
		<br style="clear: both;" />
	</ul>
		
	<div id="ytsg_general_settings" class="ytsg_div">
		<h2>General Settings</h2>
		<form method="POST">
		
		<div id="youtube_settings_left">
		<h3>Thumbnails</h3>
		<table class="widefat" id="plugins" style="width: 350px; clear: none;">
			<tbody>
				<tr>
					<th scope="row">Width:</th><td><input type="text" name="youtubegallery_thumbwidth" size="6" value="<?php echo $youtube_gallery_options['thumbwidth'] ?>"> <span style="color: #999;">Width of thumbnails < 480px</span></td>
				</tr>
				<tr>
					<th scope="row">Columns:</th><td><input type="text" name="youtubegallery_cols" size="6" value="<?php echo $youtube_gallery_options['cols'] ?>"> <span style="color: #999;">Number of thumbs per row<br />0 = free float.<!-- <strong>Use this to break each row; helps with displaying long titles</strong>. <br />--> Can be overridden for each gallery by using [youtubegallery <strong>cols=x</strong>]</span></td>
				</tr>
				<tr>
					<th scope="row">Display titles:</th><td><input type="radio" name="youtubegallery_title" value="above"<?php if($youtube_gallery_options['title'] == 'above') echo' checked'; ?>> Above thumbnails<br /><input type="radio" name="youtubegallery_title" value="below"<?php if($youtube_gallery_options['title'] == 'below') echo' checked'; ?>> Below thumbnails</td>
				</tr>
				<tr>
					<th scope="row">Play-button:</th><td><input type="checkbox" name="youtubegallery_pb" value="usepb"<?php if($youtube_gallery_options['pb'] == 'usepb') echo' checked'; ?>> <span style="color: #999;">Show &laquo;Play&raquo;-symbol over thumbnails</b></span></td>
				</tr>
				<tr>
					<th scope="row">Use&nbsp;jQuery:</th><td><input type="checkbox" name="youtubegallery_jq" value="usejq"<?php if($youtube_gallery_options['jq'] == 'usejq') echo' checked'; ?>> <span style="color: #999;">Use built-in jQuery for centering<br /><b>Disable if you do not want automatic centering, or if this causes problems</b></span></td>
				</tr>
				<tr>
					<th scope="row">Use&nbsp;CSS:</th><td><input type="checkbox" name="youtubegallery_css" value="usecss"<?php if($youtube_gallery_options['css'] == 'usecss') echo' checked'; ?>> <span style="color: #999;">Use CSS included with plugin<br /><b>Disable if you want to use your own CSS</b></span></td>
				</tr>
				<tr>
					<th scope="row">Title CSS:</th><td><textarea name="youtubegallery_titlecss" rows="6" cols="25" style="width: 95%; max-width: 95%; font-size: .9em;"><?php echo $youtube_gallery_options['titlecss'] ?></textarea><br /> <span style="color: #999;">Styling of titles/captions, such as font-size, font-style, etc.</span></td>
				</tr>
			</tbody>
		</table>
		</div>
		
		<div id="youtube_settings_right">
		<h3>Videos</h3>
		<table class="widefat" id="plugins" style="width: 350px; clear: none;">
			<tbody>
				<tr>
					<th scope="row">Width:</th><td><input type="text" name="youtubegallery_width" size="6" value="<?php echo $youtube_gallery_options['width'] ?>"> <span style="color: #999;">Width of embedded video</span></td>
				</tr>
				<tr>
					<th scope="row">Height:</th><td><input type="text" name="youtubegallery_height" size="6" value="<?php echo $youtube_gallery_options['height'] ?>"> <span style="color: #999;">Height of embedded video</span></td>
				</tr>
				<tr>
					<th scope="row">HD:</th><td><input type="checkbox" name="youtubegallery_hd" value="usehd"<?php if($youtube_gallery_options['hd'] == 'usehd') echo' checked'; ?>> <span style="color: #999;">Embed videos in HD quality (if available)</span></td>
				</tr>
				<tr>
					<th scope="row">Autoplay:</th><td><input type="checkbox" name="youtubegallery_start" value="autoplay"<?php if($youtube_gallery_options['start'] == 'autoplay') echo' checked'; ?>> <span style="color: #999;">Start videos on click</span></td>
				</tr>
				<tr>
					<th scope="row">Effect:</th>
					<td>
						<input type="radio" name="youtubegallery_thickbox" value="shadowbox"<?php if($youtube_gallery_options['thickbox'] == 'shadowbox') echo' checked'; ?>> Shadowbox <br />
						<input type="radio" name="youtubegallery_thickbox" value="fancybox"<?php if($youtube_gallery_options['thickbox'] == 'fancybox') echo' checked'; ?>> Fancybox <br />
						<input type="radio" name="youtubegallery_thickbox" value="thickbox"<?php if($youtube_gallery_options['thickbox'] == 'thickbox') echo' checked'; ?>> Thickbox <br />
						<input type="radio" name="youtubegallery_thickbox" value="none"<?php if($youtube_gallery_options['thickbox'] == 'none') echo' checked'; ?>> None  | <input type="checkbox" name="youtubegallery_openlinks"<?php if($youtube_gallery_options['openlinks']) echo' checked'; ?>> Open links in new window/tab<br />
						<span style="color: #999;">Opens videos in a box on your page &ndash; requires either <a href="http://wordpress.org/extend/plugins/shadowbox-js/">Shadowbox JS</a>, <a href="http://wordpress.org/extend/plugins/fancybox-for-wordpress/">FancyBox for WordPress</a>, or <a href="http://wordpress.org/extend/plugins/thickbox/">Thickbox</a> installed. <br /><b>Select &#171;None&#187; if you want the links to go directly to the YouTube-page</b></span>
					</td>
				</tr>
			</tbody>
		</table>
		<?php 
		if($youtube_gallery_options['thickbox']=='shadowbox'){
			if(!class_exists('Shadowbox')){
			echo '<div id="thickboxstatus">';
			echo '<h3>Effect plugin status:</h3>';
			echo 'Shadowbox is NOT installed and/or not actived. Please download <a href="http://wordpress.org/extend/plugins/shadowbox-js/">Shadowbox</a>, install and activate it if you want to use it with this plugin.'; 
			echo '</div>';
			}
		}
		?>

		<?php 
		if($youtube_gallery_options['thickbox']=='fancybox'){
			if(!function_exists('mfbfw_get_settings')){
			echo '<div id="thickboxstatus">';
			echo '<h3>Effect plugin status:</h3>';
			echo '<p>FancyBox for WordPress is NOT installed and/or not actived. Please download <a href="http://wordpress.org/extend/plugins/fancybox-for-wordpress/">FancyBox for WordPress</a>, install and activate it if you want to use it with this plugin.</p>'; 
			echo '</div>';
			}
		}
		?>

		<?php 
		if($youtube_gallery_options['thickbox']=='thickbox'){
			if(!function_exists('is_thickbox_enabled')){
			echo '<div id="thickboxstatus">';
			echo '<h3>Effect plugin status:</h3>';
			echo 'Thickbox is NOT installed and/or not actived. Please download <a href="http://wordpress.org/extend/plugins/thickbox/">Thickbox</a>, install and activate it if you want to use it with this plugin.'; 
			echo '</div>';
			}
		}
		?>
		</div>
	

		
		<hr class="transparent" />

		<p class="submit">
		<input name="update" type="submit" class="button-primary" value="<?php _e('Update Settings'); ?>" />
		<input type="hidden" name="action" value="update_youtube_gallery" />
		</p>
		</form>

	</div>	

	<div id="ytsg_usage" class="ytsg_div nav_hide">
		<h2 style="clear: both;">Usage</h2>
		
		<h3>In Posts or Pages:</h3>
		<p>To embed a gallery in a Post or a Page use the following code:</p>
		<p class="youtube_code">
			[youtubegallery]<br />
			http://www.youtube.com/watch?v=cRdxXPV9GNQ<br />
			http://www.youtube.com/watch?v=xqTac_O_wh4<br />
			http://www.youtube.com/watch?v=jJK-G9-dLzw<br />
			http://www.youtube.com/watch?v=S4aqM_wu6Ns<br />
			[/youtubegallery]		
		</p>
		
		<p>If you want to add titles/description to the videos, add it before the link and separate with | (pipe), like this:</p>

		<p class="youtube_code">
			[youtubegallery]<br />
			<span class="youtube_highlight">Avatar Trailer HD|</span>http://www.youtube.com/watch?v=cRdxXPV9GNQ<br />
			<span class="youtube_highlight">Call of Duty Modern Warfare: Deathmatch|</span>http://www.youtube.com/watch?v=xqTac_O_wh4<br />
			<span class="youtube_highlight">The Fast Show: Unlucky Alf|</span>http://www.youtube.com/watch?v=jJK-G9-dLzw<br />
			<span class="youtube_highlight">Jožin z bažin|</span>http://www.youtube.com/watch?v=S4aqM_wu6Ns<br />
			[/youtubegallery]		
		</p>

		<h3>In Theme files (outside The Loop):</h3>
		<p>If you wish to add a gallery in a part of the Theme that is outside «The Loop» and/or not within a Widget,
		you can use the <a href="http://codex.wordpress.org/Function_Reference/do_shortcode">do_shortcode()</a>-function like this:
		</p>
		<p class="youtube_code">
			<span class="youtube_highlight">&lt;?php echo do_shortcode('</span>[youtubegallery]<br />
			http://www.youtube.com/watch?v=cRdxXPV9GNQ<br />
			http://www.youtube.com/watch?v=xqTac_O_wh4<br />
			http://www.youtube.com/watch?v=jJK-G9-dLzw<br />
			http://www.youtube.com/watch?v=S4aqM_wu6Ns<br />
			[/youtubegallery]<span class="youtube_highlight">'); ?&gt;</span>
		</p>
		<p>Make sure to keep the linebreaks!</p>
		
		<h3>Columns</h3>
		<p>For both Posts & Pages and do_shortcode you can add <code>cols=x</code>, e.g. <code>[youtubegallery cols=4]</code> to override the default setting.</p>

		<h3>In Widgets:</h3>
		<p>Add a «YouTube SimpleGallery» widget to your sidebar(s), add links with linebreaks in the area entitles «Links». 
		<br />You do not use the <code>[youtubegallery]</code> and <code>[/youtubegallery]</code> in Widgets. 
		<br />You can add titles in the same way as for Posts and Pages.
		</p>

	</div>
	
	<div id="ytsg_faq" class="ytsg_div nav_hide">
		<h2>FAQ</h2>

		<h4 style="margin-bottom: -10px;">Shadowbox JS/FancyBox for WordPress/Thickbox doesn’t work properly. What’s wrong?</h4>
		<p>Check if your current Theme has both <code>wp_head()</code> in header.php
		and <code>wp_footer()</code> in footer.php. Both are usually required for these scripts to function properly. 
		Also note that some plugins aren’t buddies and create conflicts with each other; try disabling the plugins for the effects you don’t use.
		</p>

		<h4 style="margin-bottom: -10px;">Thumbnails aren’t working, I only get a gray video icon. What’s up?</h4>
		<p>Both YouTube and WordPress are in continual development, and they sometimes change things faster
		than <em>YouTube SimpleGallery</em> can keep up with. Check to see if there’s a newer version of <em>YouTube SimpleGallery</em>
		available. If not, report the problem on the <a href="http://wpwizard.net/plugins/youtube-simplegallery/">plugin website</a>
		or in the <a href="http://wordpress.org/tags/youtube-simplegallery">WP forums</a>.</p>
		
		<h4 style="margin-bottom: -10px;">I got an amazing idea for a great feature! Can you implement it? Pretty please?</h4>
		<p>The <em>YouTube SimpleGallery</em> is in constant development. A lot of features has been added since it’s birth, many
		of them requests, wishes and ideas from the users. If you got an idea, don’t hesitate to share it on the <a href="http://wpwizard.net/plugins/youtube-simplegallery/">plugin website</a>.</p>
		
		<h4 style="margin-bottom: -10px;">My problem’s not listed here! OMG! What do I do?</h4>
		<p>Don’t panic! The WordPress community is the best bunch of people in the world. Try posting your problem/question on the <a href="http://wpwizard.net/plugins/youtube-simplegallery/">plugin website</a>
		or in the <a href="http://wordpress.org/tags/youtube-simplegallery">WP forums</a>. You’ll probably get help in a jiffy!</p>
		
		
	</div>

	<div id="ytsg_donate" class="ytsg_div nav_hide">
		<h2>Donate</h2>
		<h3>Like this plugin? Please donate to support development.</h3>
		<p>
			Countless hours have gone into the development of this plugin. Hours spent not making money.
			To support further development, please consider giving a donation to the plugin author.
		</p>
		<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
		<input type="hidden" name="cmd" value="_s-xclick">
		<input type="hidden" name="hosted_button_id" value="10406928">
		<input type="image" src="https://www.paypal.com/en_US/i/btn/btn_donate_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
		<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
		</form>
	</div>
</div>


	</div>
</div>
<?php
}

// GET ONLY URL IF AUTO EMBED IS ON
function getYTSGAttribute($attrib, $tag){
  //get attribute from html tag
  $re = '/'.$attrib.'=["\']?([^"\' ]*)["\' ]/is';
  preg_match($re, $tag, $match);
  if($match){
    return urldecode($match[1]);
  }else {
    return false;
  }
}


// OUTPUT THE GALLERY
function show_youtubegallery( $atts, $youtubelinks = null ) {
$youtubelinks = explode("\n", $youtubelinks);
array_pop($youtubelinks);
array_shift($youtubelinks);

$youtubeoptions = get_option('youtube_gallery_option');
$cols = $youtubeoptions['cols'];
if($atts['cols']) $cols = $atts['cols'];

global $youtube_gallery_count, $youtube_gallery_ID;
$x = $youtube_gallery_count;
$youtube_gallery_ID++;

$showgallery = ('<div id="youtube_gallery_'.$youtube_gallery_ID.'" class="youtube_gallery"><div class="youtube_gallery_divider"></div><br />'."\n");
	foreach ( $youtubelinks as $thumbnails ):
		$x++;
		if(strstr($thumbnails, '|')) { $thumb = explode('|', $thumbnails); $captions = 'true'; }
		else { $thumb[1] = $thumbnails; $captions = ''; }

		if(get_option('embed_autourls')=='1' && !$captions){
		$tmpthumb = $thumb[1];
		$thumb[1] = getYTSGAttribute('value', $tmpthumb);
		if(!$thumb[1]) $thumb[1] = getYTSGAttribute('src', $tmpthumb);
		$thumb[1] = str_replace('?fs=1', '', $thumb[1]);
		$thumb[1] = str_replace('?version=3', '', $thumb[1]);
		$thumb[1] = str_replace('?fs=1&feature=oembed', '', $thumb[1]);
		$thumb[1] = str_replace('http://www.youtube.com/embed/', '', $thumb[1]);
		$thumb[1] = str_replace('http://www.youtube.com/e/', '', $thumb[1]);
		$thumb[1] = str_replace('http://www.youtube.com/v/', '', $thumb[1]);
			if(!$thumb[1]) {
				$thumb[1] = str_replace('watch?v=', 'v/', $tmpthumb);
			}
		}
		
		$thumb[1] = str_replace('&#8211;', '--', $thumb[1]);
		if(strstr($thumb[1], '&')) $thumb[1] = substr($thumb[1], 0, strpos($thumb[1], '&'));
		$thumb[1] = str_replace('http://www.youtube.com/watch?v=', '', $thumb[1]);
		$thumb[1] = str_replace('http://www.youtube.com/v/', '', $thumb[1]);		
		$thumb[1] = str_replace('<br />', '', $thumb[1]);
		$thumb[1] = str_replace('<p>', '', $thumb[1]);
		$thumb[1] = str_replace('</p>', '', $thumb[1]);
		
		if($youtubeoptions['hd']=='usehd') $ytsghd = 'hd=1'; else $ytsg = 'hd=0';
		if($youtubeoptions['start']=='autoplay') $ytsgstart = 'autoplay=1'; else $ytsgstart = 'autoplay=0';


		// IF USE SHADOWBOX
		if($youtubeoptions['thickbox'] == 'shadowbox') {
			$showgallery .= '<div id="youtube_gallery_item_'.$x.'" class="youtube_gallery_item">'."\n";
			if($youtubeoptions['title'] == 'above' && $thumb[0] ) $showgallery .= ('<div class="youtube_gallery_caption">'.$thumb[0].'</div>');
			$showgallery .= '<a rel="shadowbox[Mixed];width='.$youtubeoptions['width'].';height='.$youtubeoptions['height'].';" href="http://www.youtube.com/embed/'.str_replace("\r", '', $thumb[1]).'?'.$ytsgstart.'&'.$ytsghd.'" title="'.strip_tags($thumb[0]).'">';
			if($youtubeoptions['pb'] == 'usepb') $showgallery .= '<img src="'.get_bloginfo('wpurl').'/wp-content/plugins/youtube-simplegallery/ytsg_play.png" alt=" " class="ytsg_play" border="0" />';
			$showgallery .= '<img src="http://img.youtube.com/vi/'.str_replace("\r", '', $thumb[1]).'/0.jpg" border="0"></a><br />';
			if($youtubeoptions['title'] == 'below' && $thumb[0] ) $showgallery .= ('<div class="youtube_gallery_caption">'.$thumb[0].'</div>');
			$showgallery .='</div>'."\r";
		}

		// IF USE FANCYBOX
		if($youtubeoptions['thickbox'] == 'fancybox') {
			$showgallery .= '<div id="youtube_gallery_item_'.$x.'" class="youtube_gallery_item">'."\n";
			if($youtubeoptions['title'] == 'above' && $thumb[0] ) $showgallery .= ('<div class="youtube_gallery_caption">'.$thumb[0].'</div>');
			$showgallery .= '<a class="fancybox iframe" href="http://www.youtube.com/embed/'.str_replace("\r", '', $thumb[1]).'?'.$ytsgstart.'&'.$ytsghd.'" title="'.strip_tags($thumb[0]).'">';
			if($youtubeoptions['pb'] == 'usepb') $showgallery .= '<img src="'.get_bloginfo('wpurl').'/wp-content/plugins/youtube-simplegallery/ytsg_play.png" alt=" " class="ytsg_play" border="0" />';
			$showgallery .= '<img src="http://img.youtube.com/vi/'.str_replace("\r", '', $thumb[1]).'/0.jpg" border="0"></a><br />';
			if($youtubeoptions['title'] == 'below' && $thumb[0] ) $showgallery .= ('<div class="youtube_gallery_caption">'.$thumb[0].'</div>');
			$showgallery .='</div>'."\r";
		}

		// IF USE THICKBOX
		elseif($youtubeoptions['thickbox'] == 'thickbox') {
			$showgallery .= '<div id="youtube_gallery_item_'.$x.'" class="youtube_gallery_item">'."\n";
			if($youtubeoptions['title'] == 'above' && $thumb[0] ) $showgallery .= ('<div class="youtube_gallery_caption">'.$thumb[0].'</div>');
			$showgallery .= '<a class="thickbox" href="http://www.youtube.com/embed/'.str_replace("\r", '', $thumb[1]).'?'.$ytsgstart.'&'.$ytsghd.'&KeepThis=true&TB_iframe=true&height='.$youtubeoptions['height'].'&width='.$youtubeoptions['width'].'?'.$ytsgstart.'&'.$ytsghd.'" title="'.strip_tags($thumb[0]).'">';
			if($youtubeoptions['pb'] == 'usepb') $showgallery .= '<img src="'.get_bloginfo('wpurl').'/wp-content/plugins/youtube-simplegallery/ytsg_play.png" alt=" " class="ytsg_play" border="0" />';
			$showgallery .= '<img src="http://img.youtube.com/vi/'.str_replace("\r", '', $thumb[1]).'/0.jpg" border="0"></a><br />';
			if($youtubeoptions['title'] == 'below' && $thumb[0] ) $showgallery .= ('<div class="youtube_gallery_caption">'.$thumb[0].'</div>');
			$showgallery .='</div>'."\r";
		}

		// IF GO TO YOUTUBE.COM
		elseif($youtubeoptions['thickbox'] == 'none') {
			$showgallery .= '<div id="youtube_gallery_item_'.$x.'" class="youtube_gallery_item">'."\n";
			if($youtubeoptions['title'] == 'above' && $thumb[0] ) $showgallery .= ('<div class="youtube_gallery_caption">'.$thumb[0].'</div>');
			$showgallery .= '<a href="http://www.youtube.com/watch?v='.str_replace('<br />', '', $thumb[1]).'"';
			if($youtubeoptions['openlinks']) $showgallery .= ' target="_blank"';
			$showgallery .= '>';
			if($youtubeoptions['pb'] == 'usepb') $showgallery .= '<img src="'.get_bloginfo('wpurl').'/wp-content/plugins/youtube-simplegallery/ytsg_play.png" alt=" " class="ytsg_play" border="0" />';
			$showgallery .= '<img src="http://img.youtube.com/vi/'.str_replace("\r", '', $thumb[1]).'/0.jpg" border="0"></a><br />';
			if($youtubeoptions['title'] == 'below' && $thumb[0] ) $showgallery .= ('<div class="youtube_gallery_caption">'.$thumb[0].'</div>');
			$showgallery .= '</div>'."\r";
		}

		if($cols) 
			if($x%$cols==0) $showgallery .= '<br clear="all" style="clear: both;" />';

		unset($thumb[0]);
		unset($thumb[1]);
	endforeach;
	$showgallery .= ('<div class="youtube_gallery_divider"></div><br clear="all" /></div>');

$youtube_gallery_count = $x;
return $showgallery;
}
add_shortcode('youtubegallery', 'show_youtubegallery');

// ON INSTALL PLUGIN
function youtubegallery_install(){
		add_option('youtube_gallery_option', array('width' => '640', 'height' => '370', 'hd' => 'usehd', 'start' => 'autoplay', 'thickbox' => 'thickbox', 'pb' => 'usepb',  'css' => 'usecss', 'jq' => 'usejq', 'thumbwidth' => '135', 'title' => 'below', 'cols' => '4', 'titlecss' => "text-align: center;\nfont-size: 1.2em;\nfont-style: italic;"));
}

// ON UNINSTALL PLUGIN
function youtubegallery_uninstall(){
		delete_option('youtube_gallery_option');
}

// ADD CSS TO FRONTEND AND SOME JQUERY FOR CENTERING
function youtube_gallery_css(){
global $youtube_gallery_ID;
$youtubeoptions = get_option('youtube_gallery_option');
$thumbwidth = $youtubeoptions['thumbwidth'];
if($youtubeoptions['css'] == 'usecss')
	echo("\n".'<link rel="stylesheet" href="'.get_bloginfo('wpurl').'/wp-content/plugins/youtube-simplegallery/youtube_simplegallery.css" type="text/css" media="screen" />');

	$playwidth = round(($thumbwidth/2.5),0);
	$thumbheight = round(((($thumbwidth)*.75)),0);
	$thumbheight--;
	$playleft = round((($thumbwidth-$playwidth)/2),0);
	$playtop = round((($thumbheight-$playwidth)/2),0);

	echo '<style type="text/css">
	<!-- 
		.youtube_gallery div { width: '.$thumbwidth.'px !important; } 
		.youtube_gallery_caption { '.$youtubeoptions['titlecss'].' } 
		.youtube_gallery_item .ytsg_play { width: '.$playwidth.'px; height: '.$playwidth.'px; left: '.$playleft.'px; top: '.$playtop.'px; };
	-->
	</style>';

if($youtubeoptions['jq'] == 'usejq'){
?>

<script type="text/javascript"> 
jQuery(document).ready(function($) {
	totalwidth = ($(".youtube_gallery").width());
	numberdivs = totalwidth/<?php echo $thumbwidth; ?>;
	numberdivs = (numberdivs < 0 ? -1 : 1) * Math.floor(Math.abs(numberdivs))
	spacing = totalwidth - (<?php echo $thumbwidth; ?>*numberdivs);
	$(".youtube_gallery").css({ 'margin-left' : (spacing/2), 'margin-right' : (spacing/2) });
});
</script>
<?php
}
}


// ADD WIDGET SUPPORT
add_action('init', 'youtube_simplegallery_multi_register');
function youtube_simplegallery_multi_register() {
	
	$prefix = 'ytsg-multi'; // $id prefix
	$name = __('YouTube SimpleGallery');
	$widget_ops = array('classname' => 'youtube_simplegallery_multi', 'description' => __('This is an example of widget,which you can add many times'));
	$control_ops = array('width' => 400, 'height' => 350, 'id_base' => $prefix);
	
	$options = get_option('youtube_simplegallery_multi');
	if(isset($options[0])) unset($options[0]);
	
	if(!empty($options)){
		foreach(array_keys($options) as $widget_number){
			wp_register_sidebar_widget($prefix.'-'.$widget_number, $name, 'youtube_simplegallery_multi', $widget_ops, array( 'number' => $widget_number ));
			wp_register_widget_control($prefix.'-'.$widget_number, $name, 'youtube_simplegallery_multi_control', $control_ops, array( 'number' => $widget_number ));
		}
	} else{
		$options = array();
		$widget_number = 1;
		wp_register_sidebar_widget($prefix.'-'.$widget_number, $name, 'youtube_simplegallery_multi', $widget_ops, array( 'number' => $widget_number ));
		wp_register_widget_control($prefix.'-'.$widget_number, $name, 'youtube_simplegallery_multi_control', $control_ops, array( 'number' => $widget_number ));
	}
}

// OUTPUT WIDGET IN FRONT
function youtube_simplegallery_multi($args, $vars = array()) {
    extract($args);
    $widget_number = (int)str_replace('ytsg-multi-', '', @$widget_id);
    $options = get_option('youtube_simplegallery_multi');
    if(!empty($options[$widget_number])){
    	$vars = $options[$widget_number];
    }
    // widget open tags
		echo $before_widget;
		
		// print title from admin 
		if(!empty($vars['title'])){
			echo $before_title . $vars['title'] . $after_title;
		} 
		
		// print content and widget end tags
	$links = $options[2]['links'];
	require_once('youtube_widget.php');
	
	echo widget_youtubegallery($links);

    echo $after_widget;
}

// OUTPUT WIDGET IN ADMIN
function youtube_simplegallery_multi_control($args) {

	$prefix = 'ytsg-multi'; // $id prefix
	
	$options = get_option('youtube_simplegallery_multi');
	if(empty($options)) $options = array();
	if(isset($options[0])) unset($options[0]);
		
	// update options array
	if(!empty($_POST[$prefix]) && is_array($_POST)){
		foreach($_POST[$prefix] as $widget_number => $values){
			if(empty($values) && isset($options[$widget_number])) // user clicked cancel
				continue;
			
			if(!isset($options[$widget_number]) && $args['number'] == -1){
				$args['number'] = $widget_number;
				$options['last_number'] = $widget_number;
			}
			$options[$widget_number] = $values;
		}
		
		// update number
		if($args['number'] == -1 && !empty($options['last_number'])){
			$args['number'] = $options['last_number'];
		}

		// clear unused options and update options in DB. return actual options array
		$options = bf_smart_multiwidget_update($prefix, $options, $_POST[$prefix], $_POST['sidebar'], 'youtube_simplegallery_multi');
	}
	
	// $number - is dynamic number for multi widget, gived by WP
	// by default $number = -1 (if no widgets activated). In this case we should use %i% for inputs
	//   to allow WP generate number automatically
	$number = ($args['number'] == -1)? '%i%' : $args['number'];

	// now we can output control
	$opts = @$options[$number];
	
	$title = @$opts['title'];
	$links = @$opts['links'];
	 
	?>
	<p>
    Title<br />
		<input type="text" class="widefat" name="<?php echo $prefix; ?>[<?php echo $number; ?>][title]" value="<?php echo $title; ?>" />
	</p>
	<p>
    Links<br />
		<textarea cols="20" rows="16" class="widefat" name="<?php echo $prefix; ?>[<?php echo $number; ?>][links]"><?php echo $links; ?></textarea>
	<br />Add YouTube-links with linebreak for each. Add (optional) titles before and separate with | (pipe)<br />
	<pre><code>Star Size Comparison|</code>http://www.youtube.com/watch?v=HEheh1BH34Q</pre>
	</p>
	<?php
}

// helper function can be defined in another plugin
if(!function_exists('bf_smart_multiwidget_update')){
	function bf_smart_multiwidget_update($id_prefix, $options, $post, $sidebar, $option_name = ''){
		global $wp_registered_widgets;
		static $updated = false;

		// get active sidebar
		$sidebars_widgets = wp_get_sidebars_widgets();
		if ( isset($sidebars_widgets[$sidebar]) )
			$this_sidebar =& $sidebars_widgets[$sidebar];
		else
			$this_sidebar = array();
		
		// search unused options
		foreach ( $this_sidebar as $_widget_id ) {
			if(preg_match('/'.$id_prefix.'-([0-9]+)/i', $_widget_id, $match)){
				$widget_number = $match[1];
				
				// $_POST['widget-id'] contain current widgets set for current sidebar
				// $this_sidebar is not updated yet, so we can determine which was deleted
				if(!in_array($match[0], $_POST['widget-id'])){
					unset($options[$widget_number]);
				}
			}
		}
		
		// update database
		if(!empty($option_name)){
			update_option($option_name, $options);
			$updated = true;
		}
		
		// return updated array
		return $options;
	}
}



// LOAD WORDPRESS’ BUILT-IN JQUERY
function yotube_gallery_init() {
		wp_enqueue_script('jquery');
		wp_enqueue_script('jquery-ui-core');
}
add_action('init', 'yotube_gallery_init');

// HOOK IT UP TO WORDPRESS
register_activation_hook(__FILE__,'youtubegallery_install');	
register_deactivation_hook(__FILE__,'youtubegallery_uninstall');	
add_filter("plugin_action_links_$plugin", 'youtubegallery_settings_link' ); 

?>
