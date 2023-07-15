@extends('layouts.app')
@section('title', trans('site.wait'))
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
    <!-- <div class="tabslid pages-banner">
        <div class="container text-center px-0">

            <div class=" text-center">
                <h1 class="GraphikArabic-Black-Web text-white">
                    @lang('site.wait')
                </h1>
            </div>

        </div>
    </div> -->

    <main class="container my-5">
        <div class="row g-5">
            <div class="col-md-12 mb-4">
                <div class=" card-fields" style="text-align: center !important">
                    <h2 class="site-heading">@lang('site.thanks_register')</h2>
                    <em>@lang('site.thanks_register_message')</em>
                </div>
            </div>
        </div>
    </main>

@endsection
@push('js')
