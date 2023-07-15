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
    </main>

@endsection
@push('js')
