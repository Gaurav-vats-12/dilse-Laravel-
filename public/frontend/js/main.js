jQuery(document).ready(function () {


    //  Menu Js
    jQuery(document).on("click","#menu",async function(e) {
        e.preventDefault();
        jQuery('.loader').removeClass('display');
        var menu_slug =  jQuery(this).attr("menu-slug");
        var defalt_show =  jQuery(this).attr("default");
        var ajax_value ={menu_slug,defalt_show};
        const response = await Ajax_response(jQuery('#ajax_url').val(),"POST",ajax_value,'','');
        if(response.status =='success'){
            jQuery('#menu_data_find').html(response.content);
            jQuery('.loader').addClass('display')
        }
    });

    $('.quantity').on('click', '.minus',
        function(e) {
        let $input = $(this).next('input.qty');
        var val = parseInt($input.val());
        if (val > 0) {
            $input.val( val-1 ).change();
        }
    });
    $( "#datepicker" ).datepicker({ minDate: 0});
    $('#timepicker').timepicker({
        timeFormat: 'h:mm p',
        interval: 15,
        scrollbar: true
    });
});




 jQuery('.image-popup-vertical-fit').magnificPopup({
    type: 'image',
    mainClass: 'mfp-with-zoom',
    gallery:{
              enabled:true
          },
          zoom: {
            enabled: true,

            duration: 300, // duration of the effect, in milliseconds
            easing: 'ease-in-out', // CSS transition easing function

            opener: function(openerElement) {

              return openerElement.is('img') ? openerElement : openerElement.find('img');
          }
        }


        // $('.quantity').on('click', '.plus', function(e) {
        //     let $input = $(this).prev('input.qty');
        //     let val = parseInt($input.val());
        //     $input.val( val+1 ).change();
        // });


});

