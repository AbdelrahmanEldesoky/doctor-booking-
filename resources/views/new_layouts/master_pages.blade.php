{{-- start nav the other of pages --}}

@section('nav_links')
<li><a class='h2' href="{{ route('home') }}">{{ trans('second_auth.home_page') }}</a></li>
<li><a class='h2 d-none d-lg-block' href="{{route('doctors')}}">{{ trans('second_auth.doctors_privacy_two') }}</a></li>

<li><a class="h2" href="{{ route('privacy') }}">{{ trans('second_auth.Privacy_policy_two') }}</a></li>
@auth
<li><a class='h2' href="{{ route('Second_sessions_user') }}">{{ trans('second_sessions_user.home') }}</a></li>
@endauth
@endsection

 {{-- start nav the other of pages --}}


      {{-- sweet alert --}}
      <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
      <script src="{{ asset('new_assets/sweetalert2.all.min.js') }}"></script>
