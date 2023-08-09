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
    $('.quantity').on('click', '.plus', function(e) {
        let $input = $(this).prev('input.qty');
        let val = parseInt($input.val());
        $input.val( val+1 ).change();
    });

    $('.quantity').on('click', '.minus',
        function(e) {
        let $input = $(this).next('input.qty');
        var val = parseInt($input.val());
        if (val > 0) {
            $input.val( val-1 ).change();
        }
    });
    $( "#datepicker" ).datepicker();
    $('#timepicker').timepicker({
        timeFormat: 'h:mm p',
        interval: 15,
        scrollbar: true
    });
});




 jQuery('.image-popup-vertical-fit').magnificPopup({
    type: 'image',
    mainClass: 'mfp-with-zoom',
    gallery:{
              enabled:true
          },
          zoom: {
            enabled: true,

            duration: 300, // duration of the effect, in milliseconds
            easing: 'ease-in-out', // CSS transition easing function

            opener: function(openerElement) {

              return openerElement.is('img') ? openerElement : openerElement.find('img');
          }
        }


        // $('.quantity').on('click', '.plus', function(e) {
        //     let $input = $(this).prev('input.qty');
        //     let val = parseInt($input.val());
        //     $input.val( val+1 ).change();
        // });


});

