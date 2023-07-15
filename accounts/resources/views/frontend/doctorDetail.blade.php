@extends('layouts.app')
@section('title','Home')
@push('css')
<style>
    .hide {
        display: none;
    }

</style>
@endpush
@section('content')
<div class="bg_home-slider"></div>
<div class="tabslid" style="min-height:100% !important">
    <div class="container text-center px-0">
        <div class="main-tabs bg-site" style="margin-top:20px">
            @include('frontend.components.searchForm')
        </div>
    </div>
</div>
<div class="w-bg pb-5 statistics ">

    <div class="container">
        <div class="row fitered_doctors_list " style="margin-top:20px">
            <div class="col-md-8">
                <div class="card-item card-item-list doctor_list_item" data-url="{{route('doctor.show',$doctor->id)}}">

                    <div class="card-body ">
                        <div class="row mt-4">
                            <div class="col-md-3">
                                <div class="card-img" style="height:150px;width:150px">
                                    <a href="javascript:;" class="d-block">
                                        <img src="{{$doctor->image}}" alt="hotel-img" style="width:100%">
                                    </a>
                                    <div class="add-to-wishlist icon-element" data-toggle="tooltip" data-placement="top"
                                        title="Bookmark">
                                        <i class="la la-heart-o"></i>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-9">
                                <p>
                                    <span class="price__from"> {{$doctor->name}}</span>
                                </p>
                                <div class="card-rating">


                                </div>
                                <div class="card-price d-flex align-items-center justify-content-between">
                                    <p>
                                        <span class="price__from" style="font-size:14px"> {{$doctor->email}}</span>
                                    </p>
                                </div>
                                <!-- <p style="margin:0px">Hospital:  <span style="font-size:13px;display:inline">{{$doctor->information ? $doctor->information->hospital : '-'}}</span></p> -->
                                <!-- <p style="margin:0px">Clinic: <span style="font-size:13px;display:inline">{{$doctor->information ? $doctor->information->clinic : '-'}}</span></p> -->

                                <p style="font-size: 13px;
font-weight: lighter;
margin-top: 14px;">
                                    {{$doctor->information ? $doctor->information->about : '-'}}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card ">
                    <div class="card-body">
                        <h4>
                            @lang('site.specialities')
                        </h4>
                        @foreach($doctor->specialities as $item)
                        {{$item->name}}
                        @endforeach
                    </div>
                </div>
                <!-- <div class="card mt-3">
                    <div class="card-body">
                        <h4>
                            About
                        </h4>
                        <table class="table table-borderless">

                            <tbody>
                                <tr>
                                    <th scope="row">Country</th>
                                    <td>{{$doctor->information ? $doctor->information->country : '-'}}</td>
                                    <th>City</th>
                                    <td>{{$doctor->information ? $doctor->information->city : '-'}}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Hospital</th>
                                    <td>{{$doctor->information ? $doctor->information->hospital : '-'}}</td>
                                    <td>Clinic</td>
                                    <td>{{$doctor->information ? $doctor->information->clinic : '-'}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div> -->
                <div class="card mt-3">
                    <div class="card-body">
                        <h4>
                            @lang('site.clinics_media')
                        </h4>
                        <div class="row">
                            @foreach($images as $item)
                            <div class="col-md-4">
                                <img src="{{asset($item->image)}}" style="width:100%">
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="filter_sidebar mt-0">
                    <div class="filter_header">
                        <div>
                            <i class="fa fa-book"></i>
                            @lang('site.choose_appointments')
                        </div>
                    </div>
                    <div class="filter_body " style="">
                        <div class="book_box">
                            <div class="" dir="ltr">
                              @include('frontend.components.schedules')                                  
                            </div>
                        </div>
                        <div class="book_box hide">
                            <div style="text-align:right"><button class="btn btn-danger back_interval"
                                    type="button">Back</button></div>
                            <div class="ml-1 w-300p">
                                <label>Select Specific Date For Appointment :</label>
                                <input type="text" id="fp-default" name="date"
                                    class="form-control appoint_date flatpickr-custom">
                            </div>
                            <div style="text-align:right"><button class="btn btn-site mt-2 book_appointment_btn"
                                    style="width:100px"> Book</button></div>
                        </div>
                    </div>
                </div>
            </div>
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
@endpush
