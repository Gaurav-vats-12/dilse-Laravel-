
jQuery( function () {

    jQuery.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    jQuery('.summernote').summernote({
        tabsize: 2,
        height: 100
      })


    $('.select2').select2()
    jQuery('.dropify').dropify();
    $("#site_location").select2({
        maximumSelectionLength: 2
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
        jQuery('#orderstatus').select2();
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
        jQuery("#spicy_lavel").select2({  });
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
        // jQuery(document).on("change", "#status", async function (event) {
        //     let statusValue  = (jQuery(this).is(":checked") ) ? parseInt(jQuery(this).val()) : 0 ;
        //     let booking_id = parseInt(jQuery(this).attr('booking_id'));
        //     let ajax_value = {statusValue,booking_id};
        //     let  ajax_url =  jQuery(this).closest("form").attr('action');
        //     const resPose = await Ajax_response(ajax_url, "POST", ajax_value, '');
        //     console.log(resPose,ajax_url);

        //     // console.log(ajax_value);
        // });
        new DataTable('#manage_bookign_table',{
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
    }else if(url.indexOf("/order") > -1){


        new DataTable('#manage_orders',{
            "responsive": true,
            "lengthMenu": [10, 20],
            "searching": true,
            "autoWidth": true,
            "columnDefs": [
                { orderable: true, className: 'reorder', targets: 0 },
                { orderable: true, className: 'reorder', targets: 1 },
                { orderable: true, className: 'reorder', targets: 2 },
                { orderable: false, targets: '_all' }
            ]
        });
        jQuery('input[name="order_time_taken"]').on('keypress', function() {
        if (jQuery(this).val().length >= 3) {
            jQuery('#errorMessage').text('You can only enter a maximum of 3 characters.');
            return false;
        } else {
            jQuery('#errorMessage').text('');
        }
        });


            jQuery(document).on("click", "#append_pop_ups" ,function (event) {
            jQuery(`#order_time_taken-${jQuery(this).attr('order_uid')}-error`).text();
            jQuery(`#Order_model-${jQuery(this).attr('order_uid')}`).modal('show')
            localStorage.setItem('order_id', jQuery(this).attr('order_uid'));
        });
        jQuery(document).on("click",`#formSubmit`,async function(event) {
            event.preventDefault();
            let Url = $('#update_order_status').attr('action');
            let order_id = localStorage.getItem('order_id');
            let order_time_taken = jQuery(`#order_time_taken-${order_id}`).val();
            if(order_time_taken){
                jQuery(`#order_time_taken-${order_id}-error`).text();
                let AjaxValue ={order_id ,order_time_taken};
                const resPose = await Ajax_response(Url, "POST", AjaxValue, '');
                if(resPose.status === 'success'){
                    NotyfMessage(resPose.message, 'success');
                    jQuery(`#Order_model-${order_id}`).modal('hide')
                    $("#update_order_status")[0].reset();
                    location.reload();
                }
            }else{
                jQuery(`#order_time_taken-${order_id}-error`).text('The order time taken field is required.');
            }
        });
        jQuery(document).on("click", "#ChangeOrderStatus" ,function (event) {
            event.preventDefault();
                Swal.fire({
                    title: `Are you sure you want to Change  this Order ?`,
                    showCancelButton: true,
                    confirmButtonText: 'Ok',
                }).then(async (result) => {
                    if (result.isConfirmed) {
                        let order_uid = jQuery(this).attr('order_uid'), url = jQuery('#ajax_value').val(),  AjaxValue = {order_uid};
                        const resPose = await Ajax_response(url, "POST", AjaxValue, '');
                        if(resPose.status === 'success'){
                            NotyfMessage(resPose.message, 'success');
                            location.reload();
                        }
                    } else {
                    }
                })
        });

        jQuery(document).on("click", "#print_order" ,function (event) {
            window.print();
        });
    }else if(url.indexOf("/manage-subscribers") > -1){
        new DataTable('#view_subscribe_table',{
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


    }else if(url.indexOf("/manage-attributes") > -1){

        new DataTable('#attribute_bootrapp_ytable',{
            "responsive": true,
            "lengthMenu": [10, 20],
            "searching": true,
            "columnDefs": [
                { orderable: true, className: 'reorder', targets: 0 },
                { orderable: true, className: 'reorder', targets: 1 },
                { orderable: false, targets: '_all' }
            ]
        });

    }

});
