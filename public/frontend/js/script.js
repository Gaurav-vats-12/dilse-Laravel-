let animate = (obj, initVal, lastVal, duration) => {
    let startTime = null;
    let currentTime = Date.now();
    const step = (currentTime ) => {
        if (!startTime) {
            startTime = currentTime ;
        }
        const progress = Math.min((currentTime - startTime)/ duration, 1);
        obj.innerHTML = Math.floor(progress * (lastVal - initVal) + initVal) + '+';
        if (progress < 1) {
            window.requestAnimationFrame(step);
        } else {
            window.cancelAnimationFrame(window.requestAnimationFrame(step));
        }
    };
    window.requestAnimationFrame(step);
};
let url = window.location.pathname;
  const fetch_extra_items_data = async (ajax_value) => {
      let cart_ajx_url = jQuery('#cart_ajx_url').val();
      const resPose = await Ajax_response(cart_ajx_url, "POST", ajax_value, '');
      jQuery(`#myTabContent`).empty().html(resPose);
      jQuery('.product_checkout').slick({
          arrows: true,
          dots: false,
          slidesToShow: 4,
          autoplaySpeed:1500,
          slidesToScroll: 1,
          preletrow: `<button class="slide-arrow prev-arrow"></button>`,
          nextArrow: `<button class="slide-arrow next-arrow"></button>`,
          responsive: [
            {
              breakpoint: 767,
              settings: {
                arrows: false,
                slidesToShow: 2,
                autoplay:true,
                autoplaySpeed:1500,
                slidesToScroll: 2,
                infinite: true,
                dots: false
              }
            },
            {
              breakpoint: 575,
              settings: {
                arrows: false,
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay:true,
                autoplaySpeed:1500,
                infinite: true,
                dots: false
              }
            },
          ]
      });
  };

const state_dependency_country_list = async (ajax_post, url) => {
    const response = await Ajax_response(url, "POST", ajax_post, '');
    jQuery(`#billing_state`).empty().html(response);
};

const updateTotals = async (deliveryCost) => {
    let site_currency = jQuery('meta[name="site_currency"]').attr('content');
    let location_type =  jQuery('input[name="delivery_type"]:checked').attr('location_type');
    let total_ammount = parseFloat(jQuery('#total_ammount').val());
    let tax =parseFloat(jQuery('#totaltax').attr('totaltax'));
    let grandTotal = total_ammount + deliveryCost + tax;
    let trypelist =jQuery('#subtotal').attr('trypelist');
    const resPose = await Ajax_response(jQuery('#subtotal').attr('updated_route'), "POST", {deliveryCost,location_type}, '');
    if (resPose.code == '200') {
        if (trypelist === 'cart') {
            location.reload(true);
        } else {
                    jQuery(`#dilevery_total`).html(`${site_currency}${deliveryCost.toFixed(2)}`);
                    jQuery(`#dilevery_total`).attr( 'dilevery_total',`${deliveryCost.toFixed(2)}`);
                    jQuery(`#grandTotalammount`).html(`${site_currency}${grandTotal.toFixed(2)}`);
                    jQuery('#dilvery_tip').val(null)
        }

    }
}
