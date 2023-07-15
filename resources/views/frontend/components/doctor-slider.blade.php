<div class="pb-5 pt-3" dir="ltr">
    <h2 class="site-heading text-center mb-5">@lang('site.specialist_doctors')</h2>
    {{-- <h2 class="site-heading text-center mb-5">@lang('site.our_client_reviews')</h2> --}}
    <div class="container">

        <div class="slick-slider">
            @foreach($doctors as $doctor)
                    <div class="card card-fields p-0 text-center mx-3 p-2">
                        {{-- <div class="curved-background__curved">
                            <span class="m-0 px-1">Lorem ispansum dolor sit amet consectetur adipisicing elit. Necessitatibus, dolor.</span>
                            <div class="row px-1">
                                <div class="col-6">
                                    <em><small>Shahzad</small></em>
                                </div>

                                <div class="col-6">
                                    <small class="text-warning">
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                        <i class="fas fa-star"></i>
                                    </small>
                                </div>
                            </div>
                        </div> --}}

                        <img src="{{ doctorProfile($doctor->getRawOriginal('image'),null,$doctor->image) }}">
                        <h3 style="font-size: 15px;" class="mt-3">

                            @if (!empty(Session::get('locale') == 'ar'))
                                {{$doctor->name_ar}}
                            @else
                                {{$doctor->name}}
                            @endif
                        </h3>

                        <p>
                            @if(isset($doctor->information))

                                @if (!empty(Session::get('locale') == 'ar'))
                                {{ $doctor->information->job_title_ar }}
                                @else
                                {{ $doctor->information->job_title }}
                                @endif
                            @endif
                        </p>

                        <div class="card-rating text-center mb-3">
                            @for($i=1;$i<=5;$i++) <span><i class="fa fa-star fill text-warning"></i></span>
                            @endfor
                        </div>
                        @if($doctor->specialities->count() > 0)
                            <p>
                                @lang('site.Specialities_in'):
                                @foreach ($doctor->specialities as $item)
                                    {{ $item->name }},
                                @endforeach
                            </p>
                        @endif
                        <a href="{{route('doctor.show',$doctor->id)}}" class="btn btn-site">@lang('site.visit_now')</a>
                    </div>
            @endforeach
        </div>


    </div>

</div>
