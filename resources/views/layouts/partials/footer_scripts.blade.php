

   <!-- jquery -->
    <script src="{{asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Jquery UI  -->
    <script src="{{asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Bootstrap Bundle (includes Popper) -->
    <script src="{{asset('plugins/bootstrap-5.0.2-dist/js/bootstrap.bundle.min.js') }}"></script>
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

    <script>
    $(window).scroll(function() {    
        var scroll = $(window).scrollTop();

        //>=, not <=
        if (scroll >= 550) {
            //clearHeader, not clearheader - caps H
            $(".home_slider_btn").addClass("active");
        }else if(scroll < 550){
            $(".home_slider_btn").removeClass("active");
        }
    });
</script>

</body>
</html>
