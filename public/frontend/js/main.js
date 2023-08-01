$(document).ready(function(){
    $('.home-slider').slick({
	infinite: true,
    arrows: true,
    dots: false,
    prevArrow:"<img class='a-left control-c prev slick-prev' src='assets/img/left_arrow.png'>",
    nextArrow:"<img class='a-right control-c next slick-next' src='assets/img/right_arrow.png'>"
    });
    $('.testimonial_slider').slick({
        infinite: true,
        arrows: false,
        dots: false,
    });
});

$('.multiple-items').slick({
    infinite: true,

  });