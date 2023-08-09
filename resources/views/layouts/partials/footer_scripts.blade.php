
   <!-- jquery -->
    <script src="{{asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Jquery UI  -->
    <script src="{{asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- magnific Pop Ups -->
    <script src="{{asset('plugins/magnific-popup/js/magnific-popup.min.js')}}"></script>
    <!-- Bootstrap Bundle (includes Popper) -->
    <script src="{{asset('plugins/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js')}}"></script>
    <!--slick js -->
    <script src="{{asset('plugins/slick-1.8.1/slick/slick.min.js') }}"></script>
    <!-- Sweet Alert  -->
    <script src="{{asset('plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <!-- Toast Alert -->
    <script src="{{asset('plugins/toastr/toastr.min.js') }}"></script>
    <!-- main.js -->
    <script src="{{asset('frontend/js/main.js') }}"></script>
    <!-- Function.js -->
    <script src="{{asset('frontend/js/function.js') }}"></script>
    
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>

    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>

    
    @include('sweetalert::alert')
@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])
</body>
</html>
