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
    <main class="container mb-3">


        <div class="row g-5">
            <div class="col-lg-3"></div>

            <div class="col-lg-6 mb-4">

                <div class=" card-site">
                    <div class=" text-center">
                        {{-- <h4 class="GraphikArabic-Black-Web text-white">
                        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                        </h4> --}}
                    </div>
                    <form class="auth-login-form p-1" action="{{ route('password.email') }}" method="POST">
                        @csrf
                        <div class="form-group mb-4">
                            <label>@lang('site.email')</label>
                            <input class="form-control" required id="login-email" type="email" name="email" placeholder="john@example.com" aria-describedby="login-email" autofocus="" tabindex="1" />
                            @error('email')
                            <p class="error">{{ $message }}</p>
                            @enderror
                        </div>
                        <button class="btn w-100 btn-site">@lang('site.password_reset_email')</button>
                    </form>




                </div>
            </div>
            <div class="col-lg-3"></div>


        </div>
    </main>

@endsection
@push('js')

