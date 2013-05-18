<script>
jQuery(document).ready(function() {
 
jQuery('#upload_imgplaylist_button').click(function() {
 //formfield = jQuery('#img').attr('name');
 formfield = 'imgplaylist';
 tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
 return false;
});

jQuery('#upload_preview_button').click(function() {
 //formfield = jQuery('#thumbnail').attr('name');
 formfield = 'preview';
 tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');
 return false;
});
 
window.send_to_editor = function(html) {
 imgurl = jQuery('img',html).attr('src');
 jQuery('#'+formfield).val(imgurl);
 tb_remove();
 
 
}
 
});
</script>

<div class="wrap">
	<div id="lbg_logo">
			<h2>Playlist for player: <span style="color:#FF0000; font-weight:bold;"><?php echo $_SESSION['xname']?> - ID #<?php echo $_SESSION['xid']?></span> - Add New</h2>
 	</div>

    <form method="POST" enctype="multipart/form-data" id="form-add-playlist-record">
	    <input name="playerid" type="hidden" value="<?php echo $_SESSION['xid']?>" />
		<table class="wp-list-table widefat fixed pages" cellspacing="0">
		  <tr>
		    <td align="left" valign="middle" width="25%">&nbsp;</td>
		    <td align="left" valign="middle" width="77%"><a href="?page=LBG_VP2_HTML5_BOTTOM_Playlist" style="padding-left:25%;">Back to Playlist</a></td>
		  </tr>
		  <tr>
		    <td colspan="2" align="left" valign="middle"><ul>
		      <li><u>CASE 1: Videos hosted on THE SAME server as your website:</u><br />
		        Using a FTP client (or the CPannel or a FTP plugin for Wordpress) upload your videos (.mp4, .webm) in the following folder: 
		        wp-content/plugins/lbg-vp2-html5-bottom/lbg_vp2_html5_bottom/videos/<br />
		        Then paste below just the file name. <br />
		        Ex: big_buck_bunny_trailer.mp4</li>
		      <li><u>CASE 2: Videos hosted on ANOTHER server as your website:</u><br />
		        Paste below the url to the video.<br />
		        Ex: http://lambertgroupproductions.com/canyon/vp2_html5/bottomPlaylist/videos/big_buck_bunny_trailer.mp4</li>
	        </ul></td>
	      </tr>
		  <tr>
		    <td colspan="2" align="center" valign="middle">&nbsp;</td>
		  </tr>
		  <tr>
		    <td align="right" valign="middle" class="row-title">Set It First</td>
		    <td align="left" valign="top"><input name="setitfirst" type="checkbox" id="setitfirst" value="1" checked="checked" />
		      <label for="setitfirst"></label></td>
	      </tr>
		  <tr>
		    <td align="right" valign="top" class="row-title">MP4 file (Chrome, IE, Safari)* </td>
		    <td width="77%" align="left" valign="top"><input name="mp4" type="text" id="mp4" size="80" value="<?php echo $_POST['mp4']?>" /></td>
		  </tr>
		  <tr>
		    <td align="right" valign="top" class="row-title">WebM*</td>
		    <td align="left" valign="top"><input name="webm" type="text" size="80" id="webm" value="<?php echo $_POST['webm'];?>"/>    </td>
		  </tr>
		  <tr>
		    <td align="right" valign="middle" class="row-title">&nbsp;</td>
		    <td align="left" valign="top">&nbsp;</td>
	      </tr>
		  <tr>
		    <td align="right" valign="middle" class="row-title">Title</td>
		    <td align="left" valign="top"><input name="title" type="text" size="80" id="title" value="<?php echo $_POST['title'];?>"/></td>
		  </tr>
		  <tr>
		    <td align="right" valign="middle" class="row-title">Description</td>
		    <td align="left" valign="top">
		    <textarea name="desc" id="desc" cols="45" rows="5"><?php echo $_POST['desc'];?></textarea></td>
		  </tr>
		  <tr>
		    <td align="right" valign="top" class="row-title">Playlist Image </td>
		    <td align="left" valign="top"><input name="imgplaylist" type="text" id="imgplaylist" size="80" value="<?php echo $_POST['imgplaylist']?>" />
		      <input name="upload_imgplaylist_button" type="button" id="upload_imgplaylist_button" value="Upload Image" />
		      <br />
		      Enter an URL or upload an image</td>
	      </tr>
		  <tr>
		    <td align="right" valign="top" class="row-title">Preview Image</td>
		    <td align="left" valign="top"><input name="preview" type="text" id="preview" size="80" value="<?php echo $_POST['preview']?>" />
		      <input name="upload_preview_button" type="button" id="upload_preview_button" value="Upload Image" />
		      <br />
		      Enter an URL or upload an image</td>
	      </tr>
		  <tr>
            <td align="right" valign="top" class="row-title">&nbsp;</td>
		    <td align="left" valign="top">&nbsp;</td>
	      </tr>
		  <tr>
		    <td colspan="2" align="left" valign="middle">*Required fields</td>
		  </tr>
		  <tr>
		    <td colspan="2" align="center" valign="middle"><input name="Submit<?php echo $_POST['ord']?>" id="Submit<?php echo $_POST['ord']?>" type="submit" class="button-primary" value="Add Record"></td>
		  </tr>
		</table>    
  </form>






</div>				