<link href="{{ asset('new_assets/doctor_profile/style.css') }}" rel="stylesheet">
<link href="{{ asset('new_assets/booking/style.css') }}" rel="stylesheet">

@extends('new_layouts.app')

@section('title')
    <title>ipersona / {{ trans('second_booking_doctor.home') }}</title>
@endsection



@extends('new_layouts.master_pages')

<!--  start Section  -->
@section('section')
<style>
    p{
        text-align: justify;
    }
    .error
    {
        color: red;
    }
</style>
    <section id="hero" class="hero">
        <main class="container mb-3">
            <div class="row g-5">
                <div class="col-lg-3"></div>
                <div class="col-lg-6 mb-4">
                    <div class=" card-site">
                        <div class=" text-center">
                            <h1 class="GraphikArabic-Black-Web">
                        @lang('site.register')
                            </h1>
                        </div>
                        <form class="auth-login-form p-1" action="{{url('register-with-mobile')}}" method="POST">
                            @csrf
                                <div class="form-group mb-4">
                                <label>@lang('site.name')</label>
                                        <input class="form-control" required type="text" name="name"
                                            placeholder="john" />
                                        @error('name')
                                        <p class="error">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-4">
                                        <label>@lang('site.mobile_number')</label>
                                        <input class="form-control" required type="text" name="phone" placeholder="" />
                                        @error('phone')
                                        <p class="error">{{ $message }}</p>
                                        @enderror
                                    </div>
                                
                             <div class="form-group mb-4">
                                <label>@lang('site.email')</label>
                                <input class="form-control" required id="login-email" type="email" name="email" placeholder="john@example.com" aria-describedby="login-email" autofocus="" tabindex="1" />
                                @error('email')
                                <p class="error">{{ $message }}</p>
                                @enderror
                            </div>
                            <button class="btn btn-success purple mano w-100">@lang('site.book')</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-3"></div>
            </div>
        </main>
    </section>
  
    <script src="{{asset('assets/admin/app-assets/js/scripts/forms/pickers/form-pickers.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js" type="text/javascript"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js" type="text/javascript"></script>
    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="Stylesheet"
        type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script src="{{ asset('new_assets/doctor_profile/clender.js') }}"></script>
@endsection


@section('team')
<link href="{{asset('frontend/dist/css/layout_v.min.css')}}" rel="stylesheet" async />
<style>
    .h4,h4 {
    font-size: calc(1.275rem + .3vw)
    }
        .card-site
    {
    width: 100%;
    position: relative;
    max-width: 100%;
    margin: auto;
    background: #fff;
    box-shadow: 0px 5px 20px rgb(34 35 58 / 15%);
    padding: 25px;
    border-radius: 25px;
    transition: all .3s;
    border: 0px;
    }
</style>

@endsection
<!-- End team Section -->
