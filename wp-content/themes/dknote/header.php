<?php
/**
 * @package dkNote
 * @since dkNote 1.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php wp_title(); ?></title>
<meta name="viewport" content="width=device-width,initial-scale=1" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" media="all" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<section class="dhoma">
<?php wp_nav_menu( array( 
'theme_location' => 'primary', 
'container' => 'nav', 
'container_class' => 'main-nav',
'menu_id' => 'nav',
'fallback_cb' => 'dknote_default_menu' ) ); ?>
<div class="bersih"></div>
<section class="wrapper">
<?php get_template_part( 'header', 'content' ); ?>
