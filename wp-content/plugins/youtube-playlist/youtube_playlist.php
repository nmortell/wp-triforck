<?php
/*
Plugin Name: YouTube Playlist
Plugin URI: http://iquark.org/youtube-playlist-wordpress-plugin
Description: Show a list of videos of a YouTube's playlist
Version: 1.0
Author: Luis Sánchez
Author URI: http://iquark.org
*/
?>
<?php
/*
    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/
?>
<?php

class youtube_playlist extends WP_Widget
{
   function __construct() 
   {
      $widget_options = array(
         "classname" => "youtube_playlist",
         "description" => __("Load the list of videos of a YouTube's playlist")
      );
      
      parent::WP_Widget("youtube_playlist","YouTube Playlist", $widget_options);
   }
   
   function widget($args, $instance)
   {
      extract($args, EXTR_SKIP);
      $title = ($instance['title'])?$instance['title']:"Playlist";
      $playlistID = ($instance['playlistID'])?$instance['playlistID']:"";
      $maxResults = ($instance['maxResults'])?$instance['maxResults']:2;
      $class = ($instance['class'])?$instance['class']:"youtube_playlist";
      $thumb_size = ($instance['thumb_size'])?$instance['thumb_size']:"small";
      ?>
<?php echo $before_widget; ?>

<?php echo $before_title.$title.$after_title; ?>

<?php         

   $playlistID = trim(preg_replace("/^PL/", "", $playlistID));
   
   $url = "http://gdata.youtube.com/feeds/api/playlists/$playlistID?alt=jsonc&v=2&orderby=published&rel=0&max-results=$maxResults";

   // get the playlist data in JSON
   $contents = file_get_contents($url);
   if($contents)
   {
      $contents = utf8_encode($contents);
      $results = json_decode($contents); 
      $output = "<ul class=\"".$class."\">";
      
      foreach($results->data->items as $item)
      {
         $output .= "<li><a href=\"http://".$item->video->player->default."\" target=\"_blank\" title=\"".$item->video->title."\">";
         if($thumb_size == "big") 
         {
            $output .= "<img src=\"".$item->video->thumbnail->hqDefault."\" class=\"video_thumbnail\" />";
         }
         else
         {
            $output .= "<img src=\"".$item->video->thumbnail->sqDefault."\" class=\"video_thumbnail\" />";
         }
         $output .= "<div class=\"video_title\">".$item->video->title."</div></a></li>";
      }
      
      $output .= "</ul>";
      
      echo $output;
   }
?>      
<?php echo $after_widget; ?>
<?php

   }
   
   function update($new_instance, $old_instance)
   {
      $instance = $old_instance;
      $instance['title'] = strip_tags($new_instance['title']);
      $instance['playlistID'] = strip_tags($new_instance['playlistID']);
      $instance['maxResults'] = strip_tags($new_instance['maxResults']);
      $instance['class'] = strip_tags($new_instance['class']);
      $instance['thumb_size'] = strip_tags($new_instance['thumb_size']);
      
      return $instance;
   }
   
   function form($instance)
   {
      $default = array( "title"=>"YouTube's Playlist", 
                        "playlistID"=>"PL335DD2E2EE782021",
                        "maxResults"=>2, 
                        "class"=>"youtube_playlist",
                        "thumb_size"=>"small"
                     );
      
      $instance = wp_parse_args((array)$instance, $default);
      $title = $instance['title'];
      $playlistID = $instance['playlistID'];
      $maxResults = $instance['maxResults'];
      $class = $instance['class'];
      $thumb_size = $instance['thumb_size'];
      
      ?>
      <p>Title: <input class="youtubeplaylist" name="<?php echo $this->get_field_name('title');?>" type="text" value="<?php echo esc_attr($title);?>" /></p>
      
      <p>YouTube's playlist ID: <input class="youtubeplaylist" name="<?php echo $this->get_field_name('playlistID');?>" type="text" value="<?php echo esc_attr($playlistID);?>" /></p>
      
      <p>Max. Results (by default 2): <input class="youtubeplaylist" name="<?php echo $this->get_field_name('maxResults');?>" type="text" value="<?php echo esc_attr($maxResults);?>" /></p>
      
      <p>CSS Class (by default 'youtube_playlist'): <input class="youtubeplaylist" name="<?php echo $this->get_field_name('class');?>" type="text" value="<?php echo esc_attr($class);?>" /></p>
      
      <p>Thumbnail size (by default 'small'): 
<?php
   $thumb_size = esc_attr($thumb_size);
?>
      <select class="youtubeplaylist" name="<?php echo $this->get_field_name('thumb_size');?>">
         <option value="small"<?php if($thumb_size=="small"): ?> selected="selected"<?php endif; ?>>Small</option>
         <option value="big"<?php if($thumb_size=="big"): ?> selected="selected"<?php endif; ?>>Big</option>
      </select></p>
      
<?php
   }
}

function youtube_playlist_init() 
{
   register_widget("youtube_playlist");
}

/*
   The user can put the shortcode: [youtube_playlist id="PL335DD2E2EE782021" maxResults="2" thumb_size="small" class="youtube_playlist"]
   The parameters are all optional:
      * id: is the playlist's ID, you can put it in either starting by PL or not.
      * maxResults: the maximum number of videos to show, by default "2".
      * thumb_size: you can show the thumbnail "small" or "big", by default "small".
      * class: you can change the class of the list by one who is better for you (in case you need it), by default "youtube_playlist".
*/
function youtube_playlist_sc($args, $content=null)
{

   extract(shortcode_atts(array(
         "id"=>"PL335DD2E2EE782021",
         "maxResults"=>"2",
         "class"=>"youtube_playlist",
         "thumb_size"=>"small"
      ), $args));
   
   $id = preg_replace("/^PL/", "", $id);
   $url = "http://gdata.youtube.com/feeds/api/playlists/$id?alt=jsonc&v=2&orderby=published&rel=0&max-results=$maxResults";
   
   // get the playlist data in JSON
   $contents = file_get_contents($url);
   if($contents)
   {
      $contents = utf8_encode($contents);
      $results = json_decode($contents); 
      
      $youtube_playlist_soc_net_content = "<ul class=\"".$class."\">";
      
      foreach($results->data->items as $item)
      {
         $youtube_playlist_soc_net_content .= "<li><a href=\"".$item->video->player->default."\" target=\"_blank\" title=\"".$item->video->title."\">";
         if($thumb_size == "big") 
         {
            $youtube_playlist_soc_net_content .= "<img src=\"".$item->video->thumbnail->hqDefault."\" class=\"video_thumbnail\" />";
         }
         else
         {
            $youtube_playlist_soc_net_content .= "<img src=\"".$item->video->thumbnail->sqDefault."\" class=\"video_thumbnail\" />";
         }
         $youtube_playlist_soc_net_content .= "<div class=\"video_title\">".$item->video->title."</div></a></li>";
      }
      
      $youtube_playlist_soc_net_content .= "</ul>";
   }
   
   return $youtube_playlist_soc_net_content;
}


add_action("widgets_init", "youtube_playlist_init");
add_shortcode("youtube_playlist", "youtube_playlist_sc");
