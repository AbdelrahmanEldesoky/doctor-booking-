<link href="{{ asset('booking/style.css') }}" rel="stylesheet">


@extends('new_layouts.app')

@section('title')
    <title>ipersona / {{ trans('login.terms_and_services') }}</title>
@endsection

<link href="{{ asset('booking/style.css') }}" rel="stylesheet">
@extends('new_layouts.master_pages')




<!--  start Section  -->
@section('section')
    <section id="hero" class="hero">
        <div class="container position-relative">
            <div class="row gy-5 aos-init aos-animate" data-aos="fade-in">
                <div
                    class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center text-center text-lg-start">
                    <h2 class="text-center ">{{ trans('second_login.terms_and_services') }}</h2>
                    <p class="h3 text-center we"> {{ trans('second_conditions.brief') }}</p>
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
                        <h1 class="about_us_title">{{ trans('second_login.terms_and_services') }}</h1>
                    </div>
                    <div class="col-lg-12 explanation_of_conditions_and_conditions">
                        <h5 class="p-2 about_us_title"> </h5>
                            <p>{{ trans('second_conditions.explain') }}</p>
                            <p>{{ trans('second_conditions.explain_line_1') }}</p>
                            <ol type="1">
                                <li>{{ trans('second_conditions.explain_line_2') }}</li>
                                <li>{{ trans('second_conditions.explain_line_3') }}</li>
                                <li>{{ trans('second_conditions.explain_line_4') }}</li>
                                <li>{{ trans('second_conditions.explain_line_5') }}
                                    <ol type="1">
                                        <li>{{ trans('second_conditions.explain_line_5.1') }}</li>
                                        <li>{{ trans('second_conditions.explain_line_5.2') }}</li>
                                        <li>{{ trans('second_conditions.explain_line_5.3') }}</li>
                                        <li>{{ trans('second_conditions.explain_line_5.4') }}</li>
                                        <li>{{ trans('second_conditions.explain_line_5.5') }}</li>
                                        <li>{{ trans('second_conditions.explain_line_5.6') }}</li>
                                        <li>{{ trans('second_conditions.explain_line_5.7') }}
                                    </ol>
                                </li>
                                <li>{{ trans('second_conditions.explain_line_6') }}
                                    <ol type="1">
                                        <li>{{ trans('second_conditions.explain_line_6.1') }}</li>
                                        <li>{{ trans('second_conditions.explain_line_6.2') }}</li>
                                        <li>{{ trans('second_conditions.explain_line_6.3') }}</li>
                                        <li>{{ trans('second_conditions.explain_line_6.4') }}</li>
                                        <li>{{ trans('second_conditions.explain_line_6.5') }}</li>
                                        <li>{{ trans('second_conditions.explain_line_6.6') }}</li>
                                        <li>{{ trans('second_conditions.explain_line_6.7') }}</li>
                                    </ol>
                                </li>
                                <li>{{ trans('second_conditions.explain_line_7') }}
                                    <ol type="1">
                                        <li>{{ trans('second_conditions.explain_line_7.1') }}</li>
                                        <li>{{ trans('second_conditions.explain_line_7.2') }}</li>
                                        <li>{{ trans('second_conditions.explain_line_7.3') }}</li>
                                    </ol>
                                </li>
                                <li>{{ trans('second_conditions.explain_line_8') }}</li>
                                <li>{{ trans('second_conditions.explain_line_9') }}
                                    <ol type="1">
                                        <li>{{ trans('second_conditions.explain_line_9.1') }}</li>
                                        <li>{{ trans('second_conditions.explain_line_9.2') }}</li>
                                        <li>{{ trans('second_conditions.explain_line_9.3') }}
                                            <ol type="1">
                                                <li>{{ trans('second_conditions.explain_line_9.3.1') }}</li>
                                                <li>{{ trans('second_conditions.explain_line_9.3.2') }}</li>
                                                <li>{{ trans('second_conditions.explain_line_9.3.3') }}</li>
                                            </ol>
                                        </li>
                                    </ol>
                                </li>
                            </ol>
                            <h2 class="p-2 about_us_title">{{ trans('second_conditions.refund_method') }}</h2>
                            <ol type="1">
                                <li>{{ trans('second_conditions.explain_line_10') }}</li>
                                <li>{{ trans('second_conditions.explain_line_11') }}</li>
                                <li>{{ trans('second_conditions.explain_line_12') }}</li>
                                <li>{{ trans('second_conditions.explain_line_13') }}</li>
                                <li>{{ trans('second_conditions.explain_line_14') }}</li>
                                <li>{{ trans('second_conditions.explain_line_15') }}</li>
                                <li>{{ trans('second_conditions.explain_line_16') }}</li>
                                <li>{{ trans('second_conditions.explain_line_17') }}</li>
                                <li>{{ trans('second_conditions.explain_line_18') }}</li>
                                <li>{{ trans('second_conditions.explain_line_19') }}
                                    <ol type="1">
                                        <li>{{ trans('second_conditions.explain_line_19.1') }}</li>
                                        <li>{{ trans('second_conditions.explain_line_19.2') }}</li>
                                        <li>{{ trans('second_conditions.explain_line_19.3') }}</li>
                                        <li>{{ trans('second_conditions.explain_line_19.4') }}</li>
                                    </ol>
                                </li>
                                <li>{{ trans('second_conditions.explain_line_20') }}</li>
                                <li>{{ trans('second_conditions.explain_line_21') }}</li>
                                <li>{{ trans('second_conditions.explain_line_22') }}</li>
                                <li>{{ trans('second_conditions.explain_line_23') }}</li>
                                <li>{{ trans('second_conditions.explain_line_24') }}</li>
                                <li>{{ trans('second_conditions.explain_line_25') }}</li>
                            </ol>
                    </div>
                </div>
            </div>
        </div>

        </div>
    </section>

    @endsection
<!-- End About Us Section -->





