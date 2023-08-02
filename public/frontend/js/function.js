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
    timer: 3000
  });
