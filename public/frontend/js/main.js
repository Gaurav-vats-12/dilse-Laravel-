jQuery(document).ready(function () {
    var url = window.location.pathname;
    if (url.indexOf("/") > -1) {
        jQuery('.home-slider').slick({
            infinite: true,
            arrows: true,
            dots: false,
            prevArrow: `<img class='a-left control-c prev slick-prev' src='${jQuery('#prevArrow').val()}'>`,
            nextArrow: `<img class='a-right control-c next slick-next' src='${jQuery('#nextArrow').val()}'>`
        });

        jQuery('.testimonial_slider').slick({  infinite: true, arrows: false, dots: false, });
        jQuery('.multiple-items').slick({ infinite: true,
  });

  jQuery(document).on("submit",".contact_form",async function(e) {
    console.log('asdsad');

  });

    }


});
//     $('.home-slider').slick({
// 	infinite: true,
//     arrows: true,
//     dots: false,
//     prevArrow:"<img class='a-left control-c prev slick-prev' src='assets/img/left_arrow.png'>",
//     nextArrow:"<img class='a-right control-c next slick-next' src='assets/img/right_arrow.png'>"
//     });
//     $('.testimonial_slider').slick({
//         infinite: true,
//         arrows: false,
//         dots: false,
//     });
// });


