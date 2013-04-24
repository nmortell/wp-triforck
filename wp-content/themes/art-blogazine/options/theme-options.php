<?php
function artblogazine_admin_enqueue_scripts( $hook_suffix ) {
wp_enqueue_style( 'artblogazine-theme-options', get_template_directory_uri() . '/options/theme-options.css', '1.0.2' );
	
}
add_action( 'admin_print_styles-appearance_page_theme_options', 'artblogazine_admin_enqueue_scripts' );
function artblogazine_theme_options_init() {
    register_setting('artblogazine_options', 'artblogazine_theme_options', 'artblogazine_theme_options_validate');
}
function artblogazine_theme_options_add_page() {
    add_theme_page(__('Theme Options', 'artblogazine'), __('Theme Options', 'artblogazine'), 'edit_theme_options', 'theme_options', 'artblogazine_theme_options_do_page');
}
if ( is_admin() && isset($_GET['activated'] ) && $pagenow == "themes.php" )
	wp_redirect( 'themes.php?page=theme_options' );
 
function artblogazine_google_verification() {
    $options = get_option('artblogazine_theme_options');
    if ($options['google_site_verification']) {
    echo '<meta name="google-site-verification" content="' . $options['google_site_verification'] . '" />' . "\n";
	}
}

function artblogazine_bing_verification() {
    $options = get_option('artblogazine_theme_options');
    if ($options['bing_site_verification']) {
        echo '<meta name="msvalidate.01" content="' . $options['bing_site_verification'] . '" />' . "\n";
	}
}
function artblogazine_theme_options_do_page() {

	if (!isset($_REQUEST['settings-updated']))
		$_REQUEST['settings-updated'] = false;
	?>
    
<?php if (false !== $_REQUEST['settings-updated']) : ?>
<div class="updated fade"><p><strong><?php _e('Options Saved', 'artblogazine'); ?></strong></p></div>
<?php endif; ?>
        <form method="post" action="options.php">
 <?php settings_fields('artblogazine_options'); ?>
   <?php $options = get_option('artblogazine_theme_options'); ?>
            

           <div id="rwd" class="row">
            <h3 class="rwd-toggle"><a href="#">Webmaster Tools</a></h3>
                                           
<div class="tiga">
<?php _e('Google Site Verification', 'artblogazine'); ?>
</div>

                    <div class="sembilan">
                        <input id="artblogazine_theme_options[google_site_verification]" class="regular-text" type="text" name="artblogazine_theme_options[google_site_verification]" value="<?php if (!empty($options['google_site_verification'])) echo esc_attr_e($options['google_site_verification']); ?>" />
                        <label class="description" for="artblogazine_theme_options[google_site_verification]"><?php _e('Enter your Google ID number only', 'artblogazine'); ?></label>
                    </div>

                
                
                <div class="tiga">
<?php _e('Bing Site Verification', 'artblogazine'); ?>
</div>
                    <div class="sembilan">
                        <input id="artblogazine_theme_options[bing_site_verification]" class="regular-text" type="text" name="artblogazine_theme_options[bing_site_verification]" value="<?php if (!empty($options['bing_site_verification'])) echo esc_attr_e($options['bing_site_verification']); ?>" />
                        <label class="description" for="artblogazine_theme_options[bing_site_verification]"><?php _e('Enter your Bing ID number only', 'artblogazine'); ?></label>
               <p class="submit">
                        <input type="submit" class="button-primary" value="<?php _e('Save Options', 'artblogazine'); ?>" />
                        </p>     

</div>                                                   
                      

                </div>

            <div id="rwd" class="row">
            <h3 class="rwd-toggle"><a href="#">Social Icons</a></h3>                                                      
 <div class="tiga">
<?php _e('Twitter', 'artblogazine'); ?>
</div>
                    <div class="sembilan">
                        <input id="artblogazine_theme_options[twitter_uid]" class="regular-text" type="text" name="artblogazine_theme_options[twitter_uid]" value="<?php if (!empty($options['twitter_uid'])) echo esc_attr_e($options['twitter_uid']); ?>" />
                        <label class="description" for="artblogazine_theme_options[twitter_uid]"><?php _e('Enter your Twitter URL', 'artblogazine'); ?></label>
                    </div>

                <div class="tiga">
<?php _e('Facebook', 'artblogazine'); ?>
</div>
                    <div class="sembilan">
                        <input id="artblogazine_theme_options[facebook_uid]" class="regular-text" type="text" name="artblogazine_theme_options[facebook_uid]" value="<?php if (!empty($options['facebook_uid'])) echo esc_attr_e($options['facebook_uid']); ?>" />
                        <label class="description" for="artblogazine_theme_options[facebook_uid]"><?php _e('Enter your Facebook URL', 'artblogazine'); ?></label>
                    </div>

                
                <div class="tiga">
<?php _e('LinkedIn', 'artblogazine'); ?>
</div>

                    <div class="sembilan">
                        <input id="artblogazine_theme_options[linkedin_uid]" class="regular-text" type="text" name="artblogazine_theme_options[linkedin_uid]" value="<?php if (!empty($options['linkedin_uid'])) echo esc_attr_e($options['linkedin_uid']); ?>" /> 
                        <label class="description" for="artblogazine_theme_options[linkedin_uid]"><?php _e('Enter your LinkedIn URL', 'artblogazine'); ?></label>
                    </div>

                    
                <div class="tiga">
<?php _e('YouTube', 'artblogazine'); ?>
</div>

                    <div class="sembilan">
                        <input id="artblogazine_theme_options[youtube_uid]" class="regular-text" type="text" name="artblogazine_theme_options[youtube_uid]" value="<?php if (!empty($options['youtube_uid'])) echo esc_attr_e($options['youtube_uid']); ?>" /> 
                        <label class="description" for="artblogazine_theme_options[youtube_uid]"><?php _e('Enter your YouTube URL', 'artblogazine'); ?></label>
                    </div>



                    
                <div class="tiga">
<?php _e('StumbleUpon', 'artblogazine'); ?>
</div>

                    <div class="sembilan">
                        <input id="artblogazine_theme_options[stumble_uid]" class="regular-text" type="text" name="artblogazine_theme_options[stumble_uid]" value="<?php if (!empty($options['stumble_uid'])) echo esc_attr_e($options['stumble_uid']); ?>" /> 
                        <label class="description" for="artblogazine_theme_options[stumble_uid]"><?php _e('Enter your StumbleUpon URL', 'artblogazine'); ?></label>
                    </div>

                    
                <div class="tiga">
<?php _e('RSS Feed', 'artblogazine'); ?>
</div>

                    <div class="sembilan">
                        <input id="artblogazine_theme_options[rss_uid]" class="regular-text" type="text" name="artblogazine_theme_options[rss_uid]" value="<?php if (!empty($options['rss_uid'])) echo esc_attr_e($options['rss_uid']); ?>" /> 
                        <label class="description" for="artblogazine_theme_options[rss_uid]"><?php _e('Enter your RSS Feed URL', 'artblogazine'); ?></label>
                    </div>

                <div class="tiga">
<?php _e('Google+', 'artblogazine'); ?>
</div>

                    <div class="sembilan">
                        <input id="artblogazine_theme_options[google_plus_uid]" class="regular-text" type="text" name="artblogazine_theme_options[google_plus_uid]" value="<?php if (!empty($options['google_plus_uid'])) echo esc_attr_e($options['google_plus_uid']); ?>" />  
                        <label class="description" for="artblogazine_theme_options[google_plus_uid]"><?php _e('Enter your Google+ URL', 'artblogazine'); ?></label>
                        
                    </div>
<div class="tiga">
<?php _e('blogger', 'artblogazine'); ?>
</div>

                    <div class="sembilan">
                        <input id="artblogazine_theme_options[blogger_uid]" class="regular-text" type="text" name="artblogazine_theme_options[blogger_uid]" value="<?php if (!empty($options['blogger_uid'])) echo esc_attr_e($options['blogger_uid']); ?>" /> 
                        <label class="description" for="artblogazine_theme_options[blogger_uid]"><?php _e('Enter your blogspot URL', 'artblogazine'); ?></label>
                    </div>
  <div class="tiga">
<?php _e('Deviantart', 'artblogazine'); ?>
</div>

                    <div class="sembilan">
                        <input id="artblogazine_theme_options[deviantart_uid]" class="regular-text" type="text" name="artblogazine_theme_options[deviantart_uid]" value="<?php if (!empty($options['deviantart_uid'])) echo esc_attr_e($options['deviantart_uid']); ?>" />  
                        <label class="description" for="artblogazine_theme_options[deviantart_uid]"><?php _e('Enter your Deviantart URL', 'artblogazine'); ?></label>
                        
                    </div>
<div class="tiga">
<?php _e('delicious', 'artblogazine'); ?>
</div>

                    <div class="sembilan">
                        <input id="artblogazine_theme_options[delicious_uid]" class="regular-text" type="text" name="artblogazine_theme_options[delicious_uid]" value="<?php if (!empty($options['delicious_uid'])) echo esc_attr_e($options['delicious_uid']); ?>" />  
                        <label class="description" for="artblogazine_theme_options[delicious_uid]"><?php _e('Enter your Delicious URL', 'artblogazine'); ?></label>
                        <p class="submit">
                        <input type="submit" class="button-primary" value="<?php _e('Save Options', 'artblogazine'); ?>" />
                        </p>
                    </div>
                </div>

</form>
<?php
}

function artblogazine_theme_options_validate($input) {			
    $input['google_site_verification'] = wp_filter_post_kses($input['google_site_verification']);
    $input['bing_site_verification'] = wp_filter_post_kses($input['bing_site_verification']);
    $input['twitter_uid'] = esc_url_raw($input['twitter_uid']);
    $input['facebook_uid'] = esc_url_raw($input['facebook_uid']);
    $input['linkedin_uid'] = esc_url_raw($input['linkedin_uid']);
    $input['youtube_uid'] = esc_url_raw($input['youtube_uid']);
    $input['stumble_uid'] = esc_url_raw($input['stumble_uid']);
    $input['blogger_uid'] = esc_url_raw($input['blogger_uid']);
    $input['rss_uid'] = esc_url_raw($input['rss_uid']);
    $input['google_plus_uid'] = esc_url_raw($input['google_plus_uid']);
    $input['deviantart_uid'] = esc_url_raw($input['deviantart_uid']);
    $input['delicious_uid'] = esc_url_raw($input['delicious_uid']);
    return $input;
}