@php($tyep = $tyep ?? null)
<div class="card-item card-item-list doctor_list_item_@" data-url="{{route('doctor.show',$doctor->id)}}">
@if($tyep)
<div style=""><span class="badge badge-warning fill" style="background:#ffc107;color:white;width:fit-content">@lang('site.ad')</span></div>
 @endif   
<div class="card-body">
        <div class="row">
            <div class="col-md-12 doctor_card">
                <div class="card-img text-center append-card-img" style="">
                    <a href="{{route('doctor.show',$doctor->id)}}" class="d-block">
                        <img src="{{ doctorProfile($doctor->getRawOriginal('image')) }}" alt="" style="">
                    </a>
                </div>
                <div class="mt-3 align-items-center text-center">
                    <div class="fz16 text-blue name" style="font-size:20px">
                        @if (!empty(Session::get('locale') == 'ar'))
                                {{$doctor->name_ar}}
                            @else
                                {{$doctor->name}}
                            @endif
                    </div>
                    <div class="fz16 text-blue name" style="font-size:14px">
                        {{-- {{$doctor->specialities->count() > 0 ? $doctor->specialities[0]->name : '-'}} --}}
                        @if (!empty(Session::get('locale') == 'ar'))
                            {{ $doctor->information->job_title_ar ? $doctor->information->job_title_ar : '-' }}
                        @else
                            {{ $doctor->information->job_title ? $doctor->information->job_title : '-' }}
                        @endif
                    </div>
                </div>

                <div class="card-rating text-center mb-3">
                    @for($i=1;$i<=5;$i++)
                        <i class="fa fa-star fill text-warning"></i>
                    @endfor
                </div>
                <div class="text-center">
                    @if($doctor->specialities->count() > 0)
                            <p style="font-size:12px">
                                @lang('site.Specialities_in'):
                                @foreach ($doctor->specialities as $keys => $item)
                                    {{ $item->name }},
                                @endforeach
                            </p>
                        @endif
                </div>
                {{-- <div class="mt-3 align-items-center text-center">
                    <div class="fz16 text-blue name about_section">
                        {{ $doctor->information->job_title ? $doctor->information->job_title : '-' }}
                    </div>
                </div> --}}
                {{-- <div class="mt-3 align-items-center text-center">
                    <div class="fz16 text-blue name sessions">
                        <i class="fa fa-clock"></i>
                        {{$doctor->doctorAppointments ? $doctor->doctorAppointments->count() : '-'}} @lang('site.Appointments')
                    </div>
                </div> --}}
                <div class="mt-3 align-items-center text-center ">
                    <div class="btn-group w-100" role="group" aria-label="Basic example">
                        <!-- <button type="button" data-id="{{$doctor->id}}" class="btn btn-info text-white book_me_btn">Book Me</button> -->
                        <button type="button" class="btn btn-theme"><a class="text-white w-100" href="{{route('doctor.show',$doctor->id)}}">@lang('site.Profile')</a></button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
