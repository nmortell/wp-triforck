<?php
global $wpdb, $guni;
$ops = get_option('uni_settings', array());
//$ops = array_merge($uni_settings, $ops);
?>
<div class="wrap">
	<h2><?php _e('Create XML File'); ?></h2>
	<form action="" method="post">
		<input type="hidden" name="task" value="save_uni_settings" />
		<table>
		<tr>
			<td title="<?php _e('Gallery Width (px)'); ?>"><?php _e('Gallery Width'); ?></td>
			<td><input type="text" name="settings[gallery_width]"  value="<?php print @$ops['gallery_width']; ?>" /></td>
		</tr>
		<tr>
			<td title="<?php _e('Gallery height (px)'); ?>"><?php _e('Gallery height'); ?></td>
			<td><input type="text" name="settings[gallery_height]"  value="<?php print @$ops['gallery_height']; ?>" /></td>
		</tr>
		<tr>
			<td title="<?php _e('Gallery Bgcolor'); ?>"><?php _e('Gallery Bgcolor'); ?></td>
			<td><input type="text" name="settings[gallery_bgcolor]" class="color {hash:false,caps:true}" value="<?php print @$ops['gallery_bgcolor']; ?>" /></td>
		</tr>
		<tr>
			<td title="<?php _e('Controls X-Position'); ?>"><?php _e('Controls X-Position'); ?></td>
			<td><input type="text" name="settings[controls_x]"  value="<?php print @$ops['controls_x']; ?>" /></td>
		</tr>
		<tr>
			<td title="<?php _e('Controls Y-Position'); ?>"><?php _e('Controls Y-Position'); ?></td>
			<td><input type="text" name="settings[controls_y]"  value="<?php print @$ops['controls_y']; ?>" /></td>
		</tr>
		<tr>
			<td title="<?php _e('Auto Play'); ?>"><?php _e('Auto Play'); ?></td>
			<td>
				<input type="radio" name="settings[auto_play]" value="yes" <?php print (@$ops['auto_play'] == 'yes') ? 'checked' : ''; ?>><span><?php _e('Yes'); ?></span>
				<input type="radio" name="settings[auto_play]" value="no" <?php print (@$ops['auto_play'] == 'no') ? 'checked' : ''; ?>><span><?php _e('No'); ?></span>		
			</td>
		</tr>
		<tr>
			<td title="<?php _e('Show Price'); ?>"><?php _e('Show Price'); ?></td>
			<td>
				<input type="radio" name="settings[show_price]" value="yes" <?php print (@$ops['show_price'] == 'yes') ? 'checked' : ''; ?>><span><?php _e('Yes'); ?></span>
				<input type="radio" name="settings[show_price]" value="no" <?php print (@$ops['show_price'] == 'no') ? 'checked' : ''; ?>><span><?php _e('No'); ?></span>		
			</td>
		</tr>		
		<tr>
			<td title="<?php _e('Pricetag Width'); ?>"><?php _e('Pricetag Width'); ?></td>
			<td><input type="text" name="settings[pricetag_width]"  value="<?php print @$ops['pricetag_width']; ?>" /></td>
		</tr>
		<tr>
			<td title="<?php _e('Pricetag Height'); ?>"><?php _e('Pricetag Height'); ?></td>
			<td><input type="text" name="settings[pricetag_height]"  value="<?php print @$ops['pricetag_height']; ?>" /></td>
		</tr>
		<tr>
			<td title="<?php _e('Price Size'); ?>"><?php _e('Price Size'); ?></td>
			<td><input type="text" name="settings[price_size]"  value="<?php print @$ops['price_size']; ?>" /></td>
		</tr>
		<tr>
			<td title="<?php _e('Price Color'); ?>"><?php _e('Price Color'); ?></td>
			<td><input type="text" name="settings[price_color]" class="color {hash:false,caps:true}" value="<?php print @$ops['price_color']; ?>" /></td>
		</tr>
		<tr>
			<td title="<?php _e('Currency'); ?>"><?php _e('Currency'); ?></td>
			<td><input type="text" name="settings[currency]"  value="<?php print @$ops['currency']; ?>" /></td>
		</tr>
		<tr>
			<td title="<?php _e('Price Background Image'); ?>"><?php _e('Price Image'); ?></td>
			<td>
				<select name="settings[price_img]">
					<option value="flower_blue.png" <?php print (@$ops['price_img'] == 'flower_blue.png') ? 'selected' : ''; ?>><?php _e('Flower Blue'); ?></option>
					<option value="flower_green.png" <?php print (@$ops['price_img'] == 'flower_green.png') ? 'selected' : ''; ?>><?php _e('Flower Green'); ?></option>
					<option value="flower_mauve.png" <?php print (@$ops['price_img'] == 'flower_mauve.png') ? 'selected' : ''; ?>><?php _e('Flower Mauve'); ?></option>
					<option value="flower_red.png" <?php print (@$ops['price_img'] == 'flower_red.png') ? 'selected' : ''; ?>><?php _e('Flower Red'); ?></option>
					<option value="star_blue.png" <?php print (@$ops['price_img'] == 'star_blue.png') ? 'selected' : ''; ?>><?php _e('Star Blue'); ?></option>
					<option value="star_green.png" <?php print (@$ops['price_img'] == 'star_green.png') ? 'selected' : ''; ?>><?php _e('Star Green'); ?></option>
					<option value="star_fuchsia.png" <?php print (@$ops['price_img'] == 'star_fuchsia.png') ? 'selected' : ''; ?>><?php _e('Star Fuchsia'); ?></option>
					<option value="star_orange.png" <?php print (@$ops['price_img'] == 'star_orange.png') ? 'selected' : ''; ?>><?php _e('Star Orange'); ?></option>
					<option value="stiker_green.png" <?php print (@$ops['price_img'] == 'stiker_green.png') ? 'selected' : ''; ?>><?php _e('Stiker Green'); ?></option>
					<option value="stiker_mauve.png" <?php print (@$ops['price_img'] == 'stiker_mauve.png') ? 'selected' : ''; ?>><?php _e('Stiker Mauve'); ?></option>
					<option value="stiker_orange.png" <?php print (@$ops['price_img'] == 'stiker_orange.png') ? 'selected' : ''; ?>><?php _e('Stiker Orange'); ?></option>
					<option value="stiker_red.png" <?php print (@$ops['price_img'] == 'stiker_red.png') ? 'selected' : ''; ?>><?php _e('Stiker Red'); ?></option>		
				</select>
			</td>
		</tr>
		<tr>
			<td title="<?php _e('slideshow transition effect from '); ?>"><?php _e('Transition Effect From'); ?></td>
			<td>
				<select name="settings[transition]">
					<option value="left" <?php print (@$ops['transition'] == 'left') ? 'selected' : ''; ?>><?php _e('Left'); ?></option>
					<option value="right" <?php print (@$ops['transition'] == 'right') ? 'selected' : ''; ?>><?php _e('Right'); ?></option>
					<option value="top" <?php print (@$ops['transition'] == 'top') ? 'selected' : ''; ?>><?php _e('Top'); ?></option>
					<option value="bottom" <?php print (@$ops['transition'] == 'bottom') ? 'selected' : ''; ?>><?php _e('Bottom'); ?></option>		
				</select>
			</td>
		</tr>
		<tr>
			<td title="<?php _e('slideshow transition effect'); ?>"><?php _e('Transition Effect'); ?></td>
			<td>
				<select name="settings[transition_type]">
					<option value="easeOut" <?php print (@$ops['transition_type'] == 'easeOut') ? 'selected' : ''; ?>><?php _e('Ease Out'); ?></option>
					<option value="easeOutBounce" <?php print (@$ops['transition_type'] == 'easeOutBounce') ? 'selected' : ''; ?>><?php _e('EaseOut Bounce'); ?></option>		
				</select>
			</td>
		</tr>
		<tr>
			<td title="<?php _e('Transition delay in milli seconds'); ?>"><?php _e('Autoslider Time'); ?></td>
			<td><input type="text" name="settings[transition_delay]"  value="<?php print @$ops['transition_delay']; ?>" /></td>
		</tr>
		<tr>
			<td title="<?php _e('Transition duration in milli seconds'); ?>"><?php _e('Transition time'); ?></td>
			<td><input type="text" name="settings[transition_time]"  value="<?php print @$ops['transition_time']; ?>" /></td>
		</tr>
		<tr>
			<td title="<?php _e('Scale Image'); ?>"><?php _e('Scale Image'); ?></td>
			<td>
				<input type="radio" name="settings[image_scale]" value="yes" <?php print (@$ops['image_scale'] == 'yes') ? 'checked' : ''; ?>><span><?php _e('Yes'); ?></span>
				<input type="radio" name="settings[image_scale]" value="no" <?php print (@$ops['image_scale'] == 'no') ? 'checked' : ''; ?>><span><?php _e('No'); ?></span>		
			</td>
		</tr>
		<tr>
			<td title="<?php _e('Image 		Width'); ?>"><?php _e('Image Width'); ?></td>
			<td><input type="text" name="settings[image_width]"  value="<?php print @$ops['image_width']; ?>" /></td>
		</tr>
		<tr>
			<td title="<?php _e('Image Height'); ?>"><?php _e('Image Height'); ?></td>
			<td><input type="text" name="settings[image_height]"  value="<?php print @$ops['image_height']; ?>" /></td>
		</tr>
		<tr>
			<td title="<?php _e('Width of the menu'); ?>"><?php _e('Menu Width'); ?></td>
			<td><input type="text" name="settings[menu_width]"  value="<?php print @$ops['menu_width']; ?>" /></td>
		</tr>
		<tr>
			<td title="<?php _e('Height of the menu'); ?>"><?php _e('Menu Height'); ?></td>
			<td><input type="text" name="settings[menu_height]"  value="<?php print @$ops['menu_height']; ?>" /></td>
		</tr>
		<tr>
			<td title="<?php _e('Space between menus'); ?>"><?php _e('Space between menus'); ?></td>
			<td><input type="text" name="settings[space_bet_menu]"  value="<?php print @$ops['space_bet_menu']; ?>" /></td>
		</tr>
		<tr>
			<td title="<?php _e('Menu color'); ?>"><?php _e('Menu color'); ?></td>
			<td><input type="text" name="settings[menu_color]" class="color {hash:false,caps:true}" value="<?php print @$ops['menu_color']; ?>" /></td>
		</tr>


		<tr>
			<td title="<?php _e('Menu Hover color'); ?>"><?php _e('Menu Overcolor'); ?></td>
			<td><input type="text" name="settings[menuover_color]" class="color {hash:false,caps:true}" value="<?php print @$ops['menuover_color']; ?>" /></td>
		</tr>
		<tr>
			<td title="<?php _e('Menu Textsize'); ?>"><?php _e('Menu Text Size'); ?></td>
			<td><input type="text" name="settings[menutext_size]"  value="<?php print @$ops['menutext_size']; ?>" /></td>
		</tr>
		<tr>
			<td title="<?php _e('Menu Text Color'); ?>"><?php _e('Menu Text Color'); ?></td>
			<td><input type="text" name="settings[menutext_color]" class="color {hash:false,caps:true}" value="<?php print @$ops['menutext_color']; ?>" /></td>
		</tr>
		<tr>
			<td title="<?php _e('Menu Text Over Color'); ?>"><?php _e('Menu Text Over Color'); ?></td>
			<td><input type="text" name="settings[menutext_over_color]" class="color {hash:false,caps:true}" value="<?php print @$ops['menutext_over_color']; ?>" /></td>
		</tr>

		<tr>
			<td title="<?php _e('Menu Texture'); ?>"><?php _e('Menu Texture'); ?></td>
			<td>
				<select name="settings[menu_item_show_texture]">
					<option value="true" <?php print (@$ops['menu_item_show_texture'] == 'true') ? 'selected' : ''; ?>><?php _e('Show'); ?></option>
					<option value="false" <?php print (@$ops['menu_item_show_texture'] == 'false') ? 'selected' : ''; ?>><?php _e('Hide'); ?></option>		
				</select>
			</td>
		</tr>

		<tr>
			<td title="<?php _e('Show Description'); ?>"><?php _e('Show Description'); ?></td>
			<td>
				<select name="settings[showdesc]">
					<option value="yes" <?php print (@$ops['showdesc'] == 'yes') ? 'selected' : ''; ?>><?php _e('Yes'); ?></option>
					<option value="no" <?php print (@$ops['showdesc'] == 'no') ? 'selected' : ''; ?>><?php _e('No'); ?></option>		
				</select>
			</td>
		</tr>
		<tr>
			<td title="<?php _e('Description Color'); ?>"><?php _e('Description Color'); ?></td>
			<td><input type="text" name="settings[desc_color]" class="color {hash:false,caps:true}" value="<?php print @$ops['desc_color']; ?>" /></td>
		</tr>
		<tr>
			<td title="<?php _e('Description Size'); ?>"><?php _e('Description Size'); ?></td>
			<td><input type="text" name="settings[desc_size]"  value="<?php print @$ops['desc_size']; ?>" /></td>
		</tr>
		<tr>
			<td title="<?php _e('Description Bgcolor'); ?>"><?php _e('Description Bgcolor'); ?></td>
			<td><input type="text" name="settings[descbg_color]" class="color {hash:false,caps:true}" value="<?php print @$ops['descbg_color']; ?>" /></td>
		</tr>
		<tr>
			<td title="<?php _e('Value can vary from 0 to 1'); ?>"><?php _e('Description Bgcolor alpha'); ?></td>
			<td>
				<select name="settings[descbg_alpha]">
					<option value="0" <?php print (@$ops['descbg_alpha'] == '0') ? 'selected' : ''; ?>><?php _e('0'); ?></option>
					<option value="0.1" <?php print (@$ops['descbg_alpha'] == '0.1') ? 'selected' : ''; ?>><?php _e('0.1'); ?></option>
					<option value="0.2" <?php print (@$ops['descbg_alpha'] == '0.2') ? 'selected' : ''; ?>><?php _e('0.2'); ?></option>
					<option value="0.3" <?php print (@$ops['descbg_alpha'] == '0.3') ? 'selected' : ''; ?>><?php _e('0.3'); ?></option>
					<option value="0.4" <?php print (@$ops['descbg_alpha'] == '0.4') ? 'selected' : ''; ?>><?php _e('0.4'); ?></option>
					<option value="0.5" <?php print (@$ops['descbg_alpha'] == '0.5') ? 'selected' : ''; ?>><?php _e('0.5'); ?></option>
					<option value="0.6" <?php print (@$ops['descbg_alpha'] == '0.6') ? 'selected' : ''; ?>><?php _e('0.6'); ?></option>
					<option value="0.7" <?php print (@$ops['descbg_alpha'] == '0.7') ? 'selected' : ''; ?>><?php _e('0.7'); ?></option>
					<option value="0.8" <?php print (@$ops['descbg_alpha'] == '0.8') ? 'selected' : ''; ?>><?php _e('0.8'); ?></option>
					<option value="0.9" <?php print (@$ops['descbg_alpha'] == '0.9') ? 'selected' : ''; ?>><?php _e('0.9'); ?></option>
					<option value="1" <?php print (@$ops['descbg_alpha'] == '1') ? 'selected' : ''; ?>><?php _e('1'); ?></option>		
				</select>
			</td>
		</tr>
		<tr>
			<td title="<?php _e('Pagination Button X-Position'); ?>"><?php _e('Pagination Button X-Position'); ?></td>
			<td><input type="text" name="settings[pagerbut_x]"  value="<?php print @$ops['pagerbut_x']; ?>" /></td>
		</tr>
		<tr>
			<td title="<?php _e('Pagination Button Y-Position'); ?>"><?php _e('Pagination Button Y-Position'); ?></td>
			<td><input type="text" name="settings[pagerbut_y]"  value="<?php print @$ops['pagerbut_y']; ?>" /></td>
		</tr>
		<tr>
			<td title="<?php _e('Pagination Button color'); ?>"><?php _e('Pagination Button color'); ?></td>
			<td><input type="text" name="settings[pagerbut_color]" class="color {hash:false,caps:true}" value="<?php print @$ops['pagerbut_color']; ?>" /></td>
		</tr>
		<tr>
			<td title="<?php _e('Pagination Button over color'); ?>"><?php _e('Pagination Button Over color'); ?></td>
			<td><input type="text" name="settings[pagerbut_over_color]" class="color {hash:false,caps:true}" value="<?php print @$ops['pagerbut_over_color']; ?>" /></td>
		</tr>
		<tr>
			<td title="<?php _e('Next and Prev Buttons color.'); ?>"><?php _e('Next and Prev Buttons color'); ?></td>
			<td><input type="text" name="settings[control_color]" class="color {hash:false,caps:true}" value="<?php print @$ops['control_color']; ?>" /></td>
		</tr>
		<tr>
			<td title="<?php _e('Next and Prev Buttons over color.'); ?>"><?php _e('Next and Prev Buttons Over color'); ?></td>
			<td><input type="text" name="settings[control_over_color]" class="color {hash:false,caps:true}" value="<?php print @$ops['control_over_color']; ?>" /></td>
		</tr>
		<tr>
			<td title="<?php _e('Play/Pause Buttons color.'); ?>"><?php _e('Play/Pause Buttons color'); ?></td>
			<td><input type="text" name="settings[control_playpause_color]" class="color {hash:false,caps:true}" value="<?php print @$ops['control_playpause_color']; ?>" /></td>
		</tr>
		<tr>
			<td title="<?php _e('Play/Pause Buttons Over color.'); ?>"><?php _e('Play/Pause Buttons Over color'); ?></td>
			<td><input type="text" name="settings[control_playpause_overcolor]" class="color {hash:false,caps:true}" value="<?php print @$ops['control_playpause_overcolor']; ?>" /></td>
		</tr>
		<tr>
			<td title="<?php _e('slideimage loader color.'); ?>"><?php _e('slideimage loader color'); ?></td>
			<td><input type="text" name="settings[control_loader_color]" class="color {hash:false,caps:true}" value="<?php print @$ops['control_loader_color']; ?>" /></td>
		</tr>
		<tr>
			<td title="<?php _e('slideimage loaderpanel color.'); ?>"><?php _e('slideimage loaderpanel color'); ?></td>
			<td><input type="text" name="settings[control_loaderpanel_color]" class="color {hash:false,caps:true}" value="<?php print @$ops['control_loaderpanel_color']; ?>" /></td>
		</tr>
		<tr>
			<td title="<?php _e('Snow Effect Type.'); ?>"><?php _e('Snow Effect Type'); ?></td>
			<td>
				<select name="settings[snoweffect_type]">
					<option value="0" <?php print (@$ops['snoweffect_type'] == '0') ? 'selected' : ''; ?>><?php _e('No Snow Effect'); ?></option>
					<option value="1" <?php print (@$ops['snoweffect_type'] == '1') ? 'selected' : ''; ?>><?php _e('Type 1'); ?></option>
					<option value="2" <?php print (@$ops['snoweffect_type'] == '2') ? 'selected' : ''; ?>><?php _e('Type 2'); ?></option>
					<option value="3" <?php print (@$ops['snoweffect_type'] == '3') ? 'selected' : ''; ?>><?php _e('Type 3'); ?></option>
				</select>
			</td>
		</tr>
		<tr>
			<td title="<?php _e('Size of the small particle.'); ?>"><?php _e('Small particle size'); ?></td>
			<td><input type="text" name="settings[min_particle_size]"  value="<?php print @$ops['min_particle_size']; ?>" /></td>
		</tr>
		<tr>
			<td title="<?php _e('Size of the Big particle.'); ?>"><?php _e('Big particle size'); ?></td>
			<td><input type="text" name="settings[max_particle_size]"  value="<?php print @$ops['max_particle_size']; ?>" /></td>
		</tr>
		<tr>
			<td title="<?php _e('Small particles speed in Y-direction.'); ?>"><?php _e('Small particle Y-speed'); ?></td>
			<td><input type="text" name="settings[min_particle_yspeed]"  value="<?php print @$ops['min_particle_yspeed']; ?>" /></td>
		</tr>
		<tr>
			<td title="<?php _e('Big particles speed in Y-direction.'); ?>"><?php _e('Big particle Y-speed'); ?></td>
			<td><input type="text" name="settings[max_particle_yspeed]"  value="<?php print @$ops['max_particle_yspeed']; ?>" /></td>
		</tr>
		<tr>
			<td title="<?php _e('Small particles speed in X-direction.'); ?>"><?php _e('Small particle X-speed'); ?></td>
			<td><input type="text" name="settings[min_particle_xspeed]"  value="<?php print @$ops['min_particle_xspeed']; ?>" /></td>
		</tr>
		<tr>
			<td title="<?php _e('Big particles speed in X-direction.'); ?>"><?php _e('Big particle X-speed'); ?></td>
			<td><input type="text" name="settings[max_particle_xspeed]"  value="<?php print @$ops['max_particle_xspeed']; ?>" /></td>
		</tr>
		<tr>
			<td title="<?php _e('Number of particles.'); ?>"><?php _e('Number of particles'); ?></td>
			<td><input type="text" name="settings[noof_particles]"  value="<?php print @$ops['noof_particles']; ?>" /></td>
		</tr>
		<tr>
			<td title="<?php _e('Value can vary from 0 to 1'); ?>"><?php _e('Small Particle alpha'); ?></td>
			<td>
				<select name="settings[min_particle_alpha]">
					<option value="0" <?php print (@$ops['min_particle_alpha'] == '0') ? 'selected' : ''; ?>><?php _e('0'); ?></option>
					<option value="0.1" <?php print (@$ops['min_particle_alpha'] == '0.1') ? 'selected' : ''; ?>><?php _e('0.1'); ?></option>
					<option value="0.2" <?php print (@$ops['min_particle_alpha'] == '0.2') ? 'selected' : ''; ?>><?php _e('0.2'); ?></option>
					<option value="0.3" <?php print (@$ops['min_particle_alpha'] == '0.3') ? 'selected' : ''; ?>><?php _e('0.3'); ?></option>
					<option value="0.4" <?php print (@$ops['min_particle_alpha'] == '0.4') ? 'selected' : ''; ?>><?php _e('0.4'); ?></option>
					<option value="0.5" <?php print (@$ops['min_particle_alpha'] == '0.5') ? 'selected' : ''; ?>><?php _e('0.5'); ?></option>
					<option value="0.6" <?php print (@$ops['min_particle_alpha'] == '0.6') ? 'selected' : ''; ?>><?php _e('0.6'); ?></option>
					<option value="0.7" <?php print (@$ops['min_particle_alpha'] == '0.7') ? 'selected' : ''; ?>><?php _e('0.7'); ?></option>
					<option value="0.8" <?php print (@$ops['min_particle_alpha'] == '0.8') ? 'selected' : ''; ?>><?php _e('0.8'); ?></option>
					<option value="0.9" <?php print (@$ops['min_particle_alpha'] == '0.9') ? 'selected' : ''; ?>><?php _e('0.9'); ?></option>
					<option value="1" <?php print (@$ops['min_particle_alpha'] == '1') ? 'selected' : ''; ?>><?php _e('1'); ?></option>		
				</select>
			</td>
		</tr>
		<tr>
			<td title="<?php _e('Value can vary from 0 to 1'); ?>"><?php _e('Big Particle alpha'); ?></td>
			<td>
				<select name="settings[max_particle_alpha]">
					<option value="0" <?php print (@$ops['max_particle_alpha'] == '0') ? 'selected' : ''; ?>><?php _e('0'); ?></option>
					<option value="0.1" <?php print (@$ops['max_particle_alpha'] == '0.1') ? 'selected' : ''; ?>><?php _e('0.1'); ?></option>
					<option value="0.2" <?php print (@$ops['max_particle_alpha'] == '0.2') ? 'selected' : ''; ?>><?php _e('0.2'); ?></option>
					<option value="0.3" <?php print (@$ops['max_particle_alpha'] == '0.3') ? 'selected' : ''; ?>><?php _e('0.3'); ?></option>
					<option value="0.4" <?php print (@$ops['max_particle_alpha'] == '0.4') ? 'selected' : ''; ?>><?php _e('0.4'); ?></option>
					<option value="0.5" <?php print (@$ops['max_particle_alpha'] == '0.5') ? 'selected' : ''; ?>><?php _e('0.5'); ?></option>
					<option value="0.6" <?php print (@$ops['max_particle_alpha'] == '0.6') ? 'selected' : ''; ?>><?php _e('0.6'); ?></option>
					<option value="0.7" <?php print (@$ops['max_particle_alpha'] == '0.7') ? 'selected' : ''; ?>><?php _e('0.7'); ?></option>
					<option value="0.8" <?php print (@$ops['max_particle_alpha'] == '0.8') ? 'selected' : ''; ?>><?php _e('0.8'); ?></option>
					<option value="0.9" <?php print (@$ops['max_particle_alpha'] == '0.9') ? 'selected' : ''; ?>><?php _e('0.9'); ?></option>
					<option value="1" <?php print (@$ops['max_particle_alpha'] == '1') ? 'selected' : ''; ?>><?php _e('1'); ?></option>		
				</select>
			</td>
		</tr>
		<tr>
			<td title="<?php _e('Small particles blur.'); ?>"><?php _e('Small particle blur'); ?></td>
			<td><input type="text" name="settings[min_particle_blur]"  value="<?php print @$ops['min_particle_blur']; ?>" /></td>
		</tr>
		<tr>
			<td title="<?php _e('Big particles blur.'); ?>"><?php _e('Big particle blur'); ?></td>
			<td><input type="text" name="settings[max_particle_blur]"  value="<?php print @$ops['max_particle_blur']; ?>" /></td>
		</tr>
		<tr>
			<td title="<?php _e('Image Link Target'); ?>"><?php _e('Link Target'); ?></td>
			<td>
				<select name="settings[target]">
					<option value="new" <?php print (@$ops['target'] == 'new') ? 'selected' : ''; ?>><?php _e('New Window'); ?></option>
					<option value="current" <?php print (@$ops['target'] == 'current') ? 'selected' : ''; ?>><?php _e('Same Window'); ?></option>		
				</select>
			</td>
		</tr>
		<tr>
			<td title="<?php _e('Select the wmode of flash'); ?>"><?php _e('wmode'); ?></td>
			<td>
				<select name="settings[wmode]">
					<option value="opaque" <?php print (@$ops['wmode'] == 'opaque') ? 'selected' : ''; ?>><?php _e('opaque'); ?></option>
					<option value="transparent" <?php print (@$ops['wmode'] == 'transparent') ? 'selected' : ''; ?>><?php _e('transparent'); ?></option>
					<option value="window" <?php print (@$ops['wmode'] == 'window') ? 'selected' : ''; ?>><?php _e('window'); ?></option>
				</select>
			</td>
		</tr>
		</table>
	<p><button type="submit" class="button-primary"><?php _e('Save Config'); ?></button></p>
	</form>
</div>