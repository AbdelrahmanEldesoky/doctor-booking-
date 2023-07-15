<div class="container my-5">
    <h2 class="pt-3 site-heading text-center">@lang('site.the_fields_of_appointment')</h2>
    <div class="row mt-5">

        @foreach($specialities as $item)
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4 text-center">
                <div class=" card-fields p-1">
                    <img src="{{asset($item->image)}}" alt="">
                    <hr>
                    <h4 class="site-heading-2">{{$item->name}}</h4>
                </div>
            </div>
        @endforeach


    </div>

</div>
