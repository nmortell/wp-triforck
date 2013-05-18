<style type="text/css">
.lbg_subtitle {color:#21759b;
	font-weight:bold;
	font-size:14px;
}
</style>
<div class="wrap">
<div id="lbg_logo">
			<h2>Help</h2>
  </div>
<p>This plugin requires at least WordPress 3.0</p>
<ul class="lbg_list-1">
  <li><a href="#videotutorials">Video Tutorials</a></li>
  <li><a href="#manage">Manage Players</a></li>
  <li><a href="#settings">Player Settings</a></li>
  <li><a href="#playlist">Playlist</a></li>
  <li>.<a href="#htaccess">htaccess</a></li>
  <li><a href="#shortcode">ShortCode</a></li>
</ul>
<p>&nbsp;</p>
<p><span class="lbg_subtitle"><a name="videotutorials" id="videotutorials"></a>1. Video Tutorials</span></p>
<p>Step 1: Installation – <a href="http://www.youtube.com/watch?v=vTUWuIXV0L8" target="_blank">http://www.youtube.com/watch?v=vTUWuIXV0L8</a><br />
  Step 2: Adding The ShortCode – <a href="http://www.youtube.com/watch?v=zpPYO1jzQ7w" target="_blank">http://www.youtube.com/watch?v=zpPYO1jzQ7w</a><br />
  Step 3: Changing Player Settings – <a href="http://www.youtube.com/watch?v=IOEd1aMAK0M" target="_blank">http://www.youtube.com/watch?v=IOEd1aMAK0M</a><br />
  Step 4: Player Playlist – <a href="http://www.youtube.com/watch?v=uzu7e49ES3I" target="_blank">http://www.youtube.com/watch?v=uzu7e49ES3I</a><br />
  Step 5: Adding Multiple Players – <a href="http://www.youtube.com/watch?v=GoKcjhF9u3k" target="_blank">http://www.youtube.com/watch?v=GoKcjhF9u3k</a></p>
<p>&nbsp;</p>
<p class="lbg_subtitle"><a name="manage" id="manage"></a>2. Manage Players</p>
<p class="">From this section you can:<br />
- add a new player <br />
- 
select the player you want to edit by clicking &quot;Player Settings&quot;<br />
- add/edit playlist videos by clicking &quot;Playlist&quot;
<br />
- delete an existing player by clicking &quot;Delete&quot;
</p>
<p class="">&nbsp;</p>
<p class="lbg_subtitle"><a name="settings" id="settings"></a>3. Player Settings</p>
<p>From this section you can define the video player  settings.</p>
<table class="wp-list-table widefat fixed pages" cellspacing="0">
  <tr>
    <td width="30%" align="left" valign="top" class="row-title"></td>
    <td width="70%" align="left" valign="top"></td>
  </tr>  
  <tr>
    <td colspan="2" align="left" valign="top" class="lbg_regGray">General Settings</td>
  </tr>
  <tr>
    <td align="left" valign="top" class="row-title">Player Width</td>
    <td align="left" valign="top">player width</td>
  </tr>
  <tr>
    <td align="left" valign="top" class="row-title">Player Height</td>
    <td align="left" valign="top">player height</td>
  </tr>
  <tr>
    <td align="left" valign="top" class="row-title">Skin Name</td>
    <td align="left" valign="top"> available skins:<br />
      - universalBlack<br />
- universalWhite<br />
- giant <br />
- futuristicElectricBlue<br />
- futuristicChrome</td>
  </tr>
  <tr>
    <td align="left" valign="top" class="row-title">Seek Bar Adjust</td>
    <td align="left" valign="top"><p>This value will reduce the length of seek bar</p>
      <p>Recommended values: </p>
      <p>- universalBlack: 240<br />
- universalWhite: 240<br />
- giant: 410<br />
- futuristicElectricBlue: 285<br />
- futuristicChrome: 285</p></td>
  </tr>
  <tr>
    <td align="left" valign="top" class="row-title">Show Information Button</td>
    <td align="left" valign="top">You can show or hide the info button.<br />
Possible values: <br />
<strong>true</strong> - show info button<br />
<strong>false</strong> - hide info button</td>
  </tr>
  <tr>
    <td align="left" valign="top" class="row-title">Preload</td>
    <td align="left" valign="top">Specifies if and how the author thinks the video should be loaded when the page   loads</td>
  </tr>
  <tr>
    <td align="left" valign="top" class="row-title">Loop Video</td>
    <td align="left" valign="top">Possible values: <br />
      <strong>true</strong> - starts next movie after current movie has finished<br />
      <strong>false</strong> - doesn't start next movie after current movie has finished</td>
  </tr>
  <tr>
    <td align="left" valign="top" class="row-title">Auto Play First Movie</td>
    <td align="left" valign="top">Possible values: <br />
      <strong>true</strong> - autoplays first movie<br />
      <strong>false</strong> - doesn't autoplay first movie</td>
  </tr>
  <tr>
    <td align="left" valign="top" class="row-title">Auto Play</td>
    <td align="left" valign="top"><strong>true</strong> if you want your video to start when you click on a playlist item<br />
      <strong>false</strong>if you want your video to load a preview image when you click on a playlist item</td>
  </tr>
  <tr>
    <td align="left" valign="top" class="row-title">Initial Volume Value</td>
    <td align="left" valign="top">the initial volume value. It takes values between 0-1</td>
  </tr>
  <tr>
    <td align="left" valign="top" class="row-title">Border Width</td>
    <td align="left" valign="top">the border arround the video player (in px)</td>
  </tr>
  <tr>
    <td align="left" valign="top" class="row-title">Border Color</td>
    <td align="left" valign="top">the border color (hexa)</td>
  </tr>
  <tr>
    <td colspan="2" align="left" valign="top" class="lbg_regGray">Playlist Settings</td>
  </tr>
  <tr>
    <td align="left" valign="top" class="row-title">Thumbs Reflection</td>
    <td align="left" valign="top">the thumbnail reflection transparency value. It take values from 0-100</td>
  </tr>
  <tr>
    <td align="left" valign="top" class="row-title">NumberOf Thumbs Per Screen</td>
    <td align="left" valign="top">number of elements show in the playlist first time</td>
  </tr>
  <tr>
    <td align="left" valign="top" class="row-title">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
  </tr>
</table>
<p class="">&nbsp;</p>
<p class="lbg_subtitle"><a name="playlist" id="playlist"></a>4. Playlist</p>
<p>From this section you can define videos in the playlist</p>
<table class="wp-list-table widefat fixed pages" cellspacing="0">
  <tr>
    <td width="30%" align="left" valign="top" class="row-title"></td>
    <td width="70%" align="left" valign="top"></td>
  </tr>
  <tr>
    <td align="left" valign="top" class="row-title">MP4 file (Chrome, IE, Safari) </td>
    <td align="left" valign="top">.mp4 file name. The file has to be uploaded:<br />
      Case 1:
on your server in &quot;wp-content/plugins/lbg-vp2-html5-bottom/lbg_vp2_html5_bottom/videos/&quot; folder using a FTP client (or the CPannel or a FTP plugin for Wordpress) <br />
Case 2: on another server</td>
  </tr>
  <tr>
    <td align="left" valign="top" class="row-title">WebM</td>
    <td align="left" valign="top">.webm file name. The file has to be uploaded:<br />
      Case 1:
      on your server in &quot;wp-content/plugins/lbg-vp2-html5-bottom/lbg_vp2_html5_bottom/videos/&quot; folder using a FTP client (or the CPannel or a FTP plugin for Wordpress) <br />
      Case 2: on another server</td>
  </tr>
  <tr>
    <td align="left" valign="top" class="row-title">Movie Title</td>
    <td align="left" valign="top">movie title</td>
  </tr>
  <tr>
    <td align="left" valign="top" class="row-title">Movie Description</td>
    <td align="left" valign="top">movie description</td>
  </tr>
  <tr>
    <td align="left" valign="top" class="row-title">Playlist Image</td>
    <td align="left" valign="top">playlist image</td>
  </tr>
  <tr>
    <td align="left" valign="top" class="row-title">Preview Image</td>
    <td align="left" valign="top">preview image</td>
  </tr>
  <tr>
    <td align="left" valign="top" class="row-title">&nbsp;</td>
    <td align="left" valign="top">&nbsp;</td>
  </tr>
</table>
<p>&nbsp;</p>
<p><span class="lbg_subtitle"><a name="htaccess" id="htaccess"></a>5.htaccess</span></p>
<p>For Mozzila and IE9 please use the .htaccess present in the .zip file if the videos are not played.</p>
<p>&nbsp;</p>
<p><span class="lbg_subtitle"><a name="shortcode" id="shortcode"></a>6. ShortCode</span></p>
<p>The shortcode is: <br />
[lbg_vp2_html5_bottom settings_id='1']<br />
where <br />
 settings_id is the player ID defined in &quot;Manage Players&quot; section</p>
</div>