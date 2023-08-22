jQuery(document).ready(function () {
    jQuery( "#datepicker" ).datepicker();

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
            let ajax_value_list = jQuery('form').serialize(), ajx_url = jQuery('#email_action_url').val();
            const resPose = await Ajax_response(ajx_url, "POST", ajax_value_list, '');
            if (resPose.status === `success`) {
                Toast.fire({icon: `success`, title: resPose.message})
                  $("form")[0].reset();
            }else if(resPose.status === `error`){
                Toast.fire({icon: `warning`, title: resPose.message})
                $("form")[0].reset();

            }else{
                jQuery.each(resPose.errors, function (key, value) { jQuery(`#${key}-error`).text(value); });
            }
        }
    });


    /**
     * Order Type In Menu
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
     *  testimonial_slider   (Home Page)
     */
    jQuery('.testimonial_slider').slick({
        infinite: true,
        arrows: false,
        dots: false,
    });
    /**
     *     Contact us Form Submission  iN ajax  (Home Page)
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
        let slug = jQuery(this).attr("menu-slug"), page = 1, ajax_value = {slug, page};
        const response = await Ajax_response('', "GET", ajax_value, '', '');
        if (response) {
            jQuery(`.loader`).toggleClass('display');
            jQuery(`#menu_data_find`).empty().html(response);
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
     *  Update the quantity According to plus and minus in cart page (Cart page )
     */
    jQuery(document).on("click", ".update-qty", async function (e) {
        let newVal;
        let $button = jQuery(this), oldValue = $button.closest('.update-cart-qty').find("input.product-qty").val(),
            quantity = jQuery(this).parent().find(`.product-qty`), ajax_url = jQuery(`#ajax_url`).val(),
            dilavery_charge = jQuery(`#dilavery_charge`).val(),
            product__price = parseFloat(quantity.attr(`product__price`)),
            product_oid = parseInt(jQuery(this).attr(`productoid`));
        if ($button.text() == "+") {
            newVal = parseFloat(oldValue) + 1;
        }else {
            // Don't allow decrementing below zero

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
            console.log('No Cahnage')

        }else{
        $button.closest('.update-cart-qty').find("input.product-qty").attr('value',newVal);
        let qty = newVal;
        let counterproductive = parseFloat(newVal * product__price), ajax_value = {product_oid, qty, counterproductive, dilavery_charge};
        jQuery(`#product_quantity_price__${product_oid}`).text(`$${counterproductive.toFixed(2)}`);
        jQuery(`#product_quntity__${product_oid}`).val(qty);
        jQuery(`#product_price__${product_oid}`).val(`$${counterproductive.toFixed(2)}`);
        const resPose = await Ajax_response(ajax_url, "POST", ajax_value, '');
        if (resPose.status === `success`) {
            jQuery(`#subtotal`).html(`<p>$${resPose.subtotal}</p>`);
            jQuery(`#total`).html(`<p>$${resPose.total}</p>`);
        }
        }
    });

    /**
     *     Remove  The Cart in Cart page (Cart Page)
     */

    jQuery(document).on("click", "#remove_add_to_Cart", async function (event) {
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
                    jQuery('#subtotal').text(resPose.subtotal);
                    jQuery('#total').text(resPose.total);
                    if (uid === 0) {
                        jQuery('#cart_messages').html('<h4> No Cart  Items Found</h4>');
                        jQuery('#order_details').empty();
                    } else {
                        let product_oid = parseInt(jQuery(this).attr("produc_id"));
                        jQuery(`#cart_products-${product_oid}`).empty();
                        if (uid - 1 === 0) {
                            jQuery('#cart_messages').html('<h4> No Cart  Items Found</h4>');
                            jQuery('#order_details').empty();
                        }
                    }
                }
            }
        });
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
            if (payment_value ==='payonline') {
                jQuery('#payment-form').addClass('stripe_form');
                jQuery('.payment_form'). attr('id', 'stripe_form');
                jQuery('#stripe_paymnet_form').css('display','block');
                stripe_payment_intergation(jQuery(`#StripeKey`).val());
            } else {
                jQuery('.payment_form'). attr('id', 'payment-form');
                jQuery('#stripe_paymnet_form').css('display','none');
            }
        });
        jQuery(".payment_form").validate({
            rules: {
                billing_full_name: {
                    required: true,
                    maxlength: 50,
                }, billing_phone: {
                    required: true,
                    maxlength: 15,
                }, billing_email: {
                    required: true,
                    email: true,
                }, billing_address_1: {
                    required: true,
                    maxlength: 200,
                }, billing_city: {
                    required: true,
                    maxlength: 100,
                }, billing_postcode: {
                    required: true,
                    maxlength: 8,
                }
            },
            messages: {
                billing_full_name: {
                    required: "Please Enter the Billing Full Name",
                    maxlength: "Billig Full Name must be max 50 letter"
                }, billing_phone: {
                    required: "Please Enter the Billing Phone Number",
                    maxlength: "Billig Phone Number must be max 15 letter"
                }, billing_email: {
                    required: "Please Enter the Billing Email Address",
                    maxlength: "Billing Email Address Must be Email address"
                }, billing_address_1: {
                    required: "Please Enter the Billing Address",
                    maxlength: "Billig Phone Number must be max 200 letter"
                }, billing_city: {
                    required: "Please Enter the Billing City",
                    maxlength: "Billig Phone Number must be max 100 letter"
                }, billing_postcode: {
                    required: "Please Enter the Billing Pin Code",
                    maxlength: "Billig Pin Code must be max 8 letter"
                }
            },
            submitHandler: function (form) {
            }
        });
    }else if(url.indexOf("/profile-address") > -1){
        /**
         * State Dependency In Checkout Page
         */
        let country_uid = parseInt(jQuery('#billing_country').find(":selected").attr('country_uid'));

        let ajax_url = jQuery('#state_ajax').val();
        let selected_billing_state = jQuery('#selected_billing_state').val();
        console.log(selected_billing_state)
        let ajax_value = {country_uid,'type':'country',selected_billing_state};
        state_dependency_country_list(ajax_value, ajax_url);
    }




});
