<link href="{{ asset('new_assets/booking/style.css') }}" rel="stylesheet">

@extends('new_layouts.app')

@section('title')
    <title>ipersona / {{ trans('secondlogin.Privacy_policy') }}</title>
@endsection

@extends('new_layouts.master_pages')

<!--  start Section  -->
@section('section')
    <section id="hero" class="hero">
        <div class="container position-relative">
            <div class="row gy-5 aos-init aos-animate" data-aos="fade-in">
                <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center text-center text-lg-start">
                    <h2 class="text-center ">{{ trans('second_auth.Privacy_policy') }}</h2>
                    <p class="h3 text-center we"> {{ trans('second_Privacy_policy.brief') }}</p>
                    <p class="h3 text-center we"> {{ trans('second_Privacy_policy.brief_1') }}</p>
                </div>
                <div class="col-lg-6 order-1 order-lg-2">
                    <img src="https://img.fortawesome.com/1ce05b4b/terms-illustration.svg "
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
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-lg-12 col-sm-12 text-center">
                    <div class="section-header">
                        <h1 class="about_us_title">{{ trans('second_auth.Privacy_policy') }}</h1>
                    </div>
                    <div class="col-lg-12 explanation_of_conditions_and_conditions">
                        <h2 class="p-2 about_us_title text-center"> </h2>
                        <h1 class="p-2 about_us_title text-center">{{ trans('second_Privacy_policy.paragraph_1') }}</h1>
                        <p>{{ trans('second_Privacy_policy.paragraph_2') }}</p>
                        <h2 class="p-2 about_us_title text-center">{{ trans('second_Privacy_policy.paragraph_3') }}</h2>
                        <p>{{ trans('second_Privacy_policy.paragraph_4') }}</p>
                        <p>{{ trans('second_Privacy_policy.paragraph_5') }}</p>
                        <h2 class="p-2 about_us_title text-center">{{ trans('second_Privacy_policy.paragraph_6') }}</h2>
                        <p>{{ trans('second_Privacy_policy.paragraph_7') }}</p>
                        <p>{{ trans('second_Privacy_policy.paragraph_8') }}</p>
                        <p>{{ trans('second_Privacy_policy.paragraph_9') }}</p>
                        <p>{{ trans('second_Privacy_policy.paragraph_10') }}</p>
                        <p>{{ trans('second_Privacy_policy.paragraph_11') }}</p>
                        <p>{{ trans('second_Privacy_policy.paragraph_12') }}</p>
                        <p>{{ trans('second_Privacy_policy.paragraph_13') }}</p>
                        <p>{{ trans('second_Privacy_policy.paragraph_14') }}</p>
                        <p>{{ trans('second_Privacy_policy.paragraph_15') }}</p>
                        <p>{{ trans('second_Privacy_policy.paragraph_16') }}</p>
                        <p>{{ trans('second_Privacy_policy.paragraph_17') }}</p>
                        <p>{{ trans('second_Privacy_policy.paragraph_18') }}</p>
                        <p>{{ trans('second_Privacy_policy.paragraph_19') }}</p>
                        <p>{{ trans('second_Privacy_policy.paragraph_20') }}</p>
                        <p>{{ trans('second_Privacy_policy.paragraph_21') }}</p>
                        <p>{{ trans('second_Privacy_policy.paragraph_22') }}</p>
                        <p>{{ trans('second_Privacy_policy.paragraph_23') }}</p>
                        <p>{{ trans('second_Privacy_policy.paragraph_24') }}</p>
                        <p>{{ trans('second_Privacy_policy.paragraph_25') }}</p>
                        <p>{{ trans('second_Privacy_policy.paragraph_26') }}</p>
                        <p>{{ trans('second_Privacy_policy.paragraph_27') }}</p>
                        <p>{{ trans('second_Privacy_policy.paragraph_28') }}</p>
                        <p>{{ trans('second_Privacy_policy.paragraph_29') }}</p>
                        <p>{{ trans('second_Privacy_policy.paragraph_30') }}</p>
                        <p>{{ trans('second_Privacy_policy.paragraph_31') }}</p>
                        <p>{{ trans('second_Privacy_policy.paragraph_32') }}</p>
                        <p>{{ trans('second_Privacy_policy.paragraph_33') }}</p>


                    </div>
                </div>
            </div>
        </div>

        </div>
    </section>
@endsection
<!-- End About Us Section -->
