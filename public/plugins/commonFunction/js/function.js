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
let Toast = Swal.mixin({
    toast: true,
    position: 'bottom-end',
    showConfirmButton: false,
    showCloseButton: true,
    timer: 10000
});
