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
		var firstname = $("#firstname"), lastname = $("#lastname"), email = $("#email"), econfirm = $("#econfirm"), phonenumber = $("#phonenumber"), essay = $("#essay");
		var allFields = $( [] ).add( firstname ).add( lastname ).add( email ).add( econfirm ).add( phonenumber ).add( essay ); 
		var tips = $(".validateTips");
		/*is used by volunteer form to display errors*/
		function updateTips(t){
			tips.text(t).addClass("ui-state-highlight");
			setTimeout(function(){
			  tips.removeClass("ui-state-highlight", 1500);
			}, 500);
		}
		
		/*does a length check for volunteer form fields*/
		function checkLength(o, n, min, max){
			if(o.val().length > max || o.val().length < min){
			  o.addClass("ui-state-error");
			  updateTips("Length of " + n + " must be between " + min + " and " + max + ".");
			}
		}
		function checkRegexp(o, regexp, n){
			if(!(regexp.test(o.val()))){
			  o.addClass("ui-state-error");
			  updateTips(n);
			  return false;
			} else{
			    return true;
			  }
		}

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
			height:450,
			width:380,
			modal:true/*,
			buttons:{
				"submit": function(){
				  var bValid = true;
				  allFields.removeClass("ui-state-error");
				  bValid = bValid && checkLength(firstname, "first name", 3, 18);
				  bValid = bValid && checkLength(lastname, "last name", 2, 18);
			          bValid = bValid && checkLength(essay, "essay", 5, 200);
				 
				  	var dataString = 'firstname='+ firstname.val() + '&email=' + email.val() + '&phone=' + phonenumber.val();  
				
			
					  $.ajax({  
  					  type: "POST",  
  				 	  url: "wp-content/themes/mrttheme/process.php",  
  					  data: dataString,  
  					  success: function() {  
				    		$('#volunteer-form').html("<div id='message'></div>");  
    						$('#message').html("<h2>Contact Form Submitted!</h2>")  
    						.append("<p>We will be in touch soon.</p>")  
    						.hide()  
    						.fadeIn(1500, function() {  
      						  $('#message').append("<img id='checkmark' src='images/check.png' />");  
    						});  
  					  }	  
					});  
					return false;
				}
			}*/});

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
		$(".ytcplayer").css("cssText",function(i){
			var container = $(".videoplayer").width();
			var windowWidth = $(window).width();
			console.log($(document).width());
			console.log(windowWidth);
			console.log(container);
			if(windowWidth > 967){
				i = 'width: 686px !important; height: 422px !important;';
			}
			else{
				i = 'width: '+container+'px !important; padding-left:0px !important;';
			}
			return i;
		});
	});
/**********Twitter Feed Cleanup function**********************/
	$(function(){
		$('.avatar').remove();
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
