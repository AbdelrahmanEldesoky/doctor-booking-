<link href="{{ asset('new_assets/doctor_profile/style.css') }}" rel="stylesheet">
<link href="{{ asset('new_assets/booking/style.css') }}" rel="stylesheet">

@extends('new_layouts.app')

@section('title')
    <title>ipersona / {{ trans('second_booking_doctor.home') }}</title>
@endsection



@extends('new_layouts.master_pages')

<!--  start Section  -->
@section('section')
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.0/themes/smoothness/jquery-ui.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js" integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E=" crossorigin="anonymous"></script>

    <section id="hero" class="hero">
        <div class="container position-relative">
            <div class="row">
                <div id="cards-section" class="col-lg-6 col-sm-12">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12" data-url="{{ route('doctor.show', $doctor->id) }}">
                        <div class="card-complete">
                            <div class="image-container">
                                <img src="{{ doctorProfile($doctor->getRawOriginal('image'), null, $doctor->image) }}"
                                    alt="img">
                            </div>
                            <div class="text-container">
                                <h6 class="about_us_title">
                                    @if (!empty(Session::get('locale') == 'ar'))
                                        {{ $doctor->name_ar }}
                                    @else
                                        {{ $doctor->name }}
                                    @endif
                                </h6>

                                <span>
                                    @if (!empty(Session::get('locale') == 'ar'))
                                        {{ $doctor->information ? $doctor->information->job_title_ar : '-' }}
                                    @else
                                        {{ $doctor->information ? $doctor->information->job_title : '-' }}
                                    @endif
                                </span>

                                <p class="we">
                                    {{ $doctor->information ? $doctor->information->about : '-' }}
                                </p>
                                <ul style="margin: 0;" class="social-media">

                                    @php([$count, $rate] = avgRating($doctor->id))
                                    @for ($i = 1; $i <= 5; $i++)
                                        @php($fill = $i <= $rating ? 'text-warning' : '') <i class="fa fa-star  {{ $fill }} "></i>
                                    @endfor

                                </ul>
                                <div class="mb-3">
                                    <span class="price__from" style="font-size:14px">
                                        @lang('site.over_all_rate_from')
                                        {{ $rate }}
                                        @lang('site.users')
                                    </span>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                {{-- start clender --}}
                <div class="col-lg-6 col-sm-12">
                    <div class="time_list time_list_doctor">
                        <h4 class="p-3 text-white text-center about_us_title purple">
                            {{ trans('second_booking_doctor.time') }}</h4>
                        @if ($typee == 'ofline')
                            <div style="padding:10px;">
                                <select style="width: 92%; margin: 4px auto;"
                                    class="form-control form-select change_sch_box">
                                    @foreach ($doctor->clinics as $clinic)
                                        <option value="{{ $clinic->id }}">{{ $clinic->lang_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        @endif
                        <div class="date_input_container book_box_div pt-5">
                            <div>
                                <button class="rounded-pill btn btn-danger btn-lg w-100"
                                    id="close_time_container">{{ trans('second_booking_doctor.back') }}</button>
                            </div>
                            <div>
                                <label for="date_input">{{ trans('second_booking_doctor.date') }}</label>
                                <input type="text" class="flatpickr-custom form-control book_box_input" id="datepicker"
                                    placeholder="{{ trans('second_booking_doctor.date') }}">
                                <button class="  book_btn m-auto w-75 mt-3 save  btn_purple purple    "
                                    id="book_now">
                                    {{ trans('second_booking_doctor.book_now') }}
                                </button>
                            </div>
                        </div>
                        @include('frontend.components.schedules2')
                    </div>
                </div>
                {{-- end clender --}}
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-lg-6">
                <div id="carouselExampleIndicators" class="carousel slide p-3">
                    <div>
                        <h3 class="about_us_title text-center">{{ trans('second_booking_doctor.image_clinck') }}</h3>
                    </div>

                    @php($active = 'active')
                    <div class="carousel-indicators">

                        @for ($i = 0; $i < count($images); $i++)
                            @if ($i === 0)
                                <button type='button' class='active' aria-current='true'
                                    data-bs-target='#carouselExampleIndicators' data-bs-slide-to='{{ $i }}'
                                    aria-label='Slide {{ $i + 1 }}'></button>
                            @else
                                <button type='button' data-bs-target='#carouselExampleIndicators'
                                    data-bs-slide-to='{{ $i }}'
                                    aria-label='Slide {{ $i + 1 }}'></button>
                            @endif
                        @endfor

                    </div>

                    {{-- @foreach ($images as $image)
                    <div class="" style="padding:20px">
                    <img src="{{ subDomainAsset($image->image) }}" style="width:100%;  object-fit:cover;">
                    </div>
                    @endforeach --}}
                    <div class="carousel-inner doctor_clinc w-75 m-auto">

                        @for ($i = 0; $i < count($images); $i++)
                            @if ($i === 0)
                                <div class="carousel-item {{ $active }}">
                                    <img src="{{ subDomainAsset($images[$i]['image']) }}" class="d-block w-100"
                                        alt="...">
                                </div>
                            @else
                                <div class="carousel-item">
                                    <img src="{{ subDomainAsset($images[$i]['image']) }}" class="d-block w-100"
                                        alt="...">
                                </div>
                            @endif
                        @endfor

                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    </button>
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <div class="col-sm-12">
                    <div class="laptop-wrapper">
                        <iframe width="420" height="315"
                            src="https://www.youtube.com/embed/{{ $doctor->information ? $doctor->information->embed_link : '#' }}">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
        {{-- public/assets/admin/app-assets/js/scripts/forms/picers/form-picers.js --}}

    </section>

    <script src="{{ asset('assets/admin/app-assets/js/scripts/forms/pickers/form-pickers.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js" type="text/javascript"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js" type="text/javascript"></script>
    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="Stylesheet"
        type="text/css" />


    @include('frontend.pages.scribt_doctor_profile')
    @include('frontend.pages.clender')

    <script src="{{ asset('new_assets/doctor_profile/clender.js') }}"></script>
@endsection

<style>
    @media (min-width: 120px) and (max-width: 600px)  {

        #ui-datepicker-div{
    width: 87% !important;}
}


</style>


<!--  start team Section  -->
@section('team')
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
                        @foreach ($doctor->doctorRatings as $rate)
                        <div class="swiper-slide_doctor swiper-slide  ">
                            <div class="testimonial-wrap">
                                <div class="testimonial-item">
                                    <div class="d-flex align-items-center">
                                        <span class="we h4 ">@lang('site.overall_rating')</span>
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
                            <div
                                    style="{{ $margin }}"> {{ customDate($rate->created_at, 'd M Y') }}
                                </div>
                            </div>
                        </div>
                                </div>
                            </div>
                        </div>
                        <!-- End testimonial item -->
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
<!-- End team Section -->


