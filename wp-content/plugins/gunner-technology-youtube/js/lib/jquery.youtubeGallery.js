// remap jQuery to $
(function($){  
  $.fn.youtubeGallery = function(options) {
    
    if(document.location.protocol != 'http:') {
      return false;
    }
    
    $(".video_thumb figure").live('click',function() {
      $(this).find('a:first').trigger('click');
    });
    
    options = options || $(this).data() || {};
    
    var username = options.username;
    var max_videos = options.max_videos;
    var video_width = options.video_width;
    var video_height = options.video_height;
    var feed_type = options.feed_type;
    var selector = options.selector;
    var play_list_id = options.play_list_id || $("#"+selector+"-youtube-video-meta").data("playlistid");
    var thumbnail = (options.thumbnail == 'square' || options.thumbnail == 'sqDefault' ? 'sqDefault' : 'hqDefault');
    
    var has_played = $(this).data("hasloaded");
    var _this = this;
    
    var feed;
    
    if(feed_type == 'favorites') {
      feed = "http://gdata.youtube.com/feeds/api/users/"+username+"/favorites?&alt=jsonc&max-results="+max_videos;
    } else if(feed_type == 'playlists') { 
      feed = "https://gdata.youtube.com/feeds/api/users/"+username+"/playlists?orderby=position&v=2&alt=jsonc&max-results=50";
      
      $(".youtube-playlist-gallery li a").live('click',function() {
        var id = $(this).parents("li").attr("id");
        
        $(".youtube-playlist-gallery li").removeClass("selected").filter("#"+id).addClass("selected");
        $(".youtube-video-gallery").remove();
        
        $(_this).youtubeGallery({
          username: username,
          max_videos: max_videos,
          video_width: video_width,
          video_height: video_height,
          feed_type: "playlist",
          thumbnail: thumbnail,
          play_list_id: id
        });
        
        return false;
      });
      
    } else if(play_list_id) {
      feed = "http://gdata.youtube.com/feeds/api/playlists/"+play_list_id+"?v=2&alt=jsonc&orderby=published&max-results="+max_videos;
    } else {
      feed = "http://gdata.youtube.com/feeds/api/videos?author="+username+"&alt=jsonc&orderby=published&max-results="+max_videos;
    }

    $.getJSON(feed+"&v=2&callback=?",function(response) {
      if(feed_type == 'playlists') {
        $(_this).after(
          '<h5></h5><ul class="youtube-playlist-gallery" id="'+selector+'-playlist-video-gallery">'+$.map(response.data.items,function(item,i) {
            var html = '<li class="'+( i == 0 ? 'selected' : '')+' playlist" id="'+item.id+'">';

            html += '<a title="'+item.title+'" class="image-wrapper" href="https://gdata.youtube.com/feeds/api/playlists/'+item.id+'?v=2"><img src="'+item.thumbnail[thumbnail]+'" alt="'+item.title+'" /></a>';
            html += '<div class="figcaption"><h5><a title="'+item.title+'" class="play-button" href="https://gdata.youtube.com/feeds/api/playlists/'+item.id+'?v=2">'+item.title+'</a></h5>';
            html += username != item.author ? '<a class="uploader" href="http://www.youtube.com/user/'+item.author+'">'+item.author+'</a>' : '';
            html += '</div></li>';
            
            return html;
          }).join("")+'</ul>'
        );
        
        var id = $(_this).parent().find('.youtube-playlist-gallery li:first').attr("id");
        
        if(id) {
          $(_this).youtubeGallery({
            username: username,
            max_videos: max_videos,
            video_width: video_width,
            video_height: video_height,
            feed_type: "playlist",
            thumbnail: thumbnail,
            play_list_id: id
          });
        }
      } else {
        
        if(!response.data || !response.data.items) { return; }
        
        $(_this).html(
          '<div class="youtube-video-gallery" id="'+selector+'-youtube-video-gallery"><div class="youtube-video"></div><div class="youtube-video-meta"></div><ul class="videos">'+$.map(response.data.items,function(item,i){
            var item = item.video ? item.video : item;
            
            if(!item.player) { return ''; }
            
            var html = '<li class="video_thumb"><figure>';

            html += '<a title="'+item.title+'" class="fancybox.iframe play-button image-wrapper" href="'+item.player['default']+'"><img src="'+item.thumbnail[thumbnail]+'" alt="'+item.title+'" /></a>';
            html += '<div class="figcaption"><h5><a title="'+item.title+'" class="play-button" href="'+item.player['default']+'">'+item.title+'</a></h5>';
            html += (username != item.uploader || feed_type == 'favorites') ? '<a class="uploader" href="http://www.youtube.com/user/'+item.uploader+'">'+item.uploader+'</a>' : '';
            html += ' <span class="views">'+(item.viewCount||0)+' views</span>';
            html += '<p class="long-description">'+item.description+'</p>';
            html += ' <small class="duration">'+(Math.floor(item.duration/60))+':'+(item.duration%60 < 10 ? ('0'+item.duration%60) : item.duration%60)+'</small>';
            
            html += '</figure></li>';

            return html;
          }).join("")+'</ul></div>'
        );

        $(_this).find('a.play-button').click(function(){
          var swf = $(this).attr('href').replace("?v=","/v/").replace("&feature=youtube_gdata_player","").replace("/watch","");
          var img_src = $(this).find('img').attr('src');
          
          if($(_this).data('use_lightbox')) {
            swf = swf.replace("/v/","/embed/")+"?autoplay=1";
            $.fancybox.open( {type:'iframe',href : swf, title: $(this).attr("title") } );
          } else {
            $(this).parents(".youtube-video-gallery").find(".youtube-video-meta").html("<h5>"+$(this).parents('.video_thumb').find('h5').html()+"</h5>");
            $(this).parents(".youtube-video-gallery").find(".youtube-video").flash({
              swf: swf,
              width: video_width,
              height: video_height
            }).show();

            if(has_played) {
              $.scrollTo($(_this).find(".youtube-video"));
            }
          }
          
          $(_this).data("hasloaded",true);
          
          return false;
        });
        
        if(!$(_this).data('use_lightbox')) {
          $(_this).find("a.play-button:first").trigger('click');
        }
      }
    });
    
  }
})(window.jQuery);