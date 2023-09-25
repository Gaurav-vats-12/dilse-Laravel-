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

function updateCountryCode(countryCode ,) {
    phoneInput.val(phoneInput.val().replace(/^\+9/, countryCode));
  }

  jQuery(document).on("click", "#btnToggle", function (event) {
    let passwordItd;
    jQuery(this).find("#eyeIcon").toggleClass("fa-eye fa-eye-slash");
    if (jQuery(this).attr('passwordType') === 'password') {
 passwordItd = jQuery('#password');
    } else  if(jQuery(this).attr('passwordType') === 'password_confirmation'){
         passwordItd = jQuery('#password_confirmation');
    }else if(jQuery(this).attr('passwordType') === 'current_password'){
         passwordItd = jQuery('#current_password');
    }
    if (passwordItd.attr('type') === 'password') {
        passwordItd.attr('type', 'text');
    } else {
        passwordItd.attr('type', 'password')
    }
});

function generateSessionId(){
    return Math.floor(Math.random() * 1000000).toString();
}

