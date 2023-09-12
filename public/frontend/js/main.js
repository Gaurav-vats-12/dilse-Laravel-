jQuery(document).ready(function () {
    let url = window.location.pathname;

    /**
* Scroller
*/
    let btn = jQuery('#button');
    jQuery(window).scroll(function () {
        if (jQuery(window).scrollTop() > 300) {
            btn.addClass('show');
        } else {
            btn.removeClass('show');
        }
    });
    btn.on('click', function (e) {
        e.preventDefault();
        jQuery('html, body').animate({ scrollTop: 0 }, '300');
    });


    /**
  * Order Type In Home and Checkout page
  */
    jQuery(document).on("click", ".thumbnail", async function (event) {
        event.preventDefault();
        let type = jQuery(this).attr('type'), current_url = jQuery(this).attr('current_url'),
            AjaxForm = jQuery(this).attr('AjaxForm'), slug = 'appetizers', page = 1, ajax_value = { slug, page, type, current_url };
        const response = await Ajax_response(AjaxForm, "GET", ajax_value, '', '');
        if (response.status === 'success') {
            window.location.href = response.url;
        } else {
            window.location.href = AjaxForm;
        }
    });
    /**
      *  Add to Cart  In Website (Home Page ,Menu page,Product Details Pages)
      */
    jQuery(document).on("click", "#add_to_cart", async function (event) {
        jQuery(this).toggleClass(`added`);
        let product_oid = jQuery(this).attr("product_uid"), product_quntity = jQuery(`#product_quntity_${product_oid}`).val(), product_price = jQuery(`#product_price__${product_oid}`).val(), ajax_value = { product_oid, product_quntity, product_price }, ajax_url = jQuery('#ajax_url').val();
        const resPose = await Ajax_response(ajax_url, "POST", ajax_value, '');
        if (resPose.status === `success`) {
            setTimeout(function () { jQuery('.add-to-cart-button').removeClass(`added`) }, 2000);
            NotyfMessage(resPose.message, 'success');
            jQuery(`.cart_count`).html(resPose.cart_total);
        }
    });
    /**
 *  testimonial_slider   (Home Page)
 */
    jQuery('.testimonial_slider').slick({
        infinite: true,
        arrows: false,
        dots: false,
    });
    jQuery(".testimonial_slider_cntnt .content").each(function () {
        const content = $(this).text();
        const charLimit = 200; // Adjust to your preferred character limit
        if (content.length > charLimit) {
            const truncatedContent = content.substring(0, charLimit);
            jQuery(this).text(truncatedContent);
            jQuery(this).addClass("collapsed");

            jQuery(this)
                .siblings(".read-more")
                .click(function (e) {
                    e.preventDefault();
                    const isCollapsed = jQuery(this).siblings(".content").hasClass("collapsed");
                    if (isCollapsed) {
                        jQuery(this).siblings(".content").text(content);
                        jQuery(this).siblings(".content").removeClass("collapsed");
                        jQuery(this).text("Read Less");
                    } else {
                        jQuery(this).siblings(".content").text(truncatedContent);
                        jQuery(this).siblings(".content").addClass("collapsed");
                        jQuery(this).text("Read More");
                    }
                });
        } else {
            jQuery(this).removeClass("collapsed");
            jQuery(this).siblings(".read-more").hide();
        }
    });


    /**
     * Subscribe Our Newsletter Submission Form Ajax (Home Page)
     */
    jQuery("#emailSubscribeForm").validate({
        rules: {
            email_address: {
                required: true,
                email: true,
            }
        },
        messages: {
            email_address: {
                required: "Please Enter the  email address",
                maxlength: "Please Enter vaid email address"
            }
        },
        submitHandler: async function (form, event) {
            jQuery(".theme_btn").attr("disabled", true);
            jQuery(".btn-txt").html("<i class='fa fa-spinner fa-spin'></i>Please Wait");
            event.preventDefault();
            let ajax_value_list = jQuery('#emailSubscribeForm').serialize(), ajx_url = jQuery('#email_action_url').val();
            const resPose = await Ajax_response(ajx_url, "POST", ajax_value_list, '');
            jQuery(".theme_btn").attr("disabled", false);
            jQuery(".btn-txt").text("Subscribe Now");
            if (resPose.status === `success`) {
                NotyfMessage(resPose.message, 'success');
                jQuery("#emailSubscribeForm")[0].reset();
            } else if (resPose.status === `error`) {
                NotyfMessage(resPose.message, 'warning');
                jQuery("#emailSubscribeForm")[0].reset();
            } else if (resPose.status === `error_message`) {
                NotyfMessage(resPose.message, 'warning');
                jQuery("#emailSubscribeForm")[0].reset();
            } else {
                jQuery.each(resPose.errors, function (key, value) { jQuery(`#${key}-error`).text(value); });
            }
        }
    });

    /**
 *     Contact us Form Submission  iN ajax   (Home Page ,Contact Us Page)
 */

    jQuery("#conatact_cus_form").validate({
        messages: {
            first_name: {
                required: "Please Enter the First Name",
                maxlength: "First Name must be max 50 letter"
            }, last_name: {
                required: "Please Enter the Last name",
                maxlength: "Last name must be max 50 letter"
            }, email: {
                required: "Please Enter the  email address",
                maxlength: "Please Enter vaid email address"
            }, phone: {
                required: "Please Enter the phone number",
                maxlength: "Phone Number must be max 15 letter"
            }, message: {
                required: "Please Enter the message",
                maxlength: "message must be max 2000 letter"
            }
        },
        rules: {
            first_name: {
                required: true,
                maxlength: 50,
            }, last_name: {
                required: true,
                maxlength: 50,
            }, email: {
                required: true,
                email: true,
            }, phone: {
                required: true,
                maxlength: 20,
            }, message: {
                required: true,
                maxlength: 2000,
            }
        },
        submitHandler: async function (form, e) {
            e.preventDefault();
            jQuery(".theme_btn").attr("disabled", true);
            jQuery(".btn-txt").html("<i class='fa fa-spinner fa-spin'></i>Please Wait");
            let ajax_value_list = $('form').serialize(), ajx_url = jQuery(`#contact_us_action_url`).val();
            const [resPose] = await Promise.all([Ajax_response(ajx_url, "POST", ajax_value_list, '')]);
            if (resPose.status === 'success') {
                jQuery(".theme_btn").attr("disabled", false);
                jQuery(".btn-txt").text("Send");
                NotyfMessage(resPose.message, 'success');
                jQuery("#conatact_cus_form")[0].reset();
            } else {
                jQuery.each(resPose.errors, function (key, value) {
                    jQuery(`#${key}-error`).text(value);
                });
            }
        }
    });

    jQuery(document).on("change", ".delivery", async function (event) {
        jQuery('#shipping_charge').val(parseFloat(jQuery('input[name="delivery_type"]:checked').val()));
        updateTotals(parseFloat(jQuery('input[name="delivery_type"]:checked').val()));
    });


    if (url.indexOf("/menu") > -1) {
        /**
* Fetch Food Items via Menu (Menu  Page)
*/
        jQuery(document).on("click", "#menu", async function (e) {
            e.preventDefault();
            jQuery(`.loader`).toggleClass('display');
            jQuery(`#menu_data_find`).empty();
            let slug = jQuery(this).attr("menu-slug");
            let page = 1;
            let ajax_value = { slug, page };
            let pageUrl = `${location.hostname}/menu/${slug}?page=${page + 1}`;
            const response = await Ajax_response('', "GET", ajax_value, '', '');
            if (response) {
                jQuery(`.loader`).toggleClass('display');
                window.history.pushState(null, '', "/menu/" + slug);
                jQuery(`#menu_data_find`).empty().html(response);
                jQuery('.pagination a').attr('href', pageUrl);
                window.location.reload(true);
            }
        });
        /**
     *   Fetch Food Items via Menu Pagination(Menu Page)
     */
        jQuery(document).on('click', '.pagination a', async function (event) {
            event.preventDefault();
            jQuery(`.loader`).toggleClass('display');
            jQuery(`#menu_data_find`).empty();
            jQuery(`li`).removeClass('active');
            let slug = jQuery('#slug').val(), page = jQuery(this).attr('href').split('page=')[1],
                ajax_value = { slug, page };
            const response = await Ajax_response('', "GET", ajax_value, '', '');
            if (response) {
                window.history.pushState(null, '',jQuery(this).attr('href'));
                jQuery(`.loader`).toggleClass('display');
                jQuery(`#menu_data_find`).empty().html(response);
            }
        });



    } else if (url.indexOf("/product") > -1) {
                /**
        *  RELATED PRODUCTS Slider In Product Details Page
        */
        jQuery('.row.Product_slider').slick({
            dots: false,
            infinite: true,
            speed: 300,
            slidesToShow: 4,
            slidesToScroll: 1
        });

    }else if (url.indexOf("/about-us") > -1) {

        jQuery('#about_us_page').slick({
            dots: true,
            infinite: true,
            speed: 200,
            arrows: true,
            lazyLoad: 'ondemand',
            slidesToShow: 1,
            slidesToScroll: 1,
        });
        const counters = document.querySelectorAll('.counter');
        const speed = 2000;
        counters.forEach((counter) => {
            const updateCount = () => {
                const target = parseInt(counter.getAttribute('data-value'));
                const count = parseInt(counter.innerText);
                const increment = Math.trunc(target / speed);
                if (count < target) {
                    counter.innerText = `${count + increment}+`;
                    setTimeout(updateCount, 1);
                } else {
                    counter.innerText = `${target}+`;
                }
            };
            updateCount();
        });
        let text1 = document.getElementById('counter1');
        animate(text1, 0, 200, 7000);
    }else if (url.indexOf("/gallery") > -1) {
            /**
     * magnificPopup In Gallery Page
     */
    jQuery('.image-popup-vertical-fit').magnificPopup({
        type: 'image',
        mainClass: 'mfp-with-zoom',
        gallery:{ enabled:true },
        zoom: { enabled: true,
            duration: 300,
            easing: 'ease-in-out',
            opener: openerElement => openerElement.is('img') ? openerElement : openerElement.find('img')
        }
    });

    }else if (url.indexOf("/cart") > -1) {

        if(jQuery('.active').not(jQuery('#Bread-tab'))){
            let menu_id = jQuery(jQuery('#Bread-tab')).attr('menu_id');
            let ajax_value = {menu_id};
            fetch_extra_items_data(ajax_value);
        }
        jQuery(document).on("change", "#spicy_lavel", async function (event) {
            event.preventDefault();
            let spicy_lavel = jQuery(this).find(":selected").val(),

             ajax_Url = jQuery(this).attr('ajax_value');
            if(spicy_lavel){
                const resPose = await Ajax_response(ajax_Url, "POST", {spicy_lavel}, '');
                if (resPose.status === 'success') {
                    NotyfMessage(resPose.message, 'success');
                } else {
                    jQuery.each(resPose.errors, function (key, value) {
                        jQuery(`#${key}-error`).text(value);
                    });
                }
            }else{
                NotyfMessage('Please Select the SPICE LEVEL for order ', 'error');
            }
        });



        jQuery(document).on("click", "#checkout_btn", async function (event) {
            if (jQuery('#order_type').val()) {
                if(jQuery('#shipping_charge').val()){
                    if(jQuery('#spicy_lavel').find(":selected").val()){
                        if (parseFloat(jQuery('#subtotal').attr('subtotal')) < parseFloat(jQuery('#message').attr('mimimum_ammout'))) {
                            jQuery('#minimum_order_message').html(`<div class="auto-close alert alert-warning d-flex align-items-center" role="alert" id ="auto-close-alert"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:"><path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/></svg><div id="alert_message">Your current order is <b>${jQuery('meta[name="site_currency"]').attr('content')}${parseFloat(jQuery('#subtotal').attr('subtotal'))}</b> --You must have an order with minimum of ${jQuery('meta[name="site_currency"]').attr('content')}${parseFloat(jQuery('#message').attr('mimimum_ammout'))}.00 to place the order </div></div>`);
                            setTimeout(function() {  jQuery('#auto-close-alert').alert('close'); }, 5000);
                        }else{
                            if (jQuery(this).attr('type') ==='order_type') {
                                window.location.href = jQuery(this).attr('login_url');
                            }else{
                                jQuery(`#staticBackdrop`).modal('show')
                            }
                        }
                    }else{
                        NotyfMessage('Please Select the SPICE LEVEL for order ', 'error');
                    }

                }else{
                    NotyfMessage('Please Choose Delivery Charges', 'error');
                }
            }else{
                if(jQuery('#spicy_lavel').find(":selected").val()){
                    if (parseFloat(jQuery('#subtotal').attr('subtotal')) < parseFloat(jQuery('#message').attr('mimimum_ammout'))) {
                        jQuery('#minimum_order_message').html(`<div class="auto-close alert alert-warning d-flex align-items-center" role="alert" id ="auto-close-alert"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:"><path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/></svg><div id="alert_message">Your current order is <b>${jQuery('meta[name="site_currency"]').attr('content')}${parseFloat(jQuery('#subtotal').attr('subtotal'))}</b> --You must have an order with minimum of ${jQuery('meta[name="site_currency"]').attr('content')}${parseFloat(jQuery('#message').attr('mimimum_ammout'))}.00 to place the order </div></div>`);
                        setTimeout(function() {  jQuery('#auto-close-alert').alert('close'); }, 5000);
                    }else{
                        if (jQuery(this).attr('type') ==='order_type') {
                            window.location.href = jQuery(this).attr('login_url');
                        }else{
                            jQuery(`#staticBackdrop`).modal('show')
                        }
                    }
                }else{
                    NotyfMessage('Please Select the SPICE LEVEL for order ', 'error');
                }
            }
        });


       jQuery(document).on("click", ".extra_items", async function (event) {
        jQuery('.active').not(this).removeClass('active');
        jQuery(this).toggleClass('active');
        let menu_id = jQuery(this).attr('menu_id');
        let ajax_value = {menu_id};
        fetch_extra_items_data(ajax_value);
    });
              /**
        *  Update the quantity According to plus and minus in cart page (Cart page )
        */
              jQuery(document).on("click", ".update-qty", async function (e) {
                let site_currency = jQuery('meta[name="site_currency"]').attr('content');
                let newVal;
                let $button = jQuery(this), oldValue = $button.closest('.update-cart-qty').find("input.product-qty").val(),
                    quantity = jQuery(this).parent().find(`.product-qty`), ajax_url = jQuery(`#ajax_url`).val(),
                    dilavery_charge = jQuery(`#dilavery_charge`).val(),
                    product__price = parseFloat(quantity.attr(`product__price`)),
                    product_oid = parseInt(jQuery(this).attr(`productoid`));
                if ($button.text() === "+") {
                    newVal = parseFloat(oldValue) + 1;
                } else {
                    if (oldValue > 0) {
                        newVal = parseFloat(oldValue) - 1;
                    } else {
                        newVal = 0;
                    }
                    if (newVal === 0) {
                        $button.closest('.shopping_items').find('#remove_add_to_Cart').trigger('click');
                    }
                }
                if (newVal === 0) {

                } else {
                    $button.closest('.update-cart-qty').find("input.product-qty").attr('value', newVal);
                    let qty = newVal;
                    let counterproductive = parseFloat(newVal * product__price),
                        ajax_value = {product_oid, qty, counterproductive, dilavery_charge};
                    jQuery(`#product_quantity_price__${product_oid}`).text(`${site_currency}${counterproductive.toFixed(2)}`);
                    jQuery(`#product_quntity__${product_oid}`).val(qty);
                    jQuery(`#product_price__${product_oid}`).val(`${site_currency}${counterproductive.toFixed(2)}`);
                    const resPose = await Ajax_response(ajax_url, "POST", ajax_value, '');
                    if (resPose.status === `success`) {
                        jQuery(`#subtotal`).html(`<p>${site_currency}${resPose.subtotal}</p>`);
                        jQuery('#subtotal').attr('subtotal',resPose.subtotal)
                        jQuery(`#tax_total`).html(`<p>${site_currency}${resPose.total_tax}</p>`);
                        jQuery(`#grandTotal`).load(`<p>${site_currency}${resPose.total}</p>`);
                    }
                }
            });

                 /**
        *  Add to Cart  In Website (Extra_Items)
        */
       jQuery(document).on("click", "#add_to_cart_extra", async function (event) {
        jQuery(this).toggleClass(`added`);
        let product_oid = jQuery(this).attr("product_uid"),
            product_quntity = jQuery(`#product_quntity_${product_oid}`).val(),
            product_price = jQuery(`#product_price__${product_oid}`).val(),
            ajax_value = {product_oid, product_quntity, product_price}, ajax_url = jQuery('#extra_ajax_url').val();
        const resPose = await Ajax_response(ajax_url, "POST", ajax_value, '');
        if (resPose.status === `success`) {
           NotyfMessage(resPose.message,'success');
            jQuery(`.cart_count`).html(resPose.cart_total);
            setTimeout(function () {
                window.location.reload()
            }, 1000);
        }
    });

    jQuery(document).on("click", "#remove_add_to_Cart", async function (event) {
        let site_currency = jQuery('meta[name="site_currency"]').attr('content');
        event.preventDefault();
        Swal.fire({
            title: `Are you sure you want to delete this Item?`,
            showCancelButton: true,
            confirmButtonText: 'Ok',
        }).then(async (result) => {
            let uid = jQuery('.shopping_items_main').length;
            if (result.isConfirmed) {
                let ajax_url = jQuery('#delete_ajax_url').val();
                let dilavery_charge = jQuery('#dilavery_charge').val();
                let ajax_value = {dilavery_charge};
                let resPose;
                [resPose] = await Promise.all([Ajax_response(ajax_url, "POST", ajax_value, '')])
                if (resPose.status === 'success') {
                    jQuery(`.cart_count`).html(resPose.cart_total);
                    jQuery('#subtotal').attr('subtotal',resPose.subtotal)
                    jQuery(`#subtotal`).html(`<p>${site_currency}${resPose.subtotal}</p>`);
                    jQuery(`#tax_total`).html(`<p>${site_currency}${resPose.total_tax}</p>`);
                    jQuery(`#grandTotal`).html(`<p>${site_currency}${resPose.total}</p>`);
                    if (uid === 0) {
                        jQuery('#cart_messages').html('<h4> No Cart  Items Found</h4>');
                        jQuery('#order_details').empty();
                        jQuery('.product_c_main').empty();
                    } else {
                        let product_oid = parseInt(jQuery(this).attr("produc_id"));
                        jQuery(`#cart_products-${product_oid}`).empty();
                        if (uid - 1 === 0) {
                            jQuery('#cart_messages').html('<h4> No Cart  Items Found</h4>');
                            jQuery('#order_details').empty();
                            jQuery('.product_c_main').empty();
                        }
                    }
                }
            }
        });
    });

 } else  if (url.indexOf("/checkout") > -1) {
    jQuery('#store_location').val(jQuery('#select_location').find(":selected").val());
    jQuery(document).on("change", "#select_location",  function (event) {
        event.preventDefault();
        const store_location = jQuery(this).find(":selected").val();
        localStorage.setItem('store_location', store_location);
        jQuery('#store_location').val(store_location);
    });
     /**
         * State Dependency In Checkout Page
    */
     let country_uid = parseInt(jQuery('#billing_country').find(":selected").attr('country_uid'));
     let ajax_url = jQuery('#state_ajax').val();

     let selected_billing_state = jQuery('#selected_billing_state').val();
     let ajax_value = {country_uid,'type':'country',selected_billing_state};
     state_dependency_country_list(ajax_value, ajax_url);
     /**
      * Payment Option
      */
     let payment_value = jQuery('input[name="payment_method"]:checked').val();
     (`payonline` == payment_value) ? jQuery(`#stripe_paymnet_form`).css(`display`, `block`) : jQuery(`#stripe_paymnet_form`).css(`display`, `none`);
     jQuery('.payment_form'). attr('id', 'payment-form');
     jQuery('#stripe_paymnet_form').css('display','none');
     jQuery(document).on("click", ".payment_option", async function (event) {
         let payment_value = jQuery('input[name="payment_method"]:checked').val();
         if (payment_value ==='Pay On Online (Stripe)') {
             jQuery('.payment_form'). attr('id', 'stripe_form');
             jQuery('#stripe_paymnet_form').css('display','block');
             stripePayment_Form(jQuery(`#StripeKey`).val());
         }else{
             jQuery('.payment_form'). attr('id', 'payment-form');
             jQuery('#stripe_paymnet_form').css('display','none');
             payment_intergation(jQuery(`#StripeKey`).val());
         }
     });
    payment_intergation(jQuery(`#StripeKey`).val());

    jQuery('#billing_phone').inputmask('+1 (999) 999-9999');


     jQuery('#billing_postcode').inputmask('A9A 9A9', {
         placeholder: 'K1N 8W5\n',
         clearMaskOnLostFocus: false,
     })




    }else if (url.indexOf("/user/order") > -1) {
        jQuery(document).on("change", ".manage_by_order", async function (event) {
            jQuery(`#OrderStatus`).empty().html('<h2 class="text-center"> Processing</h2>');
            let element, filterType, filterValue, ajax_value, orderedajax;
            element = jQuery(this);
            filterType = element.attr("type");
            filterValue = element.val();
            ajax_value = {filterType, filterValue};
            orderedajax = jQuery('orderedajax').val();
            const resPose = await Ajax_response(orderedajax, "GET", ajax_value, '');
             jQuery(`#OrderStatus`).empty().html(resPose);
        });
    }else if (url.indexOf("user/profile-address") > -1) {
          /**
         * State Dependency In profile   Page
         */
          let country_uid = parseInt(jQuery('#billing_country').find(":selected").attr('country_uid'));
          let ajax_url = jQuery('#state_ajax').val();
          let selected_billing_state = jQuery('#selected_billing_state').val();
          let ajax_value = {country_uid,'type':'country',selected_billing_state};

          state_dependency_country_list(ajax_value, ajax_url);
         jQuery('#billing_postcode').inputmask('A9A 9A9', {
             placeholder: 'K1N 8W5\n',
             clearMaskOnLostFocus: false,
         })

    }else if (url.indexOf("/user/profile") > -1) {
        jQuery('#phone').inputmask('+1 (999) 999-9999');

    }else if (url.indexOf("/book-a-reservation") > -1) {
        jQuery('#datepicker').datepicker({
            minDate: 1,
            defaultDate: "+1",
            dateFormat: 'yy-mm-dd'
        });
        jQuery('#timepicker').timepicker({
            timeFormat: 'h:mm p',
            interval: 15,
            minTime: '11:30 AM',
            maxTime: '10:30 PM',
            defaultTime: '11',
            startTime: '10:00',
            dynamic: true,
            dropdown: true,
            scrollbar: true,
            showDuration: true
        });
        let now = new Date(), currentHour = now.getHours(), currentMinute = now.getMinutes();
        if (currentMinute < 15) {
            currentMinute = 0;
        } else if (currentMinute < 30) {
            currentMinute = 15;
        } else if (currentMinute < 45) {
            currentMinute = 30;
        } else {
            currentMinute = 45;
        }
        let currentTime = currentHour + ':' + (currentMinute === 0 ? '00' : '15');

        jQuery(document).on("change", "#datepicker", async function (event) {
            let selectedDate = new Date($(this).val()); // Assuming the date format is 'yyyy-mm-dd'
            if (selectedDate.toDateString() === now.toDateString()) {
                var minTimeValue = (currentHour < 10 ? '0' : '') + currentHour + ':' + (currentMinute < 10 ? '0' : '') + currentMinute;
                jQuery('#timepicker').timepicker('option', 'minTime', minTimeValue);
            } else {
                jQuery('#timepicker').timepicker('option', 'minTime', '11:30 AM');
            }
        });
        let initialMinTime = now.toDateString() === (new Date($('#datepicker').val()).toDateString()) ? currentTime : '11:30 AM';
        jQuery('#timepicker').timepicker({
            'minTime': initialMinTime,
            'maxTime': '10:30 PM',
            'step': 15,
            'showDuration': false
        });
        jQuery(document).on("keypress", "#timepicker", async function (event) {
            jQuery(this).prop('readonly', true);
            jQuery(this).css('pointer-events', 'none');
        });
        jQuery(document).on("click", "#inputWrapper", async function (event) {
            jQuery('#timepicker').prop('readonly', false);
            jQuery('#timepicker').css('pointer-events', 'auto');

        });

        jQuery('#phone').inputmask('+1 (999) 999-9999');


    }

});
