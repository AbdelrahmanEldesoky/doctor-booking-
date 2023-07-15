<div class="py-5" dir="ltr">
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

                        <img src="{{ asset($doctor->image) }}">
                        <h3 style="font-size: 15px;" class="mt-3">{{$doctor->name}}</h3>
                        <p>{{$doctor->specialities->count() > 0 ? $doctor->specialities[0]->name : '-'}}</p>
                        <a href="{{route('doctor.show',$doctor->id)}}" class="btn btn-site">@lang('site.visit_now')</a>
                    </div>
            @endforeach
        </div>


    </div>

</div>
