<?php

// this is checking to make sure the plugin is being uninstalled by a Wordpress
// Admin.  This variable only contains a value ir an Admin is activating the
// uninstall script from inside Wordpress.

if (!defined('WP_UNINSTALL_PLUGIN'))
   exit();   // End the script if accessed by a non-admin
delete_option("youtube_playlist_defaults", "youtube_playlist_title");
?>