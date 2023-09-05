let  ajaxResult = null;
async function Ajax_response(url, method, values, beforetask, success, callback) {
    jQuery.ajaxSetup({headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')}});
    return jQuery.ajax({
        type: method,
        url: url,
        data: values,
        beforeSend: function (msg) {
        },
        success: function (msg) {
            callback
        },
        error: function (_request, status, _error) {
        }

    });

}

function NotyfMessage(message ,type){
    var notyf = new Notyf();
    if(type ==='success'){
        notyf.success(message);
    }else if(type ==='error'){
        notyf.error(message);
    }else if(type ==='warning'){
        notyf.error(message);
    }
}


jQuery('.show_confirm').click(function(event) {
    var form =  $(this).closest("form");
    var name = $(this).data("name");
    event.preventDefault();
     Swal.fire({
        title: `Are you sure you want to delete this record?`,
        showCancelButton: true,
        confirmButtonText: 'Ok',
      }).then((result) => {
        if (result.isConfirmed) {
            form.submit();
        } else  {
        }
      })
});

function toggal_passwords(ids){
    if (ids.attr('type') === 'password') {
        ids.attr('type', 'text');
    } else {
        ids.attr('type', 'password')
    }

}
