
function sh5vp_generateSeed() {
	var charAry = '0123456789QWERTYUIOPASDFGHJKLZXCVBNMqwertyuiopasdfghjklzxcvbnm';
	var buf = '';
	var seedLength = Math.floor(Math.random() * 60) + 20;
	for (i = 0; i < seedLength; i++) {
		buf += charAry[ Math.floor(Math.random() * charAry.length) ];
	}
	var secure_html5_video_player_key_seed = document.getElementById('secure_html5_video_player_key_seed');
	secure_html5_video_player_key_seed.value = buf;
	return false;	
}


function sh5vp_setActiveTab(tab_link_obj) {
	jQuery('.sh5vp_tab').each(function(index, elem) {
		jQuery(this).removeClass('active');
	});
	tab_link_obj.addClass('active');
	
	var targetTab = tab_link_obj.attr('rel');
	var targetLink = tab_link_obj.attr('id');
	jQuery('#last_tab_sel').val(targetLink);
	
	jQuery('.sh5vp_content_tab').each(function() {
		var curr_tab_content = jQuery(this);
		if (targetTab == curr_tab_content.attr('id')) {
			curr_tab_content.addClass('active');
			curr_tab_content.fadeIn();
			jQuery('.sh5vp_content').height(curr_tab_content.height() + 22);
		}
		else {
			curr_tab_content.removeClass('active');
			curr_tab_content.fadeOut();
		}
	});
	return false;
}


function sh5vp_initTabs() {
	jQuery('.sh5vp_content_tab').each(function() {
		var curr_tab_content = jQuery(this);
		if (! curr_tab_content.hasClass('active')) {
			curr_tab_content.fadeOut(0);
		}
	});
	jQuery('.sh5vp_tabs .sh5vp_tab').each(function() {
		jQuery(this).click(function() {
			return sh5vp_setActiveTab(jQuery(this));
		});
	});
	sh5vp_selectSkin(jQuery('#secure_html5_video_player_skin').val());
}


function sh5vp_selectSkin(skin_name) {
	jQuery('.sh5vp_skin_select').removeClass('active');
	jQuery('#sh5vp_skin_select-'+skin_name).addClass('active');
	jQuery('#secure_html5_video_player_skin').val(skin_name);
}


jQuery(window).resize(function() {
	jQuery('.sh5vp_content_tab').each(function() {
		var curr_tab_content = jQuery(this);
		if (curr_tab_content.hasClass('active')) {
			jQuery('.sh5vp_content').height(curr_tab_content.height() + 22);
		}
	});
});

