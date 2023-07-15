<link href="{{ asset('new_assets/booking/style.css') }}" rel="stylesheet">


@extends('new_layouts.app')

@section('title')
    <title>ipersona / {{ trans('second_booking_hospital.home') }}</title>
@endsection


@extends('new_layouts.master_pages')

<!--  start Section  -->
@section('section')
    <section id="hero" class="hero">
        <div class="container position-relative">
            <div class="row gy-5 aos-init aos-animate" data-aos="fade-in">
                <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center text-center text-lg-start">
                    <h2 class="text-center ">{{ trans('second_booking_hospital.home') }}</h2>
                    <p class="h2 text-center we"> {{ trans('second_booking_hospital.brief') }}</p>
                </div>
                <div class="col-lg-6 order-1 order-lg-2">
                    <img src="https://www4.0zz0.com/2023/05/03/20/886137837.png"
                        class="img-fluid aos-init aos-animate" alt="" data-aos="zoom-out" data-aos-delay="100">
                </div>
            </div>
        </div>

    </section>
@endsection
<!-- End Hero Section -->


<!--  About Us Section  -->
@section('about_us')
    <section id="about" class="about">
        <div class="product">
            <div class="container">
                <div class="row">
                    <div class="col-12 mt-3">
                        <h2 class="site-heading text-center">@lang('site.hospitals')</h2>
                    </div>


                    @if($hospitals->count() > 0)
                    @foreach($hospitals as $hospital)
                        <div class="itemsbox illustrator m-auto p-4 col-lg-4 col-sm-12 " >
                        @include('frontend.components.hospitalCard2')
                    </div>

                    @endforeach
                    @else
                    <div class="w-100 text-center">@lang('site.no_record')</div>
                    @endif


                </div>
            </div>
        </div>
    </section>
    <script src="{{ asset('new_assets/booking/js.js') }}"></script>
@endsection
<!-- End About Us Section -->
