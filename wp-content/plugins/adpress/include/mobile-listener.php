<?php
/***********************************************************************
* Class: adpress_mobile_listener
*
*
* This handles the creation of the mobile listener service
*
************************************************************************/

if (! class_exists('adpress_mobile_listener')) {
    class adpress_mobile_listener {

            /******************************
             * PUBLIC PROPERTIES & METHODS
             ******************************/
            /** Adpress main plugin */
            public  $parent     = null;
            private $callback   = null;
        
            /*************************************
             * The Constructor
             */
            function __construct($params = null) {
                if ($params != null) {
                    foreach ($params as $name => $value) {
                        $this->$name = $value;
                    }
                }
            }

            /**
             * Set the parent property to point to the primary plugin object.
             *
             * Returns false if we can't get to the main plugin object.
             *
             * @global wpCSL_plugin__slplus $slplus_plugin
             * @return type boolean true if plugin property is valid
             */
            function setParent() {
                if (!isset($this->parent) || ($this->parent == null)) {
                    $this->parent = $GLOBALS['AdPress'];
                }
                return (isset($this->parent) && ($this->parent != null));
            }

            //gets all ads
            function GetAds() {
                $this->DoHeaders();
                $this->CheckErrors();
                $this->PerformSearch();

                import_request_variables("gp");
                global $adpress_plugin;

                //set the callback
                if (!isset($_REQUEST['callback'])) {
                    $callback = '';
                }
                else {
                    $callback = $_REQUEST['callback'];
                }
                $random = true;
                //set tags
                if (!isset($_REQUEST['tags'])) {
                    $tags = '';
                }
                else {
                    $tags = $_REQUEST['tags'];
                    $random = false;
                }

                //set a name
                if (!isset($_REQUEST['name'])) {
                    $name = '';
                }
                else {
                    $name = $_REQUEST['name'];
                    $random = false;
                }

                //id 
                if (!isset($_REQUEST['id'])) {
                    $id = '';
                }
                else {
                    $id = $_REQUEST['id'];
                    $random = false;
                }

                //create a params object
                $params = array(
                    'tags' => $tags,
                    'name' => $name,
                    'ID' => $id,
                    'random' => $random,
                    'callback' => $callback,
                    'apiKey' => ''
                );
                $response = new adpress_mobile_listener($params);
            }

            // Checks for errors
            function CheckErrors() {
                if ($this->callback == '') {
                    die (0);
                }

                //todo: check key here
            }

            //Reponds to the ajax request and ends wp execution
            function Respond($status, $complete) {
                die(''.$this->callback.'('.json_encode(array('success' => $status, 'response' => $complete)).');');
            }

            //Creates the headers for ajax
            function DoHeaders() {
                header('Content-Type: application/json; charset=' . get_option('blog_charset'), true);
            }

            //Returns a random post id from adpress
            function GetRandomID() {
                $postcount = wp_count_posts('adpress_ad');
                
                $post = rand(0, $postcount->publish - 1);
                
                $postInfo = get_posts( array('post_type' => 'adpress_ad'));

                return $postInfo[$post]->ID;
            }

            function PerformSearch() {
                global $wpdb, $adpress_plugin;

                if ($this->random) {
                    $this->ID = $this->GetRandomID();
                }

                // Use a shorthand to get an ID if it isn't set
                //
                if (
                    (($this->ID < 0) ||
                    ($this->ID === '')) &&
                    ($this->name != '')) {

                    $postInfo = get_posts(
                        array(
                            'post_type' => 'adpress_ad',
                            'name' => $this->name
                        )
                    );
                    $this->ID = $postInfo[0]->ID;
                }

                // If id is set, get the custom fields
                //
                if ($this->ID > 0) {

                    //post type is not an adpress ad, get out
                    //
                    if (get_post_type($this->ID != 'adpress_id')) { return; }

                    //get the image url
                    //
                    $image = wp_get_attachment_image_src(get_post_thumbnail_id($this->ID));

                    //get the href
                    $href = get_post_meta($this->ID, ADPRESS_PREFIX.'-destination');
                    $href = $href[0];

                    //Respond with the url
                    $this->Respond(true, array(
                        'href' => $href,
                        'image' => $image ));
                }
	            
                //If we came here, then we were unable to get an ad
                //
                $this->Respond(false, 'ID not found: '.$this->ID);
            }


            /**
             * Remove the Pro Pack license.
             */
            function license_reset_propack() {
                global $wpdb;

                foreach (array(
                            ADPRESS_PREFIX.'-ADPRESS-isenabled',
                            ADPRESS_PREFIX.'-ADPRESS-last_lookup',
                            ADPRESS_PREFIX.'-ADPRESS-latest-version',
                            ADPRESS_PREFIX.'-ADPRESS-latest-version-numeric',
                            ADPRESS_PREFIX.'-ADPRESS-lk',
                            ADPRESS_PREFIX.'-ADPRESS-version',
                            ADPRESS_PREFIX.'-ADPRESS-version-numeric',
                            )
                        as $optionName) {
                    $query = 'DELETE FROM '.$wpdb->prefix."options WHERE option_name='$optionName'";
                    $wpdb->query($query);
                }

                die(__('Pro Pack license has been removed. Refresh the General Settings page.', SLPLUS_PREFIX));
            }
    }
}