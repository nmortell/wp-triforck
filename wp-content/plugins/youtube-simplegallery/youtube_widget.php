<?php

function widget_youtubegallery( $youtubelinks = null ) {

$youtubelinks = explode("\n", $youtubelinks);

$youtubeoptions = get_option('youtube_gallery_option');
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
		$thumb[1] = getYTSGAttribute('value', $thumb[1]);
		$thumb[1] = str_replace('?fs=1', '', $thumb[1]);
		$thumb[1] = str_replace('?version=3', '', $thumb[1]);
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
	endforeach;
	$showgallery .= ('<div class="youtube_gallery_divider"></div><br clear="all" /></div>');

$youtube_gallery_count = $x;
return $showgallery;
}

?>