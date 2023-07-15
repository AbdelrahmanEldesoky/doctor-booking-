<header class="header pb-3">
    <div class="container-fluid">
        <div class="row">

            <div class="col-md-4 col-2 px-4 logo">
                <a href="{{ route('home') }}"><img alt="Ipersona" class="mx-2 logo-main" src="{{ asset('logo_main.png') }}" /></a>
            </div>
            <div class="col-md-8 col-10 px-2 navholder">
                <nav class="navbar navbar-expand-md navbar-dark nav-essal">

                    <div class="container-fluid p-0">

                        <button class="navbar-toggler navstart" id="myDIV" onclick="navFunction()" type="button"
                            data-toggle="collapse" data-target="#navbarsEssal" aria-controls="navbarsEssal"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarsEssal">
                            <ul class="navbar-nav ml-auto">

                                <li class="nav-item topnav notlog">
                                    <a class="nav-link"  data-toggle="modal" data-target="#modalSignUpLogin" >
                                        <span>@lang('site.log_sign')</span>
                                    </a>
                                </li>

                                <li class="nav-item topnav notlog">

                                    @if (!empty(Session::get('locale') == 'ar'))
                                        <a href="{{ route('set.lang', ['en']) }}" class="nav-link">@lang('site.english')</a>
                                    @else
                                        <a href="{{ route('set.lang', ['ar']) }}" class="nav-link">@lang('site.arabic')</a>
                                    @endif

                                </li>

                                <li class="nav-item dropdown pb-3">
                                    <a class="nav-link dropdown-toggle" href="#" id="dropdown04" role="button"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="nav-icon easynav"></i>
                                        <i class="close-icon closenav"></i>
                                    </a>
                                    <ul class="dropdown-menu" style="padding-bottom:20px;" aria-labelledby="dropdown04">
                                        <input type="button" value="" class="fakebg" />
                                        <li>
                                            <a class="dropdown-item" href="{{ route('home') }}">
                                                <i class="home-icon"></i>@lang('site.Home')
                                            </a>
                                        </li>

                                        <li>
                                            <a class="dropdown-item" href="{{ route('about') }}">
                                                <i class="about-icon"></i>@lang('site.About')
                                            </a>
                                        </li>

                                        <li>
                                            <a class="dropdown-item" href="{{ route('contact') }}">
                                                <i class="contact-icon"></i>@lang('site.Contact')
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ route('privacy') }}">
                                                <i class="becomexpert-icon"></i>@lang('site.privacy_policy')
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ route('doctors') }}">
                                                <i class="becomexpert-icon"></i>@lang('site.for_doctors')
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ route('terms') }}">
                                                <i class="faq-icon"></i>@lang('site.Terms')
                                            </a>
                                        </li>


                                    </ul>

                        </div>
                    </div>

            </div>

            </nav>


        </div>
    </div>
    </div>
</header>



  <!-- Modal -->
  <div class="modal fade" id="modalSignUpLogin">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5>@lang('site.log_sign')</h5>
        </div>
        <div class="modal-body text-center p-3">
            <img src="{{ asset('images/hi.jpg') }}" style="width: 200px;" alt="">
            <br>
            <br>

            <a href="{{ route('login') }}" class="btn btn-site w-100 mb-3">@lang('site.Sign_in')</a>

            <span>------------ @lang('site.or') ------------</span>
            <a href="{{ route('register') }}" class="btn btn-site w-100 my-3">@lang('site.Register')</a>
            <span>------------ @lang('site.or') ------------</span>
            <a href="{{ route('register') }}?type=doctor" class="btn btn-site w-100 my-3">@lang('site.register_me_doctor')</a>
        </div>
      </div>
    </div>
  </div>
