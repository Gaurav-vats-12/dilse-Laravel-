jQuery(document).ready(function () {



    jQuery('.row.Product_slider').slick({
    dots: false,
    infinite: true,
    speed: 300,
    slidesToShow: 3,
    slidesToScroll: 1

  });
  jQuery('.testimonial_slider').slick({
    infinite: true,
    arrows: false,
    dots: false,
});
// Menu
jQuery(document).on("click","#menu",async function(e) {
    jQuery('.loader').removeClass('display');
    e.preventDefault();
    var slug =  jQuery(this).attr("menu-slug");
    var page = 1;
    var ajax_value ={slug,page};
    const response = await Ajax_response('',"GET",ajax_value,'','');
    if (response) {
        $("#menu_data_find").empty().html(response);
        jQuery('.loader').addClass('display')
    }
});
jQuery(document).on('click', '.pagination a', async function(event){
    event.preventDefault();
    jQuery('.loader').removeClass('display');
    jQuery('li').removeClass('active');
    jQuery(this).parent('li').addClass('active');
    var slug =  jQuery('#slug').val();
    var page=$(this).attr('href').split('page=')[1];
    var ajax_value ={slug,page};
    const response = await Ajax_response('',"GET",ajax_value,'','');
    if (response) {
        $("#menu_data_find").empty().html(response);
        // jQuery('.loader').addClass('display')
        window.scrollTo(400, 400);
    }

});
// Contact Us Form
  jQuery(document).on("submit","#conatact_cus_form",async function(e) {
    e.preventDefault();
    var ajax_value_list = $(this).serialize();
    var ajx_url = jQuery('#contact_us_action_url').val();
    const resPose = await Ajax_response(ajx_url,"POST",ajax_value_list,'');
    if(resPose.status =='success'){
            Toast.fire({ icon: 'success',title: resPose.message, })
   $("#conatact_cus_form")[0].reset();

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



    // Add to cart Functionalty
    jQuery(document).on("click","#add_to_cart",async function(e) {
        var product_oid = jQuery(this).attr("product_uid");
        var product_quntity =   jQuery(`#product_quntity_${product_oid}`).val();
        var product_price =    jQuery(`#product_price__${product_oid}`).val();
        var ajax_value ={product_oid,product_quntity,product_price};
        var ajax_url = jQuery('#ajax_url').val();
        jQuery(this).addClass('added')
            add_tocart_functionalty(ajax_url,ajax_value)
        });

    jQuery(document).on("click",".plus ,.minus", function(e) {
        var jQuerythis = jQuery(this);
        var jQueryinput = jQuerythis.siblings(".qty");
        var qtyMin = parseInt(jQueryinput.attr("min"));
        var qtyMax = parseInt(jQueryinput.attr("max"));
        var qty = parseInt(jQueryinput.val());
        var product_oid = jQuerythis.attr("product_oid");
        var quantity_type =  jQuerythis.attr("quantity-type");
        if(quantity_type =='plus'){
            qty += 1;
              if (qty >= qtyMax) {  jQuerythis.attr("disabled", true); }
        }else{
            qty = qty <= qtyMin ? qtyMin : (qty -= 1);
            if (qty == qtyMin) {
                jQuerythis.attr("disabled", true);
              }

        }
        jQueryinput.val(qty);
        var product__price =  jQueryinput.attr("product__price");
        var producttotalprice = qty *product__price
        jQuery('#product_quantity_price__'+product_oid+'').text(producttotalprice);
        jQuery('#product_quntity__'+product_oid+'').val(qty);
        jQuery('#product_price__'+product_oid+'').val(producttotalprice);

    });


    $( "#datepicker" ).datepicker({ minDate: 0});
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

// Product Details


        // $('.quantity').on('click', '.plus', function(e) {
        //     let $input = $(this).prev('input.qty');
        //     let val = parseInt($input.val());
        //     $input.val( val+1 ).change();
        // });


});

