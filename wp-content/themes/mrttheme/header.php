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
<link rel="stylesheet" type="text/css" href="<?php echo get_theme_root_uri(); ?>/mrttheme/MyFontsWebfontsKit.css"/>
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" media="all" />
<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css"/>

<?php wp_enqueue_script('jquery');?>
<?php wp_enqueue_script('jquery-ui-core');?>
 <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
 <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
<script type="text/javascript">
        $(function(){
		$('#volunteer-form').dialog({
			autoOpen:false,
			show:{
			  effect:"clip",
			  duration:1000	
			},
			hide:{
			  effect:"explode",
			  duration:1000  
			},
			height:520,
			width:785,
			modal:true
			});

		$("#volunteer-btn").button().click(function(){
	  		$("#volunteer-form").dialog("open");	 
		});
	});
	/*keeps the slider centered*/
	$(function(){
		$(".flexslider").css("left", function(i){
			var sliderWidth = $(".slider").width();
			var flexWidth = $(".flexslider").width();
			if(sliderWidth <= flexWidth){
				i = 0;
			}
			else{
			i = ($(".slider").width()/2)-($(".flexslider").width()/2);
			}
			return i;
		});	
	});
	$(function(){
		var container = $(".videoplayer").width();
		var windowWidth = $(window).width();
		$(".ytcplayer").css("cssText",function(i){
			if(windowWidth > 967){
				i = 'width: 686px !important; height: 422px !important;';
			}
			else{
				i = 'width: '+container+'px !important; padding-left:0px !important;';
			}
			return i;
		});
		$(".adjust").css("cssText", function(i){
			if(windowWidth > 967){
				i = 'padding-left: 42px !important; width:686px;';
			}
			else{
				i = 'padding-left:0px !important; width: '+container+';';
			}
			return i;
		});
		$('.mr_social_sharing_wrapper').css("cssText",function(i){
			if(windowWidth >967 ){
				i = 'left:-42.5% !important;';
			}
			else{
				i = 'left:-48.5% !important;';
			}
			return i;
		});
	});
/**********Twitter Feed Cleanup function**********************/
	$(function(){
		$('.avatar').remove();
	});
/*********************nav pointer functions*******************/
	$(function(){
                        var home = $(".menu li a:contains('Home')").parent();
                        var home_project = $(".menu li a:contains('Home Projects')").parent();
                        var community = $(".menu li a:contains('Community Projects')").parent();
                        console.log(window.location.pathname);
			console.log(window.location.search);
                        if('' == window.location.search){
				home.removeClass('nav-pointer');
				home_project.removeClass('nav-pointer');
				community.removeClass('nav-pointer');
                                home.addClass('nav-pointer');
                        }
                        else if('?page_id=2' == window.location.search){
				home.removeClass('nav-pointer');
                                home_project.removeClass('nav-pointer');
                                community.removeClass('nav-pointer');
                                home_project.addClass('nav-pointer');
                        }
			else if('?page_id=122' == window.location.search){
				home.removeClass('nav-pointer');
                                home_project.removeClass('nav-pointer');
                                community.removeClass('nav-pointer');
                                community.addClass('nav-pointer');
			}
                });
/**********change social share email img***********************/
	$(function(){
		$('div.mr_social_sharing_wrapper img').each(function(){
			if($(this).attr('alt')=='Share via email'){
				$(this).parent().replaceWith('<?php if(function_exists('instaemail_show_link')){echo instaemail_show_link();} ?>');
			}
		});
	});
/***********video jquery gallery*******************************/
	$(function(){
		$('.ytchagallery').before("<div style='height:20px !important; width:100% !important;'><img class='prev-gallery'src='<?php echo get_template_directory_uri(); ?>/images/prev-horizontal.png'/></div>");
	$('.ytchagallery').after("<div style='height:20px !important; width:100% !important;'><img class='next-gallery'src='<?php echo get_template_directory_uri();?>/images/next-horizontal.png'/></div>");
	});
</script>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="nav-color"></div>
<div class="container">
<div class="row">
<section>
<div class="mrt-nav offset1">
<?php wp_nav_menu( array( 
'theme_location' => 'primary', 
'container' => 'nav', 
'container_class' => 'main-nav',
'menu_id' => 'nav',
'fallback_cb' => 'dknote_default_menu' ) ); ?>
<div class="bersih"></div>
</div>
</div>
<section class="wrapper">
<?php get_template_part( 'header', 'content' ); ?>
