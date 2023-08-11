jQuery(document).ready(function () {

    /**
     *  Cart Page JQuery
     */
    jQuery(document).on("click",".plus ,.minus", async function (e) {
        let product_oid = parseInt(jQuery(this).attr("productoid")),
            qtyMin = parseInt(jQuery(this).siblings(".qty").attr("min")),
            qtyMax = parseInt(jQuery(this).siblings(".qty").attr("max")),
            quantity = jQuery(this).siblings(".qty"),
            qty = parseInt(quantity.val())
            quantity_type = jQuery(this).attr("quantity-type").toString();
        if ('plus' === quantity_type) {qty += 1;if (qty >= qtyMax) {jQuery(this).attr("disabled", true);}} else {
            qty = qty <= qtyMin ? qtyMin : (qty -= 1);
            if (qty === qtyMin) {
                jQuery(this).attr("disabled", true);
            }
        }
        quantity.val(qty)
        // parseInt(jQuery(this).find(".qty").val(qty))
        let product__price = parseFloat(jQuery(this).siblings(".qty").attr("product__price")),
            counterproductive =   parseFloat(qty * product__price)
            ajax_url = jQuery('#ajax_url').val();
        let dilavery_charge = jQuery('#dilavery_charge').val();
        jQuery(`#product_quantity_price__${product_oid}`).text(`$${counterproductive}`);
        jQuery(`#product_quntity__${product_oid}`).val(qty);
        jQuery(`#product_price__${product_oid}`).val(`$${counterproductive}`);
        let ajax_value = {product_oid, qty, counterproductive, dilavery_charge};
        let resPose; [resPose] = await Promise.all([Ajax_response(ajax_url, "POST", ajax_value, '')]);
        if(resPose.status ==='success') {
            jQuery('#subtotal').html(`<p>$${resPose.subtotal}</p>`);
            jQuery('#total').html(`<p>$${resPose.total}</p>`);
        }
    });

    /**
     *  Remove Add to Cart
     */
    jQuery(document).on("click", "#remove_add_to_Cart",  async function (event) {
        event.preventDefault();
           Swal.fire({
             title: `Are you sure you want to delete this Item?`,
             showCancelButton: true,
             confirmButtonText: 'Ok',
            }).then(async (result) => {
              let  uid = jQuery('.shopping_items_main').length;
               if (result.isConfirmed) {
                   let ajax_url = jQuery('#delete_ajax_url').val();
                   let dilavery_charge = jQuery('#dilavery_charge').val();
                   let ajax_value = {dilavery_charge};
                   let resPose;
                   [resPose] = await Promise.all([Ajax_response(ajax_url, "POST", ajax_value, '')])
                   if(resPose.status ==='success') {
                       jQuery('#subtotal').text(resPose.subtotal);

                       jQuery('#total').text(resPose.total);
                       if(uid ===0){
                           jQuery('#cart_messages').html('<h4> No Cart  Items Found</h4>');
                           jQuery('#order_details').empty();
                       }else{
                           let product_oid = parseInt(jQuery(this).attr("produc_id"));
                           jQuery(`#cart_products-${product_oid}`).empty();

                           if(uid-1 ===0){
                               jQuery('#cart_messages').html('<h4> No Cart  Items Found</h4>');
                               jQuery('#order_details').empty();
                           }
                       }
                   }
               }
           });
    });

    /**
     *     Add To Cart Functionality
     */
    jQuery(document).on("click", "#add_to_cart",  async function (e) {
             jQuery(this).addClass('added')
            let product_oid = jQuery(this).attr("product_uid"),
                product_quntity = jQuery(`#product_quntity_${product_oid}`).val(),
                product_price = jQuery(`#product_price__${product_oid}`).val(),
                ajax_value = {product_oid, product_quntity, product_price}, ajax_url = jQuery('#ajax_url').val();
        let resPose;[resPose] = await Promise.all([Ajax_response(ajax_url, "POST", ajax_value, '')]);
        if(resPose.status ==='success') {
            jQuery('.cart_count').html(resPose.cart_total);
            Toast.fire({ icon: 'success',title: resPose.message, })
            setTimeout(function(){
              jQuery('.add-to-cart-button').removeClass('added')
            }, 1000);
        }
        });
    /**
     * Fetch Food Items via Menu
     */
    jQuery(document).on("click", "#menu",
        async function (e) {
            e.preventDefault();
            jQuery('.loader').toggleClass('display');
            jQuery("#menu_data_find").empty();
            let slug = jQuery(this).attr("menu-slug");
            let page = 1;
            let ajax_value = {slug, page};
            const response = await Ajax_response('', "GET", ajax_value, '', '');
            if (response) {
                jQuery('.loader').toggleClass('display');
                jQuery("#menu_data_find").empty().html(response);
            }
        });
    /**
     * Fetch Food Items via Menu Pagination
     */

    jQuery(document).on('click', '.pagination a',  async function (event) {
        event.preventDefault();
        jQuery('.loader').toggleClass('display');
        jQuery("#menu_data_find").empty();
        jQuery('li').removeClass('active');
        let slug = jQuery('#slug').val(), page = jQuery(this).attr('href').split('page=')[1], ajax_value = {slug, page};
        const response = await Ajax_response('',"GET",ajax_value,'','');
        if (response) {
            jQuery('.loader').toggleClass('display');
            jQuery("#menu_data_find").empty().html(response);
        }
    });
});


//     jQuery(document).on("click","#menu", function(e) {
//         // e.preventDefault();
//         // jQuery('.loader').removeClass('display');
//         // $("#menu_data_find").empty();
//
//
// });

//
//
//     jQuery('.row.Product_slider').slick({
//     dots: false,
//     infinite: true,
//     speed: 300,
//     slidesToShow: 3,
//     slidesToScroll: 1
//
//   });
//   jQuery('.testimonial_slider').slick({
//     infinite: true,
//     arrows: false,
//     dots: false,
// });
// // Menu
// jQuery(document).on("click","#menu",async function(e) {
//     jQuery('.loader').removeClass('display');
//     e.preventDefault();
//     var slug =  jQuery(this).attr("menu-slug");
//     var page = 1;
//     var ajax_value ={slug,page};
//     const response = await Ajax_response('',"GET",ajax_value,'','');
//     if (response) {
//         $("#menu_data_find").empty().html(response);
//         jQuery('.loader').addClass('display')
//     }
// });
// jQuery(document).on('click', '.pagination a', async function(event){
//     event.preventDefault();
//     jQuery('.loader').removeClass('display');
//     jQuery('li').removeClass('active');
//     jQuery(this).parent('li').addClass('active');
//     var slug =  jQuery('#slug').val();
//     var page=$(this).attr('href').split('page=')[1];
//     var ajax_value ={slug,page};
//     const response = await Ajax_response('',"GET",ajax_value,'','');
//     if (response) {
//         $("#menu_data_find").empty().html(response);
//         // jQuery('.loader').addClass('display')
//         window.scrollTo(400, 400);
//     }
//
// });
// // Contact Us Form
//   jQuery(document).on("submit","#conatact_cus_form",async function(e) {
//     e.preventDefault();
//     var ajax_value_list = $(this).serialize();
//     var ajx_url = jQuery('#contact_us_action_url').val();
//       const [resPose] = await Promise.all([Ajax_response(ajx_url, "POST", ajax_value_list, '')]);
//     if(resPose.status === 'success'){
//             Toast.fire({ icon: 'success',title: resPose.message, })
//    $("#conatact_cus_form")[0].reset();
//
//     }else{
//        jQuery.each(resPose.errors, function (key, value) {
//             jQuery(`#${key}-error`).text(value);
//           });
// }
//
//     });
//
//     jQuery(document).on("submit","#emailSubscribeForm",async function(e) {
//         e.preventDefault();
//         var ajax_value_list = $(this).serialize();
//         var ajx_url = jQuery('#email_action_url').val();
//         const resPose = await Ajax_response(ajx_url,"POST",ajax_value_list,'');
//         console.log(resPose);
//         if(resPose.status =='success'){
//             console.log('asdsad');
//             Toast.fire({
//                 icon: 'success',
//                 title: resPose.message,
//               })
//               location.reload();
//
//         } else if(resPose.status =='error'){
//             Toast.fire({
//                 icon: 'warning',
//                 title: resPose.message
//               })
//               $("#emailSubscribeForm")[0].reset();
//         }else{
//             jQuery.each(resPose.errors, function (key, value) {
//                 jQuery(`#${key}-error`).text(value);
//               });
//         }




    // // Add to cart Functionalty


//     jQuery(document).on("click",".plus ,.minus", function(e) {
//         var jQuerythis = jQuery(this);
//         var jQueryinput = jQuerythis.siblings(".qty");
//         var qtyMin = parseInt(jQueryinput.attr("min"));
//         var qtyMax = parseInt(jQueryinput.attr("max"));
//         var qty = parseInt(jQueryinput.val());
//         var product_oid = jQuerythis.attr("product_oid");
//         var quantity_type =  jQuerythis.attr("quantity-type");
//         if(quantity_type =='plus'){
//             qty += 1;
//               if (qty >= qtyMax) {  jQuerythis.attr("disabled", true); }
//         }else{
//             qty = qty <= qtyMin ? qtyMin : (qty -= 1);
//             if (qty == qtyMin) {
//                 jQuerythis.attr("disabled", true);
//               }
//
//         }
//         jQueryinput.val(qty);
//         var product__price =  jQueryinput.attr("product__price");
//         var producttotalprice = qty *product__price
//         jQuery('#product_quantity_price__'+product_oid+'').text(producttotalprice);
//         jQuery('#product_quntity__'+product_oid+'').val(qty);
//         jQuery('#product_price__'+product_oid+'').val(producttotalprice);
//
//     });
//
//
//     $( "#datepicker" ).datepicker({ minDate: 0});
//     $('#timepicker').timepicker({
//         timeFormat: 'h:mm p',
//         interval: 15,
//         scrollbar: true
//     });
// });
//
//
//
//
//  jQuery('.image-popup-vertical-fit').magnificPopup({
//     type: 'image',
//     mainClass: 'mfp-with-zoom',
//     gallery:{
//               enabled:true
//           },
//           zoom: {
//             enabled: true,
//
//             duration: 300, // duration of the effect, in milliseconds
//             easing: 'ease-in-out', // CSS transition easing function
//
//             opener: function(openerElement) {
//
//               return openerElement.is('img') ? openerElement : openerElement.find('img');
//           }
//         }
//
// // Product Details
//
//
//         // $('.quantity').on('click', '.plus', function(e) {
//         //     let $input = $(this).prev('input.qty');
//         //     let val = parseInt($input.val());
//         //     $input.val( val+1 ).change();
//         // });
//

// });

