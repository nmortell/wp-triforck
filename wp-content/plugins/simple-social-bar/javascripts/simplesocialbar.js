(function($){var f=function(){var e={},ns="simplesocialbar",offset=-1,baseOffset=-1,threshold=20,buffer=40;function assignEvents(){e.window.bind('scroll.'+ns,function(){rePosition()})}function initialize(){e.horizontal=$('.'+ns+'-horizontal');e.vertical=$('.'+ns+'-vertical');e.window=$(window);offset=e.horizontal.offset();baseOffset=offset.top-buffer;if(e.horizontal.length==1){var a=(0-e.window.width()/2)+offset.left-e.vertical.width()-40;if(e.vertical.hasClass(ns+'-right')){a=(offset.left+e.horizontal.width())-e.window.width()/2+40}e.vertical.css({left:'50%',marginLeft:a});rePosition();if(e.window.scrollTop()>baseOffset+threshold){e.vertical.fadeIn(500)}else{e.vertical.css({opacity:0})}assignEvents()}}function rePosition(){var a=0;var b=e.window.scrollTop();var c=parseFloat(e.vertical.css('opacity'));if(b>baseOffset-threshold){if(b>baseOffset+threshold){a=1;if(c===1){return false}}else{if(b<baseOffset){a=(1-((baseOffset-b)/threshold))/2}else{a=(0.5+((b-baseOffset)/threshold))/2}}}else{if(c===0){return false}}var d={opacity:a};if(a===0){d.display="none"}else{d.display="block"}e.vertical.css(d)}initialize()};$(document).ready(function(){new f()})})(jQuery);