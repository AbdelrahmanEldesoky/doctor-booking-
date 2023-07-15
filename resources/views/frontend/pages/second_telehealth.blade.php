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
    .removStyle nav ul li{
        padding:  0 !important;
        margin: 0 !important;
    }

</style>


    <section id="hero" class="hero">
        <div class="container position-relative">
            <div class="row gy-5 aos-init aos-animate" data-aos="fade-in">
                <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center text-center text-lg-start">
                    <h2 class="text-center ">{{ trans('second_booking_doctor.home') }}</h2>
                    <p class="h2 text-center we"> {{ trans('second_booking_doctor.brief') }}</p>
                </div>
                <div class="col-lg-6 order-1 order-lg-2">
                    <img src="https://www9.0zz0.com/2023/05/05/00/223360813.png "
                        class="img-fluid aos-init aos-animate" alt="" data-aos="zoom-out" data-aos-delay="100">
                </div>
            </div>
        </div>

    </section>
@endsection
<!-- End Hero Section -->

<!--  About Us Section  -->
@section('about_us')
    <section id="about" class="about">
    <div class="container">


                <div class="text-centern ">

                    <form  action="{{route('doctor-search')}}" method="GET">
<div class="row">
                <li class="search col-6 m-auto p-2 col-lg-2 my-lg-0 my-2 col-sm-6 btn btn-outline-secondary active we h4">
                    @lang('site.Best_Match')
                    <input class="searchDoc" name="sort" type="hidden" value="">
                </li>

                    @foreach(getSortCols() as $key=>$sor)
                        <li class="  col-6 col-lg-2z col-sm-6 btn btn-outline-secondary we h4">
                            @lang('site.'.$sor)
                            <input class="searchDoc" name="sort" type="hidden" value="{{$key}}">
                        </li>
                    @endforeach

                </div>
                </form>

                </div>



<div class="product">
    <div id="cards-section">
        <div class="container">
            <div class="row appendDocs">
                {{-- itemsbox javascript
                itemsbox photoshop
                itemsbox illustrator --}}

                @foreach($addDoctors as $doctor)
                <div class="col-xs-4 col-sm-12 col-md-4 col-lg-6 col-xl-4 m-auto p-2   itemsbox illustrator">
                    @include('frontend.components.doctorCard2',['tyep' => 'add'])
                </div>
                @endforeach

                @if($doctors->count() > 0)
                @foreach($doctors->shuffle() as $doctor)
                    <div class="col-xs-4 col-sm-12 col-md-12 col-lg-6 col-xl-4 m-auto p-2   itemsbox illustrator">
                    @include('frontend.components.doctorCard2')
                    </div>
                @endforeach

                <div class="removStyle text-center">
                    {{ $doctors->appends($data)->links() }}
                </div>

                @else
                <div class="text-center">
                    <img src="{{ asset('images/panda.png') }}" class="panda-img" alt="">
                    <h3 class="alert alert-danger p-2 mt-4">@lang('site.no_record_founded')</h3>
                </div>
                <div class="text-center">
                    <h3 class="alert alert-warning p-2 mt-4">@lang('site.suggestion')</h3>
                </div>
                @foreach($suggestDoctors as $doctor)
                <div class="col-md-6 mt-2 fitered_doctors_list">
                    @include('frontend.components.doctorCard2')
                </div>
                @endforeach
                @endif

            </div>
        </div>
    </div>
</div>
    </section>
    <script>

        $(document).on('click','.search',function(){

            let sort  = $(this).children('input').val();
            let name  = `{{$request->name}}`;
            let speciality_id  = `{{$request->speciality_id}}`;
            let city_id  = `{{$request->city_id}}`;
            let area_id  = `{{$request->area_id}}`;
            let telehealth  = `{{$request->telehealth}}`;

            $.ajax({
            type: 'GET',
            data: {
                name:name,
                speciality_id:speciality_id,
                city_id:city_id,
                area_id:area_id,
                sort:sort,
                telehealth:telehealth
            },
            url: '{{route('doctor-search')}}',
            success: function (response) {
                 $('.appendDocs').html(response.html);
            }
        });
        //    $(this).closest('form').submit();
        })


    </script>
    <script src="{{ asset('new_assets/booking/js.js') }}"></script>
    @endsection
    <!-- End About Us Section -->




