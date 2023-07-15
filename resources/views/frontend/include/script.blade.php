<link rel="stylesheet" href="{{asset('frontend/cdnjs.cloudflare.com/ajax/libs/intl-tel-input/14.0.6/css/intlTelInput.css')}}" />
    <link href="{{asset('frontend/dist/css/simple-calendar.min.css')}}" rel="stylesheet" />
    <!--Scripts-->
    <script src="{{asset('frontend/cdnjs.cloudflare.com/ajax/libs/jquery/1.11.3/jquery.min.js')}}"></script>
    <script src="{{asset('frontend/ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js')}}"></script>
    <script src="{{asset('frontend/dist/js/scroll-smooth.min.js')}}"></script>
    <script src="{{asset('frontend/apis.google.com/js/platform.js')}}"></script>
    <script src="{{asset('frontend/cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.5.2/bootbox.min.js')}}"></script>
    <script src="{{asset('frontend/js/bootbox.locales.min.js')}}"></script>
    <script src="{{asset('frontend/dist/js/popper.min.js')}}"></script>
    <script src="{{asset('frontend/cdn.jsdelivr.net/npm/bootstrap%404.4.1/dist/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('frontend/dist/js/main.min.js')}}"></script>
    <script src="{{asset('frontend/dist/js/owlcarousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('frontend/dist/js/index.min.js')}}"></script>
    <script src="{{asset('frontend/cdnjs.cloudflare.com/ajax/libs/jquery.serializeJSON/3.2.1/jquery.serializejson.min.js')}}"></script>
    <script src="{{asset('frontend/dist/js/script.min.js')}}"></script>
    <script src="{{asset('frontend/dist/js/carousels.min.js')}}"></script>
    <script src="{{asset('frontend/cdnjs.cloudflare.com/ajax/libs/intl-tel-input/14.0.6/js/intlTelInput.min.js')}}"></script>
    <script src="{{asset('frontend/dist/js/jquery.toaster.min.js')}}"></script>
    <script src="{{asset('frontend/dist/js/jquery.toaster.js')}}"></script>
    <script src="{{asset('frontend/dist/js/toastr.min.js')}}"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>


    <script src="{{asset('assets/admin/app-assets/vendors/js/pickers/pickadate/picker.js')}}"></script>
<script src="{{asset('assets/admin/app-assets/vendors/js/pickers/pickadate/picker.date.js')}}"></script>
<script src="{{asset('assets/admin/app-assets/vendors/js/pickers/pickadate/picker.time.js')}}"></script>
<script src="{{asset('assets/admin/app-assets/vendors/js/pickers/pickadate/legacy.js')}}"></script>
<script src="{{asset('assets/admin/app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js')}}"></script>
<script src="{{asset('assets/admin/app-assets/js/scripts/forms/pickers/form-pickers.js')}}"></script>

    <script>
            $('.slick-slider').slick({
                dots: false,
                infinite: true,
                    autoplay: true,
                speed: 300,
                slidesToShow: 4,
                slidesToScroll: 4,
                responsive: [
                    {
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        infinite: true,
                        dots: true
                    }
                    },
                    {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 2
                    }
                    },
                    {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                    }
                ]
                });
    </script>

<script>
            $('.slick-slider-appointments').slick({
                dots: false,
                infinite: true,
                    autoplay: true,
                speed: 300,
                slidesToShow: 1,
                slidesToScroll: 1,
                responsive: [

                    {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                    },
                    {
                    breakpoint: 360,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                    }
                ]
                });
    </script>
