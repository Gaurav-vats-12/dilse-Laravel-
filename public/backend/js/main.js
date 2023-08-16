jQuery( function () {
    jQuery('.summernote').summernote({
        tabsize: 2,
        height: 100
      })


    $('.select2').select2()
    jQuery('.dropify').dropify();
    $("#site_location").select2({
        maximumSelectionLength: 2
      });

    //   let table = new DataTable('#datatable',{
    //     "responsive": true,
    //     "lengthMenu": [10, 20],
    //     "searching": true,
    //       "columnDefs": [
    //   { orderable: true, className: 'reorder', targets: 0 },
    //   { orderable: true, className: 'reorder', targets: 2 },
    //   { orderable: true, className: 'reorder', targets: 4 },
    //   { orderable: false, targets: '_all' }
    // ]
    // });

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
    }else if(url.indexOf("/genral") > -1){
        $("#site_location").select2({ maximumSelectionLength: 2});


    }else if(url.indexOf("/manage-pages") > -1){
        jQuery(document).on("focusout","#page_title", function(e) {
            jQuery('#page_slug').val(`${jQuery('#page_title').val().replace(/\s+/g, '-').toLowerCase()}`);
          });
          new DataTable('#manage_pages_datatable',{
            "responsive": true,
            "lengthMenu": [10, 20],
            "searching": true,
              "columnDefs": [
          { orderable: true, className: 'reorder', targets: 0 },
          { orderable: true, className: 'reorder', targets: 1 },
          { orderable: true, className: 'reorder', targets: 2 },
          { orderable: true, className: 'reorder', targets: 3 },
          { orderable: false, targets: '_all' }
        ]
        });


    }else if(url.indexOf("/testimonial") > -1){
        new DataTable('#testonomails_table',{
            "responsive": true,
            "lengthMenu": [10, 20],
            "searching": true,
              "columnDefs": [
          { orderable: true, className: 'reorder', targets: 0 },
          { orderable: true, className: 'reorder', targets: 1 },
          { orderable: true, className: 'reorder', targets: 3 },
          { orderable: false, targets: '_all' }
        ]
        });
    }else if(url.indexOf("/menu") > -1){
        jQuery(document).on("focusout","#menu_name", function(e) {
            jQuery('#menu_slug').val(`${jQuery('#menu_name').val().replace(/\s+/g, '-').toLowerCase()}`);
          });
          new DataTable('#menutable',{
                "responsive": true,
                "lengthMenu": [10, 20],
                "searching": true,
                  "columnDefs": [
              { orderable: true, className: 'reorder', targets: 0 },
              { orderable: true, className: 'reorder', targets: 1 },
              { orderable: true, className: 'reorder', targets: 2 },
              { orderable: false, targets: '_all' }
            ]
            });

    }else if(url.indexOf("/blog") > -1){
        new DataTable('#blog_table',{
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


    }else if(url.indexOf("/food-items") > -1){
        new DataTable('#food_items',{
            "responsive": true,
            "lengthMenu": [10, 20],
            "searching": true,
              "columnDefs": [
          { orderable: true, className: 'reorder', targets: 0 },
          { orderable: true, className: 'reorder', targets: 1 },
          { orderable: true, className: 'reorder', targets: 2 },
          { orderable: true, className: 'reorder', targets: 3 },
          { orderable: true, className: 'reorder', targets: 4 },
          { orderable: true, className: 'reorder', targets: 5 },
          { orderable: false, targets: '_all' }
        ]
        });
    }else if(url.indexOf("/extra-items") > -1){
        new DataTable('#extra_food_items',{
            "responsive": true,
            "lengthMenu": [10, 20],
            "searching": true,
              "columnDefs": [
          { orderable: true, className: 'reorder', targets: 0 },
          { orderable: true, className: 'reorder', targets: 2 },
          { orderable: true, className: 'reorder', targets: 3 },
          { orderable: true, className: 'reorder', targets: 4 },
          { orderable: false, targets: '_all' }
        ]
        });
    }else if(url.indexOf("/manage-gallery") > -1){
        new DataTable('#manage_gallery_datatable',{
            "responsive": true,
            "lengthMenu": [10, 20],
            "searching": true,
              "columnDefs": [
          { orderable: true, className: 'reorder', targets: 0 },
          { orderable: true, className: 'reorder', targets: 1 },
          { orderable: false, targets: '_all' }
        ]
        });
    }else if(url.indexOf("/booking") > -1){
        new DataTable('#manage_bookign_table',{
            "responsive": true,
            "lengthMenu": [10, 20],
            "searching": true,
              "columnDefs": [
          { orderable: true, className: 'reorder', targets: 0 },
          { orderable: true, className: 'reorder', targets: 1 },
          { orderable: true, className: 'reorder', targets: 2 },
          { orderable: true, className: 'reorder', targets: 3 },
          { orderable: true, className: 'reorder', targets: 4 },
          { orderable: true, className: 'reorder', targets: 5 },
          { orderable: true, className: 'reorder', targets: 6 },
          { orderable: true, className: 'reorder', targets: 7 },
          { orderable: false, targets: '_all' }
        ]
        });
    }else if(url.indexOf("/order") > -1){
        new DataTable('#manage_orders',{
            "responsive": true,
            "lengthMenu": [10, 20],
            "searching": true,
            "columnDefs": [
                { orderable: true, className: 'reorder', targets: 0 },
                { orderable: true, className: 'reorder', targets: 1 },
                { orderable: true, className: 'reorder', targets: 2 },
                { orderable: false, targets: '_all' }
            ]
        });
    }

});
