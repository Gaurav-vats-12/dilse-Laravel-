jQuery(document).ready(function () {

    /**
     * Subscribe Our Newsletter Submission Form Ajax (Home Page)
     */
    jQuery(document).on("submit", "#emailSubscribeForm", async function (event) {
        event.preventDefault();
        let ajax_value_list = jQuery(this).serialize(), ajx_url = jQuery('#email_action_url').val();
        const resPose = await Ajax_response(ajx_url, "POST", ajax_value_list, '');
        if (resPose.status === `success`) {
            Toast.fire({icon: `success`, title: resPose.message})
            $("#emailSubscribeForm")[0].reset();
        }else if(resPose.status === `error`){
            Toast.fire({icon: `warning`, title: resPose.message})
            $("#emailSubscribeForm")[0].reset();
        }else{
            jQuery.each(resPose.errors, function (key, value) {
                jQuery(`#${key}-error`).text(value);
            });
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
    jQuery(document).on("submit","#conatact_cus_form",async function(e) {
        e.preventDefault();
        let ajax_value_list = $(this).serialize(), ajx_url = jQuery(`#contact_us_action_url`).val();
        const [resPose] = await Promise.all([Ajax_response(ajx_url, "POST", ajax_value_list, '')]);
        if(resPose.status === 'success'){
            Toast.fire({ icon: 'success',title: resPose.message, })
            jQuery("#conatact_cus_form")[0].reset();
        }else{
            jQuery.each(resPose.errors, function (key, value) {
                jQuery(`#${key}-error`).text(value);
            });
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
        var $button = jQuery(this);
        var oldValue = $button.closest('.update-cart-qty').find("input.product-qty").val();
        //let jQueryqtyInputs = jQuery(`.qty-input`),
        //qtyMin = parseInt(jQueryqtyInputs.find(`.product-qty`).attr(`min`)),
        //qtyMax = parseInt(jQueryqtyInputs.find(`.product-qty`).attr(`max`)),
        //jQuerythis = jQuery(this),
        //jQueryminusBtn = jQuerythis.siblings(`.qty-count--minus`),
        //jQueryaddBtn = jQuerythis.siblings(`.qty-count--add`),
        let quantity = jQuery(this).parent().find(`.product-qty`),
            ajax_url = jQuery(`#ajax_url`).val(),
            dilavery_charge = jQuery(`#dilavery_charge`).val(),
            product__price = parseFloat(quantity.attr(`product__price`)),
            //quantity_type = jQuery(this).attr(`quantity-type`).toString(),
            product_oid = parseInt(jQuery(this).attr(`productoid`));

        if ($button.text() == "+") {
            var newVal = parseFloat(oldValue) + 1;
        }else {
            console.log('checking total',newVal);
            // Don't allow decrementing below zero

            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 0;
            }
            if(newVal === 0){
                $button.closest('.shopping_items').find('#remove_add_to_Cart').trigger('click');
            }
        }
        $button.closest('.update-cart-qty').find("input.product-qty").attr('value',newVal);
        /*if ('plus' === quantity_type) {
                jQueryaddBtn.attr("disabled", false);
                jQueryminusBtn.attr("disabled", false);
                if (qty >= qtyMax) {
                    quantity.val(qtyMax).change();
                    jQuerythis.attr("disabled", true);
                } else {
                    console.log(qty);
                    quantity.val(qty+1);
                    console.log('quantity',quantity.val());
                    quantity.attr('value',qty+1)
                    //quantity.val(qty + 1).change();
                }
            } else {
                jQueryaddBtn.attr("disabled", false);
                jQueryminusBtn.attr("disabled", false);
                if (isNaN(qty) || qty <= qtyMin) {
                    quantity.val(qtyMin).change();
                    let uid = jQuery('.shopping_items_main').length;
                    jQuery(`#cart_products-${product_oid}`).empty();
                } else {
                    quantity.val(qty - 1).change();
                }
            }*/
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
});
