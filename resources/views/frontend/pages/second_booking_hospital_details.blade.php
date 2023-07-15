<link href="{{ asset('new_assets/booking/style.css') }}" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

@extends('new_layouts.app')

@section('title')
    <title>ipersona / {{ trans('second_booking_hospital.home') }}</title>
@endsection


@extends('new_layouts.master_pages')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

<!-- Demo styles -->
<style>
    .swiper {
        width: 100%;
        height: 100%;
    }

    .swiper-slide {
        text-align: center;
        font-size: 18px;
        background: #fff;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .swiper-slide img {
        display: block;
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
</style>
<!--  start Section  -->
@section('section')
    <section id="hero" class="hero">
        <div class="container position-relative">
            <div class="row gy-5 aos-init aos-animate" data-aos="fade-in">
                <div
                    class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center text-center text-lg-start">
                    <h2 class="text-center ">{{ $hospital->name }}</h2>
                    <ul class="social-media text-center text-warning">
                        @php([$count, $rate] = avgRating($hospital->id))
                        @for ($i = 1; $i <= 5; $i++)
                            @php($fill = $i <= $count ? 'text-warning' : '') <i class="fa fa-star  {{ $fill }} "></i>
                        @endfor

                        {{-- ({{$rate}}) --}}
                    </ul>
                </div>
                <div class="col-lg-6 order-1 order-lg-2">
                    <img src="{{ doctorProfile($hospital->getRawOriginal('image'), null, $hospital->image) }}"
                        class="p-2 rounded-4 img-fluid aos-init aos-animate" alt="" data-aos="zoom-out"
                        data-aos-delay="100">
                </div>
            </div>
        </div>

    </section>
@endsection
<!-- End Hero Section -->


<!--  About Us Section  -->
@section('about_us')
    <section id="about" class="about section_swiper p-lg-0 m-lg-2">
        <div class="container aos-init aos-animate" data-aos="fade-up">
            <div class="row">

                @foreach ($rooms as $room)
                    @php([$price, $curr] = getRoomPrice($room, 'currency'))

                    <div class="col-lg-3 col-12 text-center border rounded-4 m-auto p-2 my-lg-2">
                        <h2 class="we text-center">{{ $room->lang_name }}</h2>
                        <h2 class="we text-center">{{ $price }} {{ $curr }}</h2>
                        {{-- <button data-hospital="{{$hospital->id}}" data-room="{{$room->id}}" class="w-50 we btn btn-primary p-2 book_hospital">
                        @lang('site.book')
                    </button> --}}
                        <button data-hospital="{{ $hospital->id }}" data-room="{{ $room->id }}"
                            class="btn btn_purple purple w-50 we"> @lang('site.book') </button>
                    </div>
                @endforeach
            </div>
            <div class="row">
                <div class="swiper mySwiper swiper-initialized swiper-horizontal swiper-rtl swiper-backface-hidden">
                    <div class="swiper-wrapper" id="swiper-wrapper-659df2e9fea35caf" aria-live="polite">

                        @foreach ($images as $image)
                            @if (
                                'https://accounts.ipersona.me/users/1676579339.jpg' ==
                                    doctorProfile($image->getRawOriginal('image'), 'custom', $hospital->image))
                                @continue
                            @endif
                            <div class="swiper-slide swiper-slide-active" role="group"
                                aria-label="{{ $loop->iteration . ' / 9' }}" style="width: 360px; margin-left: 30px;">
                                <img class='w-75 iemo'
                                    src="{{ doctorProfile($image->getRawOriginal('image'), 'custom', $hospital->image) }}"
                                    class="rounded">
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-button-next" tabindex="0" role="button" aria-label="Next slide"
                        aria-controls="swiper-wrapper-659df2e9fea35caf" aria-disabled="false"></div>
                    <div class="swiper-button-prev swiper-button-disabled" tabindex="-1" role="button"
                        aria-label="Previous slide" aria-controls="swiper-wrapper-659df2e9fea35caf" aria-disabled="true">
                    </div>
                    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                </div>

                <!-- Swiper JS -->

            </div>

        </div>

    </section>
    {{-- <section id="team" class="testimonials">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-lg-12 col-sm-12">
                    <div class="section-header">
                        <h1 class="about_us_title title_bold">@lang('site.patient_reviews')</h1>

                    </div>
                </div>
                <div class="slides-3 swiper" data-aos="fade-up" data-aos-delay="100">
                    <div class="swiper-wrapper" style="height: auto">
                        {{-- @foreach ($doctor->doctorRatings as $rate)
                        <div class="swiper-slide">
                            <div class="testimonial-wrap">
                                <div class="testimonial-item">
                                    <div class="d-flex align-items-center">
                                        <span class="we h4 m-2">@lang('site.overall_rating')</span>
                                        @for ($i = 1; $i <= 5; $i++)
                                        @php($fill = $i <= $rate->rating ? 'text-warning' : '')
                                        <i class="fa fa-star  {{ $fill }} "></i>
                    @endfor
                </div>
                <div class=" we align-items-center h4  ">
                    {{ $rate->comment }}
                </div>
                <div class="we align-items-center h4">
                    @php($margin = Session::get('locale') == 'ar' ? 'margin-right:15px' : 'margin-left:15px')
                    <div>{{ $rate->rateBy->name }}
                        <div style="{{ $margin }}"> {{ customDate($rate->created_at, 'd M Y') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End testimonial item -->
    @endforeach --}}

    {{-- <div class="card mt-3 card-site">
                            <h4>
                                @lang('site.patient_reviews')
                            </h4>
                            @foreach ($hospital->hospitalRatings as $rate)
                                <div class="d-flex">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @php($fill = $i <= $rate->rating ? 'text-warning' : '')
                                        <i class="fa fa-star  {{ $fill }} "></i>
                                    @endfor

                                    <span style="font-size: 14px;margin-left: 28px;">@lang('site.overall_rating')</span>
                                </div>

                                <div style="margin-top:10px;margin-bottom:10px">{{ $rate->comment }}</div>
                                @php($margin = Session::get('locale') == 'ar' ? 'margin-right:15px' : 'margin-left:15px')

                                <div style="font-size:14px;display:flex">{{ $rate->rateBy->name }} <div
                                        style="{{ $margin }}"> {{ customDate($rate->created_at, 'd M Y') }}</div>
                                </div>
                                <hr>
                            @endforeach

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section> --}}




    <section id="team" class="testimonials">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-lg-12 col-sm-12">
                    <div class="section-header">
                        <h1 class="about_us_title title_bold">@lang('site.patient_reviews')</h1>

                    </div>
                </div>
                <div class="slides-3 swiper" data-aos="fade-up" data-aos-delay="100">
                    <div class="swiper-wrapper" style="height: auto">
                        @foreach ($hospital->hospitalRatings as $rate)
                            <div class="swiper-slide">
                                <div class="testimonial-wrap">
                                    <div class="testimonial-item">
                                        <div class="d-flex align-items-center">
                                            <span class="we h4 m-2">@lang('site.overall_rating')</span>
                                            @for ($i = 1; $i <= 5; $i++)
                                        @php($fill = $i <= $rate->rating ? 'text-warning' : '')
                                        <i class="fa fa-star  {{ $fill }} "></i>
                                    @endfor
                                        </div>
                                        <div class=" we align-items-center h4  ">
                                            {{ $rate->comment }}
                                        </div>
                                        <div class="we align-items-center h4">
                                            @php($margin = Session::get('locale') == 'ar' ? 'margin-right:15px' : 'margin-left:15px')

                                            <div>{{ $rate->rateBy->name }}
                                                <div style="{{ $margin }}">
                                                    {{ customDate($rate->created_at, 'd M Y') }}
                                                </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </div>

    </section>
<style>
    /* .iemo{
        box-shadow: 10px 10px 4px 1px rgba(47, 1, 56, 0.82), inset 50px 50px 4px rgba(78, 2, 85, 0.25);
    } */
</style>











        <script src="{{ asset('new_assets/booking/js.js') }}"></script>


        <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>

        <!-- Initialize Swiper -->
        <script>
            var swiper = new Swiper(".mySwiper", {
                slidesPerView: 3,
                spaceBetween: 30,
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true,
                },
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                },
            });
        </script>
    @endsection
    <!-- End About Us Section -->
