<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>vue</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
<!-- Template CSS Files -->
   <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
   <link rel="stylesheet" href="{{ asset('css/bootstrap-select.min.css') }}">
   <link rel="stylesheet" href="{{ asset('css/line-awesome.css') }}">
   <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
   <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
   <link rel="stylesheet" href="{{ asset('css/jquery.fancybox.min.css') }}">
   <link rel="stylesheet" href="{{ asset('css/daterangepicker.css') }}">
   <link rel="stylesheet" href="{{ asset('css/animate.min.css') }}">
   <link rel="stylesheet" href="{{ asset('css/animated-headline.css') }}">
   <link rel="stylesheet" href="{{ asset('css/jquery-ui.css') }}">
   <link rel="stylesheet" href="{{ asset('css/flag-icon.min.css') }}">
   <link rel="stylesheet" href="{{ asset('css/style.css') }}">
   <link href="https://unpkg.com/primevue/resources/themes/lara-light-indigo/theme.css" rel="stylesheet">
        <link href="https://unpkg.com/primevue/resources/primevue.min.css" rel="stylesheet">
        <link href="https://unpkg.com/primeicons/primeicons.css" rel="stylesheet">
   <style>
        font{
     background-color: transparent !important;
     -webkit-box-shadow: none  !important;
    -moz-box-shadow: none !important;
     box-shadow: none !important;
        }
        .skiptranslate{
            display: none;
        }


        #google_translate_element{width:300px;float:right;text-align:right;display:block}
.goog-te-banner-frame.skiptranslate { display: none !important;}
body { top: 0px !important; }
#goog-gt-tt{display: none !important; top: 0px !important; }
.goog-tooltip skiptranslate{display: none !important; top: 0px !important; }
.activity-root { display: hide !important;}
.status-message { display: hide !important;}
.started-activity-container { display: hide !important;}
         body{
            top: 0px !important;
        }
        #app{
            overflow:  !important;
        }
    </style>

</head>
<body>
<div id="google_translate_element"></div>
<div id="app"></div>
<script>
      function googleTranslateElementInit() {
      new google.translate.TranslateElement(
        { pageLanguage: 'en', autoDisplay: false },
        'app'
      );
    }
</script>
<script src="{{ mix('dist/js/main.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit" ></script>
<script src="https://unpkg.com/lokijs@^1.5/build/lokijs.min.js"></script>
<script src="{{asset('js/jquery-3.4.1.min.js')}}"></script>
<script src="{{asset('js/jquery-ui.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/bootstrap-select.min.js')}}"></script>
<script src="{{asset('js/moment.min.js')}}"></script>
<script src="{{asset('js/daterangepicker.js')}}"></script>
<script src="{{asset('js/owl.carousel.min.js')}}"></script>
<script src="{{asset('js/jquery.fancybox.min.js')}}"></script>
<script src="{{asset('js/jquery.countTo.min.js')}}"></script>
<script src="{{asset('js/animated-headline.js')}}"></script>
<script src="{{asset('js/jquery.ripples-min.js')}}"></script>
<script src="{{asset('js/quantity-input.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>

</body>
</html>
