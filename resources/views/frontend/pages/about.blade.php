@extends('layouts.app')
@section('title', 'معلومات عنا')
@push('css')
@endpush
@section('content')
    <div class="tabslid pages-banner">
        <div class="container text-center px-0">

            <div class="py-0  text-center">
                <h1 class="GraphikArabic-Black-Web text-white">
                    @lang('site.About')
                </h1>
            </div>

        </div>
    </div>


    @include('frontend.components.about-us')

    {{-- @include('frontend.components.how-we-works') --}}

    @include('frontend.components.goal')


@endsection
@push('js')
