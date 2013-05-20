=== YouTube SimpleGallery ===
Contributors: stiand
Donate link:
Tags: youtube, gallery, widgets
Requires at least: 2.5
Tested up to: 3.3
Stable tag: 1.6.1

A YouTube Gallery Plugin, that let's you add a gallery of videos to any Page or Post. Also supports Widgets.

== Installation ==
Either install from Plugins in WP Dashboard

OR 

1. Unzip the archive
2. Upload the folder "youtube-simplegallery" to "/wp-content/plugins/"
3. Activate the Plugin in the WordPress Dashboard
4. Change settings on the Options page (or use standard settings)
5. Download and install either <a href="http://wordpress.org/extend/plugins/shadowbox-js/">Shadowbox JS</a>, <a href="http://wordpress.org/extend/plugins/fancybox-for-wordpress/">Fancybox for WordPress</a> or <a href="http://wordpress.org/extend/plugins/thickbox/">Thickbox</a> if you want to show videos in a box on your site.

To add a YouTube SimpleGallery to a page or a post, simply use the following code:

	[youtubegallery]
	Avatar Trailer HD|http://www.youtube.com/watch?v=cRdxXPV9GNQ
	Call of Duty Modern Warfare: Deathmatch|http://www.youtube.com/watch?v=xqTac_O_wh4
	The Fast Show: Unlucky Alf|http://www.youtube.com/watch?v=jJK-G9-dLzw
	Jozin z bazin|http://www.youtube.com/watch?v=S4aqM_wu6Ns
	[/youtubegallery] 

To use with Widget(s), add a YouTube SimpleGallery widget to your sidebar, and put URIs (with optional titles) in the textarea.

Titles/description is optional. Add it before the link and separate with | (pipe).

Note that each URI must be separated with a linebreak.

== Description ==
This plugin let's you add a gallery of YouTube-videos to your site, displaying thumbnails for each video. With <a href="http://wordpress.org/extend/plugins/shadowbox-js/">Shadowbox JS</a>, <a href="http://wordpress.org/extend/plugins/fancybox-for-wordpress/">Fancybox for WordPress</a> or <a href="http://wordpress.org/extend/plugins/thickbox/">Thickbox</a> installed you can chose to open videos in a box on your site, rather than going to YouTube.com

To add a YouTube SimpleGallery to a Post or Page, simply use the following code:

	[youtubegallery]
	Avatar Trailer HD|http://www.youtube.com/watch?v=cRdxXPV9GNQ
	Call of Duty Modern Warfare: Deathmatch|http://www.youtube.com/watch?v=xqTac_O_wh4
	The Fast Show: Unlucky Alf|http://www.youtube.com/watch?v=jJK-G9-dLzw
	Jozin z bazin|http://www.youtube.com/watch?v=S4aqM_wu6Ns
	[/youtubegallery] 

The titles/description is optional; add them before the links and separate with | (pipe).

To use with Widget(s), add a YouTube SimpleGallery widget to your sidebar, and put URIs (with optional titles) in the textarea.

Note that each YouTube must be separated with a linebreak, also in widgets.

== Frequently Asked Questions ==

= Shadowbox/Fancybox/Thickbox doesn't work properly. What's wrong? =

Check if your current Theme has both <code>wp_head()</code> in header.php and <code>wp_footer()</code> in footer.php. Both are usually required for these scripts to function properly. Also note that some plugins aren't buddies and create conflicts with each other; try disabling the plugins for the effects you don't use.
		
= Thumbnails aren't working, I only get a gray video icon. What's up? =

Both YouTube and WordPress are in continual development, and they sometimes change things faster than <em>YouTube SimpleGallery</em> can keep up with. Check to see if there's a newer version of <em>YouTube SimpleGallery</em> available. If not, report the problem on the <a href="http://wpwizard.net/plugins/youtube-simplegallery/">plugin website</a> or in the <a href="http://wordpress.org/tags/youtube-simplegallery">WP forums</a>.</p>
		
= I got an amazing idea for a great feature! Can you implement it? Pretty please? =

The <em>YouTube SimpleGallery</em> is in constant development. A lot of features has been added since it's birth, many of them requests, wishes and ideas from the users. If you got an idea, don't hesitate to share it on the <a href="http://wpwizard.net/plugins/youtube-simplegallery/">plugin website</a>.
		
= My problem's not listed here! OMG! What do I do? =

Don't panic! The WordPress community is the best bunch of people in the world. Try posting your problem/question on the <a href="http://wpwizard.net/plugins/youtube-simplegallery/">plugin website</a> or in the <a href="http://wordpress.org/tags/youtube-simplegallery">WP forums</a>. You'll probably get help in a jiffy!
		
== Screenshots ==
1. Settings let's you set width and height of embedded video, chose if Thickbox or Shadowbox should be used (note: width and height is only necessary if Thickbox or Shadowbox is active), and use included CSS.
2. The gallery will show on your page like this
3. If Thickbox or Shadowbox is active, the embedded video will show in a box on your site

== Changelog ==
= 1.6.1 =
* Quick fix for new oEmbed in WP 3.3.

= 1.6 =
* Added option for Play-button on thumbnails.
* Bug-fix for HTML/links in titles/descriptions.

= 1.5.1 =
* Minor bugfix to conform with new oEmbed in WP 3.1.2.

= 1.5 =
* Added option for thumbnail size
* Added option for columns w/breaking rows
* Added style option for titles

= 1.4.1 =
* Fixed compatability issue with PHP 5.3.5.

= 1.4 = 
* Added support for Fancybox.
* Added option for autoplay on click.
* Changed all embedding to HTML5 compliant. 
* Remodeled Settings page.

= 1.3 =
* Fixes broken thumbs.
* Fixes broken Thickbox.
* Added HD option.
* Minor bug fixes.

= 1.2 =
* Fixes bug with broken thumbs and videos when adding titles. 

= 1.1 =
* Added option to open links in new window/tab when going directly to YouTube.com

= 1.0 =
* 1st official release. 
* Option for Shadowbox JS added. 
* Bugfixes: Fixed broken thumbnails. Fixed URIs with special characters. 

= 0.4.1 BETA =
* Minor bugfix.

= 0.4 BETA =
* Fixed issues with WP's auto embedding of YouTube-URIs, introduced in WP 2.9. 

= 0.3.1 BETA =
* Minor bugfix.

= 0.3 BETA =
* Fixed errors when showing several galleries to one Page, or when showing Home or Archives with galleries in multiple Posts.

= 0.2 BETA =
* Option to include titles/description added

= 0.1 BETA =
* First version

== Upgrade Notice ==
= 1.6 =
Added option for Play-button on thumbnails. Bug-fix for HTML/links in titles/descriptions.

= 1.5.1 =
Fixes broken thumbs with WP 3.1.2.

= 1.5 =
YouTube SimpleGallery now has options for thumbnail size and columns. 

= 1.4 =
YouTube SimpleGallery now has support for multiple Widgets. 