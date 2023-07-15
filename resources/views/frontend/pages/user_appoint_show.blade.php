<link href="{{ asset('new_assets/doctor_profile/style.css') }}" rel="stylesheet">
<link href="{{ asset('new_assets/booking/style.css') }}" rel="stylesheet">

@extends('new_layouts.app')

@section('title')
    <title>ipersona / {{ trans('second_booking_doctor.home') }}</title>
@endsection



@extends('new_layouts.master_pages')

<!--  start Section  -->
@section('section')
<style>
    .fill {
        color: #FFD700;
    }
    .append-card-img img {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        object-fit: cover;
        object-position: top;
        border: 2px solid #3da8c0;
        padding: 2px;
        box-shadow: 0 0 6px #3da8c04d;
    }
    .appoint_detail {
        padding: 10px;
        border: 1px solid;
        border-radius: 10px;
        margin-top: 20px;
    }
    .hide {
        display: none;
    }
</style>
    <section id="hero" class="hero">
        <div class="app-content content ">
            <div class="content-overlay"></div>
            <div class="header-navbar-shadow"></div>
            <div class="content-wrapper container-xxl p-0">
                <div class="content-header row">
                </div>
                <div class="content-body">
                    <section class="app-user-view">
                        <!-- User Card & Plan Starts -->
                        <div class="row">
                            <!-- User Card starts-->
                            <div class="col-xl-8 col-lg-8 col-md-8">
                                <div class="card user-card card-site">
                                    <div class="card-header">
                                        @if($appointment->doctor_id)
                                        <h3>@lang('site.Doctor_Detail')</h3>
                                        @else
                                        <h3>@lang('site.Hospital_Detail')</h3>
                                        @endif
                                    </div>
                                    @php($det_rot = $appointment->doctor_id ? route('Second_doctor_profile',$appointment->doctor->id) : '')
                                    <div class="card-item card-item-list doctor_list_item"
                                        data-url="{{$det_rot ?? ''}}">
        
                                        <div class="card-body ">
                                            <div class="row mt-4">
                                                <div class="col-md-3">
                                                    <div class="card-img" style="height:150px;width:150px;overflow:hidden">
                                                        <a href="{{$det_rot}}" class="d-block">
                                                        @if($appointment->doctor_id)
                                                        <img src="{{doctorProfile($appointment->doctor->getRawOriginal('image'),null,$appointment->doctor->image)}}" alt="img"
                                                                style="width:100%">
                                                            @else
                                                            {{-- <img src="{{doctorProfile($appointment->hospital->getRawOriginal('image'),null,$appointment->doctor->image)}}" alt="img"
                                                                                    style="width:100%"> --}}
                                                            @endif
        
                                                        </a>
                                                    </div>
        
                                                </div>
                                                <div class="col-md-9">
                                                    <p>
                                                        <span class="price__from">
        
                                                        @if($appointment->doctor_id)
                                                        @if (!empty(Session::get('locale') == 'ar'))
                                                                {{$appointment->doctor->name_ar}}
                                                            @else
                                                                {{$appointment->doctor->name}}
                                                            @endif
                                        @else
                                        @if (!empty(Session::get('locale') == 'ar'))
                                                                {{$appointment->hospital->name_ar}}
                                                            @else
                                                                {{$appointment->hospital->name}}
                                                            @endif
                                        @endif
        
                                                        </span>
                                                    </p>
                                                    <p style="font-size: 13px;font-weight: lighter">
        
                                                    @if($appointment->doctor_id)
                                                    @if (!empty(Session::get('locale') == 'ar'))
                                                            {{   $appointment->doctor->information  ? $appointment->doctor->information->job_title_ar : '-'}}
                                                        @else
                                                            {{   $appointment->doctor->information  ? $appointment->doctor->information->job_title : '-'}}
                                                        @endif
                                        @else
                                        @if (!empty(Session::get('locale') == 'ar'))
                                                            {{   $appointment->hospital->information  ? $appointment->hospital->information->job_title_ar : '-'}}
                                                        @else
                                                            {{   $appointment->hospital->information  ? $appointment->hospital->information->job_title : '-'}}
                                                        @endif
                                        @endif
        
                                                    </p>
        
                                                    @php(list($count,$rate) = avgRating($appointment->hospital ? $appointment->hospital->id : $appointment->doctor->id))
        
                                                    <div class="card-rating">
                                                        <div class="d-flex" style="width:fit-content">
                                                        @for($i=1;$i<=5;$i++) @php($fill=$i <=$count ? 'text-warning' : '' ) <i
                                    class="fa fa-star  {{$fill}} "></i>
                                    @endfor
                                                        </div>
        
                                                    </div>
                                                    <div class="card-price d-flex align-items-center justify-content-between">
                                                        <p>
                                                            <span class="price__from" style="font-size:14px">
                                                                @lang('site.over_all_rate_from')
                                                                {{ $rate}}
                                                                @lang('site.users')</span>
                                                        </p>
                                                    </div>
        
        
                                                    <p style="font-size: 13px;font-weight: lighter;margin-top: 14px;">
                                                    @if($appointment->doctor_id)
                                                    {{$appointment->doctor->information ? $appointment->doctor->information->about : '-'}}
        
                                        @else
                                        {{$appointment->hospital->information ? $appointment->hospital->information->about : '-'}}
        
                                        @endif
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4">
                                <div class="card user-card card-site">
                                    <div class="card-header">
                                        <h3>@lang('site.Appointment_Detail')</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-xl-6 col-lg-12 mt-2 mt-xl-0">
                                                <div class="user-info-wrapper">
                                                    <div class="d-flex flex-wrap">
                                                        <div class="user-info-title">
                                                            <i data-feather="user" class="mr-1"></i>
                                                            <span class="card-text user-info-title font-weight-bold mb-0">@lang('site.day')
                                                                :</span>
                                                        </div>
                                                        <p class="card-text mb-0">
                                                            @php($datt = $appointment->schedule ? $appointment->schedule->date : '')
                                                            @lang('site.'.$datt)
                                                        </p>
                                                    </div>
                                                    <div class="d-flex flex-wrap">
                                                        <div class="user-info-title">
                                                            <i data-feather="user" class="mr-1"></i>
                                                            <span class="card-text user-info-title font-weight-bold mb-0">@lang('site.date')
                                                                :</span>
                                                        </div>
                                                        <p class="card-text mb-0">{{$appointment->from}}</p>
                                                    </div>
                                                    <div class="d-flex flex-wrap my-50">
                                                        <div class="user-info-title">
                                                            <i data-feather="check" class="mr-1"></i>
                                                            <span class="card-text user-info-title font-weight-bold mb-0">@lang('site.status')
                                                                :</span>
                                                        </div>
                                                        @if($appointment->status == 'waiting_for_rating')
                                                            @if($appointment->doctor_id)
                                                            <a href="{{ route('rate', [$appointment->id, $appointment->doctor_id]) }}" class="btn btn-sm btn-site" style="white-space: nowrap;">@lang('site.rate_appointment')</a>
                                                            @else
                                                            <a href="{{ route('hospitalRate', [$appointment->id, $appointment->hospital_id]) }}" class="btn btn-sm btn-site" style="white-space: nowrap;">@lang('site.rate_appointment')</a>
                                                            @endif
                                                            @else
                                                            <p class="card-text mb-0 text-capitalize text-info">
        
                                                                @if($appointment->status == 'complete')
                                                                    Completed
                                                                @else
                                                                    {{ $appointment->status }}
                                                                @endif
                                                            </p>
                                                        @endif
        
                                                    </div>
        
        
                                                    <hr>
                                                    <div class="d-flex flex-wrap my-50">
                                                        <div class="user-info-title">
                                                            <i data-feather="star" class="mr-1"></i>
                                                            <span class="card-text user-info-title font-weight-bold mb-0">@lang('site.from')
                                                                :</span>
                                                        </div>
                                                        <p class="card-text mb-0">
                                                            {{-- <span class="egp_time_from text-uppercase"></span> --}}
                                                            {{$appointment->schedule ? customDate($appointment->schedule->from,'H:i A') : ''}}
                                                            <span class="time-format">@lang('site.Egypt_Time')</span>
                                                        </p>
        
                                                    </div>
                                                    <div class="d-flex flex-wrap my-50">
                                                        <div class="user-info-title">
                                                            <i data-feather="star" class="mr-1"></i>
                                                            <span class="card-text user-info-title font-weight-bold mb-0">@lang('site.to')
                                                                :</span>
                                                        </div>
                                                        <p class="card-text mb-0">
                                                            {{-- <span class="egp_time_to text-uppercase"></span> --}}
                                                            {{$appointment->schedule ? customDate($appointment->schedule->to,'H:i A') : ''}}
                                                            <span class="time-format">@lang('site.Egypt_Time')</span>
                                                        </p>
        
                                                    </div>
                                                    <hr>
        
        
        
        
                                                    <div class="d-flex flex-wrap my-50">
                                                        <div class="user-info-title">
                                                            <i data-feather="star" class="mr-1"></i>
                                                            <span class="card-text user-info-title font-weight-bold mb-0">@lang('site.from')
                                                                :</span>
                                                        </div>
                                                        <p class="card-text mb-0">
        
                                                            <span class="local_time_from text-uppercase"></span>
                                                            <span class="time-format">@lang('site.Local_Time')</span>
                                                        </p>
        
                                                    </div>
                                                    <div class="d-flex flex-wrap my-50">
                                                        <div class="user-info-title">
                                                            <i data-feather="star" class="mr-1"></i>
                                                            <span class="card-text user-info-title font-weight-bold mb-0">@lang('site.to')
                                                                :</span>
                                                        </div>
                                                        <p class="card-text mb-0">
                                                            <span class="local_time_to text-uppercase"></span>
                                                            <span class="time-format">@lang('site.Local_Time')</span>
                                                        </p>
        
                                                    </div>
                                                    <hr>
        
        
        
        
                                                    <div class="d-flex flex-wrap my-50">
                                                        <div class="user-info-title">
                                                            <i data-feather="flag" class="mr-1"></i>
                                                            <span class="card-text user-info-title font-weight-bold mb-0">@lang('site.Amount')
                                                                :</span>
                                                        </div>
                                                        <p class="card-text mb-0">{{$appointment->amount}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </section>
  
    <script src="{{asset('assets/admin/app-assets/js/scripts/forms/pickers/form-pickers.js')}}"></script>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <script>

        $(document).ready(function(){
    
    
        // MAIN ZONE FROM EGYPT
        let newzone = moment.tz.zonesForCountry('EG');
        newzone = newzone[0];
    
    
        // VARIABLE OF TIMES
        var local_time_from = '{{$appointment->schedule ? $appointment->schedule->from : ''}}';
        var local_time_to = '{{$appointment->schedule ? $appointment->schedule->to : ''}}';
    
        // USERZONE FROM LOCATION PHP HELPER FUNCTION
        let user_zone = moment.tz.zonesForCountry('{{ getLocationCode() }}');
        user_zone = user_zone[0];
    
        // FORMAT
        var fmt = "HH:mm a";
    
    
    
        var utc_time = moment.tz(local_time_from, fmt, newzone).utc().format(fmt);
        var m = moment.utc(utc_time, "HH:mm");
        // var egp_time_from = m;
        var time_from_converted = m.clone().tz(user_zone).format("HH:mm");
        $('.local_time_from').text(time_from_converted)
    
    
        var utc_time = moment.tz(local_time_to, fmt, newzone).utc().format(fmt);
        var m = moment.utc(utc_time, "HH:mm");
        // var egp_time_to = m;
        var time_to_converted = m.clone().tz(user_zone).format("HH:mm");
        $('.local_time_to').text(time_to_converted)

        })
    
    
    
    
    </script>
  <script src="{{ asset('new_assets/doctor_profile/clender.js') }}"></script>
@endsection
<!-- End Hero Section -->
<!--  start team Section  -->
@section('team')
<link href="{{asset('frontend/dist/css/layout_v.min.css')}}" rel="stylesheet" async />
<style>
    .h4,h4 {
    font-size: calc(1.275rem + .3vw)
    }
        .card-site
    {
    width: 100%;
    position: relative;
    max-width: 100%;
    margin: auto;
    background: #fff;
    box-shadow: 0px 5px 20px rgb(34 35 58 / 15%);
    padding: 25px;
    border-radius: 25px;
    transition: all .3s;
    border: 0px;
    }
</style>
    {{-- <section id="team" class="testimonials">
        <div class="container">
            <div class="row fitered_doctors_list " style="margin-top:20px">
             
                        <div class="col-md-12">
                            <div class="card mt-3 card-site">
                                <h4>
                                    @lang('site.patient_reviews')
                                </h4>
                                @foreach($doctor->doctorRatings as $rate)
                                <div class="d-flex">
                                @for($i=1;$i<=5;$i++)
                                 @php($fill=$i <=$rate->rating ? 'text-warning' : '' )
                                 <i class="fa fa-star  {{$fill}} "></i>
                                 @endfor
            
                                 <span style="font-size: 14px;margin-left: 28px;">@lang('site.overall_rating')</span>
                                </div>
            
                                <div style="margin-top:10px;margin-bottom:10px">{{$rate->comment}}</div>
                                @php($margin = Session::get('locale') == 'ar' ? 'margin-right:15px' : 'margin-left:15px')
                                <div style="font-size:14px;display:flex">{{$rate->rateBy->name}} <div style="{{$margin}}"> {{customDate($rate->created_at,'d M Y')}}</div></div>
                                <hr>
                                @endforeach
            
                            </div>
                        </div>

            </div>
        </div>
    </section> --}}
@endsection
<!-- End team Section -->
