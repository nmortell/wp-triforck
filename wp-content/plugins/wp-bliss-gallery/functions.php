<?php
function uni_get_def_settings()
{
	$uni_settings = array('gallery_width' => '780',
			'gallery_height' => '410',
			'gallery_bgcolor' => 'CCCCCC',
			'controls_x' => '300',
			'controls_y' => '320',
			'auto_play' => 'yes',
			'show_price' => 'yes',
			'pricetag_width' => '120',
			'pricetag_height' => '120',
			'price_size' => '20',
			'price_color' => 'FFFFFF',
			'currency' => '$',
			'price_img' => 'flower_red.png',
			'transition' => 'right',
			'transition_type' => 'easeOut',
			'transition_delay' => '8',
			'transition_time' => '1',
			'image_scale' => 'yes',
			'image_width' => '455',
			'image_height' => '350',
			'menu_width' => '250',
			'menu_height' => '60',
			'space_bet_menu' => '5',
			'menu_color' => 'FFF000',
			'menuover_color' => 'df951f',
			'menutext_size' => '24',
			'menutext_color' => '4b4640',
			'menutext_over_color' => 'FFFFFF',
			'menu_item_show_texture' => 'true',
			'showdesc' => 'yes',
			'desc_color' => 'FFFFFF',
			'desc_size' => '12',
			'descbg_color' => '000000',
			'descbg_alpha' => '0.5',
			'pagerbut_x' => '200',
			'pagerbut_y' => '365',
			'pagerbut_color' => '000000',
			'pagerbut_over_color' => 'FFFFFF',
			'control_color' => 'FFFFFF',
			'control_over_color' => '000000',
			'control_playpause_color' => '000000',
			'control_playpause_overcolor' => 'FFFFFF',
			'control_loader_color' => '000000',
			'control_loaderpanel_color' => '728BB4',
			'snoweffect_type' => '1',
			'min_particle_size' => '0.7',
			'max_particle_size' => '1.1',
			'min_particle_yspeed' => '2',
			'max_particle_yspeed' => '4',
			'min_particle_xspeed' => '0',
			'max_particle_xspeed' => '0',
			'noof_particles' => '125',
			'min_particle_alpha' => '1',
			'max_particle_alpha' => '1',
			'min_particle_blur' => '0',
			'max_particle_blur' => '6',
			'target' => 'current',
			'wmode' => 'opaque'		
			);
	return $uni_settings;
}
function __get_uni_xml_settings()
{
	$ops = get_option('uni_settings', array());
	
	$xml_settings = '<mobileSettings>
	<currencySymbol>'.$ops['currency'].'</currencySymbol>
	<width>'.$ops['gallery_width'].'</width>
	<height>'.$ops['gallery_height'].'</height>
</mobileSettings>
<config 
	
	auto_play="'.(($ops['auto_play'] == 'yes') ? 'true' : 'false').'"
	display_time="'.trim($ops['transition_delay']).'"

	transition="'.trim($ops['transition']).'"
	transition_type="'.trim($ops['transition_type']).'"
	transition_speed="'.trim($ops['transition_time']).'"
	
	image_width="'.trim($ops['image_width']).'"
	image_height="'.trim($ops['image_height']).'"
	
	menu_item_width="'.trim($ops['menu_width']).'"
	menu_item_height="'.trim($ops['menu_height']).'"
	menu_item_space_between="'.trim($ops['space_bet_menu']).'"

	menu_item_font_size="'.trim($ops['menutext_size']).'"
	menu_color="'.trim($ops['menu_color']).'"
	menu_color_over="'.trim($ops['menuover_color']).'"
	menu_text_color="'.trim($ops['menutext_color']).'"
	menu_text_color_over="'.trim($ops['menutext_over_color']).'"
	menu_item_show_texture="'.trim($ops['menu_item_show_texture']).'"
	
	description_color="'.trim($ops['descbg_color']).'"
	description_alpha="'.trim($ops['descbg_alpha']).'"
	description_text_size="'.trim($ops['desc_size']).'"
	description_text_color="'.trim($ops['desc_color']).'"
	
	color_dots="'.trim($ops['pagerbut_color']).'"
	color_dots_over="'.trim($ops['pagerbut_over_color']).'"
	position_dots_x="'.trim($ops['pagerbut_x']).'"
	position_dots_y="'.trim($ops['pagerbut_y']).'"

	controls_x="'.trim($ops['controls_x']).'"
	controls_y="'.trim($ops['controls_y']).'"

	controls_button_color="'.trim($ops['control_color']).'"
	controls_button_color_over="'.trim($ops['control_over_color']).'"
	controls_button_icon_color="'.trim($ops['control_playpause_color']).'"
	controls_button_icon_color_over="'.trim($ops['control_playpause_overcolor']).'"
	controls_timer_color="'.trim($ops['control_loader_color']).'"
	controls_timer_background_color="'.trim($ops['control_loaderpanel_color']).'"

	price_tag_width="'.trim($ops['pricetag_width']).'"
	price_tag_height="'.trim($ops['pricetag_height']).'"
	price_tag_img="'.UNI_PLUGIN_URL.'/price_images/'.$ops['price_img'].'"
	price_tag_symbol="'.trim($ops['currency']).'"
	price_tag_label_size="'.trim($ops['price_size']).'"
	price_tag_label_color="'.trim($ops['price_color']).'"
	/>
	<snow_effect 	
		type="'.$ops['snoweffect_type'].'"
		
		minimumSize="'.$ops['min_particle_size'].'"
		maximumSize="'.$ops['max_particle_size'].'"
		
		minimumSpeedY="'.$ops['min_particle_yspeed'].'"
		maximumSpeedY="'.$ops['max_particle_yspeed'].'"
		
		minimumSpeedX="'.$ops['min_particle_xspeed'].'"
		maximumSpeedX="'.$ops['max_particle_xspeed'].'"
		
		numOfParticles="'.$ops['noof_particles'].'"
		
		minimumRotation="'.$ops['min_particle_rotation'].'"
		maximumRotation="'.$ops['max_particle_rotation'].'"
		
		minimumAlpha="'.$ops['min_particle_alpha'].'"
		maximumAlpha="'.$ops['max_particle_alpha'].'"
		
		minimumBlur="'.$ops['min_particle_blur'].'"
		maximumBlur="'.$ops['max_particle_blur'].'"
	/>';
	return $xml_settings;
}
function uni_get_album_dir($album_id)
{
	global $guni;
	$album_dir = UNI_PLUGIN_UPLOADS_DIR . "/{$album_id}_uploadfolder";
	return $album_dir;
}
/**
 * Get album url
 * @param $album_id
 * @return unknown_type
 */
function uni_get_album_url($album_id)
{
	global $guni;
	$album_url = UNI_PLUGIN_UPLOADS_URL . "/{$album_id}_uploadfolder";
	return $album_url;
}
function uni_get_table_actions(array $tasks)
{
	?>
	<div class="bulk_actions">
		<form action="" method="post" class="bulk_form">Bulk action
			<select name="task">
				<?php foreach($tasks as $t => $label): ?>
				<option value="<?php print $t; ?>"><?php print $label; ?></option>
				<?php endforeach; ?>
			</select>
			<button class="button-secondary do_bulk_actions" type="submit">Do</button>
		</form>
	</div>
	<?php 
}
function shortcode_display_uni_gallery($atts)
{
	$vars = shortcode_atts( array(
									'cats' => '',
									'imgs' => '',
								), 
							$atts );
	//extract( $vars );
	
	$ret = display_uni_gallery($vars);
	return $ret;
}
function display_uni_gallery($vars)
{
	global $wpdb, $guni;
	$ops = get_option('uni_settings', array());
	//print_r($ops);
	$albums = null;
	$images = null;
	$cids = trim($vars['cats']);
	if (strlen($cids) != strspn($cids, "0123456789,")) {
		$cids = '';
		$vars['cats'] = '';
	}
	$imgs = trim($vars['imgs']);
	if (strlen($imgs) != strspn($imgs, "0123456789,")) {
		$imgs = '';
		$vars['imgs'] = '';
	}
	$categories = '';
	$xml_filename = '';
	if( !empty($cids) && $cids{strlen($cids)-1} == ',')
	{
		$cids = substr($cids, 0, -1);
	}
	if( !empty($imgs) && $imgs{strlen($imgs)-1} == ',')
	{
		$imgs = substr($imgs, 0, -1);
	}
	//check for xml file
	if( !empty($vars['cats']) )
	{
		$xml_filename = "cat_".str_replace(',', '', $cids) . '.xml';	
	}
	elseif( !empty($vars['imgs']))
	{
		$xml_filename = "image_".str_replace(',', '', $imgs) . '.xml';
	}
	else
	{
		$xml_filename = "uni_all.xml";
	}
	//die(UNI_PLUGIN_XML_DIR . '/' . $xml_filename);


	
	if( !empty($vars['cats']) )
	{
		$query = "SELECT * FROM {$wpdb->prefix}uni_albums WHERE album_id IN($cids) AND status = 1 ORDER BY `order` ASC";
		//print $query;
		$albums = $wpdb->get_results($query, ARRAY_A);
		foreach($albums as $key => $album)
		{
			$images = $guni->uni_get_album_images($album['album_id']);
			$album_dir = uni_get_album_url($album['album_id']);//UNI_PLUGIN_UPLOADS_URL . '/' . $album['album_id']."_".$album['name'];
			if ($images && !empty($images) && is_array($images)) {
				$categories .= '<category>
				<title>'.$album['name'].'</title>
				<thumb><![CDATA['.$album_dir."/thumb/".$album['thumb'].']]></thumb>
				';
				foreach($images as $key => $img)
				{
					if($img['status'] == 0 ) continue;
					
					$categories .='<item>';
					if ($ops['showdesc'] == 'yes') {
						$description = '<![CDATA['.$img['description'].']]>';
					} else {
						$description =	'';
					}
					
					$categories .= '<main scale="'.(($ops['image_scale'] == 'yes') ? 'true' : 'false').'">'.trim(str_replace(" ","-",$album_dir)."/big/".$img['image']).'</main>';

					$categories .= ' <thumb scale="'.$ops['thumbImg_scale'].'">'.trim(str_replace(" ","-",$album_dir)."/thumb/".$img['thumb']).'</thumb>';

						
					$categories .= '<description>'.$description.'</description>';
					$categories .= '<label><![CDATA['.trim($img['title']).']]></label>';
					$categories .= '<link window="'.$ops['target'].'">'.trim($img['link']).'</link>';

						if ($ops['show_price'] == 'yes') {
						$categories .= '<price>';
						if($img['price']>0){ 
							$categories .= '<regular>'.$img['price'].'</regular>';
						}else{
							$categories .= '<regular></regular>';
						}

						if ('no' == 'yes') {
							if(0>0){   
								$categories .= '<updated>'.'</updated>';
							}else{
								$categories .= '<updated></updated>';
							}
						}else{
								$categories .= '<updated></updated>';
						}

						$categories .= '	</price>';
					}else{
						$categories .= '<price>';
						$categories .= '<regular></regular>';
						$categories .= '<updated></updated>';
						$categories .= '	</price>';
					}
					   $categories .= '</item>';
				}
				$categories .= "	</category>";
			}
		}
		//$xml_filename = "cat_".str_replace(',', '', $cids) . '.xml';
	}
	elseif( !empty($vars['imgs']))
	{
		$query = "SELECT * FROM {$wpdb->prefix}uni_images WHERE image_id IN($imgs) AND status = 1 ORDER BY `order` ASC";
		$images = $wpdb->get_results($query, ARRAY_A);
		if ($images && !empty($images) && is_array($images)) {
			
			$categories .= '<category>
				<title>All Albums</title>
				<thumb><![CDATA['.$album_dir."/thumb/".$album['thumb'].']]></thumb>
				';

			foreach($images as $key => $img)
			{
				$album = $guni->uni_get_album($img['category_id']);
				$album_dir = uni_get_album_url($album['album_id']);//UNI_PLUGIN_UPLOADS_URL . '/' . $album['album_id']."_".$album['name'];
				if( $img['status'] == 0 ) continue;
				
				$categories .='<item>';
					if ($ops['showdesc'] == 'yes') {
						$description = '<![CDATA['.$img['description'].']]>';
					} else {
						$description =	'';
					}
						$categories .= '<main scale="'.(($ops['image_scale'] == 'yes') ? 'true' : 'false').'">'.trim(str_replace(" ","-",$album_dir)."/big/".$img['image']).'</main>';

					$categories .= ' <thumb scale="'.$ops['thumbImg_scale'].'">'.trim(str_replace(" ","-",$album_dir)."/thumb/".$img['thumb']).'</thumb>';

						
					$categories .= '<description>'.$description.'</description>';
					$categories .= '<label><![CDATA['.trim($img['title']).']]></label>';
					$categories .= '<link window="'.$ops['target'].'">'.trim($img['link']).'</link>';

						if ($ops['show_price'] == 'yes') {
						$categories .= '<price>';
						if($img['price']>0){ 
							$categories .= '<regular>'.$img['price'].'</regular>';
						}else{
							$categories .= '<regular></regular>';
						}

						if ('no' == 'yes') {
							if(0>0){   
								$categories .= '<updated>'.'</updated>';
							}else{
								$categories .= '<updated></updated>';
							}
						}else{
								$categories .= '<updated></updated>';
						}

						$categories .= '	</price>';
					}else{
						$categories .= '<price>';
						$categories .= '<regular></regular>';
						$categories .= '<updated></updated>';
						$categories .= '	</price>';
					}
					   $categories .= '</item>';
			}
			$categories .= "	</category>";
		}
	}
	//no values paremeters setted
	else//( empty($vars['cats']) && empty($vars['imgs']))
	{
		$query = "SELECT * FROM {$wpdb->prefix}uni_albums WHERE status = 1 ORDER BY `order` ASC";
		$albums = $wpdb->get_results($query, ARRAY_A);
		foreach($albums as $key => $album)
		{
			$images = $guni->uni_get_album_images($album['album_id']);
			$album_dir = uni_get_album_url($album['album_id']);//UNI_PLUGIN_UPLOADS_URL . '/' . $album['album_id']."_".$album['name'];
			if ($images && !empty($images) && is_array($images)) {
				$categories .= '<category>
				<title>'.$album['name'].'</title>
				<thumb><![CDATA['.$album_dir."/thumb/".$album['thumb'].']]></thumb>
				';
				foreach($images as $key => $img)
				{
					if($img['status'] == 0 ) continue;
					
					$categories .='<item>';
					if ($ops['showdesc'] == 'yes') {
						$description = '<![CDATA['.$img['description'].']]>';
					} else {
						$description =	'';
					}
					
					$categories .= '<main scale="'.(($ops['image_scale'] == 'yes') ? 'true' : 'false').'">'.trim(str_replace(" ","-",$album_dir)."/big/".$img['image']).'</main>';

					$categories .= ' <thumb scale="'.$ops['thumbImg_scale'].'">'.trim(str_replace(" ","-",$album_dir)."/thumb/".$img['thumb']).'</thumb>';

						
					$categories .= '<description>'.$description.'</description>';
					$categories .= '<label><![CDATA['.trim($img['title']).']]></label>';
					$categories .= '<link window="'.$ops['target'].'">'.trim($img['link']).'</link>';

						if ($ops['show_price'] == 'yes') {
						$categories .= '<price>';
						if($img['price']>0){ 
							$categories .= '<regular>'.$img['price'].'</regular>';
						}else{
							$categories .= '<regular></regular>';
						}

						if ('no' == 'yes') {
							if(0>0){   
								$categories .= '<updated>'.'</updated>';
							}else{
								$categories .= '<updated></updated>';
							}
						}else{
								$categories .= '<updated></updated>';
						}

						$categories .= '	</price>';
					}else{
						$categories .= '<price>';
						$categories .= '<regular></regular>';
						$categories .= '<updated></updated>';
						$categories .= '	</price>';
					}
					   $categories .= '</item>';
				}
				$categories .= "	</category>";
			}
		}
		//$xml_filename = "uni_all.xml";
	}
	
	$xml_tpl = __get_uni_xml_template();
	$settings = __get_uni_xml_settings();
	$xml = str_replace(array('{settings}', '{categories}'), 
						array($settings, $categories), $xml_tpl);
	//write new xml file
	$fh = fopen(UNI_PLUGIN_XML_DIR . '/' . $xml_filename, 'w+');
	fwrite($fh, $xml);
	fclose($fh);
	//print "<h3>Generated filename: $xml_filename</h3>";
	//print $xml;
	if( file_exists(UNI_PLUGIN_XML_DIR . '/' . $xml_filename ) )
	{
		$fh = fopen(UNI_PLUGIN_XML_DIR . '/' . $xml_filename, 'r');
		$xml = fread($fh, filesize(UNI_PLUGIN_XML_DIR . '/' . $xml_filename));
		fclose($fh);
		//print "<h3>Getting xml file from cache: $xml_filename</h3>";
		$ret_str = "
		<script language=\"javascript\">AC_FL_RunContent = 0;</script>
<script src=\"".UNI_PLUGIN_URL."/js/AC_RunActiveContent.js\" language=\"javascript\"></script>

		<script language=\"javascript\"> 
	if (AC_FL_RunContent == 0) {
		alert(\"This page requires AC_RunActiveContent.js.\");
	} else {
		AC_FL_RunContent(
			'codebase', 'http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0',
			'width', '".$ops['gallery_width']."',
			'height', '".$ops['gallery_height']."',
			'src', '".UNI_PLUGIN_URL."/js/wp_bliss',
			'quality', 'high',
			'pluginspage', 'http://www.macromedia.com/go/getflashplayer',
			'align', 'middle',
			'play', 'true',
			'loop', 'true',
			'scale', 'showall',
			'wmode', '".$ops['wmode']."',
			'devicefont', 'false',
			'id', 'xmlswf_vmuni',
			'bgcolor', '".$ops['gallery_bgcolor']."',
			'name', 'xmlswf_vmuni',
			'menu', 'true',
			'mobile', '".UNI_PLUGIN_URL."/xml/$xml_filename',
			'allowFullScreen', 'true',
			'allowScriptAccess','sameDomain',
			'movie', '".UNI_PLUGIN_URL."/js/wp_bliss',
			'salign', '',
			'flashVars','xmlPath=".UNI_PLUGIN_URL."/xml/$xml_filename'
			); //end AC code
	}
</script>
";
//echo UNI_PLUGIN_UPLOADS_URL."<hr>";
//		print $xml;
		return $ret_str;
	}
	return true;
}
function __get_uni_xml_template()
{
	$xml_tpl = '<?xml version="1.0" encoding="utf-8"?>
<slideshow>
{settings}
<content>
{categories}
</content></slideshow>';
	return $xml_tpl;
}
?>