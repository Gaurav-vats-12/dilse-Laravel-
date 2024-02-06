jQuery(document).ready(function () {
    let url = window.location.pathname;
    jQuery('#store_location').val(jQuery('#select_location').find(":selected").val());
    jQuery(document).on("change", "#select_location", async function (event) {
        event.preventDefault();
        let store_location = jQuery(this).find(":selected").val();
        let location_type = jQuery(this).attr('location_type');
        const resPose = await Ajax_response(jQuery(this).attr('ajax_value'), "POST", { store_location, location_type }, '');
        if (resPose.status === 'success') {
            jQuery('#store_location').val(store_location);
            NotyfMessage(resPose.message, 'success');
        } else {
            jQuery.each(resPose.errors, function (key, value) { jQuery(`#${key}-error`).text(value); });
        }
    });

    
    /**
    * Scroller
    */
    let btn = jQuery('#button');
    jQuery(window).scroll(function () {
        if (jQuery(window).scrollTop() > 300) btn.addClass(`show`); else {
            btn.removeClass(`show`);
        }
    });
    btn.on(`click`, e => {
        e.preventDefault();
        jQuery('html, body').animate({ scrollTop: 0 }, `300`);
    });


    /**
  * Order Type In Home and Checkout page
  */
    jQuery(document).on(`click`, `.thumbnail`, async function (event) {
        event.preventDefault();
        let type = jQuery(this).attr(`type`);
        let current_url = jQuery(this).attr(`current_url`);
        let slug = `appetizers`;
        let page = 1;
        let ajax_value = { current_url, page, slug, type };
        const response = await Ajax_response(jQuery(this).attr(`AjaxForm`), "GET", ajax_value, '', '');
        if (response.status === `success`) {
            window.location.href = response.url;
        } else {
            window.location.href = jQuery(this).attr(`AjaxForm`);
        }
    });
    /**
      *  Add to Cart  In Website (Home Page ,Menu page,Product Details Pages)
      */
    jQuery(document).on("click", "#add_to_cart", async function (event) {
        jQuery(this).toggleClass(`added`);
        let ajax_url = jQuery(this).attr('cart_ajax_url');
        let product_uid = jQuery(this).attr("product_uid");
        let is_spisy = jQuery(`#is_spisy_${product_uid}`).val();
        let product_quntity = jQuery(`#product_quntity_${product_uid}`).val();
        let ajaxValue = { product_uid, product_quntity, is_spisy };
        const resPose = await Ajax_response(ajax_url, "POST", ajaxValue, '');
        if (resPose.status === `success`) {
            setTimeout(function () { jQuery('.add-to-cart-button').removeClass(`added`) }, 500);
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



    jQuery('#phone').attr('maxlength', '10');
    jQuery('#conatact_phone_number').attr('maxlength', '10');
    jQuery(document).on("keyup", "#phone ,#conatact_phone_number", async function () {
        if (/\D/g.test(this.value)) {
            // Filter non-digits from input value.
            this.value = this.value.replace(/\D/g, '');
        }
    });
    /**
 *     Contact us Form Submission  iN ajax   (Home Page ,Contact Us Page)
 *
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
            jQuery(`.theme_btn`).attr("disabled", true);
            jQuery(`.btn-txt`).html("<i class='fa fa-spinner fa-spin'></i>Please Wait");
            let ajax_value_list = $('form').serialize(), ajx_url = jQuery(`#contact_us_action_url`).val();
            const [resPose] = await Promise.all([Ajax_response(ajx_url, "POST", ajax_value_list, '')]);
            console.log(resPose);
            if (resPose.status === 'success') {
                jQuery(".theme_btn").attr("disabled", false);
                jQuery(".btn-txt").text("Send");
                NotyfMessage(resPose.message, 'success');
                jQuery(`#conatact_cus_form`)[0].reset();
            } else {
                jQuery.each(resPose.errors, function (key, value) {
                    jQuery(`#${key}-error`).text(value);
                });
            }
        }
    });

    jQuery(document).on("change", ".delivery", async function (event) {
        jQuery('#shipping_charge').val(parseFloat(jQuery('input[name="delivery_type"]:checked').val()));
        await updateTotals(parseFloat(jQuery(`input[name="delivery_type"]:checked`).val()));
    });


    if (url.indexOf("/menu") > -1) {
        /**
* Fetch Food Items via Menu (Menu  Page)
*/
        let currentPath = window.location.pathname;
        jQuery(".menu_list_inner").each(function () {
            if (currentPath === "/menu/" + jQuery(this).find("a").attr("menu-slug")) {
                jQuery(this).find("h3").addClass("active");
            }
        });

        jQuery(document).on("click", "#menu", async function (e) {
            e.preventDefault();
            jQuery(`.loader`).toggleClass('display');
            jQuery(`#menu_data_find`).empty();
            let slug = jQuery(this).attr("menu-slug");

            jQuery('#slug').val(slug);
            jQuery("h3").removeClass("active");

            let page = 1;
            let ajax_value = { slug, page };
            const response = await Ajax_response('', "GET", ajax_value, '', '');
            if (response) {
                jQuery(`.loader`).toggleClass('display');
                window.history.pushState(null, '', "/menu/" + slug);
                jQuery(`#menu_data_find`).empty().html(response);
                history.pushState({}, "", window.location.href);
                jQuery('#refreshButton').trigger('click');
                jQuery(this).find("h3").addClass("active");
            }
        });

        jQuery(document).on("click", "#refreshButton", async function (e) {
            let slug = jQuery('#slug').val();
            let mobile_type = jQuery('#menu').attr("mobile_type");
            let page = 1;
            let ajax_value = { slug, page };
            const response = await Ajax_response('', "GET", ajax_value, '', '');
            if (response) {
                if (mobile_type === 'mobile') {
                    jQuery('html, body').animate({
                        scrollTop: jQuery('#mobile').offset().top - 10
                    }, 500); // You can adjust the animation speed (1000ms = 1 second)
                } else {

                }
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
            let slug = jQuery('#slug').val();
            let page = jQuery(this).attr('href').split('page=')[1];
            let ajax_value = { slug, page };
            console.log(ajax_value)
            const response = await Ajax_response('', "GET", ajax_value, '', '');
            if (response) {
                window.history.pushState(null, '', jQuery(this).attr('href'));
                jQuery(`.loader`).toggleClass('display');
                jQuery(`#menu_data_find`).empty().html(response);

            }
        });



    } else if (url.indexOf("/contact-us") > -1) {
        jQuery(document).on("click", "#location", async function (event) {
            jQuery('html, body').animate({
                scrollTop: jQuery('#location_drag').offset().top
            }, 500); // You can adjust the animation speed (1000ms = 1 second)
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
            autoplay: true,
            slidesToScroll: 1,
            responsive: [
                {
                    breakpoint: 767,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: false
                    }
                },
                {
                    breakpoint: 575,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        infinite: true,
                        dots: false
                    }
                },
            ]
        });

    } else if (url.indexOf("/about-us") > -1) {

        jQuery('#about_us_page').slick({
            autoplay: true,
            autoplaySpeed: 1500,
            arrows: false,
            slidesToShow: 1,
            slidesToScroll: 1,
            slidesToScroll: 1,
            adaptiveHeight: true
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
    } else if (url.indexOf("/gallery") > -1) {
        /**
 * magnificPopup In Gallery Page
 */
        jQuery('.image-popup-vertical-fit').magnificPopup({
            type: 'image',
            mainClass: 'mfp-with-zoom',
            gallery: { enabled: true },
            zoom: {
                enabled: true,
                duration: 300,
                easing: 'ease-in-out',
                opener: openerElement => openerElement.is('img') ? openerElement : openerElement.find('img')
            }
        });

    } else if (url.indexOf("/cart") > -1) {

        if (!jQuery('.active').not(jQuery('#Bread-tab'))) {
        } else {
            let menu_id = jQuery(jQuery('#Bread-tab')).attr('menu_id');
            let ajax_value = { menu_id };
            fetch_extra_items_data(ajax_value);
        }
        jQuery(document).on("change", "#spicy_lavel", async function (event) {
            event.preventDefault();
            let spicy_lavel = jQuery(this).find(":selected").val();
            let location_type = jQuery(this).attr('location_type');
            const resPose = await Ajax_response(jQuery(this).attr('ajax_value'), "POST", { spicy_lavel, location_type }, '');
            if (resPose.status === 'success') {
                NotyfMessage(resPose.message, 'success');
                jQuery('#spicy_lavel').val(spicy_lavel);
            } else {
                jQuery.each(resPose.errors, function (key, value) {
                    jQuery(`#${key}-error`).text(value);
                });
            }
        });


        jQuery(document).on("click", ".extra_items", async function (event) {
            jQuery('.active').not(this).removeClass('active');
            jQuery(this).toggleClass('active');
            let menu_id = jQuery(this).attr('menu_id');
            let ajax_value = { menu_id };
            fetch_extra_items_data(ajax_value);
        });

        jQuery(document).on("click", "#checkout_btn", async function (event) {
            let shipping_charge = jQuery('#shipping_charge').val();
            let spicy_lavel = jQuery(`#spicy_lavel`).val();
            let show_form = jQuery(`#spicy_lavel`).attr('show_form');
            let subtotal = parseFloat(jQuery('#subtotal').attr('subtotal'));
            let mimimum_ammout = parseFloat(jQuery('#message').attr('mimimum_ammout'));
            let type = jQuery(this).attr('type');
            if (show_form === 'false') {
                if (subtotal < mimimum_ammout) {
                    NotyfMessage(`Your current order is <b>${jQuery('meta[name="site_currency"]').attr('content')}${parseFloat(jQuery('#subtotal').attr('subtotal'))}</b> You must have an order with minimum of <b>${jQuery('meta[name="site_currency"]').attr('content')}${parseFloat(jQuery('#message').attr('mimimum_ammout'))}.00 </b>to place the order`, 'error');
                } else {
                    if (type == 'null') {
                        jQuery(`#staticBackdrop`).modal('show')
                    } else if (type == 'take_out') {
                        window.location.href = jQuery(this).attr('login_url');
                    } else {
                        if (shipping_charge) {
                            window.location.href = jQuery(this).attr('login_url');
                        } else {
                            NotyfMessage('Please Choose Delivery Charges', 'error');
                        }
                    }
                }
            } else {
                if (spicy_lavel) {
                    if (subtotal < mimimum_ammout) {
                        NotyfMessage(`Your current order is <b>${jQuery('meta[name="site_currency"]').attr('content')}${parseFloat(jQuery('#subtotal').attr('subtotal'))}</b> You must have an order with minimum of <b>${jQuery('meta[name="site_currency"]').attr('content')}${parseFloat(jQuery('#message').attr('mimimum_ammout'))}.00 to place the order`, 'error');

                    } else {
                        if (type === 'null') {
                            jQuery(`#staticBackdrop`).modal('show')
                        } else if (type == 'take_out') {
                            window.location.href = jQuery(this).attr('login_url');
                        } else {
                            if (shipping_charge) {
                                window.location.href = jQuery(this).attr('login_url');
                            } else {
                                NotyfMessage('Please Choose Delivery Charges', 'error');
                            }
                        }
                    }
                } else {
                    NotyfMessage('Please Select the Spice  Level  for order ', 'error');
                }
            }

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
            is_spicy = jQuery(this).attr('is_spicy');
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
                let coupon_code = jQuery(`#coupon_code`).val();
                let apply_coupon= jQuery(`#apply_coupon`).attr('appied_coupon');
                let counterproductive = parseFloat(newVal * product__price),
                    ajax_value = { product_oid, qty, counterproductive, dilavery_charge ,coupon_code,apply_coupon};
                jQuery(`#product_quantity_price__${product_oid}`).text(`${site_currency}${counterproductive.toFixed(2)}`);
                jQuery(`#product_quntity__${product_oid}`).val(qty);
                jQuery(`#product_price__${product_oid}`).val(`${site_currency}${counterproductive.toFixed(2)}`);
                const resPose = await Ajax_response(ajax_url, "POST", ajax_value, '');
                if (resPose.status === `success`) {
                    jQuery(`#subtotal`).html(`<p>${site_currency}${resPose.subtotal}</p>`);
                    jQuery('#subtotal').attr('subtotal', resPose.subtotal)
                    jQuery('#discount_price').attr('discountprice',resPose.couponResponse.discount_amount  );
                    jQuery(`#discount`).html(`<p>${site_currency} ${resPose.couponResponse.discount_amount.toFixed(2)} </p>`);
                    jQuery(`#total_price_after_discount`).html(`<p>${site_currency} ${resPose.couponResponse.discount_total} </p>`);
                    jQuery(`#tax_total`).html(`<p>${site_currency}${resPose.total_tax}</p>`);
                    jQuery(`#grandTotal`).html(`<p>${site_currency}${resPose.total}</p>`);
                }
            }
        });
        /**
        *  Add to Cart  In Website (Extra_Items)
        */
        jQuery(document).on("click", "#add_to_cart_extra", async function (event) {
            jQuery(this).toggleClass(`added`);
            let ajax_url = jQuery(this).attr('cart_ajax_url');
            let product_uid = jQuery(this).attr("product_uid");
            let is_spisy = jQuery(`#is_spisy_${product_uid}`).val();
            let product_quntity = jQuery(`#product_quntity_${product_uid}`).val();
            let ajax_value = { product_uid, product_quntity, is_spisy };
            const resPose = await Ajax_response(ajax_url, "POST", ajax_value, '');
            if (resPose.status === `success`) {
                NotyfMessage(resPose.message, 'success');
                jQuery(`.cart_count`).html(resPose.cart_total);
                setTimeout(function () {
                    window.location.reload()
                }, 1000);
            }
        });

        jQuery(document).on("click", "#remove_add_to_Cart", async function (event) {
            let form = jQuery(this).closest("form");
            event.preventDefault();
            Swal.fire({
                title: `Are you sure you want to delete this Item?`,
                showCancelButton: true,
                confirmButtonText: 'Ok',
            }).then(async (result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
        //  Appllied Coupon Functionalty
        jQuery(document).on("click", "#apply_coupon", async function (event) {
            let site_currency = jQuery('meta[name="site_currency"]').attr('content');
            let coupon_type = jQuery(this).attr('coupon_type');
            let mimimum_ammout = parseFloat(jQuery('#message').attr('mimimum_ammout'));
            let subtotal = jQuery('#subtotal').attr('subtotal');
            let route_ajax = jQuery(this).attr('route_ajax');
            let coupon_code = jQuery(`#coupon_code`).val();
            let ajax_value = { mimimum_ammout, subtotal, coupon_code, coupon_type };
            if (coupon_code === '') {
                NotyfMessage(`Please Enter a Coupon Code `, 'error');
            } else {
                if (subtotal < mimimum_ammout) {
                    NotyfMessage(`Your current order is <b>${jQuery('meta[name="site_currency"]').attr('content')}${subtotal}</b> You must have an order with minimum of <b>${jQuery('meta[name="site_currency"]').attr('content')}${mimimum_ammout}.00 </b>to place the order`, 'error');
                } else {
                    const resPose = await Ajax_response(route_ajax, "POST", ajax_value, '');
                    if (resPose.status === 'success') {
                        NotyfMessage(resPose.message, 'success');
                        jQuery('#discount_price').attr('discountprice',resPose.discount_amount.toFixed(2)  );
                        jQuery(`#discount`).html(`<p>${site_currency} ${resPose.discount_amount.toFixed(2)} </p>`);
                        jQuery('#total_after_discount').attr('total_after_discount',resPose.discount_total.toFixed(2)  );
                        jQuery(`#total_price_after_discount`).html(`<p>${site_currency} ${resPose.discount_total} </p>`);
                        jQuery('#tax_total').val(resPose.tax);
                        jQuery(`#totaltax`).attr('totaltax',resPose.tax);
                        jQuery(`#tax_total`).html(`<p>${site_currency} ${resPose.tax} </p>`);
                        jQuery(`#grandTotal`).html(`<p>${site_currency} ${resPose.total} </p>`);
                        if (coupon_type ==='coupon') {
                            jQuery('#apply_coupon').text('Remove Coupon');
                            jQuery(`#apply_coupon`).attr('appied_coupon','coupon')
                            jQuery('#apply_coupon').attr('coupon_type','remove');
                        } else {
                            jQuery('#apply_coupon').text('Apply Coupon');
                            jQuery(`#apply_coupon`).attr('appied_coupon','')
                            jQuery('#apply_coupon').attr('coupon_type','coupon');
                            jQuery(`#coupon_code`).val('')
                        }
                    } else {
                        NotyfMessage(resPose.message, 'error');
                    }
                }
            }
        });
    } else if (url.indexOf("/checkout") > -1) {
        jQuery("#dilvery_tip").on("input", function (evt) {
            jQuery(this).val(jQuery(this).val().replace(/[^0-9]/g, ''));
        });
        // dilvery_tip Functionalty
        jQuery('#dilvery_tip').on('focusout  keyup', function () {
            console.log(';Kejkkjjkkj')
            let site_currency = jQuery('meta[name="site_currency"]').attr('content');
            let subtotal = parseFloat(jQuery('#total_ammount').val());
            let inputValue = (jQuery(this).val()) ? parseFloat(jQuery(this).val()) : parseFloat('0.00', 2);
            let totaltax = parseFloat(jQuery('#totaltax').attr('totaltax'));
            let dilevery_total = (jQuery('#dilevery_total').attr('dilevery_total') === undefined || (jQuery('#dilevery_total').attr('dilevery_total') === 'undefined')) ? parseFloat('0.00', 2) : parseFloat(jQuery('#dilevery_total').attr('dilevery_total'));
            let grandTotal = subtotal + totaltax + dilevery_total + inputValue;
            jQuery(`#grandTotalammount`).html(`${site_currency}${grandTotal.toFixed(2)}`);
            if (inputValue > 0) {
            } else {
                // NotyfMessage('The tip must be grater then zero ', 'error');
                jQuery('#dilvery_tip').val(null)
            }
        });
        /**
            * State Dependency In Checkout Page
       */
        let country_uid = parseInt(jQuery('#billing_country').find(":selected").attr('country_uid'));
        let ajax_url = jQuery('#state_ajax').val();

        let selected_billing_state = jQuery('#selected_billing_state').val();
        let ajax_value = { country_uid, 'type': 'country', selected_billing_state };
        state_dependency_country_list(ajax_value, ajax_url);
        /**
         * Payment Option
         */
        let payment_value = jQuery('input[name="payment_method"]:checked').val();
        (`payonline` == payment_value) ? jQuery(`#stripe_paymnet_form`).css(`display`, `block`) : jQuery(`#stripe_paymnet_form`).css(`display`, `none`);
        jQuery('.payment_form').attr('id', 'payment-form');
        jQuery('#stripe_paymnet_form').css('display', 'none');
        jQuery(document).on("click", ".payment_option", async function (event) {
            let payment_value = jQuery('input[name="payment_method"]:checked').val();
            if (payment_value === 'Pay On Online (Stripe)') {
                jQuery('.payment_form').attr('id', 'stripe_form');
                jQuery('#stripe_paymnet_form').css('display', 'block');
                stripePayment_Form(jQuery(`#StripeKey`).val());
            } else {
                jQuery('.payment_form').attr('id', 'payment-form');
                jQuery('#stripe_paymnet_form').css('display', 'none');
                payment_intergation();
            }
        });
        payment_intergation();

        jQuery('#billing_phone').inputmask('+1 (999) 999-9999');
        jQuery('#billing_postcode').inputmask('A9A 9A9', {
            placeholder: 'K1N 8W5\n',
            clearMaskOnLostFocus: false,
        })




    } else if (url.indexOf("/user/order") > -1) {
        jQuery(document).on("change", ".manage_by_order", async function (event) {
            jQuery(`#OrderStatus`).empty().html('<h2 class="text-center"> Processing</h2>');
            let element, filterType, filterValue, ajax_value, orderedajax;
            element = jQuery(this);
            filterType = element.attr("type");
            filterValue = element.val();
            ajax_value = { filterType, filterValue };
            orderedajax = jQuery('orderedajax').val();
            const resPose = await Ajax_response(orderedajax, "GET", ajax_value, '');
            jQuery(`#OrderStatus`).empty().html(resPose);
        });
    } else if (url.indexOf("user/profile-address") > -1) {
        /**
       * State Dependency In profile   Page
       */
        let country_uid = parseInt(jQuery('#billing_country').find(":selected").attr('country_uid'));
        let ajax_url = jQuery('#state_ajax').val();
        let selected_billing_state = jQuery('#selected_billing_state').val();
        let ajax_value = { country_uid, 'type': 'country', selected_billing_state };

        state_dependency_country_list(ajax_value, ajax_url);
        jQuery('#billing_postcode').inputmask('A9A 9A9', {
            placeholder: 'K1N 8W5\n',
            clearMaskOnLostFocus: false,
        })

    } else if (url.indexOf("/user/profile") > -1) {
        jQuery('#user_phone').inputmask('+1 (999) 999-9999');

    } else if (url.indexOf("/user/referral") > -1) {
      /*
       Copy Code Functionality
      */
    jQuery(document).on("click", "#reffrel_code", async function (event) {
        copy_clipborad(jQuery(this).val(''));
        NotyfMessage('This Code is copy Successfully', 'success');
    });


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
                let minTimeValue = (currentHour < 10 ? '0' : '') + currentHour + ':' + (currentMinute < 10 ? '0' : '') + currentMinute;
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

        jQuery('#booking_phone').inputmask('+1 (999) 999-9999');


    }

});
