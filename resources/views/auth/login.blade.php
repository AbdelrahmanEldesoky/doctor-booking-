@extends('layouts.app')
@section('title', trans('site.login'))
@push('css')
<style>
    p{
        text-align: justify;
    }
    .error
    {
        color: red;
    }
</style>
@endpush
@section('content')
    {{-- <div class="tabslid pages-banner">
        <div class="container text-center px-0">

            <div class=" text-center">
                <h1 class="GraphikArabic-Black-Web text-white">
                    @lang('site.login')
                </h1>
            </div>

        </div>
    </div> --}}

    <main class="container mb-3">


        <div class="row g-5">
            <div class="col-lg-3"></div>

            <div class="col-lg-6 mb-4">

                <div class=" card-site">
                    <div class=" text-center">
                        <h1 class="GraphikArabic-Black-Web text-white">
                            @lang('site.login')
                        </h1>
                    </div>
                    <form class="auth-login-form p-1" action="{{route('login')}}" method="POST">
                        @csrf
                        <div class="form-group mb-4">
                            <label>@lang('site.email')</label>
                            <input class="form-control" required id="login-email" type="email" name="email" placeholder="john@example.com" aria-describedby="login-email" autofocus="" tabindex="1" />
                            @error('email')
                            <p class="error">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group mb-4">

                            <label for="login-password">@lang('site.password')</label>
                                <input class="form-control" required id="login-password" type="password" name="password" placeholder="············" aria-describedby="login-password" tabindex="2" />
                                @error('password')
                                <p class="error">{{ $message }}</p>
                                @enderror
                        </div>
                        <a href="{{route('password.request')}}" class="float-end">@lang('site.forget_pass')</a>
                        <button class="btn w-100 btn-site">@lang('site.login')</button>
                    </form>

                    <div class="text-center">
                        <span>------------ @lang('site.or') ------------</span>
                        <a href="{{ route('register') }}" class="btn btn-site w-100 my-3">@lang('site.Register')</a>
                    </div>


                </div>
            </div>
            <div class="col-lg-3"></div>


        </div>
    </main>

@endsection
@push('js')
