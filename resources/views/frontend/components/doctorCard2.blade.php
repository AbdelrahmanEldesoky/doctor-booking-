@php($tyep = $tyep ?? null)
@php($slug_name = setSlug($doctor->name))
<div class="card-item card-item-list doctor_card_box doctor_list_item_@ position-relative rounded-0"
    data-url="{{route('doctor.show',[$doctor->id,$slug_name])}}">
    @if($tyep)
    <div style=""><span class="badge badge-warning fill"
            style="background:#ffc107;color:white;width:fit-content">@lang('site.ad')</span></div>
    @endif
    @php(list($price,$curr) = getSessonPrice($doctor,session('is_telehealth'),'currency'))
    <div class="card-complete">
        <div class="image-container">
            <img src="{{ doctorProfile($doctor->getRawOriginal('image'),null,$doctor->image) }}" alt="" />
        </div>
        <div class="text-container">
            <h6 class="about_us_title">
                @if (!empty(Session::get('locale') == 'ar'))
                {{$doctor->name_ar}}
                @else
                {{$doctor->name}}
                @endif
            </h6>
            <span>
                @if (!empty(Session::get('locale') == 'ar'))
                {{ $doctor->information->job_title_ar ? $doctor->information->job_title_ar : '-' }}
                @else
                {{ $doctor->information->job_title ? $doctor->information->job_title : '-' }}
                @endif
            </span>
            <p class="we">

                @if($doctor->specialities->count() > 0)
            <p style="font-size:12px">
                <img src="{{ asset('images/icons/i1.png') }}" style="width: 20px">
                @lang('site.Specialities_in'):
                @foreach ($doctor->specialities as $keys => $item)
                {{ $item->name }},
                @endforeach
            </p>
            @endif
            </p>
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-6 col-xl-12 ">
                        <ul class="social-media">
                            {{-- <i class="we text-warning fa-solid fa-star"></i> --}}
                            @php(list($count,$rate) = avgRating($doctor->id))
                            @for($i=1;$i<=5;$i++) @php($fill=$i <=maxRating($doctor->id) ? 'text-warning' : '' ) <i
                                    class="fa fa-star  {{$fill}} "></i>
                                @endfor
                        </ul>
                    </div>

                    <div class="col-12 col-lg-6 col-xl-12 p-3 p-lg-0 ">
                        <div class="fz16 text-blue name" style="font-size:14px">
                            {{$rate}} @lang('site.Visitor_Reviews')
                        </div>
                    </div>



                </div>
            </div>

            <p class="we h4 p-0 p-lg-1 m-auto d-block ">

                @lang('site.Fees_price') {{$price ?? 0}}
                @php($car = $curr ? 'cur_'.$curr : 'cur_EGP')
                @lang('site.'.$car)

            </p>
            <div class="d-lg-flex justify-content-around we ">

                <p class="we h5 col-12  col-lg-6">
                    @if(!session('is_telehealth'))
                    @lang('site.address_doctor')
                    @foreach (getClinicDoctor($doctor->id,$doctors) as $clinic)
                    @if($loop->last)
                    {{$clinic}}
                    @else
                    {{$clinic}} -
                    @endif
                    @endforeach
                    @endif
                </p>
                <p class="we h5 col-12  col-lg-5">
                    @if(!session('is_telehealth'))
                    @lang('site.Waiting_Time')
                    {{$doctor->waiting_time ?? ''}}
                    @lang('site.Minute')
                    @endif
                </p>
            </div>
            <div class="d-flex justify-content-start">

                <a href="{{route('Second_doctor_profile',[$doctor->id,$slug_name])}}"
                    class="add-to-cart btn btn-primary p-2 w-25 purple">

                    {{ trans('second_booking_doctor.book_now') }}
                </a>
                <button class="add-to-cart btn btn btn-secondary p-2 w-75" readonly>
                    @php(list($time,$dday) = getDocApp($doctor))
                    @if($time)
                    @lang('site.available_on') @lang('site.'.strtolower($dday)) @lang('site.from') {{$time}}
                    @else
                    @lang('site.not_available')
                    @endif
                </button>
            </div>
        </div>
    </div>
</div>
