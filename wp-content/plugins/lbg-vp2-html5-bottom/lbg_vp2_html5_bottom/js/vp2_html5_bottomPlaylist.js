/*
 * HTML5 Video Player with Bottom Playlist v3.1
 *
 * Copyright 2012-2013, LambertGroup
 * 
*/

(function(b){b.fn.vp2_html5_bottomPlaylist_Video=function(a){var f,T,U,V,W,z=!1,u,H,X,Y,Z,$,aa,ba,ca,da,ea,I=!1,v,r,J;a=b.extend({skin:"universalBlack",initialVolume:1,showInfo:!0,autoPlayFirstMovie:!1,autoPlay:!0,loop:!0,seekBarAdjust:255,borderWidth:12,borderColor:"#e9e9e9",numberOfThumbsPerScreen:6,thumbsReflection:50,isSliderInitialized:!1,isProgressInitialized:!1},a);return this.each(function(){function K(){if(document.getElementById(f).readyState){r=document.getElementById(f).duration;s.slider({value:0, step:0.01,orientation:"horizontal",range:"min",max:r,animate:!0,slide:function(){N=!0},stop:function(b,a){N=!1;document.getElementById(f).currentTime=a.value},create:function(){a.isSliderInitialized=!0}});var b=0;w.progressbar({value:b,create:function(){a.isProgressInitialized=!0}});c.bind("progress",function(){b=document.getElementById(f).buffered.end(document.getElementById(f).buffered.length-1);0<b&&w.progressbar({value:b*w.css("width").substring(0,w.css("width").length-2)/r})});g.show()}else setTimeout(K, 200)}var c=b(this);f=c.attr("id");var g=b('<div class="VideoControls"><a class="VideoRewind" title="Rewind"></a><a class="VideoPlay" title="Play/Pause"></a><div class="VideoBuffer"></div><div class="VideoSeek"></div><a class="VideoShowHidePlaylist" title="Show/Hide Playlist"></a><a class="VideoInfoBut" title="Info"></a><div class="VideoTimer">00:00</div><div class="VolumeAll"><div class="VolumeSlider"></div><a class="VolumeButton" title="Mute/Unmute"></a></div><a class="VideoFullScreen" title="FullScreen"></a></div> <div class="VideoInfoBox"></div> <div class="thumbsHolderWrapper"><div class="thumbsHolderVisibleWrapper"><div class="thumbsHolder"></div></div></div> </div>'), d=c.parent(".vp2_html5_bottomPlaylist"),l=d.parent(".vp2_html5_bottomPlaylistBorder");d.addClass(a.skin);d.append(g);var g=b(".VideoControls",d),n=b(".VideoInfoBox",d),ka=b(".VideoRewind",d),x=b(".VideoPlay",d),w=b(".VideoBuffer",d),s=b(".VideoSeek",d),fa=b(".VideoInfoBut",d);a.showInfo||fa.addClass("hideElement");var O=b(".VideoShowHidePlaylist",d),A=b(".VideoTimer",d),ga=b(".VolumeAll",d),P=b(".VolumeSlider",d),E=b(".VolumeButton",d),F=b(".VideoFullScreen",d),e=b(".thumbsHolderWrapper",d),B=b(".thumbsHolderVisibleWrapper", d),m=b(".thumbsHolder",d),p,q;p=b('<div class="carouselLeftNav"></div>');q=b('<div class="carouselRightNav"></div>');e.append(p);e.append(q);q.css("left",e.width()-q.width()+"px");m.css("width",p.width()+"px");g.width(c.width());l.width(c.width()+2*a.borderWidth);l.height(c.height()+3*a.borderWidth+e.height());l.css("background",a.borderColor);d.css("top",a.borderWidth+"px");d.css("left",a.borderWidth+"px");s.css("width",c[0].offsetWidth-a.seekBarAdjust+"px");w.css("width",s.css("width"));n.css("width", c[0].offsetWidth-40+"px");g.hide();u=c[0].offsetWidth;H=c[0].offsetHeight;X=c.css("position");Y=c.css("left");Z=c.css("top");$=d.css("display");aa=d.css("position");ba=d.css("left");ca=d.css("top");ea=n.css("position");da=g.css("position");g.css("bottom");e.css("width",u+"px");V=l.css("position");W=l.css("z-index");T=b("body").css("margin");U=b("body").css("overflow");var C=!1,D=0,t=0,k=0,h=0,j=[];b(".xplaylist",c).children().each(function(){currentElement=b(this);h++;j[h-1]=[];j[h-1].title="";j[h- 1].desc="";j[h-1].thumb="";j[h-1].preview="";j[h-1].xsources_mp4="";j[h-1].xsources_ogv="";j[h-1].xsources_webm="";j[h-1].xsources_mp4v="";null!=currentElement.find(".xtitle").html()&&(j[h-1].title=currentElement.find(".xtitle").html());null!=currentElement.find(".xdesc").html()&&(j[h-1].desc=currentElement.find(".xdesc").html());null!=currentElement.find(".xthumb").html()&&(j[h-1].thumb=currentElement.find(".xthumb").html());null!=currentElement.find(".xpreview").html()&&(j[h-1].preview=currentElement.find(".xpreview").html()); null!=currentElement.find(".xsources_mp4").html()&&(j[h-1].sources_mp4=currentElement.find(".xsources_mp4").html());null!=currentElement.find(".xsources_ogv").html()&&(j[h-1].sources_ogv=currentElement.find(".xsources_ogv").html());null!=currentElement.find(".xsources_webm").html()&&(j[h-1].sources_webm=currentElement.find(".xsources_webm").html());null!=currentElement.find(".xsources_mp4v").html()&&(j[h-1].sources_mp4v=currentElement.find(".xsources_mp4v").html());thumbsHolder_Thumb=b('<div class="thumbsHolder_ThumbOFF" rel="'+ (h-1)+'"><img src="'+j[h-1].thumb+'"></div>');m.append(thumbsHolder_Thumb);thumbMarginLeft=Math.floor((e.width()-p.width()-q.width()-thumbsHolder_Thumb.width()*a.numberOfThumbsPerScreen)/(a.numberOfThumbsPerScreen-1));m.css("width",m.width()+thumbMarginLeft+thumbsHolder_Thumb.width()+"px");1>=h?thumbsHolder_Thumb.css("margin-left",Math.floor((e.width()-p.width()-q.width()-(thumbMarginLeft+thumbsHolder_Thumb.width())*(a.numberOfThumbsPerScreen-1)-thumbsHolder_Thumb.width())/2)+"px"):thumbsHolder_Thumb.css("margin-left", thumbMarginLeft+"px");thumbsHolder_MarginTop=parseInt((e.height()-parseInt(thumbsHolder_Thumb.css("height").substring(0,thumbsHolder_Thumb.css("height").length-2)))/2)});B.css("width",B.width()-p.width()-q.width());B.css("left",p.width());D=(thumbsHolder_Thumb.width()+thumbMarginLeft)*a.numberOfThumbsPerScreen;0===Math.floor(k/a.numberOfThumbsPerScreen)&&p.addClass("carouselLeftNavDisabled");Math.floor(k/a.numberOfThumbsPerScreen)==Math.floor(h/a.numberOfThumbsPerScreen)&&q.addClass("carouselRightNavDisabled"); e.css("top",c[0].offsetHeight+a.borderWidth+"px");0<a.thumbsReflection&&(thumbsHolder_MarginTop-=7);B=b(".thumbsHolder_ThumbOFF",d).find("img:first");B.css("margin-top",thumbsHolder_MarginTop+"px");B.reflect({opacity:a.thumbsReflection/100});p.click(function(){C||(t=m.css("left").substr(0,m.css("left").lastIndexOf("px")),0>t&&L(1))});q.click(function(){C||(t=m.css("left").substr(0,m.css("left").lastIndexOf("px")),Math.abs(t-D)<(thumbsHolder_Thumb.width()+thumbMarginLeft)*h&&L(-1))});var L=function(b){t= m.css("left").substr(0,m.css("left").lastIndexOf("px"));1===b||-1===b?(C=!0,m.css("opacity","0.5"),m.animate({opacity:1,left:"+="+b*D},500,"easeOutCubic",function(){ha();C=!1})):t!=-1*Math.floor(k/a.numberOfThumbsPerScreen)*D&&(C=!0,m.css("opacity","0.5"),m.animate({opacity:1,left:-1*Math.floor(k/a.numberOfThumbsPerScreen)*D},500,"easeOutCubic",function(){ha();C=!1}))},ha=function(){t=m.css("left").substr(0,m.css("left").lastIndexOf("px"));0>t?p.hasClass("carouselLeftNavDisabled")&&p.removeClass("carouselLeftNavDisabled"): p.addClass("carouselLeftNavDisabled");Math.abs(t-D)<(thumbsHolder_Thumb.width()+thumbMarginLeft)*h?q.hasClass("carouselRightNavDisabled")&&q.removeClass("carouselRightNavDisabled"):q.addClass("carouselRightNavDisabled")},y=b(".thumbsHolder_ThumbOFF",d);y.click(function(){var c=b(this).attr("rel");b(y[k]).removeClass("thumbsHolder_ThumbON");k=c;Q(a.autoPlay)});y.mouseenter(function(){var a=b(this);a.attr("rel");a.addClass("thumbsHolder_ThumbON")});y.mouseleave(function(){var a=b(this),c=a.attr("rel"); k!=c&&a.removeClass("thumbsHolder_ThumbON")});y.dblclick(function(){var a=b(this);a.attr("rel");a.addClass("thumbsHolder_ThumbON")});var Q=function(d){a.isSliderInitialized&&s.slider("destroy");a.isProgressInitialized&&(w.progressbar("destroy"),c.unbind("progress"));J="Infinity";document.getElementById(f).poster=j[k].preview;n.html('<p class="movieTitle">'+j[k].title+'</p><p class="movieDesc">'+j[k].desc+"</p>");var e=document.getElementById(f);b(y[k]).addClass("thumbsHolder_ThumbON");L();var h=j[k].sources_webm, g=navigator.userAgent.toLowerCase();if(-1!=g.indexOf("opera")||-1!=g.indexOf("firefox")||-1!=g.indexOf("mozzila"))h=j[k].sources_webm;if(-1!=g.indexOf("chrome")||-1!=g.indexOf("msie")||-1!=g.indexOf("safari"))h=j[k].sources_mp4;if(-1!=g.indexOf("android")||-1!=g.indexOf("opera"))h=j[k].sources_webm;if(-1!=g.indexOf("ipad")||-1!=g.indexOf("iphone")||-1!=g.indexOf("ipod")||-1!=g.indexOf("webos"))h=j[k].sources_mp4;e.src=h;document.getElementById(f).load();e=navigator.userAgent.toLowerCase();-1!=e.indexOf("ipad")|| -1!=e.indexOf("iphone")||-1!=e.indexOf("ipod")||-1!=e.indexOf("webos")||-1!=e.indexOf("android")?(d?(document.getElementById(f).play(),x.addClass("VideoPause")):x.removeClass("VideoPause"),K()):(clearInterval(J),J=setInterval(function(){0<document.getElementById(f).readyState&&(!isNaN(document.getElementById(f).duration)&&"Infinity"!=document.getElementById(f).duration)&&(r=document.getElementById(f).duration,K(),d?(document.getElementById(f).play(),x.addClass("VideoPause")):x.removeClass("VideoPause"), clearInterval(J))},700))};Q(a.autoPlayFirstMovie);ka.click(function(){document.getElementById(f).currentTime=0;document.getElementById(f).play()});var R=function(){!1==document.getElementById(f).paused?document.getElementById(f).pause():document.getElementById(f).play()};x.click(R);c.click(R);c.bind("play",function(){x.addClass("VideoPause")});c.bind("pause",function(){x.removeClass("VideoPause")});var G=navigator.userAgent.toLowerCase();-1!=G.indexOf("ipad")||(-1!=G.indexOf("iphone")||-1!=G.indexOf("ipod")|| -1!=G.indexOf("webos"))||(d.mouseover(function(){g.show()}),d.mouseout(function(){120>ga.css("height").substring(0,ga.css("height").length-2)&&g.hide()}));d.keydown(function(a){32==a.keyCode&&R()});var ia=function(){z=!1;F.removeClass("VideoFullScreenIn");F.addClass("VideoFullScreen");b(".vp2_html5_bottomPlaylist").css("display","block");b("body").css("margin",T);b("body").css("overflow",U);l.css("position",V);l.css("width",u+2*a.borderWidth+"px");l.css("height",H+3*a.borderWidth+e.height()+"px"); l.css("background",a.borderColor);l.css("z-index",W);d.css("display",$);d.css("position",aa);d.css("top",ca);d.css("left",ba);g.css("position",da);g.css("margin-bottom",0);g.width(u);s.css("width",u-a.seekBarAdjust+"px");w.css("width",s.css("width"));n.css("width",u-40+"px");n.css("position",ea);n.css("margin-bottom","0px");c.css("position",X);c.css("width",u+"px");"none"!=e.css("display")?c.css("height",H+"px"):c.css("height",H+e.height()+a.borderWidth+"px");c.css("top",Z);c.css("left",Y);e.css("margin-left", 0);e.css("top",c[0].offsetHeight+a.borderWidth+"px")};document.onkeydown=function(a){a=a||window.event;27==a.keyCode&&z&&ia()};F.click(function(){z?ia():(z=!0,F.removeClass("VideoFullScreen"),F.addClass("VideoFullScreenIn"),b("body").css("overflow","hidden"),d.css("display","block"),l.css("position","fixed"),l.css("top",0),l.css("left",0),l.css("width",window.innerWidth+"px"),l.css("height",window.innerWidth+"px"),l.css("background","#000000"),l.css("z-index","10000"),b("body").css("margin",0),d.css("position", "absolute"),d.css("top",0),d.css("left",0),g.css("position","fixed"),g.width(window.innerWidth),s.css("width",window.innerWidth-a.seekBarAdjust+"px"),w.css("width",s.css("width")),n.css("position","fixed"),n.css("width",window.innerWidth-40+"px"),"none"!=e.css("display")&&n.css("margin-bottom",e.height()+"px"),e.css("top",window.innerHeight-e.height()+"px"),e.css("margin-left",Math.round((window.innerWidth-u)/2)),c.css("position","fixed"),c.css("width",window.innerWidth+"px"),"none"!=e.css("display")? (c.css("height",window.innerHeight-e.height()+"px"),g.css("margin-bottom",e.height()+"px")):(c.css("height",window.innerHeight+"px"),g.css("margin-bottom",0)),c.css("top",0),c.css("left",0))});var S=!1;A.mouseover(function(){S=!0;v=document.getElementById(f).currentTime;r=document.getElementById(f).duration;A.text("-"+M(r-v))});A.mouseout(function(){S=!1;v=document.getElementById(f).currentTime;r=document.getElementById(f).duration;A.text(M(v))});var N=!1;K();var M=function(a){var b=10>Math.floor(a/ 60)?"0"+Math.floor(a/60):Math.floor(a/60);return b+":"+(10>Math.floor(a-60*b)?"0"+Math.floor(a-60*b):Math.floor(a-60*b))};c.bind("timeupdate",function(){v=document.getElementById(f).currentTime;r=document.getElementById(f).duration;N||s.slider("value",v);S?A.text("-"+M(r-v)):A.text(M(v))});fa.click(function(){"giant"==a.skin?"none"==n.css("display")?n.fadeIn():n.fadeOut():n.slideToggle(300)});O.click(function(){if(!I)if(I=!0,"none"!=e.css("display")){var b;b=c[0].offsetHeight+a.borderWidth+e.height(); O.addClass("VideoShowHidePlaylist_onlyShow");z&&(g.css("margin-bottom",0),n.css("margin-bottom",0));e.animate({opacity:0},150,function(){e.css("display","none")});c.animate({height:b},300,function(){I=!1})}else b=c[0].offsetHeight-a.borderWidth-e.height(),O.removeClass("VideoShowHidePlaylist_onlyShow"),z&&(g.css("margin-bottom",e.height()+"px"),n.css("margin-bottom",e.height()+"px")),e.css("display","block"),e.css("top",b+a.borderWidth+"px"),e.animate({opacity:1},600,function(){I=!1;L()}),c.animate({height:b}, 300,function(){})});c[0].addEventListener("ended",function(){a.loop&&-1==G.indexOf("android")&&(b(y[k]).removeClass("thumbsHolder_ThumbON"),k==h-1?k=0:k++,Q(a.autoPlay))},!1);var ja=1;P.slider({value:a.initialVolume,orientation:"vertical",range:"min",max:1,step:0.05,animate:!0,slide:function(a,b){document.getElementById(f).muted=!1;ja=b.value;document.getElementById(f).volume=b.value}});document.getElementById(f).volume=a.initialVolume;E.click(function(){!0==document.getElementById(f).muted?(document.getElementById(f).muted= !1,P.slider("value",ja),E.removeClass("VolumeButtonMute"),E.addClass("VolumeButton")):(document.getElementById(f).muted=!0,P.slider("value","0"),E.removeClass("VolumeButton"),E.addClass("VolumeButtonMute"))});c.removeAttr("controls")})};b.fn.vp2_html5_bottomPlaylist_Video.skins={}})(jQuery);