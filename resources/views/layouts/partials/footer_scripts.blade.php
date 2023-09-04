
   <!-- Stripe -->
   <script src="https://js.stripe.com/v3/"></script>
   <!-- jquery -->
    <script src="{{asset('plugins/jquery/jquery.min.js') }}"></script>
   <!-- Jquery  Validations  -->
   <script src="{{asset('plugins/jquery-validation/jquery.validate.min.js') }}"></script>
   <script src="{{asset('plugins/jquery-validation/additional-methods.min.js') }}"></script>
   <!-- jQuery UI 1.11.4 -->
   <script src="{{asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- magnific Pop Ups -->
    <script src="{{asset('plugins/magnific-popup/js/magnific-popup.min.js')}}"></script>
    <!-- Bootstrap Bundle (includes Popper) -->
    <script src="{{asset('plugins/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js')}}"></script>
    <!--slick js -->
    <script src="{{asset('plugins/slick-1.8.1/slick/slick.min.js') }}"></script>
    <!-- Sweet Alert  -->
    <script src="{{asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
   <!-- TimePicker  -->
   <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
   <!-- Toastr -->
   <script  src="{{asset('plugins/toastr/js/toastr.min.js')}}"></script>
   <!-- jqueryscripttop -->
   <script src="{{asset('plugins/jqueryscripttop/js/jquery-editable-select.js')}}"></script>
   <!-- InputMask -->
   <script src="{{asset('plugins/inputmask/jquery.inputmask.min.js') }}"></script>
   <!-- main.js -->
    <script src="{{asset('frontend/js/main.js') }}"></script>
    <!-- Function.js -->
    <script src="{{asset('frontend/js/function.js') }}"></script>
   <script src="{{asset('frontend/js/mediaQuery.js') }}"></script>
   <script>

       @if(Session::has('message'))
       Swal.fire({
           text: "{{ session('message') }}",
           icon: 'success',
           timer: 2000, // close after 2 seconds
           showConfirmButton: false
       });

       @endif

           @if(Session::has('error'))
       Swal.fire({
           text: "{{ session('message') }}",
           icon: 'error',
           timer: 2000, // close after 2 seconds
           showConfirmButton: false
       });

       @endif

           @if(Session::has('info'))
       Swal.fire({
           text: "{{ session('message') }}",
           icon: 'info',
           timer: 2000, // close after 2 seconds
           showConfirmButton: false
       });
       @endif

           @if(Session::has('warning'))
       Swal.fire({
           text: "{{ session('message') }}",
           icon: 'info',
           timer: 2000, // close after 2 seconds
           showConfirmButton: false
       });
       @endif
   </script>
