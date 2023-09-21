
jQuery(".hamburger").click(function(e){
    jQuery(this).toggleClass("is_active");
    jQuery(".menu_right").toggleClass("is_active");
    jQuery('#button').css('display','none');
    jQuery("body").toggleClass("fixedPosition");
    jQuery("body").toggleClass("disable-scrolling");
});
