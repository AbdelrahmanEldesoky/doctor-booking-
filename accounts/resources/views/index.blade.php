@extends('layouts.app')
@section('title', 'Home')
@push('css')
<style>
    .fields_images img{
          width:250px;
    }
</style>
@endpush
@section('content')
    <div class="tabslid" style="">
        <div class="container px-0 text-center">

            <div class="py-5  text-center banner_text_box">

                <h1 class="GraphikArabic-Black-Web text-white">
                    <img src="{{ asset('images/brain.png') }}" style="width: 30px;"> @lang('site.book_psy')...
                </h1>

                <h5 class="GraphikArabic-Semibold-Web mt-3">
                    <i class="fas fa-circle-notch fa-1x fa-spin"></i> @lang('site.come_on_search')
                </h5>
            </div>

            <div class="main-tabs bg-site">
               @include('frontend.components.searchForm')
            </div>

        </div>
    </div>




@include('frontend.components.marquee')

@include('frontend.components.about-us')

@include('frontend.components.how-we-works')

<div class="container my-5">
    <h2 class="pt-3 site-heading text-center">@lang('site.why_ipersona')</h2>
    <div class="row mt-5 fields_images">
            <div class="col-lg-4 col-md-4 col-sm-6 mb-4 text-center">
                <div class=" card-fields p-1">
                    <img src="{{asset('images/ipersona/field_1_'.Config::get('app.locale').'.png')}}" alt="">
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 mb-4 text-center">
                <div class=" card-fields p-1">
                    <img src="{{asset('images/ipersona/field_2_'.Config::get('app.locale').'.png')}}" alt="">
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 mb-4 text-center">
                <div class=" card-fields p-1">
                    <img src="{{asset('images/ipersona/field_3_'.Config::get('app.locale').'.png')}}" alt="">
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 mb-4 text-center">
                <div class=" card-fields p-1">
                    <img src="{{asset('images/ipersona/field_4_'.Config::get('app.locale').'.png')}}" alt="">
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 mb-4 text-center">
                <div class=" card-fields p-1">
                    <img src="{{asset('images/ipersona/field_5_'.Config::get('app.locale').'.png')}}" alt="">
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 mb-4 text-center">
                <div class=" card-fields p-1">
                    <img src="{{asset('images/ipersona/field_6_'.Config::get('app.locale').'.png')}}" alt="">
                </div>
            </div>
    </div>
</div>

@include('frontend.components.doctor-slider')

@include('frontend.components.goal')

@endsection

@push('js')
