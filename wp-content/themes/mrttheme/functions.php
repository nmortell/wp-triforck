<?php
/**
 * Including the options panel
 *
 * @since dkNote 1.0
 */
if ( !function_exists( 'optionsframework_init' ) ) {
	define( 'OPTIONS_FRAMEWORK_DIRECTORY', get_template_directory_uri() . '/inc/' );
	require_once dirname( __FILE__ ) . '/inc/options-framework.php';
}

/**
 * Including custom widget
 *
 * @since dkNote 1.0
 */
include(get_template_directory() . '/inc/dknote-social-button.php');

/**
 * Enqueue scripts
 *
 * @since dkNote 1.0
 */
add_action( 'wp_enqueue_scripts', 'dknote_enqueue_scripts' );
add_action( 'wp_head', 'dknote_print_ie_scripts');
add_action( 'wp_footer', 'dknote_selectnav_scripts');

function dknote_enqueue_scripts() {
wp_enqueue_script( 'dknote-responsive-menu', get_template_directory_uri() . '/js/selectnav.min.js', array( 'jquery' ), '1.4');

	if ( is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
 }

function dknote_print_ie_scripts() {
  ?>
<!--[if lt IE 9]> <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script> <![endif]-->
  <?php
}

function dknote_selectnav_scripts() {
  ?>
<script type='text/javascript'>selectnav('nav', {label: 'Main Menu', nested: true, indent: '&#10140;'});</script>
  <?php
}

/**
* This function removes WordPress generated category and tag atributes.
* For W3C validation purposes only.
*
* @since dkNote 1.0
*/
add_filter('wp_list_categories', 'dknote_category_rel_removal');
add_filter('the_category', 'dknote_category_rel_removal');
function dknote_category_rel_removal ($output) {
   $output = str_replace(' rel="category tag"', '', $output);
   return $output;
   }

/**
 * Setup function
 *
 * @since dkNote 1.0
 */
add_action( 'after_setup_theme', 'dknote_setup' );
function dknote_setup() {
  global $content_width;
  if ( ! isset( $content_width ) ) $content_width = 890;
  load_theme_textdomain( 'dknote', get_template_directory() . '/lang' );
  add_editor_style();
  add_theme_support( 'automatic-feed-links' );
  add_theme_support('custom-background');
  register_nav_menus( array('primary' => __( 'Primary Menu', 'dknote' ), ) );
}

/**
 * dkNote footer functions
 * source http://codex.wordpress.org/Function_Reference/do_action
 *
 * @since dkNote 1.0
*/
add_action('dknote_my_footer','dknote_footer_setup');
function dknote_footer_setup (){
?>
<div class="row-fluid">
  <div class="span3 banner bsegment1">
  </div>
  <div class="span3 banner bsegment2">
  </div>
  <div class="span3 banner bsegment3">
  </div>
  <div class="span3 banner bsegment4">
  </div>
</div>
  <div class="copyright">
   <p class="left"><?php _e( 'Copyright &copy;', 'dknote' ); ?> <?php echo date('Y'); ?> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a><br>
   <?php printf( __('Powered by <a href="http://wordpress.org/" title="%1$s">%2$s</a> | <a href="http://omague.com/" title="%3$s">%4$s Themes</a>', 'dknote'), esc_attr( 'A Semantic Personal Publishing Platform'), 'WordPress', esc_attr( 'dkNote Themes by. Deny E.Wicahyo'),'dkNote'); ?></p> 
  </div>
</section>
</section>
<?php wp_footer(); ?>
</body>
</html>
<?php
}

/**
 * Default menu fallback function
 *
 * @since dkNote 1.0
*/
function dknote_default_menu() {
	echo '<nav class="main-nav"><ul id="nav">'. wp_list_pages('title_li=&echo=0') .'</ul></nav>';
}

/**
 * Title filter by wp_title()
 *
 * @since dkNote 1.0
 */
add_filter('wp_title', 'dknote_filter_title');
function dknote_filter_title( $filter_title ){
	global $page, $paged;

	$filter_title = str_replace( '&raquo;', '', $filter_title );
	$site_description = get_bloginfo( 'description', 'display' );
	$separator = '#124';
	
	if ( is_singular() ) {
		if ( $paged >= 2 || $page >= 2 )$filter_title .=  ', ' . __( 'Page', 'dknote' ) . ' ' . max( $paged, $page );
	} else {
		if( ! is_home() )$filter_title .= ' &' . $separator . '; ';
		$filter_title .= get_bloginfo( 'name' );
		if ( $paged >= 2 || $page >= 2 )
			$filter_title .=  ', ' . __( 'Page', 'dknote' ) . ' ' . max( $paged, $page );
	}
	if ( is_home() && $site_description )
		$filter_title .= ' &' . $separator . '; ' . $site_description;
	return $filter_title;
}

/**
 * Filter content with empty post title
 *
 * @since dkNote 1.0
 */
add_filter('the_title', 'dknote_untitled');
function dknote_untitled($title) {
	if ($title == '') {
		return __('Untitled', 'dknote');
	} else {
		return $title;
	}
}

/**
 * Register Sidebar
 *
 * @since dkNote 1.0
 */
add_action( 'widgets_init', 'dknote_widgets_init');
function dknote_widgets_init() {
register_sidebar(array(
     'name' => __('Sidebar1','dknote'),
     'description' => __('Right Widget 1', 'dknote'),
     'before_widget' => '',
     'after_widget' => '',
     'before_title' => '<h3>',
     'after_title' => '</h3>'
));
register_sidebar(array(
     'name' => __('Sidebar2','dknote'),
     'description' => __('Right Widget 2', 'dknote'),
     'before_widget' => '',
     'after_widget' => '',
     'before_title' => '<h3>',
     'after_title' => '</h3>'
));
register_sidebar(array(
     'name' => __('Sidebar3','dknote'),
     'description' => __('Right Widget 3', 'dknote'),
     'before_widget' => '',
     'after_widget' => '',
     'before_title' => '<h3>',
     'after_title' => '</h3>'
));
register_sidebar(array(
     'name' => __('Sidebar4','dknote'),
     'description' => __('Right Widget 4', 'dknote'),
     'before_widget' => '',
     'after_widget' => '',
     'before_title' => '<h3>',
     'after_title' => '</h3>'
));
register_sidebar(array(
     'name' => __('Sidebar5','dknote'),
     'description' => __('Right Widget 5', 'dknote'),
     'before_widget' => '',
     'after_widget' => '',
     'before_title' => '<h3>',
     'after_title' => '</h3>'
));
register_sidebar(array(
     'name' => __('MainContent','mrt'),
     'description' =>__('Add Main content plugins here', 'mrt'),
     'before_widget' => '',
     'after_widget' => '',
     'before_title' => '<h3>',
     'after_title' => '</h3>'
));
register_sidebar(array(
     'name' => __('LeftSidebar','mrt'),
     'description' =>__('Add Main content plugins here', 'mrt'),
     'before_widget' => '',
     'after_widget' => '',
     'before_title' => '<h3>',
     'after_title' => '</h3>'
));
}

/**
 * Custom Excerpt function
 *
 * @since dkNote 1.0
 */
add_filter( 'excerpt_length', 'dknote_excerpt_length' );
add_filter( 'excerpt_more', 'dknote_auto_excerpt_more' );
add_filter( 'get_the_excerpt', 'dknote_custom_excerpt_more' );

function dknote_excerpt_length( $length ) {
	return 70;}
function dknote_continue_reading_link() {
	return ' <a class="readmore" href="'. esc_url( get_permalink() ) . '">' . __( 'Read more &#187;', 'dknote' ) . '</a>';}
function dknote_auto_excerpt_more( $more ) {
	return ' &hellip;' . dknote_continue_reading_link();}
function dknote_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= ' &hellip;'  . dknote_continue_reading_link();
	} return $output; }

/**
 * dkNote Breadcrumb functions
 *
 * I got from responsive theme by emiluzelac, thank's emil this great for bbpress 
 * bbPress compatibility patch by Dan Smith
 * 
 * @since dkNote 1.0
 */
function dknote_breadcrumb () {
  
  $dknote = '<span>&#187;</span>';
  $home = __('Home','dknote'); // text for the 'Home' link
  $before = '<a>'; // tag before the current crumb
  $after = '</a>'; // tag after the current crumb
 
  if ( !is_home() && !is_front_page() || is_paged() ) {
 
    echo '<nav class="breadcrumb">';
 
    global $post;
    $homeLink = home_url();
    echo '<a href="' . $homeLink . '">' . $home . '</a> ' . $dknote . ' ';
 
    if ( is_category() ) {
      global $wp_query;
      $cat_obj = $wp_query->get_queried_object();
      $thisCat = $cat_obj->term_id;
      $thisCat = get_category($thisCat);
      $parentCat = get_category($thisCat->parent);
      if ($thisCat->parent != 0) echo(get_category_parents($parentCat, TRUE, ' ' . $dknote . ' '));
      echo $before . __('Archive for ','dknote') . single_cat_title('', false) . $after;
 
    } elseif ( is_day() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $dknote . ' ';
      echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $dknote . ' ';
      echo $before . get_the_time('d') . $after;
 
    } elseif ( is_month() ) {
      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $dknote . ' ';
      echo $before . get_the_time('F') . $after;
 
    } elseif ( is_year() ) {
      echo $before . get_the_time('Y') . $after;
 
    } elseif ( is_single() && !is_attachment() ) {
      if ( get_post_type() != 'post' ) {
        $post_type = get_post_type_object(get_post_type());
        $slug = $post_type->rewrite;
        echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a> ' . $dknote . ' ';
        echo $before . get_the_title() . $after;
      } else {
        $cat = get_the_category(); $cat = $cat[0];
        echo get_category_parents($cat, TRUE, ' ' . $dknote . ' ');
        echo $before . get_the_title() . $after;
      }
 
    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
      $post_type = get_post_type_object(get_post_type());
      echo $before . $post_type->labels->singular_name . $after;
 
    } elseif ( is_attachment() ) {
      $parent = get_post($post->post_parent);
      $cat = get_the_category($parent->ID); $cat = $cat[0];
      echo get_category_parents($cat, TRUE, ' ' . $dknote . ' ');
      echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a> ' . $dknote . ' ';
      echo $before . get_the_title() . $after;
 
    } elseif ( is_page() && !$post->post_parent ) {
      echo $before . get_the_title() . $after;
 
    } elseif ( is_page() && $post->post_parent ) {
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();
      while ($parent_id) {
        $page = get_page($parent_id);
        $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
        $parent_id  = $page->post_parent;
      }
      $breadcrumbs = array_reverse($breadcrumbs);
      foreach ($breadcrumbs as $crumb) echo $crumb . ' ' . $dknote . ' ';
      echo $before . get_the_title() . $after;
 
    } elseif ( is_search() ) {
      echo $before . __('Search results for ','dknote') . get_search_query() . $after;
 
    } elseif ( is_tag() ) {
      echo $before . __('Posts tagged ','dknote') . single_tag_title('', false) . $after;
 
    } elseif ( is_author() ) {
       global $author;
      $userdata = get_userdata($author);
      echo $before . __('All posts by ','dknote') . $userdata->display_name . $after;
 
    } elseif ( is_404() ) {
      echo $before . __('Error 404 ','dknote') . $after;
    }
 
    if ( get_query_var('paged') ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
      echo __('Page','dknote') . ' ' . get_query_var('paged');
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
    }
 
    echo '</nav>';
 
  }
}

/**
 * Comment and trackback layout
 *
 * @since dkNote 1.0
 */
function dknote_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
	case 'pingback' :
	case 'trackback' :
?>
<li class="post pingback">
	<p><?php _e( 'Pingback:', 'dknote' ); ?> <?php  comment_author_link(); ?><?php edit_comment_link( __( 'Edit', 'dknote' ), '<span class="edit-link">', '</span>' ); ?>
	<?php
 	break; default : ?>
<li <?php comment_class(); ?> id="li-comment-<?php  comment_ID(); ?>">
<article id="comment-<?php  comment_ID(); ?>" class=comment>
<footer class="comment-meta">
<div class="comment-author vcard">
	<?php
		$avatar_size = 58;				
		if ( '0' != $comment->comment_parent )    $avatar_size = 30;
		echo get_avatar( $comment, $avatar_size );
		printf( __( '%1$s on %2$s <span class="says">said:</span>', 'dknote' ), 
		sprintf( '<span class=fn>%s</span>', get_comment_author_link() ), 
		sprintf( '<span class=time><a class=time href="%1$s"><time datetime="%2$s">%3$s</time></a></span>',        
		esc_url( get_comment_link( $comment->comment_ID ) ), get_comment_time( 'c' ), 
		sprintf( __( '%1$s at %2$s', 'dknote' ), get_comment_date(), get_comment_time() )));
	?>
	<?php edit_comment_link( __( 'Edit', 'dknote' ), '<span class="edit-link">', '</span>' ); ?>
</div>
<?php if ( $comment->comment_approved == '0' ) : ?>
<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'dknote' ); ?></em>
<br />
<?php endif; ?>
</footer>

<div class="comment-content">
	<?php comment_text(); ?>
</div>
<div class="bersih"></div>
<div class="reply">
	<?php comment_reply_link( array_merge( $args, array( 
		'reply_text' => __( 'Reply <span class="darr">&crarr;</span>', 'dknote' ), 
		'depth' => $depth, 
		'max_depth' => $args['max_depth'] ) ) ); ?>
</div>
<div class=kosong></div>
</article>
<?php
	break;
	endswitch;
}

/**
 * Page navigation
 *
 * @since dkNote 1.0
 */
function dknote_pagenavi( $p = 1 ) { // pages will be show before and after current page
  if ( is_singular() ) return; // don't show in single page
  global $wp_query, $paged;
  $max_page = $wp_query->max_num_pages;
  if ( $max_page == 1 ) return; // don't show when only one page
  if ( empty( $paged ) ) $paged = 1;
  echo '<span class="pages">'.esc_attr('Page :','dknote').'' . $paged . ' - ' . $max_page . ' </span> '; // pages
  if ( $paged > $p + 1 ) dknote_p_link( 1, ''.esc_attr('Start Page','dknote').'' );
  if ( $paged > $p + 1 ) echo '<b>... </b> ';
  for( $i = $paged - $p; $i <= $paged + $p; $i++ ) { // Middle pages
    if ( $i > 0 && $i <= $max_page ) $i == $paged ? print "<span class='page-numbers current'>{$i}</span> " : dknote_p_link( $i );
  }
  if ( $paged < $max_page - $p - 1 ) echo '<b>...</b>';
  if ( $paged < $max_page - $p ) dknote_p_link( $max_page, ''.esc_attr('Last Page','dknote').'' );
}
function dknote_p_link( $i, $title = '' ) {
  if ( $title == '' ) $title = "Page {$i}";
  echo "<a class='page-numbers' href='", esc_html( get_pagenum_link( $i ) ), "' title='{$title}'>{$i}</a> ";
}

/**
 * Content navigation
 *
 * @since dkNote 1.0
 */
function dknote_content_nav() {
	global $wp_query;

	$paged			=	( get_query_var( 'paged' ) ) ? intval( get_query_var( 'paged' ) ) : 1;
	$pagenum_link	=	get_pagenum_link();
	$url_parts		=	parse_url( $pagenum_link );
	$format			=	( get_option('permalink_structure') ) ? user_trailingslashit('<span>page/%#%</span>', 'paged') : '?paged=%#%';
	
	if ( isset($url_parts['query']) ) {
		$pagenum_link	=	"{$url_parts['scheme']}://{$url_parts['host']}{$url_parts['path']}%_%?{$url_parts['query']}";
	} else {
		$pagenum_link	.=	'%_%';
	}
	
	$links			=	paginate_links( array(
		'base'		=>	$pagenum_link,
		'format'	=>	$format,
		'total'		=>	$wp_query->max_num_pages,
		'current'	=>	$paged,
		'mid_size'	=>	2,
		'type'		=>	'list'
	) );
	
	if (!is_singular() && $links ) {
		echo "<nav id=\"page-nav\">{$links}</div><div class=\"bersih\"></nav>";
	}
	if (is_singular()){
		wp_link_pages( array( 
		'before' => '<nav id="post-pages"><span>' . __( 'Pages:', 'dknote' ) . '</span>', 
		'after' => '</nav><div class=bersih></div>' ) );
		echo '<nav class="nav-single">';
			previous_post_link('%link', '<span class="prev-post">Prev</span>');
			next_post_link('%link', '<span class="next-post">Next</span>');
		echo '</nav>';
	}
}

/**
 * Output favicon from theme options
 *
 * @since dkNote 1.0
 */
add_action('wp_head', 'dknote_custom_favicon', 5);
function dknote_custom_favicon() {
	if (of_get_option('dknote_custom_favicon'))
		echo '<link rel="shortcut icon" href="'. esc_url( of_get_option('dknote_custom_favicon') ) .'">'."\n";
}

/**
 * Output Custom CSS from theme options
 *
 * @since dkNote 1.0
 */
add_action('wp_head', 'dknote_custom_css', 10);
function dknote_custom_css() {
	$custom_css = of_get_option('dknote_custom_css');
	if ($custom_css != '') {
		echo "<!-- Custom Styling -->\n<style type=\"text/css\">\n" . esc_attr( $custom_css ) . "\n</style>\n";
	}
}

/**
 * Output Google meta verification from theme options
 *
 * @since dkNote 1.0
 */
add_action('wp_head', 'dknote_meta_google', 2);
function dknote_meta_google(){
	$output = of_get_option('dknote_meta_google');
	if ( $output ) 
		echo '<meta name="google-site-verification" content="' . esc_attr( $output ) . '"> ' . "\n";
}

/**
 * Output Bing meta verification from theme options
 *
 * @since dkNote 1.0
 */
add_action('wp_head', 'dknote_meta_bing', 2);
function dknote_meta_bing(){
	$output = of_get_option('dknote_meta_bing');
	if ( $output ) 
		echo '<meta name="msvalidate.01" content="' . esc_attr( $output ) . '"> ' . "\n";
}

/**
 * Output Alexa meta verification from theme options
 *
 * @since dkNote 1.0
 */
add_action('wp_head', 'dknote_meta_alexa', 2);
function dknote_meta_alexa(){
	$output = of_get_option('dknote_meta_alexa');
	if ( $output ) 
		echo '<meta name="alexaVerifyID" content="' . esc_attr( $output ) . '"> ' . "\n";
}

/**
 * Output analytics code in footer from theme options
 *
 * @since dkNote 1.0
 */
add_action('wp_footer','dknote_analytics'); 
function dknote_analytics(){
	$output = of_get_option('dknote_analytic_code');
	if ( $output ) 
		echo "\n" . stripslashes($output) . "\n";
}

/**
 * textarea sanitization and $allowedposttags + embed and script
 * based on theme options framework
 *
 * @since dkNote 1.0
 */
add_action('admin_init', 'dknote_change_santiziation', 100);
function dknote_change_santiziation() {
    remove_filter( 'of_sanitize_textarea', 'of_sanitize_textarea' );
    add_filter( 'of_sanitize_textarea', 'dknote_sanitize_textarea' );
}

function dknote_sanitize_textarea($input) {
    global $allowedposttags;
    $custom_allowedtags["embed"] = array(
		"src" => array(),
		"type" => array(),
		"allowfullscreen" => array(),
		"allowscriptaccess" => array(),
		"height" => array(),
			"width" => array()
		);
	$custom_allowedtags["script"] = array();
	$custom_allowedtags = array_merge($custom_allowedtags, $allowedposttags);
	$output = wp_kses( $input, $custom_allowedtags);
    return $output;
}
