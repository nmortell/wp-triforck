<script>
jQuery(document).ready(function() {
		window.send_to_editor = function(html) {
		 imgurl = jQuery('img',html).attr('src');
		 //jQuery('#'+formfield).val(imgurl);
		 if (formfield=='imgplaylist') {
		 	document.forms["form-playlist-html5-bottom-"+the_i].imgplaylist.value=imgurl;
		 } else {
			 document.forms["form-playlist-html5-bottom-"+the_i].preview.value=imgurl;
		 }
		 //alert (the_i); 	
		 jQuery('#'+formfield+'_'+the_i).attr('src',imgurl);
		 tb_remove();
		 
		}
});		
</script>

<div class="wrap">
	<div id="lbg_logo">
			<h2>Playlist for player: <span style="color:#FF0000; font-weight:bold;"><?php echo $_SESSION['xname']?> - ID #<?php echo $_SESSION['xid']?></span></h2>
 	</div>
  <div id="lbg_vp2_html5_bottom_updating_witness"><img src="<?php echo plugins_url('images/ajax-loader.gif', dirname(__FILE__))?>" /> Updating...</div>
<div style="text-align:center; padding:0px 0px 20px 0px;"><img src="<?php echo plugins_url('images/icons/add_icon.gif', dirname(__FILE__))?>" alt="add" align="absmiddle" /> <a href="?page=LBG_VP2_HTML5_BOTTOM_Playlist&xmlf=add_playlist_record">Add new</a></div>
<div style="text-align:left; padding:10px 0px 10px 14px;">#Initial Order --- Movie Title</div>


<ul id="lbg_vp2_html5_bottom_sortable">
	<?php foreach ( $result as $row ) 
	{
		$row=lbg_vp2_html5_bottom_unstrip_array($row); ?>
	<li class="ui-state-default cursor_move" id="<?php echo $row['id']?>">#<?php echo $row['ord']?> --- <span id="mov_title_<?php echo $row['id']?>"><?php echo $row['title']?></span> <div class="toogle-btn-closed" id="toogle-btn<?php echo $row['ord']?>" onclick="mytoggle('toggleable<?php echo $row['ord']?>','toogle-btn<?php echo $row['ord']?>');"></div><div class="options"><a href="javascript: void(0);" onclick="lbg_vp2_html5_bottom_delete_entire_record(<?php echo $row['id']?>,<?php echo $row['ord']?>);">Delete</a></div>
	<div class="toggleable" id="toggleable<?php echo $row['ord']?>">
    <form method="POST" enctype="multipart/form-data" id="form-playlist-html5-bottom-<?php echo $row['ord']?>">
	    <input name="id" type="hidden" value="<?php echo $row['id']?>" />
        <input name="ord" type="hidden" value="<?php echo $row['ord']?>" />
        <input name="previous_imgplaylist" type="hidden" value="<?php echo $row['imgplaylist']?>" />
        <input name="previous_preview" type="hidden" value="<?php echo $row['preview']?>" />
		<table width="100%" cellspacing="0" class="wp-list-table widefat fixed pages" style="background-color:#FFFFFF;">
		  <tr>
		    <td align="left" valign="middle" width="25%"></td>
		    <td align="left" valign="middle" width="77%"></td>
		  </tr>
		  <tr>
            <td colspan="2" align="left" valign="middle"><ul>
              <li><u>CASE 1: Videos hosted on THE SAME server as your website:</u><br />
Using a FTP client (or the CPannel or a FTP plugin for Wordpress) upload your videos (.mp4,  .webm) in the following folder: 
                wp-content/plugins/lbg-vp2-html5-bottom/lbg_vp2_html5_bottom/videos/<br />
                Then paste below just the file name. <br />
                Ex: big_buck_bunny_trailer.mp4</li>
              <li><u>CASE 2: Videos hosted on ANOTHER server as your website:</u><br />
                Paste below the url to the video.<br />
                Ex: http://lambertgroupproductions.com/canyon/vp2_html5/bottomPlaylist/videos/big_buck_bunny_trailer.mp4</li>                
              </ul> </td>
		    </tr>
		  <tr>
		    <td colspan="2" align="center" valign="middle">&nbsp;</td>
		  </tr>
          <tr>
        <td align="right" valign="top" class="row-title">MP4 file (Chrome, IE, Safari)*       </td>
        <td align="left" valign="middle"><input name="mp4" type="text" size="80" id="mp4" value="<?php echo stripslashes($row['mp4'])?>"/></td>
      </tr>
      <tr>
        <td align="right" valign="top" class="row-title">WebM*</td>
        <td align="left" valign="middle"><input name="webm" type="text" size="80" id="webm" value="<?php echo stripslashes($row['webm']);?>"/></td>
      </tr>
		  <tr>
		    <td align="right" valign="middle" class="row-title">&nbsp;</td>
		    <td align="left" valign="top">&nbsp;</td>
		    </tr>
		  <tr>
		    <td align="right" valign="middle" class="row-title">Title</td>
		    <td align="left" valign="top"><input name="title" type="text" size="80" id="title" value="<?php echo $row['title'];?>"/></td>
		    </tr>
		  <tr>
		    <td align="right" valign="middle" class="row-title">Description</td>
		    <td align="left" valign="top">
		    <textarea name="desc" id="desc" cols="45" rows="5"><?php echo $row['desc'];?></textarea></td>
		  </tr>
		  <tr>
		    <td align="right" valign="top"><span class="row-title">Playlist Image</span></td>
		    <td align="left" valign="top"><input name="imgplaylist" type="text" id="imgplaylist" size="100" value="<?php echo stripslashes($row['imgplaylist']);?>" />
              <input name="upload_imgplaylist_button_html5playerBottom_<?php echo $row['ord']?>" type="button" id="upload_imgplaylist_button_html5playerBottom_<?php echo $row['ord']?>" value="Change Image" /><br />
Enter an URL or upload an image<br />
				  <div id="lbg_vp2_html5_bottom_playlistimg_div_<?php echo $row['ord']?>" style="padding:5px 0;">
					  <img src="<?php echo $row['imgplaylist']?>" name="imgplaylist_<?php echo $row['ord']?>" id="imgplaylist_<?php echo $row['ord']?>" />
				  </div>   
				  </td>
		  </tr>
		  <tr>
		    <td align="right" valign="top" class="row-title">Preview Image</td>
		    <td align="left" valign="top"><input name="preview" type="text" id="preview" size="100" value="<?php echo stripslashes($row['preview'])?>" />
              <input name="upload_preview_button_html5playerBottom_<?php echo $row['ord']?>" type="button" id="upload_preview_button_html5playerBottom_<?php echo $row['ord']?>" value="Change Image" /><br />
Enter an URL or upload an image<br />
		      <div id="lbg_vp2_html5_bottom_preview_div_<?php echo $row['ord']?>" style="padding:5px 0;">
		        <img src="<?php echo $row['preview']?>" name="preview_<?php echo $row['ord']?>" id="preview_<?php echo $row['ord']?>" />
		        </div>
		      </td>
		    </tr>

		  <tr>
		    <td align="right" valign="middle" class="row-title">&nbsp;</td>
		    <td align="left" valign="middle">&nbsp;</td>
		    </tr>
		  <tr>
		    <td colspan="2" align="left" valign="middle">&nbsp;</td>
		    </tr>
		  <tr>
		    <td colspan="2" align="left" valign="middle">*Required fields</td>
		  </tr>
		  <tr>
		    <td colspan="2" align="center" valign="middle"><input name="Submit<?php echo $row['ord']?>" id="Submit<?php echo $row['ord']?>" type="submit" class="button-primary" value="Update Playlist Record"></td>
		  </tr>
		</table>    
        </form>
            <div id="ajax-message-<?php echo $row['ord']?>" class="ajax-message"></div>
    </div>
    </li>
	<?php } ?>
</ul>





</div>				