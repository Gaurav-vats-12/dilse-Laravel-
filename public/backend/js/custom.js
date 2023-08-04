function makeid(length) {
    let result = '';
    const characters = '0123456789';
    const charactersLength = characters.length;
    let counter = 0;
    while (counter < length) {
      result += characters.charAt(Math.floor(Math.random() * charactersLength));
      counter += 1;
    }
    return result;
  }

  jQuery('.show_confirm').click(function(event) {
    var form =  $(this).closest("form");
    var name = $(this).data("name");
    event.preventDefault();
     Swal.fire({
        title: `Are you sure you want to delete this record?`,
        showCancelButton: true,
        confirmButtonText: 'Save',
        denyButtonText: `Don't save`,
      }).then((result) => {
        if (result.isConfirmed) {
            form.submit();
        } else  {
        }
      })
//    new   swal({
//         title: `Are you sure you want to delete this record?`,
//         icon: "warning",
//         buttons: true,
//         showCancelButton: true,
//         dangerMode: true,
//     })
//     .then((willDelete) => {
//       if (willDelete) {
//         form.submit();
//       }
//     });
});
