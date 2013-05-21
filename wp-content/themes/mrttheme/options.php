<?php
/**
 * dkNote Theme options
 * 
 * @package dkNote
 * @since dkNote 1.0
 */

function optionsframework_option_name() {
   // This gets the theme name from the stylesheet
	$themename = get_option( 'stylesheet' );
	$themename = preg_replace("/\W/", "_", strtolower($themename) );

	$optionsframework_settings = get_option( 'optionsframework' );
	$optionsframework_settings['id'] = $themename;
	update_option( 'optionsframework', $optionsframework_settings );
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 */

function optionsframework_options() {
	$options = array();		
	$options[] = array( 
		'name'	=> __('General', 'dknote'),
		'type'	=> 'heading'
	);

	$options[] = array( 
		'name' => __('Custom Background', 'dknote'),
		'desc' => __('If you prefer to customize the background of your site, then you can do that by going to <a href="' . admin_url('themes.php?page=custom-background') . '">Custom background</a> page in administrator dashboard.', 'dknote'),
		'type' => 'info'
	);

	$options[] = array( 
		'name'	=> __('Custom Favicon', 'dknote'),
		'desc'	=> __('Upload a favicon for your website, or specify the image address of your online favicon. (http://example.com/favicon.png)', 'dknote'),
		'id'	=> 'dknote_custom_favicon',
		'type'	=> 'upload'
	);
	
	$options[] = array( 
		'name' => __('Custom CSS', 'dknote'),
		'desc' => __('Quickly add some CSS to your theme by adding it to this block.', 'dknote'),
		'id' => 'dknote_custom_css',
		'std' => '',
		'type' => 'textarea'
	);

	/* ============================== End General Settings ================================= */					

	$options[] = array( 
		'name'	=> __('Social Network', 'dknote'),
		'type'	=> 'heading'
	);
	
	$options[] = array( 
		'name'	=> __('Social settings', 'dknote'),
		'desc'	=> __('<p>You can use the box below to change the default settings of social media, and adjust custom link your social media.<br>After that specify the settings widgets on the menu <b>Appearence &raquo; Widgets &raquo; select dkNote social button</b></p><p><i>example : http://link-social-media.tld/your_username</i></p>', 'dknote'),
		'type'	=> 'info'
	);
	
	$options[] = array( 
		'name'	=> __('Facebook Username', 'dknote'),
		'desc'	=> __('ex : http://www.facebook.com/OmaGuecom', 'dknote'),
		'id'	=> 'dknote_fb_username',
		'type'	=> 'text'
	);
	
	$options[] = array( 
		'name'	=> __('Twitter Username', 'dknote'),
		'desc'	=> __('ex : http://twitter.com/dhenycahyoe', 'dknote'),
		'id'	=> 'dknote_twitter_username',
		'type'	=> 'text'
	);
	
	$options[] = array( 
		'name'	=> __('Google Plus Username', 'dknote'),
		'desc'	=> __('ex : http://gplus.to/dhenycahyoe', 'dknote'),
		'id'	=> 'dknote_gplus_username',
		'type'	=> 'text'
	);
	
	$options[] = array( 
		'name'	=> __('Tumblr Username', 'dknote'),
		'desc'	=> __('ex : http://dhenycahyoe.tumblr.com', 'dknote'),
		'id'	=> 'dknote_tumblr_username',
		'type'	=> 'text'
	);
	
	$options[] = array( 
		'name'	=> __('Github Username', 'dknote'),
		'desc'	=> __('ex : https://github.com/dhenycahyoe', 'dknote'),
		'id'	=> 'dknote_github_username',
		'type'	=> 'text'
	);
	
	$options[] = array( 
		'name'	=> __('FeedBurner Username', 'dknote'),
		'desc'	=> __('ex : http://feeds.feedburner.com/OmaGue', 'dknote'),
		'id'	=> 'dknote_feedburner_username',
		'type'	=> 'text'
	);

	/* ============================== End Social Settings ================================= */
	
	$options[] = array( 
		'name'	=> __('SEO Optimation', 'dknote'),
		'type'	=> 'heading'
	);
	$options[] = array( 
		'name'	=> __('Webmaster Tools Setting', 'dknote'),
		'desc'	=> __('You can use the boxes below to verify with the different Webmaster Tools. Only enter the meta values/content. <br>ex: <i><meta name="google-site-verification" content="<b>k3o70s7u4ZamnjJLD001100110011</b>" /></i>', 'dknote'),
		'type'	=> 'info'
	);
						
	$options[] = array( 
		'name'	=> __('Google Webmaster Tools', 'dknote'),
		'desc'	=> __('<a href=\"http://www.google.com/webmasters\">Google webmaster tools &raquo;</a>', 'dknote'),
		'id'	=> 'dknote_meta_google',
		'std' => '',
		'type'	=> 'text'
	);
						
	$options[] = array( 
		'name'	=> __('Bing Webmaster', 'dknote'),
		'desc'	=> __('<a href=\"http://www.bing.com/webmaster\">Bing webmaster &raquo;</a>', 'dknote'),
		'id'	=> 'dknote_meta_bing',
		'type'	=> 'text'
	);
						
	$options[] = array( 
		'name'	=> __('Alexa', 'dknote'),
		'desc'	=> __('<a href=\"http://www.alexa.com\">Alexa &raquo;</a>', 'dknote'),
		'id'	=> 'dknote_meta_alexa',
		'std' => '',
		'type'	=> 'text'
	);

	$options[] = array( 
		'name' 	=> __('Analytic Code', 'dknote'),
		'desc' 	=> __('Paste your Google Analytics (or other) tracking code here. It will be inserted before the closing body tag of your theme.', 'dknote'),
		'id'	=> 'dknote_analytic_code',
		'type'	=> 'textarea'
	);
						
	/* ============================== End Meta Verivication Settings ================================= */	
	
	$options[] = array( 
		'name' => __('About', 'dknote'),
		'type' => 'heading'
	);
	
	$options[] = array( 
		'name' => __('About the dkNote Themes','dknote'),
		'desc' => __( '<p>dkNote Themes HTML 5, is themes elegant, clean, simple and Responsive WordPress themes. It supports 3 widget area on the right sidebar, SEO meta settings, custom css, custom icon, custom 6 social media buttons widget. support custom menus and multi level dropdown menus, Also translation ready.</p>
		<p>If you have any problem or questions, you can post on <a href=\"http://omague.com/kontak\" target=\"_blank\"><b>dkNote Themes Support</b></a> or contact me on Twitter <a href=\"http://twitter.com/dhenycahyoe\" target=\"_blank\"><b>@dhenycahyoe</b></a>.</p>', 'dknote' ),
		'type' => 'info'
	);
	
	return $options;
}
