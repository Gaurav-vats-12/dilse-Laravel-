jQuery( function () {
    jQuery('.dropify').dropify();
    $("#site_location").select2({
        maximumSelectionLength: 2
      });

      let table = new DataTable('#datatable',{
        "responsive": true,
        "lengthMenu": [10, 20],
        "searching": true,
          "columnDefs": [
      { orderable: true, className: 'reorder', targets: 0 },
      { orderable: true, className: 'reorder', targets: 2 },
      { orderable: true, className: 'reorder', targets: 4 },
      { orderable: false, targets: '_all' }
    ]
    });

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
      let table = new DataTable('#bannerTable',{
        "responsive": true,
        "lengthMenu": [10, 20],
        "searching": true,
          "columnDefs": [
      { orderable: true, className: 'reorder', targets: 0 },
      { orderable: true, className: 'reorder', targets: 2 },
      { orderable: true, className: 'reorder', targets: 4 },
      { orderable: false, targets: '_all' }
    ]
    });
    }else if(url.indexOf("/genral") > -1){
        $("#site_location").select2({ maximumSelectionLength: 2});


    }else if(url.indexOf("/manage-pages") > -1){
        jQuery(document).on("focusout","#page_title", function(e) {
            jQuery('#page_slug').val(`${jQuery('#page_title').val().replace(/\s+/g, '-').toLowerCase()}`);
          });
          jQuery('#page_content').summernote({
            tabsize: 2,
            height: 100
          })


    }else if(url.indexOf("/testimonial") > -1){
        jQuery('#testimonial_description').summernote({
            tabsize: 2,
            height: 100
          })
    }else if(url.indexOf("/menu") > -1){
        jQuery(document).on("focusout","#menu_name", function(e) {
            jQuery('#menu_slug').val(`${jQuery('#menu_name').val().replace(/\s+/g, '-').toLowerCase()}`);
          });
    }else if(url.indexOf("/blog") > -1){
        jQuery('#blog_content').summernote({ tabsize: 2, height: 100 })
        jQuery(document).on("focusout","#blog_title", function(e) {
            jQuery('#blog_slug').val(`${jQuery('#blog_title').val().replace(/\s+/g, '-').toLowerCase()}`);
          });
    }

});
