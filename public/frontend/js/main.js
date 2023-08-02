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

  jQuery(document).on("submit","#conatact_cus_form",async function(e) {
    e.preventDefault();
    var ajax_value_list = $(this).serialize();
    var ajx_url = jQuery('#contact_us_action_url').val();
    const resPose = await Ajax_response(ajx_url,"POST",ajax_value_list,'');
    if(resPose.status =='success'){
        if(resPose.status =='success'){
            Toast.fire({
                icon: 'success',
                title: resPose.message,
              })
              $("#conatact_cus_form")[0].reset();
          }

    }else{
        jQuery.each(resPose.errors, function (key, value) {
            jQuery(`#${key}-error`).text(value);
          });
    }
    });

    jQuery(document).on("submit","#emailSubscribeForm",async function(e) {
        e.preventDefault();
        var ajax_value_list = $(this).serialize();
        var ajx_url = jQuery('#email_action_url').val();
        const resPose = await Ajax_response(ajx_url,"POST",ajax_value_list,'');
        console.log(resPose);
        if(resPose.status =='success'){
            console.log('asdsad');
            Toast.fire({
                icon: 'success',
                title: resPose.message,
              })
              location.reload();

        } else if(resPose.status =='error'){
            Toast.fire({
                icon: 'warning',
                title: resPose.message
              })
              $("#emailSubscribeForm")[0].reset();
        }else{
            jQuery.each(resPose.errors, function (key, value) {
                jQuery(`#${key}-error`).text(value);
              });
        }
    });


    }
    jQuery("#phone").on("keypress keyup blur",function (event) {
        jQuery(this).val($(this).val().replace(/[^0-9\.]/g,''));
           if ((e.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
               event.preventDefault();
           }
     });


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


