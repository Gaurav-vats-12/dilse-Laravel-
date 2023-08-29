jQuery(document).ready(function () {
    setTimeout(function() {
        $('.swal2-container.swal2-top-end.swal2-backdrop-show').hide();
    }, 5000); // 5000 milliseconds or 5 seconds
    /**
     * Order Type In Home and Checkout page
     */
    jQuery(document).on("click", ".thumbnail", async function (event) {
        event.preventDefault();
        let type = jQuery(this).attr('type'), current_url = jQuery(this).attr('current_url'),
            AjaxForm = jQuery(this).attr('AjaxForm'), slug = 'appetizers', page = 1, ajax_value = {slug, page, type,current_url};
        const response = await Ajax_response(AjaxForm, "GET", ajax_value, '', '');
        if (response.status ==='success'){
            window.location.href = response.url;
        }else{
            window.location.href = AjaxForm;
        }
    });
    /**
     *  Add to Cart  In Website (Home Page ,Menu page,Product Details Pages)
     */
    jQuery(document).on("click", "#add_to_cart", async function (event) {
        jQuery(this).toggleClass(`added`);
        let product_oid = jQuery(this).attr("product_uid"), product_quntity = jQuery(`#product_quntity_${product_oid}`).val(), product_price = jQuery(`#product_price__${product_oid}`).val(), ajax_value = {product_oid, product_quntity, product_price}, ajax_url = jQuery('#ajax_url').val();
        const resPose = await Ajax_response(ajax_url, "POST", ajax_value, '');
        if (resPose.status === `success`) {
            setTimeout(function() { jQuery('.add-to-cart-button').removeClass(`added`)}, 2000);
            Toast.fire({icon: `success`, title: resPose.message})
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
        submitHandler: async function (form,event) {
            event.preventDefault();
            let ajax_value_list = jQuery('#emailSubscribeForm').serialize(), ajx_url = jQuery('#email_action_url').val();
            const resPose = await Ajax_response(ajx_url, "POST", ajax_value_list, '');
            if (resPose.status === `success`) {
                Toast.fire({icon: `success`, title: resPose.message})
                $("form")[0].reset();
            }else if(resPose.status === `error`){
                Toast.fire({icon: `warning`, title: resPose.message})
                $("form")[0].reset();
            }else if(resPose.status === `error_message`){
                Toast.fire({icon: `danger`, title: resPose.message})
                $("form")[0].reset();
            }else{
                jQuery.each(resPose.errors, function (key, value) { jQuery(`#${key}-error`).text(value); });
            }
        }
    });
    /**
     *     Contact us Form Submission  iN ajax   (Home Page ,Contact Us Page)
     */
    jQuery("#conatact_cus_form").validate({
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
                maxlength: 15,
            }, message: {
                required: true,
                maxlength: 2000,
            }
        },
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
        submitHandler: async function (form,e) {
            e.preventDefault();
            let ajax_value_list = $('form').serialize(), ajx_url = jQuery(`#contact_us_action_url`).val();
            const [resPose] = await Promise.all([Ajax_response(ajx_url, "POST", ajax_value_list, '')]);
            if(resPose.status === 'success'){
                Toast.fire({ icon: 'success',title: resPose.message, })
                jQuery("form")[0].reset();
            }else{
                jQuery.each(resPose.errors, function (key, value) {
                    jQuery(`#${key}-error`).text(value);
                });
            }
        }
    });

    /**
     * Fetch Food Items via Menu (Menu  Page)
     */
    jQuery(document).on("click", "#menu", async function (e) {
        e.preventDefault();

        jQuery(`.loader`).toggleClass('display');
        jQuery(`#menu_data_find`).empty();

        let slug = jQuery(this).attr("menu-slug");
        let page = 1;
        let ajax_value = {slug, page};

        let pageUrl = `${location.hostname}/menu/${slug}?page=${page +1}`;
        const response = await Ajax_response('', "GET", ajax_value, '', '');
        if (response) {
            jQuery(`.loader`).toggleClass('display');
            window.history.pushState(null, '', "/menu/"+slug);
            jQuery(`#menu_data_find`).empty().html(response);
            jQuery('.pagination a').attr('href',pageUrl);
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
            ajax_value = {slug, page};
        const response = await Ajax_response('', "GET", ajax_value, '', '');
        if (response) {
            jQuery(`.loader`).toggleClass('display');
            jQuery(`#menu_data_find`).empty().html(response);
        }
    });
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
    // jQuery( "#datepicker" ).datepicker();

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
        if ($button.text() == "+") {
            newVal = parseFloat(oldValue) + 1;
        }else {
            if (oldValue > 0) {
                newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 0;
            }
            if(newVal === 0){
                $button.closest('.shopping_items').find('#remove_add_to_Cart').trigger('click');
            }
        }
        if(newVal === 0){

        }else{
            $button.closest('.update-cart-qty').find("input.product-qty").attr('value',newVal);
            let qty = newVal;
            let counterproductive = parseFloat(newVal * product__price), ajax_value = {product_oid, qty, counterproductive, dilavery_charge};
            jQuery(`#product_quantity_price__${product_oid}`).text(`${site_currency}${counterproductive.toFixed(2)}`);
            jQuery(`#product_quntity__${product_oid}`).val(qty);
            jQuery(`#product_price__${product_oid}`).val(`${site_currency}${counterproductive.toFixed(2)}`);
            const resPose = await Ajax_response(ajax_url, "POST", ajax_value, '');
            if (resPose.status === `success`) {
                jQuery(`#subtotal`).html(`<p>${site_currency}${resPose.subtotal}</p>`);
                jQuery(`#tax_total`).html(`<p>${site_currency}${resPose.total_tax}</p>`);
                jQuery(`#total`).html(`<p>${site_currency}${resPose.total}</p>`);
            }
        }
    });

    /**
     *  Add to Cart  In Website (Extra_Items)
     */
    jQuery(document).on("click", "#add_to_cart_extra", async function (event) {
        jQuery(this).toggleClass(`added`);
        let product_oid = jQuery(this).attr("product_uid"), product_quntity = jQuery(`#product_quntity_${product_oid}`).val(), product_price = jQuery(`#product_price__${product_oid}`).val(), ajax_value = {product_oid, product_quntity, product_price}, ajax_url = jQuery('#extra_ajax_url').val();
        const resPose = await Ajax_response(ajax_url, "POST", ajax_value, '');
        if (resPose.status === `success`) {
            Toast.fire({icon: `success`, title: resPose.message})
            jQuery(`.cart_count`).html(resPose.cart_total);
            setTimeout(function() { window.location.reload()}, 1000);
        }
    });
    /**
     *     Remove  The Cart in Cart page (Cart Page)
     */
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
                    jQuery(`#subtotal`).html(`<p>${site_currency}${resPose.subtotal}</p>`);
                    jQuery(`#tax_total`).html(`<p>${site_currency}${resPose.total_tax}</p>`);
                    jQuery(`#total`).html(`<p>${site_currency}${resPose.total}</p>`);
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

    /**
     *   Extra Items Sliders On Cart Page
     */

//     jQuery('i.fa-solid.fa-eye.user_pass').click(function() {
//     // Check the current type of password input
//     if ($('#password').attr('type') === 'password') {
//         $('#password').attr('type', 'text');
//         $(this).removeClass('fa-eye').addClass('fa-eye-slash'); // Toggle icon to 'eye-slash'
//     } else {
//         $('#password').attr('type', 'password');
//         $(this).removeClass('fa-eye-slash').addClass('fa-eye'); // Toggle icon back to 'eye'
//     }
// });
//
//     jQuery('i.fa-solid.fa-eye.confirm_pass').click(function() {
//     var $passwordField = $('#password_confirmation');
//
//     if ($passwordField.attr('type') === 'password') {
//         $passwordField.attr('type', 'text');
//         $(this).removeClass('fa-eye').addClass('fa-eye-slash'); // Toggle icon to 'eye-slash'
//     } else {
//         $passwordField.attr('type', 'password');
//         $(this).removeClass('fa-eye-slash').addClass('fa-eye'); // Toggle icon back to 'eye'
//     }
// });

    /**
     * Extra Items Sliders
     */





    /**
     * Related Product Slider On Product Details Page
     */

    $('.row.Product_slider').slick({
        dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 1
    });





   if (url.indexOf("/checkout") > -1) {
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
        jQuery('#billing_phone').inputmask('(999) 999-9999');
        jQuery('#billing_postcode').inputmask('A9A 9A9', {
            placeholder: 'K1N 8W5\n',
            clearMaskOnLostFocus: false,
        })


    }else if(url.indexOf("/profile-address") > -1){
        /**
         * State Dependency In Checkout Page
         */
        let country_uid = parseInt(jQuery('#billing_country').find(":selected").attr('country_uid'));

        let ajax_url = jQuery('#state_ajax').val();
        let selected_billing_state = jQuery('#selected_billing_state').val();
        let ajax_value = {country_uid,'type':'country',selected_billing_state};
        state_dependency_country_list(ajax_value, ajax_url);
    }else if(url.indexOf("/book-a-reservation") > -1) {
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
        jQuery('#phone').inputmask('(999) 999-9999');
    }

});
