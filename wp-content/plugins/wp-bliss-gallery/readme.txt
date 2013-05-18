=== Bliss Gallery ===

Contributors: wpslideshow.com
Author URI:http://vm.xmlswf.com/wordpress-plugins/wp-bliss-gallery/
Tags: bliss gallery, 3d gallery, WP gallery, wordpress gallery, gallery
Requires at least: 3.0
Tested up to: 3.4.1
Stable tag: trunk

Bliss Gallery can be shown in the posts using the short code [bliss]. You can display this slideshow multiple instances. It is also possible to display specific categories and images with their ID's in this slideshow.

== Description ==

Bliss Gallery can be shown in the posts using the short code [bliss]. You can display this slideshow multiple instances. It is also possible to display specific categories and images with their ID's in this slideshow.

**Features**

* display specific categories

* display specific images

* Links to images

* bulk upload

* enable / disalbe categories and images

Installation Video: http://www.youtube.com/watch?feature=player_embedded&v=WdFTgivoens

For working demo : http://vm.xmlswf.com/wordpress-plugins/wp-bliss-gallery/


Requirements/Restrictions:
-------------------------
 * Works with Wordpress 3.0, WPMU (Wordpress 3.0+ is highly recommended)
 * PHP5 


== Installation ==

1. Install automatically through the 'Plugins', 'Add New' menu in WordPress, or upload the 'wp-carousel-slideshow' folder to the '/wp-content/plugins/' directory. 

2. Activate the plugin through the 'Plugins' menu in WordPress. Look for the Settings" under "bliss gallery" link  on left side menu to configure the Options. 


= short codes to use in content =

* <code>[bliss]</code> - Use this short code in the content / post to display all images under all categories which are not disabled.

* <code>[bliss cats=2,3]</code> - Use this short code in the content / post to display all images under the categories with ID's 2,3.

* <code>[bliss imgs=1,2,3]</code> - Use this short code in the content / post to display images which has ID's 1,2,3.

= short codes to use in template=

* <code><?php echo do_shortcode('[bliss]');?></code> - Use this short code in the template (php file) to display all images under all categories which are not disabled.

* <code><?php echo do_shortcode('[bliss cats=2,3]');?></code> - Use this short code in the template (php file) to display all images under the categories with ID's 2,3.

* <code><?php echo do_shortcode('[bliss imgs=1,2,3]');?></code> - Use this short code in the template (php file) to display images which has ID's 1,2,3.

If you facing any issues in using this plugin please contact our support at addons@wpslideshow.com

Installation Video: http://www.youtube.com/watch?feature=player_embedded&v=WdFTgivoens

For working demo : http://vm.xmlswf.com/wordpress-plugins/wp-bliss-gallery/

== Screenshots ==

1. screenshot-1.jpg - Gallery front end. 

2. screenshot-2.gif - Add new album / category.

3. screenshot-3.gif - Edit image.

4. screenshot-4.gif - bulk upload.

5. screenshot-5.gif - edit album / category.

6. screenshot-6.gif - short code to be placed in the content.



== change log ==

=1.0=
Initial released version

=2.0=
This is entirely new build. It is not possible to upgrade from old version to this version. You need to uninstall old version an dinstall the new version.

=2.1=
Where ever you place the short code, there only the slider shows. Previously it use to show on top of content.

=2.2=
Fixed security bugs