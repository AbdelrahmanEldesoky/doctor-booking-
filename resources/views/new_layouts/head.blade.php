
  <!-- Favicons -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Vina+Sans&display=swap" rel="stylesheet">


<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Vina+Sans&display=swap" rel="stylesheet">



  <link href="{{ asset('new_assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Raleway:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->

  <link href="{{ asset('new_assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{ asset('new_assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">


  <link href="{{ asset('new_assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{ asset('new_assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{ asset('new_assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
  <!-- Template Main CSS File -->
  <link href="{{ asset('new_assets/css/main.css')}}" rel="stylesheet">
  <link href="{{ asset('new_assets/my_style.css')}}" rel="stylesheet">

  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Vina+Sans&display=swap" rel="stylesheet">

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
<link rel="shortcut icon" href="{{ asset('new_assets/img/icon.ico') }}">

<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
  @include('new_layouts.fonts')
<!-- Bootstrap core JavaScript
    ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

  {{-- Start toastr --}}
  {{-- <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/app-assets/css/plugins/extensions/ext-component-toastr.css')}}"> --}}
  {{-- <link href="{{asset('frontend/dist/css/toastr.min.css')}}" rel="stylesheet" async />
  <script src="{{asset('frontend/dist/js/toastr.min.js')}}"></script>
  <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/app-assets/vendors/css/extensions/toastr.min.css')}}">
   --}}

   <link href="{{asset('frontend/dist/css/toastr.min.css')}}" rel="stylesheet" async />
  {{-- End toastr --}}


      @if(LaravelLocalization::getCurrentLocale()=='ar')
      <link href="{{ asset('new_assets/lang/rtl.css')}}" rel="stylesheet">

      @else
      <link href="{{ asset('new_assets/lang/ltr.css')}}" rel="stylesheet">
      @endif

    <link href="https://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css" rel="Stylesheet"
    type="text/css" />
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>


      {{-- sweet alert --}}
      <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
      <script src="{{ asset('new_assets/sweetalert2.all.min.js') }}"></script>
