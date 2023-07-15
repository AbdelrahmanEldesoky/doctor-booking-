<!DOCTYPE html>
@if(!empty(Session::get('locale') == "en"))
<html dir="ltr">
@else
<html dir="rtl">
@endif



<head>
    @include('frontend.include.head')
    <style>
        .doctor_list_item {
            cursor: pointer;
        }

        .GraphikArabic-Semibold-Web {
            color: white !important;
        }

        .GraphikArabic-Black-Web {
            color: red !important
        }

        .schedule_time {
            padding: 10px 0 10px 0;
            border-bottom: 1px solid;
        }

        .book_box {
            padding-left: 30px;
            padding-right: 30px;
        }

    </style>
</head>

<body>


    <div class="container d-flex align-items-center" style="min-height: 100vh">
        <div class="box w-100 text-success">
            <div class="row g-5">
                <div class="col-lg-3"></div>

                <div class="col-lg-6 mb-4">
                <div class=" card-site">
                    <form class="auth-login-form p-1" action="{{ route('password.update') }}" method="POST">
                        @csrf
                        <input type="hidden" name="token" value="{{ $request->route('token') }}">
                        <div class="form-group mb-4">
                            <label>@lang('site.email')</label>
                            <input class="form-control" required id="login-email" type="email" name="email" placeholder="john@example.com" aria-describedby="login-email" autofocus="" tabindex="1" />
                            @error('email')
                            <p class="error">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group mb-4">
                            <label>@lang('site.Password')</label>
                            <input class="form-control" required id="login-email" type="password" name="password" />
                            @error('email')
                            <p class="error">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group mb-4">
                            <label>@lang('site.confirm_password')</label>
                            <input class="form-control" required  type="password" name="password_confirmation"/>
                            @error('password_confirmation')
                            <p class="error">{{ $message }}</p>
                            @enderror
                        </div>
                        <button class="btn w-100 btn-site">@lang('site.reset_password')</button>
                    </form>
                </div>
            </div>
                <div class="col-lg-3"></div>


            </div>
        </div>
    </div>



</body>

</html>
