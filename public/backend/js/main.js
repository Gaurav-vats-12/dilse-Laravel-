jQuery( function () {
    jQuery('.dropify').dropify();

    var url = window.location.pathname;
    if (url.indexOf("/banner") > -1) {
        jQuery(document).on("change","#banner_type", function(e) {
            var banner_type = jQuery("option:selected", this).val();
            if (banner_type == 'home') {
              jQuery('.banner_type__home').css('display','block');
              jQuery('.banner_type__promo').css('display','none');
              jQuery('.banner_type__popup').css('display','none');
              jQuery('.banner_type__sales').css('display','none');
            } else if(banner_type =='popup'){
              jQuery('.banner_type__home').css('display','none');
              jQuery('.banner_type__popup').css('display','block');
              jQuery('.banner_type__promo').css('display','none');
              jQuery('.banner_type__sales').css('display','none');
            }else if(banner_type =='promo'){
                 jQuery('.banner_type__home').css('display','none');
              jQuery('.banner_type__popup').css('display','none');
              jQuery('.banner_type__promo').css('display','block');
              jQuery('.banner_type__sales').css('display','none');
            }else if(banner_type =='sales'){
              jQuery('.banner_type__home').css('display','none');
              jQuery('.banner_type__promo').css('display','none');
              jQuery('.banner_type__popup').css('display','none');
              jQuery('.banner_type__sales').css('display','block');
            }else {
              jQuery('.banner_type__home').css('display','none');
              jQuery('.banner_type__promo').css('display','none');
              jQuery('.banner_type__popup').css('display','none');
              jQuery('.banner_type__sales').css('display','none');
            }
           });

       var banner_type = $('#banner_type').find(":selected").val();
       if (banner_type == 'home') {
        jQuery('.banner_type__home').css('display','block');
        jQuery('.banner_type__promo').css('display','none');
        jQuery('.banner_type__popup').css('display','none');
        jQuery('.banner_type__sales').css('display','none');
      } else if(banner_type =='popup'){
        jQuery('.banner_type__home').css('display','none');
        jQuery('.banner_type__popup').css('display','block');
        jQuery('.banner_type__promo').css('display','none');
        jQuery('.banner_type__sales').css('display','none');
      }else if(banner_type =='promo'){
           jQuery('.banner_type__home').css('display','none');
        jQuery('.banner_type__popup').css('display','none');
        jQuery('.banner_type__promo').css('display','block');
        jQuery('.banner_type__sales').css('display','none');
      }else if(banner_type =='sales'){
        jQuery('.banner_type__home').css('display','none');
        jQuery('.banner_type__promo').css('display','none');
        jQuery('.banner_type__popup').css('display','none');
        jQuery('.banner_type__sales').css('display','block');
      }else {
        jQuery('.banner_type__home').css('display','none');
        jQuery('.banner_type__promo').css('display','none');
        jQuery('.banner_type__popup').css('display','none');
        jQuery('.banner_type__sales').css('display','none');
      }
    }


});
