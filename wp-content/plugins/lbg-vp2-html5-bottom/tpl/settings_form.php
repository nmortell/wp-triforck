<div class="wrap">
	<div id="lbg_logo">
			<h2>Player Settings for player: <span style="color:#FF0000; font-weight:bold;"><?php echo $_SESSION['xname']?> - ID #<?php echo $_SESSION['xid']?></span></h2>
 	</div>
  <form method="POST" enctype="multipart/form-data">
	<script>
	jQuery(function() {
		var icons = {
			header: "ui-icon-circle-arrow-e",
			headerSelected: "ui-icon-circle-arrow-s"
		};
		jQuery( "#accordion" ).accordion({
			icons: icons,
			autoHeight: false
		});
	});
	</script>


<div id="accordion">
  <h3><a href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;General Settings</a></h3>
  <div style="padding:30px;">
	  <table class="wp-list-table widefat fixed pages" cellspacing="0">
     
		  <tr>
		    <td align="right" valign="top" class="row-title" width="30%">Player Name</td>
		    <td align="left" valign="top" width="70%"><input name="name" type="text" size="40" id="name" value="<?php echo $_SESSION['xname'];?>"/></td>
	      </tr>
		  <tr>
            <td width="25%" align="right" valign="top" class="row-title">Player Width</td>
		    <td width="75%" align="left" valign="top"><input name="playerWidth" type="text" size="25" id="playerWidth" value="<?php echo $_POST['playerWidth'];?>"/></td>
	    </tr>
		  <tr>
		    <td align="right" valign="top" class="row-title">Player Height</td>
		    <td align="left" valign="top"><input name="playerHeight" type="text" size="25" id="playerHeight" value="<?php echo $_POST['playerHeight'];?>"/></td>
	    </tr>
		  <tr>
		    <td align="right" valign="top" class="row-title">Skin Name</td>
		    <td align="left" valign="middle"><select name="skin" id="skin">
		      <option value="universalBlack" <?php echo (($_POST['skin']=='universalBlack')?'selected="selected"':'')?>>universalBlack</option>
		      <option value="universalWhite" <?php echo (($_POST['skin']=='universalWhite')?'selected="selected"':'')?>>universalWhite</option>
		      <option value="giant" <?php echo (($_POST['skin']=='giant')?'selected="selected"':'')?>>giant</option>
		      <option value="futuristicElectricBlue" <?php echo (($_POST['skin']=='futuristicElectricBlue')?'selected="selected"':'')?>>futuristicElectricBlue</option>
		      <option value="futuristicChrome" <?php echo (($_POST['skin']=='futuristicChrome')?'selected="selected"':'')?>>futuristicChrome</option>
            </select></td>
	      </tr>
		  <tr>
		    <td align="right" valign="top" class="row-title">Seek Bar Adjust</td>
		    <td align="left" valign="middle"><input name="seekBarAdjust" type="text" size="25" id="seekBarAdjust" value="<?php echo $_POST['seekBarAdjust'];?>"/>
            <p>Recommended values: </p>
            <p>
	- universalBlack: 240<br />
- universalWhite: 240<br />
- giant: 410<br />
- futuristicElectricBlue: 285<br />
- futuristicChrome: 285</p>
            </td>
	      </tr>
		  <tr>
		    <td align="right" valign="top" class="row-title">Show Information Button</td>
		    <td align="left" valign="middle"><select name="showInfo" id="showInfo">
              <option value="true" <?php echo (($_POST['showInfo']=='true')?'selected="selected"':'')?>>true</option>
              <option value="false" <?php echo (($_POST['showInfo']=='false')?'selected="selected"':'')?>>false</option>
            </select></td>
	    </tr>
		  <tr>
		    <td align="right" valign="top" class="row-title">Preload</td>
		    <td align="left" valign="middle"><select name="preload" id="preload">
		      <option value="auto" <?php echo (($_POST['preload']=='auto')?'selected="selected"':'')?>>auto</option>
		      <option value="metadata" <?php echo (($_POST['preload']=='metadata')?'selected="selected"':'')?>>metadata</option>
		      <option value="none" <?php echo (($_POST['preload']=='none')?'selected="selected"':'')?>>none</option>
            </select></td>
	      </tr>
		  <tr>
		    <td align="right" valign="top" class="row-title">Loop Video</td>
		    <td align="left" valign="middle"><select name="loop" id="loop">
              <option value="true" <?php echo (($_POST['loop']=='true')?'selected="selected"':'')?>>true</option>
              <option value="false" <?php echo (($_POST['loop']=='false')?'selected="selected"':'')?>>false</option>
            </select></td>
	    </tr>

		  <tr>
		    <td align="right" valign="top" class="row-title">Auto Play First Movie</td>
		    <td align="left" valign="middle"><select name="autoPlayFirstMovie" id="autoPlayFirstMovie">
              <option value="true" <?php echo (($_POST['autoPlayFirstMovie']=='true')?'selected="selected"':'')?>>true</option>
              <option value="false" <?php echo (($_POST['autoPlayFirstMovie']=='false')?'selected="selected"':'')?>>false</option>
            </select></td>
	    </tr>        
		  <tr>
		    <td align="right" valign="top" class="row-title">Auto Play</td>
		    <td align="left" valign="middle"><select name="autoPlay" id="autoPlay">
              <option value="true" <?php echo (($_POST['autoPlay']=='true')?'selected="selected"':'')?>>true</option>
              <option value="false" <?php echo (($_POST['autoPlay']=='false')?'selected="selected"':'')?>>false</option>
            </select></td>
	    </tr>
		  <tr>
		    <td align="right" valign="top" class="row-title">Initial Volume Value</td>
		    <td align="left" valign="middle"><script>
	jQuery(function() {
		jQuery( "#initialVolume-slider-range-min" ).slider({
			range: "min",
			value: <?php echo $_POST['initialVolume'];?>,
			min: 0,
			max: 1,
			step: 0.1,
			slide: function( event, ui ) {
				jQuery( "#initialVolume" ).val(ui.value );
			}
		});
		jQuery( "#initialVolume" ).val( jQuery( "#initialVolume-slider-range-min" ).slider( "value" ) );
	});
	        </script>
                <div id="initialVolume-slider-range-min" class="inlinefloatleft"></div>
		      <div class="inlinefloatleft" style="padding-left:20px;">
		        <input name="initialVolume" type="text" size="10" id="initialVolume" style="border:0; color:#000000; font-weight:bold;"/>
	          </div></td>
	    </tr>
		  <tr>
		    <td align="right" valign="top" class="row-title">Border Width</td>
		    <td align="left" valign="middle"><input name="borderWidth" type="text" size="25" id="borderWidth" value="<?php echo $_POST['borderWidth'];?>"/></td>
	      </tr>
		  <tr>
		    <td align="right" valign="top" class="row-title">Border Color</td>
		    <td align="left" valign="middle"><input name="borderColor" type="text" size="25" id="borderColor" value="<?php echo $_POST['borderColor'];?>" style="background-color:#<?php echo $_POST['borderColor'];?>" />
            <script>
jQuery('#borderColor').ColorPicker({
	onSubmit: function(hsb, hex, rgb, el) {
		jQuery(el).val(hex);
		jQuery(el).css("background-color",'#'+hex);
		jQuery(el).ColorPickerHide();
	},
	onBeforeShow: function () {
		jQuery(this).ColorPickerSetColor(this.value);
	}
})
.bind('keyup', function(){
	jQuery(this).ColorPickerSetColor(this.value);
});
              </script>            </td>
	      </tr>        
      </table>
  </div>
  <h3><a href="#">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Playlist Settings</a></h3>
  <div style="padding:30px;">
	  <table class="wp-list-table widefat fixed pages" cellspacing="0">

		  <tr>
		    <td width="30%" align="right" valign="top" class="row-title">Thumbs Reflection</td>
		    <td align="left" valign="middle"><script>
	jQuery(function() {
		jQuery( "#thumbsReflection-slider-range-min" ).slider({
			range: "min",
			value: <?php echo $_POST['thumbsReflection'];?>,
			min: 0,
			max: 100,
			slide: function( event, ui ) {
				jQuery( "#thumbsReflection" ).val(ui.value );
			}
		});
		jQuery( "#thumbsReflection" ).val( jQuery( "#thumbsReflection-slider-range-min" ).slider( "value" ) );
	});
	        </script>
		      <div id="thumbsReflection-slider-range-min" class="inlinefloatleft"></div>
		      <div class="inlinefloatleft" style="padding-left:20px;">%
		        <input name="thumbsReflection" type="text" size="10" id="thumbsReflection" style="border:0; color:#000000; font-weight:bold;"/>
	          </div></td>
	      </tr>
		  <tr>
		    <td align="right" valign="top" class="row-title">NumberOf Thumbs Per Screen</td>
		    <td align="left" valign="top"><input name="numberOfThumbsPerScreen" type="text" size="25" id="numberOfThumbsPerScreen" value="<?php echo stripslashes($_POST['numberOfThumbsPerScreen']);?>"/></td>
	    </tr>

      </table>
  </div>
  
  
  
</div>

<div style="text-align:center; padding:20px 0px 20px 0px;"><input name="Submit" type="submit" id="Submit" class="button-primary" value="Update Player Settings"></div>

</form>
</div>