<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="{{env('APP_URL')}}">
                <span class="brand-logo">
                       <img src="{{ asset('favicon.png') }}" alt="">
                </span>
                    <h1 class="brand-text text-uppercase">{{ env('APP_NAME') }}</h1>
                </a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="{{route('doctor.dashboard')}}">
                    <i data-feather="home"></i>
                    <span class="menu-title text-truncate" data-i18n="Dashboards">@lang('site.Dashboard')</span>
                </a>
            </li>
            <li class=" navigation-header">
                <span data-i18n="Apps &amp; Pages">@lang('site.apps_pages')</span>
                <i data-feather="more-horizontal"></i>
            </li>
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="{{route('doctor.clinics.index')}}">
                    <i class="fa fa-clock"></i>
                    <span class="menu-title text-truncate" data-i18n="Email">@lang('site.My_clinics')</span>
                </a>
            </li>
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="{{route('doctor.patients.index')}}">
                    <i class="fa fa-user-md"></i>
                    <span class="menu-title text-truncate" data-i18n="Email">@lang('site.Patients')</span>
                </a>
            </li>
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="{{route('doctor.schedules.index')}}">
                    <i class="fa fa-clock"></i>
                    <span class="menu-title text-truncate" data-i18n="Email">@lang('site.My_schedules')</span>
                </a>
            </li>
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="{{route('doctor.reports.index')}}">
                    <i class="fa fa-file"></i>
                    <span class="menu-title text-truncate" data-i18n="Email">@lang('site.My_reports')</span>
                </a>
            </li>
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="{{route('doctor.appointments.index')}}">
                    <i class="fa fa-stethoscope"></i>
                    <span class="menu-title text-truncate" data-i18n="Email">@lang('site.Appointments')</span>
                </a>
            </li>
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="{{route('doctor.payments.index')}}">
                    <i class="fa fa-credit-card"></i>
                    <span class="menu-title text-truncate" data-i18n="Email">@lang('site.Payments')</span>
                </a>
            </li>
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="{{route('doctor.ratings')}}">
                    <i class="fa fa-star"></i>
                    <span class="menu-title text-truncate" data-i18n="Email">@lang('site.My_Ratings')</span>
                </a>
            </li>
            <hr>
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="{{route('doctor.profile')}}">
                    <i class="fa fa-user"></i>
                    <span class="menu-title text-truncate" data-i18n="Email">@lang('site.profile')</span>
                </a>
            </li>

            <li class=" nav-item">

                @if (!empty(Session::get('locale') == 'ar'))
                    <a class="d-flex align-items-center" href="{{ route('set.lang', ['en']) }}">
                        <i class="fa fa-language"></i>
                        <span class="menu-title text-truncate">@lang('site.english')</span>
                    </a>
                @else
                    <a class="d-flex align-items-center" href="{{ route('set.lang', ['ar']) }}">
                        <i class="fa fa-language"></i>
                        <span class="menu-title text-truncate">@lang('site.arabic')</span>
                    </a>
                @endif

            </li>
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="{{ route('signout') }}">
                    <i class="fa fa-sign-out-alt"></i>
                    <span class="menu-title text-truncate" data-i18n="Email">@lang('site.logout')</span>
                </a>
            </li>

        </ul>
    </div>
</div>
