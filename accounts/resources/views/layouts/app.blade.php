<!DOCTYPE html>
@if(!empty(Session::get('locale') == "en"))
<html dir="ltr">
@else
<html dir="rtl">
@endif



<head>
    @include('frontend.include.head')
    <style>
        .doctor_list_item{
            cursor:pointer;
        }
         .GraphikArabic-Semibold-Web{
            color:white !important;
        }
        .GraphikArabic-Black-Web{
            color:red !important
        }
        .schedule_time{
            padding:10px 0 10px 0;
            border-bottom:1px solid;
        }
        .book_box{
            padding-left:30px;
            padding-right:30px;
        }
    </style>
</head>
<body>


    <div class="container d-flex align-items-center" style="min-height: 100vh">
        <div class="box w-100 text-success">
            <div class="row g-5">
                <div class="col-lg-4"></div>

                <div class="col-lg-4 mb-4">

                    <div class=" card-site">
                        <div class=" text-center">
                            <img src="{{ asset('logo_main.png') }}" style="width: 200px">
                        </div>
                        <form class="auth-login-form p-1" action="{{route('attempt.login')}}" method="POST">
                            @csrf
                            <div class="form-group mb-4">
                                <label>@lang('site.Email')</label>
                                <input class="form-control" required id="login-email" type="email" name="email" placeholder="john@example.com" aria-describedby="login-email" autofocus="" tabindex="1" />
                                @error('email')
                                <p class="error text-danger">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group mb-4">

                                <label for="login-password">@lang('site.Password')</label>
                                    <input class="form-control" required id="login-password" type="password" name="password" placeholder="············" aria-describedby="login-password" tabindex="2" />
                                    @error('password')
                                    <p class="error">{{ $message }}</p>
                                    @enderror
                            </div>
                            <a href="{{route('password.request')}}" class="float-end">@lang('site.forget_pass')</a>
                            <button class="btn w-100 btn-site">@lang('site.login')</button>
                        </form>



                    </div>
                </div>
                <div class="col-lg-4"></div>


            </div>
        </div>
      </div>



</body>
</html>
