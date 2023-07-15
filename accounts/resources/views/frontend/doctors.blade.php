@extends('layouts.app')
@section('title','Home')
@push('css')
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<style>
    .hide {
        display: none;
    }

    .heightapp {
        min-height: 0 !important;
    }

    .card-img img {
        width: 120px;
        height: 120px;
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
<div class="w-bg pb-5 statistics">

    <div class="container">

        <h2 class="site-heading text-center py-3">@lang('site.our_doctors_detail')</h2>

        <div class="row">

            <!-- <div class="col-3 mt-2">
            @include('frontend.components.sideSearch')
            </div> -->
            @if($doctors->count() > 0)
            @foreach($doctors as $doctor)
            <div class="col-md-4 mt-2 fitered_doctors_list">
                @include('frontend.components.doctorCard')
            </div>

            @endforeach
            @else
            <div class="text-center">
                <img src="{{ asset('images/panda.png') }}" class="panda-img" alt="">
                <h3 class="alert alert-danger p-2 mt-4">@lang('site.no_record_founded')</h3>
            </div>
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
<link rel="stylesheet" type="text/css"
    href="{{asset('assets/admin/app-assets/vendors/css/pickers/pickadate/pickadate.css')}}">
<link rel="stylesheet" type="text/css"
    href="{{asset('assets/admin/app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css')}}">
<link rel="stylesheet" type="text/css"
    href="{{asset('assets/admin/app-assets/css/plugins/forms/pickers/form-flat-pickr.css')}}">
<link rel="stylesheet" type="text/css"
    href="{{asset('assets/admin/app-assets/css/plugins/forms/pickers/form-pickadate.css')}}">
<script src="{{asset('assets/admin/app-assets/vendors/js/pickers/pickadate/picker.js')}}"></script>
<script src="{{asset('assets/admin/app-assets/vendors/js/pickers/pickadate/picker.date.js')}}"></script>
<script src="{{asset('assets/admin/app-assets/vendors/js/pickers/pickadate/picker.time.js')}}"></script>
<script src="{{asset('assets/admin/app-assets/vendors/js/pickers/pickadate/legacy.js')}}"></script>
<script src="{{asset('assets/admin/app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js')}}"></script>
<script src="{{asset('assets/admin/app-assets/js/scripts/forms/pickers/form-pickers.js')}}"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

@endpush
