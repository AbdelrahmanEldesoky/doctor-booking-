@php($request = $request ?? null)
@extends('new_layouts.app')

@section('title')
    <title>ipersona / {{ trans('second_auth.home_page') }}</title>
@endsection
<style>
    @media (min-width: 120px) and (max-width: 800px)  {


.search{
    width: 75% !important;
}
}
</style>

<link rel="stylesheet" href="{{ asset('new_assets/css/home_page_link.css') }}">
 {{-- start nav home page only --}}
@section('nav_links')
<li><a class='h2 ' href="#hero">{{ trans('second_auth.home_page_s') }}</a></li>
<li><a class='h2' href="#services">{{ trans('second_auth.reservation') }}</a></li>
<li><a class='h2 about_us_link d-lg-block d-none' href="#about">{{ trans('second_auth.about_us') }}</a></li>
<li><a class='h2' href="#team">{{ trans('second_auth.our_team') }}</a></li>
<li><a class='h2' href="#contact">{{ trans('second_auth.connect') }}</a></li>

@endsection
 {{-- end nav home page only --}}

<!--  start Section  -->
@section('section')
<section id="hero" class="hero">
    <div class="container position-relative">
        <div class="row gy-5 aos-init aos-animate" data-aos="fade-in">
            <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center text-center text-lg-start">
                <div class="d-lg-flex justify-content-center">
                    <h1 class="text-center we title_bold">{{ trans('second_auth.welcome_iPersona') }}</h1>
                    <div class="image_home d-lg-none">
                        <img src="https://www14.0zz0.com/2023/04/30/10/538462861.png" class="w-50" alt="">
                    </div>
                </div>


                <p class="h3 text-center we">{{ trans('second_auth.identification') }}</p>
                @auth
                <div class="d-flex justify-content-center justify-content-lg-start mx-auto ">
                     <a href="{{ route('Second_sessions_user') }}" class="btn-get-started we h2">{{ trans('second_sessions_user.home') }}</a>
                 </div>
                @endauth

            </div>

            <div class="col-lg-6 order-1 order-lg-2">
                               {{-- <img src="https://drnehamehta.com/wp-content/uploads/2023/03/Group-2.svg " class="img-fluid aos-init aos-animate" alt="" data-aos="zoom-out" data-aos-delay="100"> --}}
                <div class="penguin">
                    <div class="penguin-bottom">
                      <div class="right-hand"></div>
                      <div class="left-hand"></div>
                      <div class="right-feet"></div>
                      <div class="left-feet"></div>
                    </div>
                    <div class="penguin-top">
                      <div class="right-cheek"></div>
                      <div class="left-cheek"></div>
                      <div class="belly"></div>
                      <div class="right-eye">
                        <div class="sparkle"></div>
                      </div>
                      <div class="left-eye">
                        <div class="sparkle"></div>
                      </div>
                      <div class="blush-right"></div>
                      <div class="blush-left"></div>
                      <div class="beak-top"></div>
                      <div class="beak-bottom"></div>
                    </div>
                  </div>

            </div>
        </div>
    </div>

    <div class="icon-boxes position-relative">
        <div class="container position-relative">
            <div class="row gy-4 mt-5">
                <div class="col-xl-3 col-md-6 col-6 aos-init" data-aos="fade-up" data-aos-delay="100">
                    <div class="icon-box ">
                        <div class="icon text-black d-none d-lg-block d-xl-block d-xxl"><i class="fa-solid fa-shield-halved"></i></div>
                        <h4 class="title"><a class="stretched-link text-black">{{ trans('second_auth.complete_confidentiality') }}</a></h4>
                    </div>
                </div>
                <!--End Icon Box -->

                <div class="col-xl-3 col-md-6 col-6 aos-init" data-aos="fade-up" data-aos-delay="200">
                    <div class="icon-box ">
                        <div class="icon text-black d-none d-lg-block d-xl-block d-xxl"><i class="fa-solid fa-people-group"></i></div>
                        <h4 class="title"><a class="stretched-link text-black">{{ trans('second_auth.personal_answers') }}</a></h4>
                    </div>
                </div>
                <!--End Icon Box -->

                <div class="col-xl-3 col-md-6 col-6 aos-init" data-aos="fade-up" data-aos-delay="300">
                    <div class="icon-box ">
                        <div class="icon text-black d-none d-lg-block d-xl-block d-xxl "><i class="fa-regular fa-clock"></i></div>
                        <h4 class="title"><a class="stretched-link text-black"> {{ trans('second_auth.24_hours_support') }}</a></h4>
                    </div>
                </div>
                <!--End Icon Box -->

                <div class="col-xl-3 col-md-6 col-6 aos-init" data-aos="fade-up" data-aos-delay="500">
                    <div class="icon-box ">
                        <div class="icon text-black d-none d-lg-block d-xl-block d-xxl"><i class="fa-solid fa-arrows-rotate"></i></div>
                        <h4 class="title"><a class="stretched-link text-black">{{ trans('second_auth.continuous_follow_up') }}</a></h4>
                    </div>
                </div>
                <!--End Icon Box -->

            </div>
        </div>
    </div>


</section>
@endsection
<!-- End Hero Section -->


<!--  start reservation  -->
@section('reservation')
    <!--  Our Services Section  -->
    <section id="services" class="services sections-bg overflow-hidden">
        <div class="container aos-init aos-animate" data-aos="fade-up">
            <div class="row">
                <h2 id="reserv" class="text-center we title_bold">{{ trans('second_auth.easily_reserve') }}</h2>
                <div id="exTab3 m-auto text-center">
                    <ul class="nav nav-pills col-12 p-0">
                        <li class="active p-2 col-4 text-center">
                            <a href="#1b" data-toggle="tab">
                                <button type="button" class="btn btn-success purple mano w-lg-100 we">{{ trans('second_auth.visit_closest_clinic') }}</button>
                            </a>
                        </li>
                        <li class="p-2 col-4   text-center"><a  href="#2b" data-toggle="tab">
                            <button type="button" class="btn btn-success purple mano w-lg-100 we">{{ trans('second_auth.online_sessions') }}</button>
                        </a>
                        </li>
                        <li class="p-2 col-4  text-center"><a href="#3b" data-toggle="tab">
                            <button type="button" class="btn btn-success purple mano w-lg-100 we">{{ trans('second_auth.reservation_hospitals') }}</button>
                        </a>
                        </li>
                    </ul>

                    <div class="tab-content clearfix">
                        <div class="tab-pane active" id="1b">
                            <div class="container">
                                <div class="row">
                                    <form action="{{ route('doctor-search') }}" class="form_card col-10 m-auto  p-2" >
                                        <!-- row -->
                                        <div class="form-row">
                                            <!-- select markup -->
                                            <div class=" col-lg-7 col-sm-12 m-auto">
                                                <label  class="we h4">@lang('site.select_speciality')</label>
                                                <select class="form-control we" name="speciality_id">
                                                    <option class="we" value="">@lang('site.all_spec')</option>
                                                    @foreach ($specialities as $item)
                                                        @php($selected = $request && $request->speciality_id == $item->id ? 'selected' : '')
                                                        <option {{$selected}}  value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <!-- select markup -->
                                            <div class=" col-lg-7 col-sm-12 m-auto">
                                                <label class="we h4">@lang('site.select_city')</label>
                                                <select class="form-control search_country_id we" name="city_id">
                                                    <option class="we" value="">@lang('site.select_city')</option>
                                                    @foreach ($cities as $item)
                                                    @php($selected = $request && $request->city_id == $item->id ? 'selected' : '')
                                                    <option {{$selected}} class="we" value="{{ $item->id }}">{{ $item->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <!-- select markup -->
                                            <div class=" col-lg-7 col-sm-12 m-auto">
                                                <label class="we h4 label-text">@lang('site.select_area')</label>

                                                <div class="form-group">
                                                    <select class="form-control appendCities we" name="area_id">
                                                        <option class="we" value="">{{ trans('second_auth.choose_the_hole') }}</option>
                                                        @if($selectedAreas)
                                                        @foreach($selectedAreas as $arrea)
                                                        @php($selected = $request && $request->area_id == $arrea->id ? 'selected' : '')
                                                        <option {{$selected}}  value="{{$arrea->id}}">{{$arrea->name}}
                                                        </option>
                                                        @endforeach
                                                        @else
                                                        <option class="hidden we" disabled="" value="">@lang('site.select_area')
                                                        </option>
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group col-lg-7 col-sm-12 m-auto">
                                            <label class='we h4' for="search_doctor">{{ trans('second_auth.look_for_the_doctor') }}</label>
                                            <input class="form-control we inbut_bor " name="name" type="text" value="{{$request ? $request->name : ''}}" placeholder="{{ trans('second_auth.look_for_the_doctor') }} ">

                                        </div>
                                        <div class="m-auto text-center p-2">
                                            {{-- <a href="{{ route('Second_telehealth') }}" type="button" >{{ trans('second_auth.search_now') }}</a> --}}
                                            <button type="submit" class="btn btn_purple purple w-lg-50  search  we">@lang('site.search_now')</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="2b">
                            <form action="{{ route('doctor-search') }}" class="form_card col-10 m-auto  p-2">
                                <!-- row -->
                                <input type="hidden" name="telehealth" value="true">
                                <div class="form-row">
                                    <!-- select markup -->
                                    <div class=" col-lg-7 col-sm-12 m-auto">
                                        <label class="we h4">@lang('site.select_speciality')</label>
                                        <select class="form-control we" name="speciality_id">
                                            <option class="" value="">@lang('site.all_spec')
                                            </option>
                                            @foreach ($specialities as $item)
                                            @php($selected = $request && $request->speciality_id == $item->id ? 'selected' : '')
                                                <option {{$selected}} value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group col-lg-7 col-sm-12 m-auto">
                                    <label class='we h4' for="search_name">{{ trans('second_auth.search_name') }}</label>
                                    <input class="form-control we inbut_bor" name="name" type="text" value="{{$request ? $request->name : ''}}"  placeholder="@lang('site.or_search_by_name')">
                                </div>
                                <div class="m-auto text-center p-2">
                                    <button  type="submit" class="btn btn_purple purple w-lg-25 search we">@lang('site.search_now')</button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane" id="3b">
                            <form class="form_card col-10 m-auto  p-2" action="{{route('Second_booking_hospital')}}" method="GET">
                                <!-- row -->
                                <div class="form-row">
                                    <!-- select markup -->
                                    <div class=" col-lg-7 col-sm-12 m-auto">
                                        <label class="we h4">@lang('site.select_city')</label>
                                        <select class="form-control search_country_id we" name="city_id">
                                            <option class="" value="">@lang('site.select_city')</option>
                                            @foreach ($cities as $item)
                                            @php($selected = $request && $request->city_id == $item->id ? 'selected' : '')
                                            <option {{$selected}} value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group col-lg-7 col-sm-12 m-auto">
                                    <label class='we h4' for="exampleInputEmail1">{{ trans('second_auth.search_name') }}</label>
                                    <input class="form-control we inbut_bor" name="name" type="text" value="{{$request ? $request->name : ''}}"  placeholder="@lang('site.or_search_by_name')">
                                </div>
                                <div class="m-auto text-center p-2">
                                    <button href="javascript:;" type="submit" class="btn btn_purple purple  w-75 search w-50 we">@lang('site.search_now')</button>
                                </div>

                            </form>
                        </div>

                    </div>
                </div>



            </div>
    </div>
</section>

    <!-- End Our Services Section -->

    <script src="{{ asset('new_assets/js/script_tap_content.js') }}"></script>

    <script>
              $(document).on('change', '.search_country_id', function () {
            let city = $(this).val();
            $.ajax({
                type: 'GET',
                data: {
                    city: city
                },
                url: '{{route('append.areas')}}',
                success: function (response) {
                    $('.appendCities').html(response.view);
                },
            });
        })

    </script>
@endsection
<!--  end reservation  -->

<!--  About Us Section  -->
@section('about_us')
    <section id="about" class="about">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-lg-6 col-sm-12 text-center">
                    <div class="section-header">
                        <h1 class="about_us_title title_bold">{{ trans('second_auth.who_are_we') }}</h1>
                        <h4 class="we"> {{ trans('second_auth.definition_1') }}</h4>
                    </div>
                    <div class="col-lg-12">
                        <h5 class="p-2 we"> {{ trans('second_auth.definition_2') }}</h4>
                            <h5 class="p-2 we"> {{ trans('second_auth.definition_3') }}</h4>
                                <h5 class="p-2 we"> {{ trans('second_auth.definition_4') }}</h4>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12 text-center">
                    <div class="content ps-0 ps-lg-5">
                        <h2 class=" about_us_title fst-italic title_bold">
                           {{ trans('second_auth.how_book_session') }}
                        </h2>
                        <ul>
                            <li class="we h4"> {{ trans('second_auth.choose_field') }}</li>
                            <li class="we h4"> {{ trans('second_auth.choose_expert') }}</li>
                            <li class="we h4"> {{ trans('second_auth.select_connection') }}</li>
                            <li class="we h4"> {{ trans('second_auth.payment_options') }}</li>
                            <li class="we h4"> {{ trans('second_auth.start_session') }}</li>
                        </ul>
                        <div class="position-relative mt-4">
                            <img src="https://www2.0zz0.com/2023/04/29/22/788483089.png" class="w-50 img-fluid rounded-4"
                                alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        </div>
    </section>
@endsection
<!-- End About Us Section -->

<!--  Clients Section  -->
@section('client')
    <section id="clients" class="clients">
        <div class="container" data-aos="zoom-out">
            <div class="clients-slider swiper">
                <div class="swiper-wrapper  align-items-center" style="height: auto">
                    <div class="swiper-slide"><img src="{{ asset('new_assets/img/clients/client-1.png') }}"
                            class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="{{ asset('new_assets/img/clients/client-2.png') }}"
                            class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="{{ asset('new_assets/img/clients/client-3.png') }}"
                            class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="{{ asset('new_assets/img/clients/client-4.png') }}"
                            class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="{{ asset('new_assets/img/clients/client-5.png') }}"
                            class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="{{ asset('new_assets/img/clients/client-6.png') }}"
                            class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="{{ asset('new_assets/img/clients/client-7.png') }}"
                            class="img-fluid" alt=""></div>
                    <div class="swiper-slide"><img src="{{ asset('new_assets/img/clients/client-8.png') }}"
                            class="img-fluid" alt=""></div>
                </div>
            </div>

        </div>
    </section>
@endsection
<!-- End Clients Section -->

<!--  start team Section  -->
@section('team')
    <section id="team" class="testimonials p-0">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-lg-12 col-sm-12">
                    <div class="section-header">
                        <h1 class="about_us_title title_bold">{{ trans('second_auth.our_doctors') }}</h1>
                        <h4 class="we">{{ trans('second_auth.definition_doctors') }}</h4>
                    </div>
                </div>
                <div class="slides-3 swiper" data-aos="fade-up" data-aos-delay="100">
                    <div class="swiper-wrapper" style="height: auto">

                        @foreach($doctors as $doctor)
                        <div class="swiper-slide">
                            <div class="testimonial-wrap">
                                <div class="testimonial-item">
                                    <div class="d-flex align-items-center">
                                        <img src="{{ doctorProfile($doctor->getRawOriginal('image'),null,$doctor->image) }}"
                                            class="testimonial-img flex-shrink-0 p-lg-2" alt="">
                                        <div>
                                            <h2 class="we">
                                                @if (!empty(Session::get('locale') == 'ar'))
                                                {{$doctor->name_ar}}
                                                @else
                                                    {{$doctor->name}}
                                                @endif
                                            </h2>
                                            <h4 class="we h4 text-center">
                                                @if(isset($doctor->information))
                                                    @if (!empty(Session::get('locale') == 'ar'))
                                                        {{ $doctor->information->job_title_ar }}
                                                    @else
                                                        {{ $doctor->information->job_title }}
                                                    @endif
                                                @endif
                                            </h4>
                                            <div class="stars text-center ">
                                                @for($i=1;$i<=5;$i++)
                                                <i class="bi bi-star-fill"></i>
                                                @endfor
                                            </div>
                                        </div>
                                    </div>
                                        @if($doctor->specialities->count() > 0)
                                            <p class="we h4 text-center">
                                                {{-- <i class="bi bi-quote quote-icon-left"></i> --}}
                                                @lang('site.Specialities_in'):
                                                @foreach ($doctor->specialities as $item)
                                                    {{ $item->name }}
                                                @endforeach
                                                {{-- <i class="bi bi-quote quote-icon-right"></i> --}}
                                            </p>
                                        @endif
                                        <div class="text-center">
                                            <a href="{{route('Second_doctor_profile',$doctor->id)}}" class="we w-75 btn purple col-6 text-white">@lang('site.visit_now')</a>
                                        </div>
                                </div>
                            </div>
                        </div><!-- End testimonial item -->
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
<!-- End team Section -->


<!--  Frequently Asked Questions Section  -->
@section('faq')
    <section id="faq" class="faq p-0">
        <div class="container" data-aos="fade-up">
            <div class="row gy-4">
                <div class="col-lg-12">
                    <div class="accordion accordion-flush" id="faqlist" data-aos="fade-up" data-aos-delay="100">
                        <div class="accordion-item">
                            <h3 class="we accordion-header">
                                <button class=" accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq-content-1">

                                {{ trans('second_auth.our_mission') }}</button>
                            </h3>
                            <div id="faq-content-1" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                                <div class="accordion-body we">
                                   {{ trans('second_auth.definition_our_mission') }}
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item">
                            <h3 class="accordion-header">
                                <button class="we accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq-content-2">
                                                                   {{ trans('second_auth.our_vision') }}</button>
                            </h3>
                            <div id="faq-content-2" class=" accordion-collapse collapse" data-bs-parent="#faqlist">
                                <div class="accordion-body we">{{ trans('second_auth.definition_our_vision') }}
                                </div>
                            </div>
                        </div>


                        <div class="accordion-item">
                            <h3 class="accordion-header">
                                <button class="we accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#faq-content-3">
                                    {{ trans('second_auth.rate_us') }}</button>
                            </h3>
                            <div id="faq-content-3" class="accordion-collapse collapse" data-bs-parent="#faqlist">
                                <div class="accordion-body we">
                                    {{ trans('second_auth.definition_our_rate_us') }}</div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

        </div>
    </section>
@endsection
<!-- End Frequently Asked Questions Section -->

<!--  start Contact Section  -->
@section('contact')
    <section id="contact" class="contact p-0">
        <div class="container" data-aos="fade-up">
            <div class="section-header">
                <h1 class="p-4 about_us_title title_bold">{{ trans('second_auth.connect_us') }}</h1>
            </div>
            <div class="row gx-lg-0 gy-4">
                <div class="col-lg-9 m-auto">
                    <form action="{{route('contactMessage')}}" method="post" role="form" class="php-email-form">
                        @csrf
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input type="text" name="name" class="form-control inbut_bor" id="name"
                                    placeholder="{{ trans('second_auth.your_name') }}" required>
                            </div>
                            <div class="col-md-6 form-group mt-3 mt-md-0">
                                <input type="email" class="form-control inbut_bor" name="email" id="email"
                                    placeholder="{{ trans('second_auth.your_email') }}" required>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <input type="text" class="form-control inbut_bor" name="subject" id="subject"
                                placeholder="{{trans('second_auth.message_subject') }}">
                        </div>
                        <div class="form-group mt-3">
                            <textarea class="form-control" name="message" rows="7" placeholder="{{ trans('second_auth.the_message') }}" required></textarea>
                        </div>
                        <div class="my-3">
                            <div class="loading">Loading</div>
                            <div class="error-message"></div>
                            <div class="sent-message">Your message has been sent. Thank you!</div>
                        </div>
                        <div class="text-center ">
                            <button class="purple we w-75 h4 search" type="submit">{{ trans('second_auth.send_now') }}</button>
                        </div>
                    </form>
                </div><!-- End Contact Form -->

            </div>

        </div>
    </section>

    @endsection
<!-- End Contact Section -->


