var ajaxResult = null;
async   function Ajax_response(url,method,values,beforetask, success,callback){
  jQuery.ajaxSetup({headers: { 'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')  } });
return await jQuery.ajax({
  type: method,
  url: url,
  data: values,
  beforeSend: function(msg){
},
success: function(msg){
    callback  },
  error: function(_request, status, _error) {
    console.log(status);
  }
});
}

$("input").keypress(function(e) {
    var input_val=   $(this).val();
       var name=   $(this).attr('name');
      if(!input_val){  jQuery(`#${name}-error`).html('');  }
  });

  var Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 10000
  });

  jQuery("#phone").on("keypress keyup blur",function (event) {
    jQuery(this).val($(this).val().replace(/[^0-9\.]/g,''));
       if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
           event.preventDefault();
       }
 });

 const counters = document.querySelectorAll('.counter');
 const speed = 200;
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

 jQuery(window).scroll(function() {
    var scroll = $(window).scrollTop();
    //>=, not <=
    if (scroll >= 550) {
        //clearHeader, not clearheader - caps H
        $(".home_slider_btn").addClass("active");
    }else if(scroll < 550){
        $(".home_slider_btn").removeClass("active");
    }
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

});

function getUrlParameter(name) {
    name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
    var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
    results = regex.exec(location.search);
    return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
}

async function getData(page){
    const response = await Ajax_response('?page=' + page,"GET",'','','');
    console.log(response);
    // if (response) {
    //     $("#menu_data_find").empty().html(response);
    //     jQuery('.loader').addClass('display')
    //     location.hash = page;
    // }
}


// $(window).on('hashchange', function() {
//     console.log('asdsad');
//     // if (window.location.hash) {
//     //     var page = window.location.hash.replace('#', '');
//     //     console.log(page);
//     //     if (page == Number.NaN || page <= 0) {
//     //         return false;
//     //     }else{
//     //         getData(page);
//     //     }
//     // }
// });
