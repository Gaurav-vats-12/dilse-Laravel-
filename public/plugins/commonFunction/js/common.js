let  ajaxResult = null;
const Ajax_response = async (url, method, values, beforetask, success, callback) => {
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
};

const NotyfMessage = (message , type) => {
    var notyf = new Notyf();
    if(type ==='success'){
        notyf.success(message);
    }else if(type ==='error'){
        notyf.error(message);
    }else if(type ==='warning'){
        notyf.error(message);
    }
};


jQuery('.show_confirm').click(function(event) {
    const form = $(this).closest("form");
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

const updateCountryCode = countryCode => {
    phoneInput.val(phoneInput.val().replace(/^\+9/, countryCode));
  };

  jQuery(document).on("click", '#btnToggle', function (event) {3
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

const genrate_code =  (codeLength ) => {
  const characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
  let randomCode = '';
    for (let i = 0; i < codeLength; i++) {
        const randomIndex = Math.floor(Math.random() * characters.length);
        randomCode += characters.charAt(randomIndex);
      }
    return randomCode ;

}

const copy_clipborad =  (copy_text ) => {
    navigator.clipboard.writeText(copy_text);
    return true


}
