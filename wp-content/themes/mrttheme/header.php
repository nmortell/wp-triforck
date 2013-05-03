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
<script type="text/javascript">
	$(toggleV(){
	$(.frm_form_widget).css("visibility","visible");
	$(.frm_form_widget).css("display","block");
	document.write(<b>HELLO WORLD</b>);
	throw new Error("hello world");
                        })
</script>
<?php wp_enqueue_script('jquery');?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="row-fluid">
<section class="span12">
<?php wp_nav_menu( array( 
'theme_location' => 'primary', 
'container' => 'nav', 
'container_class' => 'main-nav',
'menu_id' => 'nav',
'fallback_cb' => 'dknote_default_menu' ) ); ?>
<div class="bersih"></div>
</div>
<section class="wrapper">
<?php get_template_part( 'header', 'content' ); ?>
