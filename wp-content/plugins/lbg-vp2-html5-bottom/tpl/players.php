<div class="wrap">
	<div id="lbg_logo">
			<h2>Manage Players</h2>
 	</div>
    <div><p>From this section you can add multiple players. When you'll insert the player into your page using the shortcode, please specify the player ID settings: <br />
Ex: [lbg_vp2_html5_bottom settings_id='1']</p>
    </div>

<div style="text-align:center; padding:0px 0px 20px 0px;"><img src="<?php echo plugins_url('images/icons/add_icon.gif', dirname(__FILE__))?>" alt="add" align="absmiddle" /> <a href="?page=LBG_VP2_HTML5_BOTTOM_Add_New">Add new (player)</a></div>
    
<table width="100%" class="widefat">

			<thead>
				<tr>
					<th scope="col" width="12%">ID</th>
					<th scope="col" width="52%">Name</th>
					<th scope="col" width="36%">Action</th>
				</tr>
			</thead>
            
<tbody>
<?php foreach ( $result as $row ) 
	{
		$row=lbg_vp2_html5_bottom_unstrip_array($row); ?>
							<tr class="alternate author-self status-publish" valign="top">
					<td><?php echo $row['id']?></td>
					<td><?php echo $row['name']?></td>				
					<td>
						<a href="?page=LBG_VP2_HTML5_BOTTOM_Settings&amp;id=<?php echo $row['id']?>&amp;name=<?php echo $row['name']?>">Player Settings</a> &nbsp;&nbsp;|&nbsp;&nbsp; 
						<a href="?page=LBG_VP2_HTML5_BOTTOM_Playlist&amp;id=<?php echo $row['id']?>&amp;name=<?php echo $row['name']?>">Playlist</a> &nbsp;&nbsp;|&nbsp;&nbsp;
                        <a href="?page=LBG_VP2_HTML5_BOTTOM_Manage_Players&id=<?php echo $row['id']?>" onclick="return confirm('Are you sure?')">Delete</a></td>
				</tr>
<?php } ?>                
						</tbody>
		</table>                





</div>				