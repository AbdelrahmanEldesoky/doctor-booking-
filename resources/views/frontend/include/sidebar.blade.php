<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="../../../html/ltr/vertical-menu-template/index.html">
                <span class="brand-logo">
                       <img src="{{ asset('favicon.png') }}" alt="">
                </span>
                    <h1 class="brand-text text-uppercase">{{ env('APP_NAME') }}</h1>
                </a></li>
            {{-- <li class="nav-item nav-toggle">
                <a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse">
                    <i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i>
                    <i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i>
                </a>
            </li> --}}
        </ul>
    </div>
    <hr>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="{{route('admin.dashboard')}}">
                    <i data-feather="home"></i>
                    <span class="menu-title text-truncate" data-i18n="Dashboards">Dashboard</span>
                </a>
            </li>
            <hr>
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="{{route('admin.specialities.index')}}">
                    <i class="fa fa-user-md"></i>
                    <span class="menu-title text-truncate" data-i18n="Email">Specialities</span>
                </a>
            </li>
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="{{route('admin.hospitals.index')}}">
                    <i class="fa fa-user-md"></i>
                    <span class="menu-title text-truncate" data-i18n="Email">Hospitals</span>
                </a>
            </li>
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="{{route('admin.doctors.index')}}">
                    <i class="fa fa-user-md"></i>
                    <span class="menu-title text-truncate" data-i18n="Email">Doctors</span>
                </a>
            </li>
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="{{route('admin.patients.index')}}">
                    <i class="fa fa-user-md"></i>
                    <span class="menu-title text-truncate" data-i18n="Email">Patients</span>
                </a>
            </li>
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="{{route('admin.appointments.index')}}">
                    <i class="fa fa-stethoscope"></i>
                    <span class="menu-title text-truncate" data-i18n="Email">Appointments</span>
                </a>
            </li>
            <!-- <li class=" nav-item">
                <a class="d-flex align-items-center" href="#">
                    <i data-feather='mail'></i>
                    <span class="menu-title text-truncate" data-i18n="Email"> Contact Inquiries</span>
                </a>
            </li>

            <li class=" nav-item">
                <a class="d-flex align-items-center" href="#">
                    <i data-feather='users'></i>
                    <span class="menu-title text-truncate" data-i18n="Email">Members</span>
                </a>
            </li>
            <hr>
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="{{ route('admin.setting.index') }}">
                    <i data-feather='settings'></i>
                    <span class="menu-title text-truncate" data-i18n="Email"> Settings</span>
                </a>
            </li> -->

        </ul>
    </div>
</div>
