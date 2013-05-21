(function($){
  
  //ADMIN
  $(".gt_video_feed_type").live("change",function(){
    if($(this).val() == 'playlist') {
      $(this).parents("form").find(".gt_video_username").hide().find("input").val("");
      $(this).parents("form").find(".gt_video_play_list_id").show();
    } else {
      $(this).parents("form").find(".gt_video_play_list_id").hide().find("input").val("");
      $(this).parents("form").find(".gt_video_username").show();
    }
  });
  
  $(function(){
    $(".youtube-drop").youtubeGallery();
  });
}(jQuery));