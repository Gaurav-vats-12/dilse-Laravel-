$(".hamburger").click(function(e){
    $(this).toggleClass("is_active");
    $(".menu_right").toggleClass("is_active");
    $("body").toggleClass("disable-scrolling");
  });
