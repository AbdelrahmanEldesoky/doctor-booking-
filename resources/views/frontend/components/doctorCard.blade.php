@php($tyep = $tyep ?? null)
@php($slug_name = setSlug($doctor->name))
<div class="card-item card-item-list doctor_card_box doctor_list_item_@ position-relative rounded-0"
    data-url="{{route('doctor.show',[$doctor->id,$slug_name])}}">
    @if($tyep)
    <div style=""><span class="badge badge-warning fill"
        style="background:#ffc107;color:white;width:fit-content">@lang('site.ad')</span></div>
    @endif
    @php(list($price,$curr) = getSessonPrice($doctor,session('is_telehealth'),'currency'))
    <div class="card-body p-0">
        <div class="row p-1">
            <div class="col-md-4 col-4 doctor_card pt-3">
                <div class="card-img text-center append-card-img" style="">
                    <a href="{{route('doctor.show',[$doctor->id,$slug_name])}}" class="d-block">
                        <img src="{{ doctorProfile($doctor->getRawOriginal('image'),null,$doctor->image) }}" alt="" style="">
                    </a>
                </div>
            </div>
            <div class="col-md-8 col-8 doctor_card pt-2">
                <div class="fz16 text-info name" style="font-size:18px">
                    @if (!empty(Session::get('locale') == 'ar'))
                    {{$doctor->name_ar}}
                    @else
                    {{$doctor->name}}
                    @endif
                </div>
                <div class="fz16 text-blue name" style="font-size:14px">
                    @if (!empty(Session::get('locale') == 'ar'))
                    {{ $doctor->information->job_title_ar ? $doctor->information->job_title_ar : '-' }}
                    @else
                    {{ $doctor->information->job_title ? $doctor->information->job_title : '-' }}
                    @endif
                </div>
                <div class="fz16 text-blue name" style="font-size:14px">
                    <div class="card-rating mb-1 mt-1">
                        @php(list($count,$rate) = avgRating($doctor->id))
                        @for($i=1;$i<=5;$i++) @php($fill=$i <=maxRating($doctor->id) ? 'text-warning' : '' ) <i
                            class="fa fa-star  {{$fill}} "></i>
                            @endfor
                    </div>
                </div>
                <div class="fz16 text-blue name" style="font-size:14px">
                    {{$rate}} @lang('site.Visitor_Reviews')
                </div>
            </div>
        </div>
        <div class=" bg-white mt-1">
            <div class="pt-2 doctor_card">

                <div class="">
                    <ul style="font-size:12px">
                        <li>

                            @if($doctor->specialities->count() > 0)
                            <p style="font-size:12px">
                                <img src="{{ asset('images/icons/i1.png') }}" style="width: 20px">
                                @lang('site.Specialities_in'):
                                @foreach ($doctor->specialities as $keys => $item)
                                {{ $item->name }},
                                @endforeach
                            </p>
                            @endif
                        </li>
                        @if(!session('is_telehealth'))
                        <li>
                            <img src="{{ asset('images/icons/i2.png') }}" style="width: 18px">
                            {{getDocArea($doctor->id,$doctors)}}
                        </li>
                        @endif
                        <li class="mt-3">
                            <img src="{{ asset('images/icons/i3.png') }}" style="width: 22px">
                            @lang('site.Fees') {{$price ?? 0}}
                            @php($car = $curr ? 'cur_'.$curr : 'cur_EGP')
                            @lang('site.'.$car)
                        </li>
                        @if(!session('is_telehealth'))
                        <li class="mt-3" style="color: #7CBB69">
                            <img src="{{ asset('images/icons/i4.png') }}" style="width: 22px">
                            @lang('site.Waiting_Time')
                            {{$doctor->waiting_time ?? ''}}
                            @lang('site.Minute')
                        </li>
                        @endif
                        {{-- <li>
                            CS Number: {{$doctor->cs_number ?? '-'}}
                        </li> --}}
                    </ul>
                </div>

{{--  --}}
                <div class="mt-3 align-items-center text-center ">
                    <div class="btn-group p-2 w-100 ">
                        <button class="btn" style="background-color: #F5F5F5;font-size:12px">
                        @php(list($time,$dday) = getDocApp($doctor))
                        @if($time)
                        @lang('site.available_on') @lang('site.'.strtolower($dday)) @lang('site.from') {{$time}}
                        @else
                        @lang('site.not_available')
                        @endif
                       </button>
                        <button type="button" class="btn btn-theme">
                            <a class="text-white w-100" style="text-decoration:  none"
                                href="{{route('doctor.show',[$doctor->id,$slug_name])}}">@lang('site.booknow')</a>
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
