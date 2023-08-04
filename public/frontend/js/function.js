var ajaxResult = null;

async   function Ajax_response(url,method,values,callback,_beforetask =null){
  jQuery.ajaxSetup({headers: { 'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')  }
});
return await jQuery.ajax({
  type: method,
  url: url,
  data: values,
  success: callback,
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
