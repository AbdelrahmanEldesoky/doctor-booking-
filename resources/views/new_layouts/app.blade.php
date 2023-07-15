<!DOCTYPE html>
@if(!empty(Session::get('locale') == "en"))
<html dir="ltr">
    <link rel="stylesheet" href="{{ asset('css/ltr.css') }}">
@else
<html dir="rtl">
    <link rel="stylesheet" href="{{ asset('css/rtl.css') }}">
@endif

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  @include('new_layouts.head')

  @yield('title')
  <meta content="" name="description">
  <meta content="" name="keywords">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">


</head>


<body>

  <style>
    input:invalid {
      border: 1.2px solid red;
    }

    input:valid {
      border: 1px solid lightgreen;
    }

    input:placeholder-shown {
      border: 1px solid black;
    }


  </style>
  <!-- start Header -->
  <header id="header" class="header d-flex align-items-center">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-between">
      <a href="{{ route('home') }}" class="d-none d-lg-block logo d-flex align-items-center">
        <img src="https://www14.0zz0.com/2023/04/30/10/538462861.png" alt="">
      </a>
      <nav id="navbar" class="navbar">
        <ul>
          @auth
          <form action="{{ route('logout') }}" method="get" class="login">
            @csrf
            <div class="login_mob">
              <button type="submit" class=" btn btn_purple purple we  p-lg-2 mt-lg-2 btn_logout"></button>
            </div>
          </form>
          @else
          <form action="{{ route('login') }}" method="get" class="login">
            @csrf
            <div class="login_mob">
              <button type="submit" class="btn btn_purple purple we  p-lg-2 mt-lg-2 btn_login"></button>
            </div>
          </form>
          @endauth

          <style>-

            div:where(.swal2-container) .swal2-html-container{
                padding: 14px !important;
            }
            div:where(.swal2-container).swal2-center>.swal2-popup {
    background: #212529;
            }

            .btn_login:before {
              content: '{{ trans("second_auth.login") }}';
            }
            .btn_logout:before {
              content: '{{ trans("second_auth.logout") }}';
            }
            @media screen and (max-width: 767px) {
              .btn_logout:before {
                content: '{{ trans("second_auth.logout_two") }}';
              }

              .btn_login:before {
                content: '{{ trans("second_auth.login_two") }}';
              }
            }

          </style>
          @yield('nav_links')

          @auth
          {{-- <li class="sessions_user_hyperlink "><a class="h2  title_link" href="{{ route('Second_sessions_user') }}">{{ trans('second_sessions_user.home') }}</a>
          </li> --}}
          <li class="sessions_user_hyperlink "><a class="h2"
              href="{{ route('Second_user_account') }}">{{ trans('second_auth.my_account') }}</a></li>
          @endauth


        </ul>


        @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
        <a class="link_lang" rel="alternate" hreflang="{{ $localeCode }}"
          href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
          @if(LaravelLocalization::getCurrentLocale() != $localeCode)
          <img src="/flags/{{$localeCode}}_32.png" alt=""> {{ $properties['native'] }}
          @endif
        </a>
        @endforeach

      </nav>

    </div>
  </header>
  <!-- End Header -->

  @yield('section')

  @yield('reservation')

  @yield('about_us')

  @yield('client')


  @yield('team')
  {{--
            <!-- ======= Our Team Section ======= -->
            <section id="team" class="team">
                <div class="container" data-aos="fade-up">

                    <div class="section-header">
                        <h2>Our Team</h2>
                        <p>Nulla dolorum nulla nesciunt rerum facere sed ut inventore quam porro nihil id ratione ea
                            sunt quis dolorem dolore earum</p>
                    </div>

                    <div class="row gy-4">

                        <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
                            <div class="member">
                                <img src="{{ asset('new_assets/img/team/team-1.jpg') }}" class="img-fluid" alt="">
  <h4>Walter White</h4>
  <span>Web Development</span>
  <div class="social">
    <a href=""><i class="bi bi-twitter"></i></a>
    <a href=""><i class="bi bi-facebook"></i></a>
    <a href=""><i class="bi bi-instagram"></i></a>
    <a href=""><i class="bi bi-linkedin"></i></a>
  </div>
  </div>
  </div><!-- End Team Member -->

  <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
    <div class="member">
      <img src="{{ asset('new_assets/img/team/team-2.jpg') }}" class="img-fluid" alt="">
      <h4>Sarah Jhinson</h4>
      <span>Marketing</span>
      <div class="social">
        <a href=""><i class="bi bi-twitter"></i></a>
        <a href=""><i class="bi bi-facebook"></i></a>
        <a href=""><i class="bi bi-instagram"></i></a>
        <a href=""><i class="bi bi-linkedin"></i></a>
      </div>
    </div>
  </div><!-- End Team Member -->

  <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="300">
    <div class="member">
      <img src="{{ asset('new_assets/img/team/team-3.jpg') }}" class="img-fluid" alt="">
      <h4>William Anderson</h4>
      <span>Content</span>
      <div class="social">
        <a href=""><i class="bi bi-twitter"></i></a>
        <a href=""><i class="bi bi-facebook"></i></a>
        <a href=""><i class="bi bi-instagram"></i></a>
        <a href=""><i class="bi bi-linkedin"></i></a>
      </div>
    </div>
  </div><!-- End Team Member -->

  <div class="col-xl-3 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="400">
    <div class="member">
      <img src="{{ asset('new_assets/img/team/team-4.jpg') }}" class="img-fluid" alt="">
      <h4>Amanda Jepson</h4>
      <span>Accountant</span>
      <div class="social">
        <a href=""><i class="bi bi-twitter"></i></a>
        <a href=""><i class="bi bi-facebook"></i></a>
        <a href=""><i class="bi bi-instagram"></i></a>
        <a href=""><i class="bi bi-linkedin"></i></a>
      </div>
    </div>
  </div><!-- End Team Member -->

  </div>

  </div>
  </section><!-- End Our Team Section --> --}}


  @yield('faq')

  {{-- <!-- ======= Recent Blog Posts Section ======= -->
    <section id="recent-posts" class="recent-posts sections-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Recent Blog Posts</h2>
          <p>Consequatur libero assumenda est voluptatem est quidem illum et officia imilique qui vel architecto accusamus fugit aut qui distinctio</p>
        </div>

        <div class="row gy-4">

          <div class="col-xl-4 col-md-6">
            <article>

              <div class="post-img">
                <img src="assets/img/blog/blog-1.jpg" alt="" class="img-fluid">
              </div>

              <p class="post-category">Politics</p>

              <h2 class="title">
                <a href="blog-details.html">Dolorum optio tempore voluptas dignissimos</a>
              </h2>

              <div class="d-flex align-items-center">
                <img src="assets/img/blog/blog-second_author.jpg" alt="" class="img-fluid post-second_author-img flex-shrink-0">
                <div class="post-meta">
                  <p class="post-second_author">Maria Doe</p>
                  <p class="post-date">
                    <time datetime="2022-01-01">Jan 1, 2022</time>
                  </p>
                </div>
              </div>

            </article>
          </div><!-- End post list item -->

          <div class="col-xl-4 col-md-6">
            <article>

              <div class="post-img">
                <img src="assets/img/blog/blog-2.jpg" alt="" class="img-fluid">
              </div>

              <p class="post-category">Sports</p>

              <h2 class="title">
                <a href="blog-details.html">Nisi magni odit consequatur autem nulla dolorem</a>
              </h2>

              <div class="d-flex align-items-center">
                <img src="assets/img/blog/blog-second_author-2.jpg" alt="" class="img-fluid post-second_author-img flex-shrink-0">
                <div class="post-meta">
                  <p class="post-second_author">Allisa Mayer</p>
                  <p class="post-date">
                    <time datetime="2022-01-01">Jun 5, 2022</time>
                  </p>
                </div>
              </div>

            </article>
          </div><!-- End post list item -->

          <div class="col-xl-4 col-md-6">
            <article>

              <div class="post-img">
                <img src="assets/img/blog/blog-3.jpg" alt="" class="img-fluid">
              </div>

              <p class="post-category">Entertainment</p>

              <h2 class="title">
                <a href="blog-details.html">Possimus soluta ut id suscipit ea ut in quo quia et soluta</a>
              </h2>

              <div class="d-flex align-items-center">
                <img src="assets/img/blog/blog-second_author-3.jpg" alt="" class="img-fluid post-second_author-img flex-shrink-0">
                <div class="post-meta">
                  <p class="post-second_author">Mark Dower</p>
                  <p class="post-date">
                    <time datetime="2022-01-01">Jun 22, 2022</time>
                  </p>
                </div>
              </div>

            </article>
          </div><!-- End post list item -->

        </div><!-- End recent posts list -->

      </div>
    </section><!-- End Recent Blog Posts Section --> --}}

  @yield('contact')

<style>
    .underline-animation {
  display: inline-block;
  position: relative;
}

.underline-animation::after {
  content: "";
  position: absolute;
  left: 0;
  bottom: -5px;
  width: 100%;
  height: 2px;
  background-color:#6157a0;
  transform: scaleX(0);
  transform-origin: left;
  transition: transform 0.8s ease-in-out;
}

.underline-animation:hover::after {
  transform: scaleX(1);
}

.underline-animation::after {
  animation: underline 2s infinite;
}

@keyframes underline {
  0% {
    transform: scaleX(0);
  }
  50% {
    transform: scaleX(1);
  }
  100% {
    transform: scaleX(0);
  }
}
</style>
  <!--  start footer  -->

  <footer id="footer" class="footer purple_two">
    <div class="container">
      <div class="row gy-4">
        <div class="col-lg-5 col-md-12 footer-info">
          <a href="index.html" class="logo d-flex align-items-center">
            <span class="m-auto we">Ipersona</span>
          </a>
          <h4 class=" text-center we">{{ trans('second_auth.identification') }} </h4>
          <div class="social-links d-flex justify-content-evenly mt-4">
            <a href="https://twitter.com/@ipersonaapp" class="twitter"><i class="bi bi-twitter"></i></a>
            <a href="https://www.facebook.com/iPersonaApp" class="facebook"><i class="bi bi-facebook"></i></a>
            <a href="https://www.instagram.com/ipersona.me/" class="instagram"><i class="bi bi-instagram"></i></a>
            <a href="https://www.linkedin.com/company/ipersona/" class="linkedin"><i class="bi bi-linkedin"></i></a>
            <a href="https://www.tiktok.com/@ipersona.me" class="linkedin"><i class="fa-brands fa-tiktok"></i></a>

          </div>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4 class="we ">{{ trans('second_auth.link') }}</h4>
          <ul>
            <li><a class="underline-animation" href="{{ route('home') }}">{{ trans('second_auth.home_page')}}</a></li>
            <li><a class="underline-animation" href="{{ route('Second_conditions') }}">{{ trans('second_login.terms_and_services') }}</a></li>
            <li><a class="underline-animation" href="{{route('doctors')}}">{{ trans('second_doctors_privacy_policy.home') }}</a></li>
            <li><a class="underline-animation" href="{{ route('privacy') }}">{{ trans('second_auth.Privacy_policy') }}</a></li>
          </ul>
        </div>

        <div class="col-lg-3 col-6 col-md-12 footer-contact text-center text-md-start">
          <h4 class="we text-center">{{ trans('second_auth.contact_us') }}</h4>
          <p>
            <strong>{{ trans('second_auth.adress') }} : </strong>{{ trans('second_auth.detail_address') }} <br>
            <strong>{{ trans('second_auth.phone') }} : </strong> 01012002624<br>
            <strong>{{ trans('second_auth.email') }} : </strong> info@ipersona.me<br>
          </p>

        </div>
        <div class="cocol-8 m-auto col-lg-2 col-md-6 footer-contact text-center text-md-start">
          @auth
          <div class="text-center p-2 we d-none ">
            <h4 class="we">{{ trans('second_auth.join_now') }}</h4>
            <button type="button" class=" btn  w-100   btn-outline-light text-dark boder border_purple  "><a
                href="#">
                {{ trans('second_auth.join_customer') }}
              </a></button>
          </div>
          @else
          <div class="text-center p-2 we">
            <h4 class="we">{{ trans('second_auth.join_now') }}</h4>

            <a href="{{ route('login') }}">
              <button type="button" class=" btn  w-100 h-25  btn-outline-light text-dark boder border_purple  ">
                {{ trans('second_auth.join_customer') }}
              </button>
            </a>
          </div>
          <h4 class='text-center'>{{ trans('second_auth.or') }}</h4>
          @endauth
          <div class="text-center we">

            <button type="button" class=" btn w-100 h-25   btn-outline-light text-dark boder border_purple  " id="meme">
              {{trans('second_auth.join_therapist')}}
            </button>
          </div>
        </div>
      </div>
    </div>

    <div class="container mt-4">
      <div class="copyright">
        &copy; Copyright <strong><span>Ipersona</span></strong>
      </div>
    </div>
  </footer>

  <!-- End Footer -->



  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>
  {{-- @include('sweetalert::alert') --}}
  <style>
    .pay_submit {
      background-color: #6157a0 !important;
      color: #FFF !important;
      font-weight: bold !important;
    }
  </style>
  <form id="delete-form" action="" method="POST" style="display: none;">
    @csrf
    @method('delete')
  </form>
  <div class="modal fade" id="appointmentPayModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document" style="">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">@lang('site.book_psy')</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body append_pay_appointment">

        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="RateModal" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">@lang('site.rate_our_service')</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="" action="{{route('rate')}}" method="post">
            @csrf
            <input type="hidden" class="appp_id" value="" name="appointment_id">
            <input type="hidden" class="docc_id" value="" name="doctor_id">
            <input type="hidden" class="hoss_id" value="" name="hospital_id">
            <label for="username" class="form-label">@lang('site.rating')</label>
            <input type="number" name="rating" id="rating1" class="rating text-warning form-control text-center"
              data-clearable="remove" />

            <label for="username" class="form-label">@lang('site.message')</label>
            <textarea name="comment" class="form-control required" required id="" placeholder="@lang('site.message')"
              cols="20" rows="3"></textarea>

            <button class=" btn btn-primary btn-lg btn-site border-0 mt-4" type="submit">@lang('site.submit')</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Vendor JS Files -->
  <script src="{{ asset('new_assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('new_assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('new_assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('new_assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ asset('new_assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('new_assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('new_assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{asset('frontend/dist/js/toastr.min.js')}}"></script>
  <!-- Template new_style/ Main JS File -->
  <script src="{{ asset('new_assets/js/main.js') }}"></script>
  <script src="{{asset('assets/admin/app-assets/js/scripts/forms/pickers/form-pickers.js')}}"></script>


  <script>
    $('#meme').on('click',function () {

    Swal.fire({
  title: '<h2 class="we text-light">{{ trans("second_auth.connect_us") }} </h2>',
  html: '<strong class="we text-light h4">{{ trans("second_auth.phone") }} :   01012002624  </strong><br>'+
        '<strong class="we text-light h4">{{ trans("second_auth.email") }} :  info@ipersona.me </strong>' ,
  showClass: {
    popup: 'animate__animated animate__fadeInDown'
  },
  hideClass: {
    popup: 'animate__animated animate__fadeOutUp'
  },
  confirmButtonText:
    '<i class="fa fa-thumbs-up"></i> ok',
})

})

  $(document).on('click', '.book_hospital', function (e) {
      e.preventDefault();
      @if(!Auth::user())
      toastr.error('Please Login to book Appointment');
      window.location.href = `{{route('login')}}`;
      return false;
      @endif
      let hospital_id = $(this).data('hospital');
      let room_id = $(this).data('room');
      let too_date = $('.too_date').val();
      let froom_date = $('.froom_date').val();
      toastr.success(@json(__('site.sent_request_wait')));
      $.ajax({
          type: 'GET',
          data: {
              hospital_id: hospital_id,
              room_id: room_id,
              too_date: too_date,
              froom_date: froom_date
          },
          url: '{{route('hospitals.appointment')}}',
          success: function (response) {
              if (response.error) {
                  toastr.error(response.error);
              } else {
                  toastr.success(response.success);
              }
          }
      });
  })


  </script>
</body>

</html>
