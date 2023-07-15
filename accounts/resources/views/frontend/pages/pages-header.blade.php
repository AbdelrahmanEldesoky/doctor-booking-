@extends('layouts.app')
@section('title', trans('site.About'))
@push('css')
@endpush
@section('content')
    <div class="tabslid" style="min-height: 10vh;">
        <div class="container text-center px-0">

            <div class="py-0  text-center">
                <h1 class="GraphikArabic-Black-Web text-white">
                    @lang('site.About')
                </h1>
            </div>

        </div>
    </div>


    <div class="container my-5">
        <div class="row">
            <div class="col-lg-6 pt-5">
                <h2 class="pt-3 site-heading">What we are?</h2>
                <div class="about-us-text mb-2 mt-4">
                    <p>
                        iPersona is the leading online healthcare platform for doctor booking and clinic management
                        organization software in the Middle East and North Africa region.
                        <br>We are driving the electronic and automated transformation of doctors, clinics and hospitals to
                        make high-quality healthcare accessible in the Arab region.
                    </p>
                    <p>
                        Good health is central to handling stress and living a longer, more active life. In this article, we
                        explain the meaning of good health, the types of health a person needs to consider, and how to
                        preserve good health.
                    </p>
                    <p>
                        They base this definition on the idea that the past few decades have seen modern science take
                        significant strides in the awareness of diseases by understanding how they work, discovering new
                        ways to slow or stop them, and acknowledging that an absence of pathology may not be possible.
                    </p>
                    <p>
                        Good physical health can work in tandem with mental health to improve a person’s overall quality of
                        life.

                        For example, mental illness, such as depression, may increase the risk of drug use disorders,
                        according to a 2008 studyTrusted Source. This can go on to adversely affect physical health.
                    </p>

                </div>
            </div>
            <div class="col-lg-6 mt-2 about-img">
                <img src="{{ asset('images/about.png') }}" alt="about" class="w-100">
            </div>
        </div>
    </div>




    <section class="split-section split-double p-0 ">
        <div class="single-layer top-layer ">
            <div class="content-block">
                <div class="container">
                    <div class="row">
                        <div class="">
                            <div class="content-wrapper px-5">
                                <h2 class="pt-3">How we Works?</h2>
                                <p><i class="fas fa-square text-site-2"></i> Choose field</p>
                                <p><i class="fas fa-square text-site-2"></i> Choose expert</p>
                                <p><i class="fas fa-square text-site-2"></i> Select preferred method of communication</p>
                                <p><i class="fas fa-square text-site-2"></i> Payment options</p>
                                <p><i class="fas fa-square text-site-2"></i> Start session</p>
                            </div>
                            <!-- .content-wrapper -->
                        </div>
                        <!-- .col-md-5 -->
                    </div>
                    <!-- .row -->
                </div>
                <!-- .container -->
            </div>
            <!-- .content-block -->
            <div class="col-md-6 col-sm-4 img-block"
                style="background: url('{{ asset('images/hero-bg.jpg') }}') center center no-repeat !important;"></div>
            <!-- .img-block -->
        </div>

    </section>

    <div class="w-bg set-zone pb-5 bg-site-gradient">

        <div class="container">
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8 testimonial-zone">
                    <h1 class="fw-bold py-4 text-white">Our Goal & Mission</h1>
                    <div class="caruslholder">

                        <div class="owl-carouselsteps text-center">

                            <div class="item">

                                <div class="coursehome py-3 px-0">

                                    <p>
                                        Made me see the light in my way
                                    </p>
                                    <span class="GraphikArabic-Semibold-Web">
                                        Customer from Egypt
                                    </span>

                                </div>
                            </div>
                            <div class="item">

                                <div class="coursehome py-3 px-0">

                                    <p>
                                        It was really good, the doctor was really kind and helpful
                                    </p>
                                    <span class="GraphikArabic-Semibold-Web">
                                        Customer from Egypt
                                    </span>

                                </div>
                            </div>
                            <div class="item">

                                <div class="coursehome py-3 px-0">

                                    <p>
                                        The doctor made me feel alive again, she is very professional yet very
                                        attentive,
                                        humble and nice. She made me feel and think very positively of myself. I am so
                                        happy
                                        I decided to talk to her. I recommend this to everyone. Thank you for everything
                                    </p>
                                    <span class="GraphikArabic-Semibold-Web">
                                        Customer from Egypt
                                    </span>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-2"></div>
            </div>
        </div>
    </div>
@endsection
@push('js')
