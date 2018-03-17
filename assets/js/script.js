$("#progressbar").progressbar({
  value: 0
});
var pbVal = 0;

$(".pgbar").on('change', function() {
    if ($(".pgbar").val() !== "") pbVal += 120;
    else pbVal -= 120;
  $("#progressbar").width(pbVal);
  return false;
});

$(document).ready(function(){
  // the body of this function is in assets/material-kit.js
  materialKit.initSliders();
        window_width = $(window).width();

        if (window_width >= 992){
            big_image = $('.wrapper > .header');

    $(window).on('scroll', materialKitDemo.checkScrollForParallax);
  }

});
