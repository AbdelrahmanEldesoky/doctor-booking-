            @foreach($addDoctors as $doctor)
            <div class="col-md-4 mt-2 fitered_doctors_list">
                @include('frontend.components.doctorCard',['tyep' => 'add'])
            </div>
            @endforeach
            @if($doctors->count() > 0)
            @foreach($doctors as $doctor)
            <div class="col-md-4 mt-2 fitered_doctors_list">
                @include('frontend.components.doctorCard')
            </div>
            @endforeach
            <div class="text-center">
                    {{ $doctors->appends($data)->links() }}
                </div>
            @else
            <div class="text-center">
                <img src="{{ asset('images/panda.png') }}" class="panda-img" alt="">
                <h3 class="alert alert-danger p-2 mt-4">@lang('site.no_record_founded')</h3>
            </div>
            @endif