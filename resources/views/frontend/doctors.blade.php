@extends('layouts.app')
@section('title',' المتخصصين')
@push('css')
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
<style>
    .hide {
        display: none;
    }

    .heightapp {
        min-height: 0 !important;
    }

    .mainCon {
        background-color: #E2E6EA !important;
    }

    .card-img img {
        width: 70px;
        height: 70px;
        border-radius: 50%;
        object-fit: cover;
        object-position: top;
        border: 2px solid #3da8c0;
        padding: 2px;
        box-shadow: 0 0 6px #3da8c04d;
    }

    .doctor_card .about_section {
        color: #4d4d4f;
        font-size: 12px;
        min-height: 36px;
    }

    .doctor_card .sessions {
        color: #666669;
        font-size: 12px;
    }

    .doctor_card_box {
        border-radius: 0px;
        padding: 0px;
        width: 100%;
        max-width: unset;
        background: rgb(245, 245, 245);
    }
</style>
@endpush
@section('content')
<div class="bg_home-slider bg-bg"></div>
<div class="tabslid pages-banner">
    <div class="container text-center px-0 pt-5">
        <div class="main-tabs bg-site">
            @include('frontend.components.searchForm')
        </div>
    </div>
</div>
<div class="w-bg pb-5 statistics mainCon">
    <div class="">
        <h2 class="site-heading text-center py-3">@lang('site.our_doctors_detail')</h2>
        <div class="row">
            <form action="{{route('doctor.search')}}" method="GET">
                <select class="form-control form-select set_sort" name="sort" style="max-width:300px">
                    <option>@lang('site.Best_Match')</option>
                    @foreach(getSortCols() as $key=>$sor)
                    <option value="{{$key}}">@lang('site.'.$sor)</option>
                    @endforeach
                </select>
            </form>
        </div>
        <div class="row appendDocs">

            <!-- <div class="col-3 mt-2">
            @include('frontend.components.sideSearch')
            </div> -->
            @foreach($addDoctors as $doctor)
            <div class="col-md-4 mt-2 fitered_doctors_list">
                @include('frontend.components.doctorCard',['tyep' => 'add'])
            </div>
            @endforeach
            @if($doctors->count() > 0)
            @foreach($doctors->shuffle() as $doctor)
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
            <div class="text-center">
                <h3 class="alert alert-warning p-2 mt-4">@lang('site.suggestion')</h3>
            </div>
            @foreach($suggestDoctors as $doctor)
            <div class="col-md-4 mt-2 fitered_doctors_list">
                @include('frontend.components.doctorCard')
            </div>
            @endforeach
            @endif
        </div>
    </div>
</div>

</div>

<!-- Modal -->
<div class="modal fade" id="appointmentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width:900px">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Book Appointment</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body append_body">

            </div>
        </div>
    </div>
</div>
@endsection
@push('js')
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<script>
    $(document).on('change','.set_sort',function(){

        let sort  = $(this).val();
        let name  = `{{$request->name}}`;
        let speciality_id  = `{{$request->speciality_id}}`;
        let city_id  = `{{$request->city_id}}`;
        let area_id  = `{{$request->area_id}}`;
        let telehealth  = `{{$request->telehealth}}`;

        $.ajax({
        type: 'GET',
        data: {name:name,speciality_id:speciality_id,city_id:city_id,area_id:area_id,sort:sort,telehealth:telehealth},
        url: '{{route('doctor.search')}}',
        success: function (response) {
             $('.appendDocs').html(response.html);
        }
    });
    //    $(this).closest('form').submit();
    })
</script>
@endpush
