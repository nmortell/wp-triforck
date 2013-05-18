<?php
/*
Plugin Name: LambertGroup - HTML5 Video Player with Bottom Playlist and Multiple Skins
Plugin URI: http://www.lambertgroup.ro/wordpress_plugins/LambertGroup_HTML5_Video_Player_with_ Bottom_Playlist_and_Multiple_Skins.html
Description: This plugin will allow you to insert a HTML5 Video Player with Bottom Playlist and Multiple Skins.
Version: 3.3
Author: Lambert Group
Author URI: http://www.lambertgroup.ro
*/

ini_set('display_errors', 0);
$lbg_vp2_html5_bottom_path = trailingslashit(dirname(__FILE__));  //empty

//all the messages
$lbg_vp2_html5_bottom_messages = array(
		'version' => '<div class="error">LambertGroup - HTML5 Video Player with Bottom Playlist and Multiple Skins plugin requires WordPress 3.0 or newer. <a href="http://codex.wordpress.org/Upgrading_WordPress">Please update!</a></div>',
		'data_saved' => 'Data Saved!',
		'empty_name' => 'Name - required',
		'empty_mp4' => 'MP4 - required',
		'empty_ogv' => 'OGV - required',
		'empty_webm' => 'WEBM - required',
		'invalid_request' => 'Invalid Request!',
		'generate_for_this_player' => 'You can start customizing this player.',
	);

	
global $wp_version;

if ( !version_compare($wp_version,"3.0",">=")) {
	die ($lbg_vp2_html5_bottom_messages['version']);
}




function lbg_vp2_html5_bottom_activate() {
	//db creation, create admin options etc.
	global $wpdb;
	
	$lbg_vp2_html5_bottom_collate = ' COLLATE utf8_general_ci';
	
	$sql0 = "CREATE TABLE IF NOT EXISTS `" . $wpdb->prefix . "lbg_vp2_html5_bottom_players` (
			`id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
			`name` VARCHAR( 255 ) NOT NULL ,
			PRIMARY KEY ( `id` )
			) ENGINE=MyISAM  DEFAULT CHARSET=utf8";
	
	$sql1 = "CREATE TABLE IF NOT EXISTS `" . $wpdb->prefix . "lbg_vp2_html5_bottom_videosettings` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `playerWidth` smallint(5) unsigned NOT NULL DEFAULT '752',
  `playerHeight` smallint(5) unsigned NOT NULL DEFAULT '423',
  `skin` varchar(255) NOT NULL DEFAULT 'universalBlack',
  `seekBarAdjust` int(10) unsigned NOT NULL DEFAULT '240',
  `showInfo` varchar(10) NOT NULL DEFAULT 'true',
  `loop` varchar(8) NOT NULL DEFAULT 'true',
  `autoPlay` varchar(100) NOT NULL DEFAULT 'true',
  `autoPlayFirstMovie` varchar(100) NOT NULL DEFAULT 'false',
  `initialVolume` float unsigned NOT NULL DEFAULT '1',
  `preload` varchar(100) NOT NULL DEFAULT 'auto',
  `borderWidth` smallint(5) unsigned NOT NULL DEFAULT '0',  
  `borderColor` varchar(10) NOT NULL DEFAULT '000000',
  `thumbsReflection` smallint(5) unsigned NOT NULL DEFAULT '50',
  `numberOfThumbsPerScreen` smallint(5) unsigned NOT NULL DEFAULT '6',
  
	  PRIMARY KEY  (`id`)
	) ENGINE=MyISAM  DEFAULT CHARSET=utf8";
	
	$sql2 = "CREATE TABLE IF NOT EXISTS `". $wpdb->prefix . "lbg_vp2_html5_bottom_videoplaylist` (
	  `id` int(10) unsigned NOT NULL auto_increment,
	  `playerid` int(10) unsigned NOT NULL,
	  `imgplaylist` text,
	  `preview` text,
	  `mp4` text NOT NULL,
	  `ogv` text NOT NULL,
	  `webm` text NOT NULL,
	  `title` text,
	  `desc` text,
	  `ord` int(10) unsigned NOT NULL,
	  PRIMARY KEY  (`id`)
	) ENGINE=MyISAM  DEFAULT CHARSET=utf8";
	
	require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
	dbDelta($sql0.$lbg_vp2_html5_bottom_collate);
	dbDelta($sql1.$lbg_vp2_html5_bottom_collate);
	dbDelta($sql2.$lbg_vp2_html5_bottom_collate);
	
	//initialize the players table with the first player type
	$rows_count = $wpdb->get_var( "SELECT COUNT(*) FROM ". $wpdb->prefix ."lbg_vp2_html5_bottom_players;" );
	if (!$rows_count) {
		$wpdb->insert( 
			$wpdb->prefix . "lbg_vp2_html5_bottom_players", 
			array( 
				'name' => 'Universal Black'
			), 
			array(
				'%s'			
			) 
		);	
	}	
	
	// initialize the settings
	$rows_count = $wpdb->get_var( "SELECT COUNT(*) FROM ". $wpdb->prefix ."lbg_vp2_html5_bottom_videosettings;" );
	if (!$rows_count) {
		lbg_vp2_html5_bottom_insert_settings_record(1);
	}	
	
	
	// initialize the playlist
	$rows_count = $wpdb->get_var( "SELECT COUNT(*) FROM ". $wpdb->prefix . "lbg_vp2_html5_bottom_videoplaylist;" );
	if (!$rows_count) {
		$wpdb->insert( 
			$wpdb->prefix . "lbg_vp2_html5_bottom_videoplaylist", 
			array( 
				'playerid' => 1,
				'imgplaylist' => 'http://lambertgroupproductions.com/canyon/vp2_html5/bottomPlaylist/videos/thumbs/t_a1.jpg',
				'preview' => 'http://lambertgroupproductions.com/canyon/vp2_html5/bottomPlaylist/videos/previews/prev_a1.jpg',
				'mp4' => 'http://lambertgroupproductions.com/canyon/vp2_html5/bottomPlaylist/videos/big_buck_bunny_trailer.mp4',
                'ogv' => 'http://lambertgroupproductions.com/canyon/vp2_html5/bottomPlaylist/videos/big_buck_bunny_trailer.ogv',
                'webm' => 'http://lambertgroupproductions.com/canyon/vp2_html5/bottomPlaylist/videos/big_buck_bunny_trailer.webm',
				'title' => 'Big Buck Bunny',
				'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec non ante vitae felis vestibulum lacinia ut sed felis. Aliquam mi libero, pretium consectetur pharetra eu, auctor non diam. Pellentesque adipiscing, justo in placerat sagittis, quam enim aliquet odio, nec laoreet leo neque et felis. Aliquam leo nulla, posuere eget dapibus quis, mattis non urna. Vestibulum blandit velit id tortor hendrerit a rhoncus tellus porta. Donec hendrerit ullamcorper sodales.',
				'ord' => 1
			), 
			array(
				'%d', 
				'%s',
				'%s',
				'%s',
				'%s',
				'%s',
				'%s',
				'%s',
				'%d'			
			) 
		);	
		$wpdb->insert( 
			$wpdb->prefix . "lbg_vp2_html5_bottom_videoplaylist", 
			array(
				'playerid' => 1,
				'imgplaylist' => 'http://lambertgroupproductions.com/canyon/vp2_html5/bottomPlaylist/videos/thumbs/t_b1.jpg',
				'preview' => 'http://lambertgroupproductions.com/canyon/vp2_html5/bottomPlaylist/videos/previews/prev_b1.jpg',
				'mp4' => 'http://lambertgroupproductions.com/canyon/vp2_html5/bottomPlaylist/videos/sintel_trailer.mp4',
                'ogv' => 'http://lambertgroupproductions.com/canyon/vp2_html5/bottomPlaylist/videos/sintel_trailer.ogv',
                'webm' => 'http://lambertgroupproductions.com/canyon/vp2_html5/bottomPlaylist/videos/sintel_trailer.webm',
				'title' => 'Sintel Trailer',
				'desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec non ante vitae felis vestibulum lacinia ut sed felis. Aliquam mi libero, pretium consectetur pharetra eu, auctor non diam. Pellentesque adipiscing, justo in placerat sagittis, quam enim aliquet odio, nec laoreet leo neque et felis. Aliquam leo nulla, posuere eget dapibus quis, mattis non urna. Vestibulum blandit velit id tortor hendrerit a rhoncus tellus porta. Donec hendrerit ullamcorper sodales.',
				'ord' => 2
			), 
			array( 
				'%d', 
				'%s',
				'%s',
				'%s',
				'%s',
				'%s',
				'%s',
				'%s',
				'%d'				
			) 
		);			
	}	

	
}


function lbg_vp2_html5_bottom_uninstall() {
	global $wpdb;
	mysql_query("DROP TABLE `" . $wpdb->prefix . "lbg_vp2_html5_bottom_videosettings`" );
	mysql_query("DROP TABLE `" . $wpdb->prefix . "lbg_vp2_html5_bottom_videoplaylist`" );
	mysql_query("DROP TABLE `" . $wpdb->prefix . "lbg_vp2_html5_bottom_players`" );
}

function lbg_vp2_html5_bottom_insert_settings_record($player_id) {
	global $wpdb;
	$wpdb->insert( 
			$wpdb->prefix . "lbg_vp2_html5_bottom_videosettings", 
			array( 
				'playerWidth' => 752, 
				'playerHeight' => 423,
				'skin' => 'universalBlack',
				'seekBarAdjust' => 240,
				'showInfo' => 'true',
				'loop' => 'true',
				'autoPlay' => 'true',
				'autoPlayFirstMovie' => 'false',
				'initialVolume' => 1,
			    'preload' => 'auto',
				'borderWidth' => 0,
				'borderColor' => '000000',
				'numberOfThumbsPerScreen' => 6,
				'thumbsReflection' => 50
			), 
			array( 
				'%d', 
				'%d',
				'%s',
				'%d',
				'%s',
				'%s',
				'%s',
				'%s',
				'%d',
				'%s',
				'%d',
				'%s', 
				'%d',
				'%d'
			) 
		);		
}


function lbg_vp2_html5_bottom_video_init_sessions() {
	global $wpdb;
	if (!session_id()) {
		session_start();
		
		//initialize the session
		if (!isset($_SESSION['xid'])) {
			$safe_sql="SELECT * FROM (".$wpdb->prefix ."lbg_vp2_html5_bottom_players) LIMIT 0, 1";
			$row = $wpdb->get_row($safe_sql,ARRAY_A);
			//$row=lbg_vp2_html5_bottom_unstrip_array($row);		
    		$_SESSION['xid'] = $row['id'];
    		$_SESSION['xname'] = $row['name'];
		}		
	}
}


function lbg_vp2_html5_bottom_video_load_styles() {
	if(strpos($_SERVER['PHP_SELF'], 'wp-admin') !== false) { //loads css in admin
		$page = (isset($_GET['page'])) ? $_GET['page'] : '';
		if(preg_match('/LBG_VP2_HTML5_BOTTOM/i', $page)) {
			wp_enqueue_style('lbg-vp2-html5-bottom_player_video_css', plugins_url('css/styles.css', __FILE__));
			wp_enqueue_style('lbg-vp2-html5-bottom_player_video_jquery-custom_css', plugins_url('css/custom-theme/jquery-ui-1.8.10.custom.css', __FILE__));
			wp_enqueue_style('lbg-vp2-html5-bottom_player_video_colorpicker_css', plugins_url('css/colorpicker/colorpicker.css', __FILE__));
			
			wp_enqueue_style('thickbox');
		}
	} else if (!is_admin()) { //loads css in front-end
		wp_enqueue_style('vp2_html5_bottom_site_css', plugins_url('lbg_vp2_html5_bottom/css/vp2_html5_bottomPlaylist.css', __FILE__));
	}
}

function lbg_vp2_html5_bottom_video_load_scripts() {
	$page = (isset($_GET['page'])) ? $_GET['page'] : '';
	if(preg_match('/LBG_VP2_HTML5_BOTTOM/i', $page)) {
		//loads scripts in admin
		//if (is_admin()) {
			wp_deregister_script('jquery-ui-core');
			wp_deregister_script('jquery-ui-widget');
			wp_deregister_script('jquery-ui-mouse');
			wp_deregister_script('jquery-ui-accordion');
			wp_deregister_script('jquery-ui-autocomplete');
			wp_deregister_script('jquery-ui-slider');
			wp_deregister_script('jquery-ui-tabs');
			wp_deregister_script('jquery-ui-sortable');
			wp_deregister_script('jquery-ui-draggable');
			wp_deregister_script('jquery-ui-droppable');
			wp_deregister_script('jquery-ui-selectable');
			wp_deregister_script('jquery-ui-position');
			wp_deregister_script('jquery-ui-datepicker');
			wp_deregister_script('jquery-ui-resizable');
			wp_deregister_script('jquery-ui-dialog');
			wp_deregister_script('jquery-ui-button');	
						
			wp_enqueue_script('jquery');
			/*wp_register_script('lbg-admin-jquery', plugins_url('js/jquery-1.5.1.js', __FILE__));
			wp_enqueue_script('lbg-admin-jquery');*/
			
			//wp_register_script('lbg-admin-jquery-ui-min', plugins_url('js/jquery-ui-1.8.10.custom.min.js', __FILE__));
			//wp_register_script('lbg-admin-jquery-ui-min', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/jquery-ui.min.js');
			wp_register_script('lbg-admin-jquery-ui-min', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js');
			wp_enqueue_script('lbg-admin-jquery-ui-min');
			
			wp_register_script('lbg-admin-colorpicker', plugins_url('js/colorpicker/colorpicker.js', __FILE__));
			wp_enqueue_script('lbg-admin-colorpicker');	

			wp_register_script('lbg-admin-toggle', plugins_url('js/myToggle.js', __FILE__));
			wp_enqueue_script('lbg-admin-toggle');
			
			wp_enqueue_script('media-upload');
			wp_enqueue_script('thickbox');			
			
		
		//}
		
		//wp_enqueue_script('jquery');
		//wp_enqueue_script('jquery-ui-core');
		//wp_enqueue_script('jquery-ui-sortable');
		//wp_enqueue_script('thickbox');
		//wp_enqueue_script('media-upload');
		//wp_enqueue_script('farbtastic');
	} else if (!is_admin()) { //loads scripts in front-end
			/*wp_deregister_script('jquery-ui-core');
			wp_deregister_script('jquery-ui-widget');
			wp_deregister_script('jquery-ui-mouse');
			wp_deregister_script('jquery-ui-accordion');
			wp_deregister_script('jquery-ui-autocomplete');
			wp_deregister_script('jquery-ui-slider');
			wp_deregister_script('jquery-ui-tabs');
			wp_deregister_script('jquery-ui-sortable');
			wp_deregister_script('jquery-ui-draggable');
			wp_deregister_script('jquery-ui-droppable');
			wp_deregister_script('jquery-ui-selectable');
			wp_deregister_script('jquery-ui-position');
			wp_deregister_script('jquery-ui-datepicker');
			wp_deregister_script('jquery-ui-resizable');
			wp_deregister_script('jquery-ui-dialog');
			wp_deregister_script('jquery-ui-button');*/
				
		wp_enqueue_script('jquery');
	
		//wp_enqueue_script('jquery-ui-core');
		
		//wp_register_script('lbg-jquery-ui-min', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/jquery-ui.min.js');
		wp_register_script('lbg-jquery-ui-min', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js');
		wp_enqueue_script('lbg-jquery-ui-min');
		
		wp_register_script('lbg-lbg_vp2_html5_bottom', plugins_url('lbg_vp2_html5_bottom/js/vp2_html5_bottomPlaylist.js', __FILE__));
		wp_enqueue_script('lbg-lbg_vp2_html5_bottom');
		
		wp_register_script('lbg-reflection', plugins_url('lbg_vp2_html5_bottom/js/reflection.js', __FILE__));
		wp_enqueue_script('lbg-reflection');
	}

}



// adds the menu pages
function lbg_vp2_html5_bottom_plugin_menu() {
	add_menu_page('LBG VP2 HTML5 BOTTOM Admin Interface', 'LBG VP2 HTML5 BT', 'edit_posts', 'LBG_VP2_HTML5_BOTTOM', 'lbg_vp2_html5_bottom_video_overview_page',
	plugins_url('images/lbg_video1_icon.png', __FILE__));
	add_submenu_page( 'LBG_VP2_HTML5_BOTTOM', 'LBG VP2 HTML5 BOTTOM Overview', 'Overview', 'edit_posts', 'LBG_VP2_HTML5_BOTTOM', 'lbg_vp2_html5_bottom_video_overview_page');
	add_submenu_page( 'LBG_VP2_HTML5_BOTTOM', 'LBG VP2 HTML5 BOTTOM Manage Players', 'Manage Players', 'edit_posts', 'LBG_VP2_HTML5_BOTTOM_Manage_Players', 'lbg_vp2_html5_bottom_video_player_manage_players_page');
	add_submenu_page( 'LBG_VP2_HTML5_BOTTOM', 'LBG VP2 HTML5 BOTTOM Manage Players Add New', 'Add New', 'edit_posts', 'LBG_VP2_HTML5_BOTTOM_Add_New', 'lbg_vp2_html5_bottom_video_player_manage_players_add_new_page');
	add_submenu_page( 'LBG_VP2_HTML5_BOTTOM', 'LBG VP2 HTML5 BOTTOM Player Settings', 'Player Settings', 'edit_posts', 'LBG_VP2_HTML5_BOTTOM_Settings', 'lbg_vp2_html5_bottom_video_player_settings_page');
	add_submenu_page( 'LBG_VP2_HTML5_BOTTOM', 'LBG VP2 HTML5 BOTTOM Player Playlist', 'Playlist', 'edit_posts', 'LBG_VP2_HTML5_BOTTOM_Playlist', 'lbg_vp2_html5_bottom_video_player_playlist_page');
	add_submenu_page( 'LBG_VP2_HTML5_BOTTOM', 'LBG VP2 HTML5 BOTTOM Help', 'Help', 'edit_posts', 'LBG_VP2_HTML5_BOTTOM_Help', 'lbg_vp2_html5_bottom_video_player_help_page');
}


//HTML content for overview page
function lbg_vp2_html5_bottom_video_overview_page()
{
	include_once($lbg_vp2_html5_bottom_path . 'tpl/overview.php');
}

//HTML content for Manage Players
function lbg_vp2_html5_bottom_video_player_manage_players_page()
{
	global $wpdb;
	global $lbg_vp2_html5_bottom_messages;
	
	//delete player
	if (isset($_GET['id'])) {
		
		//delete from videos, videos/imgplaylist, videos/previews
		$safe_sql=$wpdb->prepare( "SELECT mp4,ogv,webm,preview,imgplaylist FROM (".$wpdb->prefix ."lbg_vp2_html5_bottom_videoplaylist) WHERE playerid=%d",$_GET['id'] );
		$result = $wpdb->get_results($safe_sql,ARRAY_A);
		foreach ( $result as $row ) 
		{
			$row=lbg_vp2_html5_bottom_unstrip_array($row);
			//the video
			if ($row['mp4']!='' && strpos($row['mp4'],"http://")===false && strpos($row['mp4'],"https://")===false) {
				$file_to_detele=plugin_dir_path(__FILE__) . 'lbg_vp2_html5_bottom/videos/' .$row['mp4'];
				if(file_exists($file_to_detele)) unlink($file_to_detele);
			}
			if ($row['ogv']!='' && strpos($row['ogv'],"http://")===false && strpos($row['ogv'],"https://")===false) {
				$file_to_detele=plugin_dir_path(__FILE__) . 'lbg_vp2_html5_bottom/videos/' .$row['ogv'];
				if(file_exists($file_to_detele)) unlink($file_to_detele);
			}	
			if ($row['webm']!='' && strpos($row['webm'],"http://")===false && strpos($row['webm'],"https://")===false) {
				$file_to_detele=plugin_dir_path(__FILE__) . 'lbg_vp2_html5_bottom/videos/' .$row['webm'];
				if(file_exists($file_to_detele)) unlink($file_to_detele);
			}
	
		} 			
		

		//delete from wp_lbg_vp2_html5_bottom_players
		$wpdb->query($wpdb->prepare("DELETE FROM ".$wpdb->prefix."lbg_vp2_html5_bottom_players WHERE id = %d",$_GET['id']));
		
		//delete from wp_lbg_vp2_html5_bottom_videosettings
		$wpdb->query($wpdb->prepare("DELETE FROM ".$wpdb->prefix."lbg_vp2_html5_bottom_videosettings WHERE id = %d",$_GET['id']));

		//delete from wp_lbg_vp2_html5_bottom_videoplaylist
		$wpdb->query($wpdb->prepare("DELETE FROM ".$wpdb->prefix."lbg_vp2_html5_bottom_videoplaylist WHERE playerid = %d",$_GET['id']));
		
		//initialize the session
		$safe_sql="SELECT * FROM (".$wpdb->prefix ."lbg_vp2_html5_bottom_players) ORDER BY id";
		$row = $wpdb->get_row($safe_sql,ARRAY_A);
		$row=lbg_vp2_html5_bottom_unstrip_array($row);
		if ($row['id']) {
			$_SESSION['xid']=$row['id'];
			$_SESSION['xname']=$row['name'];
		}		
	}
	
	
	$safe_sql="SELECT * FROM (".$wpdb->prefix ."lbg_vp2_html5_bottom_players) ORDER BY id";
	$result = $wpdb->get_results($safe_sql,ARRAY_A);	
	include_once($lbg_vp2_html5_bottom_path . 'tpl/players.php');

}


//HTML content for Manage Players - Add New
function lbg_vp2_html5_bottom_video_player_manage_players_add_new_page()
{
	global $wpdb;
	global $lbg_vp2_html5_bottom_messages;
	
	if($_POST['Submit'] == 'Add New') {
		$errors_arr=array();
		if (empty($_POST['name']))
			$errors_arr[]=$lbg_vp2_html5_bottom_messages['empty_name'];

		if (count($errors_arr)) { 
				include_once($lbg_vp2_html5_bottom_path . 'tpl/add_player.php'); ?>
				<div id="error" class="error"><p><?php echo implode("<br>", $errors_arr);?></p></div>
		  	<?php } else { // no errors
					$wpdb->insert( 
						$wpdb->prefix . "lbg_vp2_html5_bottom_players", 
						array( 
							'name' => $_POST['name']
						), 
						array( 
							'%s'			
						) 
					);	
					//insert default player settings for this new player
					lbg_vp2_html5_bottom_insert_settings_record($wpdb->insert_id);
					?>
						<div class="wrap">
							<div id="lbg_logo">
								<h2>Manage Players - Add New Player</h2>
				 			</div>
							<div id="message" class="updated"><p><?php echo $lbg_vp2_html5_bottom_messages['data_saved'];?></p><p><?php echo $lbg_vp2_html5_bottom_messages['generate_for_this_player'];?></p></div>
							<div>
								<p>&raquo; <a href="?page=LBG_VP2_HTML5_BOTTOM_Add_New">Add New (player)</a></p>
								<p>&raquo; <a href="?page=LBG_VP2_HTML5_BOTTOM_Manage_Players">Back to Manage Players</a></p>
							</div>
						</div>	
		  	<?php }			
	} else {
		include_once($lbg_vp2_html5_bottom_path . 'tpl/add_player.php');
	}

}


//HTML content for playersettings
function lbg_vp2_html5_bottom_video_player_settings_page()
{
	global $wpdb;
	global $lbg_vp2_html5_bottom_messages;
	
	if (isset($_GET['id']) && isset($_GET['name'])) {
		$_SESSION['xid']=$_GET['id'];
		$_SESSION['xname']=$_GET['name'];
	}

	$wpdb->show_errors();
	/*if (check_admin_referer('lbg_vp2_html5_bottom_settings_update')) {
		echo "update";		
	}*/
	
	
	if($_POST['Submit'] == 'Update Player Settings') {
		$_GET['xmlf']='';
		$except_arr=array('Submit','existingWatermarkPath','name');
		//upload watermark
		$err_upload='';
		//no upload errors or no upload at all
		if ($err_upload=='') {
			$wpdb->update( 
				$wpdb->prefix .'lbg_vp2_html5_bottom_players', 
				array( 
				'name' => $_POST['name']
				), 
				array( 'id' => $_SESSION['xid'] )
			);	
			$_SESSION['xname']=stripslashes($_POST['name']);
						
			
			foreach ($_POST as $key=>$val){
				if (in_array($key,$except_arr)) {
					unset($_POST[$key]);
				}
			}
		
			$wpdb->update( 
				$wpdb->prefix .'lbg_vp2_html5_bottom_videosettings', 
				$_POST, 
				array( 'id' => $_SESSION['xid'] )
			);
			
			?>
			<div id="message" class="updated"><p><?php echo $lbg_vp2_html5_bottom_messages['data_saved'];?></p></div>
	<?php 
		}
	}
	
	if ($_GET['xmlf']=='playersettings') {
		lbg_vp2_html5_bottom_generate_videoSettings();
	}	
	
	//echo "WP_PLUGIN_URL: ".WP_PLUGIN_URL;
	$safe_sql=$wpdb->prepare( "SELECT * FROM (".$wpdb->prefix ."lbg_vp2_html5_bottom_videosettings) WHERE id = %d",$_SESSION['xid'] );
	$row = $wpdb->get_row($safe_sql,ARRAY_A);
	$row=lbg_vp2_html5_bottom_unstrip_array($row);
	$_POST = $row; 
	//$_POST['existingWatermarkPath']=$_POST['watermarkPath'];
	$_POST=lbg_vp2_html5_bottom_unstrip_array($_POST);
		
	//echo "playerWidth: ".$row['playerWidth'];
	include_once($lbg_vp2_html5_bottom_path . 'tpl/settings_form.php');
	
}

function lbg_vp2_html5_bottom_video_player_playlist_page()
{
	global $wpdb;
	global $lbg_vp2_html5_bottom_messages;
	
	if (isset($_GET['id']) && isset($_GET['name'])) {
		$_SESSION['xid']=$_GET['id'];
		$_SESSION['xname']=$_GET['name'];
	}	

	
	if ($_GET['xmlf']=='add_playlist_record') {
		if($_POST['Submit'] == 'Add Record') {
			$errors_arr=array();
			if (empty($_POST['mp4']))
				 $errors_arr[]=$lbg_vp2_html5_bottom_messages['empty_mp4'];
			/*if (empty($_POST['ogv']))
				 $errors_arr[]=$lbg_vp2_html5_bottom_messages['empty_ogv'];*/
			if (empty($_POST['webm']))
				 $errors_arr[]=$lbg_vp2_html5_bottom_messages['empty_webm'];				 

			if (count($errors_arr)) { 
				include_once($lbg_vp2_html5_bottom_path . 'tpl/add_playlist_record.php'); ?>
				<div id="error" class="error"><p><?php echo implode("<br>", $errors_arr);?></p></div>
	  <?php } else { // all requested fields are filled


				 	
		if (count($errors_arr)) { 
			include_once($lbg_vp2_html5_bottom_path . 'tpl/add_playlist_record.php'); ?>
			<div id="error" class="error"><p><?php echo implode("<br>", $errors_arr);?></p></div>
	  	<?php } else { // no upload errors
				$max_ord = 1+$wpdb->get_var( $wpdb->prepare( "SELECT max(ord) FROM ". $wpdb->prefix ."lbg_vp2_html5_bottom_videoplaylist WHERE playerid = %d",$_SESSION['xid'] ) );

				$wpdb->insert( 
					$wpdb->prefix . "lbg_vp2_html5_bottom_videoplaylist", 
					array( 
						'playerid' => $_POST['playerid'],
						'mp4' => $_POST['mp4'],
						'ogv' => $_POST['ogv'],
						'webm' => $_POST['webm'],
						'title' => $_POST['title'],
						'desc' => $_POST['desc'],
						'preview' => $_POST['preview'],
						'imgplaylist' => $_POST['imgplaylist'],
						'ord' => $max_ord
					), 
					array( 
						'%d',
						'%s',
						'%s',
						'%s',
						'%s',
						'%s',
						'%s',
						'%s',
						'%d'			
					) 
				);	
				
	  			if (isset($_POST['setitfirst'])) {
					$sql_arr=array();
					$ord_start=$max_ord;
					$ord_stop=1;
					$elem_id=$wpdb->insert_id;
					$ord_direction='+1';

					$sql_arr[]="UPDATE ".$wpdb->prefix."lbg_vp2_html5_bottom_videoplaylist SET ord=ord+1  WHERE playerid = ".$_SESSION['xid']." and ord>=".$ord_stop." and ord<".$ord_start;
					$sql_arr[]="UPDATE ".$wpdb->prefix."lbg_vp2_html5_bottom_videoplaylist SET ord=".$ord_stop." WHERE id=".$elem_id;		
					
					//echo "elem_id: ".$elem_id."----ord_start: ".$ord_start."----ord_stop: ".$ord_stop;
					foreach ($sql_arr as $sql)
						$wpdb->query($sql);				
				}				
				?>
					<div class="wrap">
						<div id="lbg_logo">
							<h2>Playlist for player: <span style="color:#FF0000; font-weight:bold;"><?php echo $_SESSION['xname']?> - ID #<?php echo $_SESSION['xid']?></span> - Add New</h2>
			 			</div>
						<div id="message" class="updated"><p><?php echo $lbg_vp2_html5_bottom_messages['data_saved'];?></p></div>
						<div>
							<p>&raquo; <a href="?page=LBG_VP2_HTML5_BOTTOM_Playlist&xmlf=add_playlist_record">Add New</a></p>
							<p>&raquo; <a href="?page=LBG_VP2_HTML5_BOTTOM_Playlist">Back to Playlist</a></p>
						</div>
					</div>	
	  	<?php }
	  		}
		} else {
			include_once($lbg_vp2_html5_bottom_path . 'tpl/add_playlist_record.php');	
		}
		
	} else {
		$safe_sql=$wpdb->prepare( "SELECT * FROM (".$wpdb->prefix ."lbg_vp2_html5_bottom_videoplaylist) WHERE playerid = %d ORDER BY ord",$_SESSION['xid'] );
		$result = $wpdb->get_results($safe_sql,ARRAY_A);

		//$_POST=lbg_vp2_html5_bottom_unstrip_array($_POST);		
		include_once($lbg_vp2_html5_bottom_path . 'tpl/playlist.php');
	}
}



function lbg_vp2_html5_bottom_video_player_help_page()
{
	//include_once(plugins_url('tpl/help.php', __FILE__));
	include_once($lbg_vp2_html5_bottom_path . 'tpl/help.php');
}


function lbg_vp2_html5_bottom_shortcode($atts, $content=null) {
	global $wpdb;
	
	shortcode_atts( array('settings_id'=>''), $atts);
	if ($atts['settings_id']=='')
		$atts['settings_id']=1;

		
	$safe_sql=$wpdb->prepare( "SELECT * FROM (".$wpdb->prefix ."lbg_vp2_html5_bottom_videosettings) WHERE id = %d",$atts['settings_id'] );
	$row = $wpdb->get_row($safe_sql,ARRAY_A);
	$row=lbg_vp2_html5_bottom_unstrip_array($row);
	
	$path_to_plugin = WP_PLUGIN_URL.'/'.str_replace(basename( __FILE__),"",plugin_basename(__FILE__));
	$preload_aux='';
	if ($row["preload"])
		$preload_aux='preload="'.$row["preload"].'"';
		
	$safe_sql=$wpdb->prepare( "SELECT * FROM (".$wpdb->prefix ."lbg_vp2_html5_bottom_videoplaylist) WHERE playerid = %d ORDER BY ord",$atts['settings_id'] );
	$result = $wpdb->get_results($safe_sql,ARRAY_A);
	$playlist_str='';
	foreach ( $result as $row_playlist ) {

		$row_playlist=lbg_vp2_html5_bottom_unstrip_array($row_playlist);			
			
	
		$mp4_path=$path_to_plugin.'lbg_vp2_html5_bottom/videos/'.$row_playlist["mp4"];	
		if (strpos($row_playlist["mp4"],"http://")===0 || strpos($row_playlist["mp4"],"https://")===0) {
			$mp4_path=$row_playlist["mp4"];
		}
		
		$ogv_path=$path_to_plugin.'lbg_vp2_html5_bottom/videos/'.$row_playlist["ogv"];	
		if (strpos($row_playlist["ogv"],"http://")===0 || strpos($row_playlist["ogv"],"https://")===0) {
			$ogv_path=$row_playlist["ogv"];
		}
	
		$webm_path=$path_to_plugin.'lbg_vp2_html5_bottom/videos/'.$row_playlist["webm"];	
			if (strpos($row_playlist["webm"],"http://")===0 || strpos($row_playlist["webm"],"https://")===0) {
			$webm_path=$row_playlist["webm"];
		}
		
		$playlist_str.='<ul>
                	<li class="xtitle">'.$row_playlist["title"].'</li>
                    <li class="xdesc">'.$row_playlist["desc"].'</li>
                    <li class="xthumb">'.$row_playlist["imgplaylist"].'</li>
                    <li class="xpreview">'.$row_playlist["preview"].'</li>
                    <li class="xsources_mp4">'.$mp4_path.'</li>
                    <li class="xsources_webm">'.$webm_path.'</li>
                </ul>';
	}
	
	return '<script>
		jQuery(function() {
			jQuery("#vp2_html5_bottomPlaylist_'.$row["id"].'").vp2_html5_bottomPlaylist_Video({
				skin:"'.$row["skin"].'",
				initialVolume:'.$row["initialVolume"].',
				showInfo: '.$row["showInfo"].',
				autoPlayFirstMovie:'.$row["autoPlayFirstMovie"].',
				autoPlay:'.$row["autoPlay"].',
				loop:'.$row["loop"].',
				seekBarAdjust:'.$row["seekBarAdjust"].',
				borderWidth: '.$row["borderWidth"].',
				borderColor: "#'.$row["borderColor"].'",
				thumbsReflection:'.$row["thumbsReflection"].',
				numberOfThumbsPerScreen:'.$row["numberOfThumbsPerScreen"].'				
			});
		});
	</script>	
     <div class="vp2_html5_bottomPlaylistBorder">
     		<div class="vp2_html5_bottomPlaylist">
            <video id="vp2_html5_bottomPlaylist_'.$row["id"].'" width="'.$row["playerWidth"].'" height="'.$row["playerHeight"].'" '.$preload_aux.'><div class="xplaylist">'.$playlist_str.'</div></video>
     </div>                  
  </div>     <!-- border -->   
	<br style="clear:both;">';
}



register_activation_hook(__FILE__,"lbg_vp2_html5_bottom_activate"); //activate plugin and create the database
register_uninstall_hook(__FILE__, 'lbg_vp2_html5_bottom_uninstall'); // on unistall delete all databases 
add_action('init', 'lbg_vp2_html5_bottom_video_init_sessions');	// initialize sessions
add_action('init', 'lbg_vp2_html5_bottom_video_load_styles');	// loads required styles
add_action('init', 'lbg_vp2_html5_bottom_video_load_scripts');			// loads required scripts  
add_action('admin_menu', 'lbg_vp2_html5_bottom_plugin_menu'); // create menus
add_shortcode('lbg_vp2_html5_bottom', 'lbg_vp2_html5_bottom_shortcode');				// LBG VP2 HTML5 BOTTOM shortcode 









/** OTHER FUNCTIONS **/

//stripslashes for an entire array
function lbg_vp2_html5_bottom_unstrip_array($array){
	if (is_array($array)) {	
		foreach($array as &$val){
			if(is_array($val)){
				$val = unstrip_array($val);
			} else {
				$val = stripslashes($val);
				
			}
		}
	}
	return $array;
}






/* ajax update playlist record */

add_action('admin_head', 'lbg_vp2_html5_bottom_update_playlist_record_javascript');

function lbg_vp2_html5_bottom_update_playlist_record_javascript() {
	global $wpdb;
	//Set Your Nonce
	$lbg_vp2_html5_bottom_update_playlist_record_ajax_nonce = wp_create_nonce("lbg_vp2_html5_bottom_update_playlist_record-special-string");
?>



<script type="text/javascript" >
//delete the entire record
function lbg_vp2_html5_bottom_delete_entire_record (delete_id) {
	jQuery("#lbg_vp2_html5_bottom_sortable").sortable('disable');
	jQuery("#"+delete_id).css("display","none");
	//jQuery("#lbg_vp2_html5_bottom_sortable").sortable('refresh');
	jQuery("#lbg_vp2_html5_bottom_updating_witness").css("display","block");
	var data = "action=lbg_vp2_html5_bottom_update_playlist_record&security=<?php echo $lbg_vp2_html5_bottom_update_playlist_record_ajax_nonce; ?>&updateType=lbg_vp2_html5_bottom_delete_entire_record&delete_id="+delete_id;
	// since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
	jQuery.post(ajaxurl, data, function(response) {
		jQuery("#lbg_vp2_html5_bottom_sortable").sortable('enable');
		jQuery("#lbg_vp2_html5_bottom_updating_witness").css("display","none");
		//alert('Got this from the server: ' + response);
	});		
}




jQuery(document).ready(function($) {
	if (jQuery('#lbg_vp2_html5_bottom_sortable').length) {
		jQuery( '#lbg_vp2_html5_bottom_sortable' ).sortable({
			placeholder: "ui-state-highlight",
			start: function(event, ui) {
	            ord_start = ui.item.prevAll().length + 1;
	        },
			update: function(event, ui) {
	        	jQuery("#lbg_vp2_html5_bottom_sortable").sortable('disable');
	        	jQuery("#lbg_vp2_html5_bottom_updating_witness").css("display","block");
				var ord_stop=ui.item.prevAll().length + 1;
				var elem_id=ui.item.attr("id");
				//alert (ui.item.attr("id"));
				//alert (ord_start+' --- '+ord_stop);
				var data = "action=lbg_vp2_html5_bottom_update_playlist_record&security=<?php echo $lbg_vp2_html5_bottom_update_playlist_record_ajax_nonce; ?>&updateType=change_ord&ord_start="+ord_start+"&ord_stop="+ord_stop+"&elem_id="+elem_id;
				// since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
				jQuery.post(ajaxurl, data, function(response) {
					jQuery("#lbg_vp2_html5_bottom_sortable").sortable('enable');
					jQuery("#lbg_vp2_html5_bottom_updating_witness").css("display","none");
					//alert('Got this from the server: ' + response);
				});			
			}
		});
	}

	
	<?php 
		$rows_count = $wpdb->get_var("SELECT COUNT(*) FROM ". $wpdb->prefix . "lbg_vp2_html5_bottom_videoplaylist;");
		for ($i=1;$i<=$rows_count;$i++) {
	?>
	
		jQuery('#upload_imgplaylist_button_html5playerBottom_<?php echo $i?>').click(function() {
		 formfield = 'imgplaylist';
		 the_i=<?php echo $i?>;
		 tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
		 return false;
		});

		jQuery('#upload_preview_button_html5playerBottom_<?php echo $i?>').click(function() {
		 formfield = 'preview';
		 the_i=<?php echo $i?>;
		 tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
		 return false;
		});	


	jQuery("#form-playlist-html5-bottom-<?php echo $i?>").submit(function(event) {

		/* stop form from submitting normally */
		event.preventDefault(); 
		
		//show loading image
		jQuery('#ajax-message-<?php echo $i?>').html('<img src="<?php echo plugins_url('lbg-vp2-html5-bottom/images/ajax-loader.gif', dirname(__FILE__))?>" />');


		//var data = {
			//action: 'lbg_vp2_html5_bottom_update_playlist_record',
			//security: '<?php echo $lbg_vp2_html5_bottom_update_playlist_record_ajax_nonce; ?>',
			//whatever: 1234
		//};
		var data ="action=lbg_vp2_html5_bottom_update_playlist_record&security=<?php echo $lbg_vp2_html5_bottom_update_playlist_record_ajax_nonce; ?>&"+jQuery("#form-playlist-html5-bottom-<?php echo $i?>").serialize();

		// since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
		jQuery.post(ajaxurl, data, function(response) {
			//alert('Got this from the server: ' + response);
			//alert(jQuery("#form-playlist-html5-bottom-<?php echo $i?>").serialize());
			var mov_title = '';
			if (document.forms["form-playlist-html5-bottom-<?php echo $i?>"].title.value!='')
				mov_title=document.forms["form-playlist-html5-bottom-<?php echo $i?>"].title.value;
			jQuery('#mov_title_'+document.forms["form-playlist-html5-bottom-<?php echo $i?>"].id.value).html(mov_title);
			jQuery('#ajax-message-<?php echo $i?>').html(response);
		});
	});
	<?php } ?>
	
});
</script>
<?php
}

//lbg_vp2_html5_bottom_update_playlist_record is the action=lbg_vp2_html5_bottom_update_playlist_record

add_action('wp_ajax_lbg_vp2_html5_bottom_update_playlist_record', 'lbg_vp2_html5_bottom_update_playlist_record_callback');

function lbg_vp2_html5_bottom_update_playlist_record_callback() {
	
	check_ajax_referer( 'lbg_vp2_html5_bottom_update_playlist_record-special-string', 'security' ); //security=<?php echo $lbg_vp2_html5_bottom_update_playlist_record_ajax_nonce; 
	global $wpdb;
	global $lbg_vp2_html5_bottom_messages;
	$errors_arr=array();
	//$wpdb->show_errors();
	
	//delete entire record
	if ($_POST['updateType']=='lbg_vp2_html5_bottom_delete_entire_record') {
		$delete_id=$_POST['delete_id'];
		$safe_sql=$wpdb->prepare("SELECT * FROM ".$wpdb->prefix."lbg_vp2_html5_bottom_videoplaylist WHERE id = %d",$delete_id);
		$row = $wpdb->get_row($safe_sql, ARRAY_A);
		$row=lbg_vp2_html5_bottom_unstrip_array($row);
		
		if ($row['mp4']!='' && strpos($row['mp4'],"http://")===false && strpos($row['mp4'],"https://")===false) {
			$file_to_detele=plugin_dir_path(__FILE__) . 'lbg_vp2_html5_bottom/videos/' .$row['mp4'];
			if(file_exists($file_to_detele)) unlink($file_to_detele);
		}
		if ($row['ogv']!='' && strpos($row['ogv'],"http://")===false && strpos($row['ogv'],"https://")===false) {
			$file_to_detele=plugin_dir_path(__FILE__) . 'lbg_vp2_html5_bottom/videos/' .$row['ogv'];
			if(file_exists($file_to_detele)) unlink($file_to_detele);
		}	
		if ($row['webm']!='' && strpos($row['webm'],"http://")===false && strpos($row['webm'],"https://")===false) {
			$file_to_detele=plugin_dir_path(__FILE__) . 'lbg_vp2_html5_bottom/videos/' .$row['webm'];
			if(file_exists($file_to_detele)) unlink($file_to_detele);
		}
		//delete the entire record
		$wpdb->query($wpdb->prepare("DELETE FROM ".$wpdb->prefix."lbg_vp2_html5_bottom_videoplaylist WHERE id = %d",$delete_id));
		//update the oreder for the rest ord=ord-1 for > ord
		$wpdb->query($wpdb->prepare("UPDATE ".$wpdb->prefix."lbg_vp2_html5_bottom_videoplaylist SET ord=ord-1 WHERE playerid = %d and  ord>".$row['ord'],$_SESSION['xid']));
	}

	//update elements order
	if ($_POST['updateType']=='change_ord') {
		$sql_arr=array();
		$ord_start=$_POST['ord_start'];
		$ord_stop=$_POST['ord_stop'];
		$elem_id=(int)$_POST['elem_id'];
		$ord_direction='+1';
		if ($ord_start<$ord_stop) 
			$sql_arr[]="UPDATE ".$wpdb->prefix."lbg_vp2_html5_bottom_videoplaylist SET ord=ord-1  WHERE playerid = ".$_SESSION['xid']." and ord>".$ord_start." and ord<=".$ord_stop;
		else
			$sql_arr[]="UPDATE ".$wpdb->prefix."lbg_vp2_html5_bottom_videoplaylist SET ord=ord+1  WHERE playerid = ".$_SESSION['xid']." and ord>=".$ord_stop." and ord<".$ord_start;
		$sql_arr[]="UPDATE ".$wpdb->prefix."lbg_vp2_html5_bottom_videoplaylist SET ord=".$ord_stop." WHERE id=".$elem_id;		
		
		//echo "elem_id: ".$elem_id."----ord_start: ".$ord_start."----ord_stop: ".$ord_stop;
		foreach ($sql_arr as $sql)
			$wpdb->query($sql);
	}
	

	
	//submit update
	if (!isset($_POST['updateType'])) {
		if (empty($_POST['mp4']))
			 $errors_arr[]=$lbg_vp2_html5_bottom_messages['empty_mp4'];
		/*if (empty($_POST['ogv']))
			 $errors_arr[]=$lbg_vp2_html5_bottom_messages['empty_ogv'];*/
		if (empty($_POST['webm']))
			 $errors_arr[]=$lbg_vp2_html5_bottom_messages['empty_webm'];			 
	}	
	
	$theid=isset($_POST['id'])?$_POST['id']:0;
	if($theid>0 && !count($errors_arr)) {
		$except_arr=array('Submit'.$theid,'id','ord','action','security','updateType','previous_imgplaylist','previous_preview');
		foreach ($_POST as $key=>$val){
			if (in_array($key,$except_arr)) {
				unset($_POST[$key]);
			}
		}
		
		$wpdb->update( 
			$wpdb->prefix .'lbg_vp2_html5_bottom_videoplaylist', 
			$_POST, 
			array( 'id' => $theid )
		);
		?>
			<div id="message" class="updated"><p><?php echo $lbg_vp2_html5_bottom_messages['data_saved'];?></p></div>
	<?php 
	} else if (!isset($_POST['updateType'])) {
		$errors_arr[]=$lbg_vp2_html5_bottom_messages['invalid_request'];
	}
    //echo $theid;
    
	if (count($errors_arr)) { ?>
		<div id="error" class="error"><p><?php echo implode("<br>", $errors_arr);?></p></div>
	<?php }

	die(); // this is required to return a proper result
}



?>