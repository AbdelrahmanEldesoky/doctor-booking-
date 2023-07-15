@extends('layouts.app')
@section('title','Home')
@push('css')
<style>
    .heightapp {
        min-height: 0 !important;
    }

    .doc_img_box {
        position: relative;
        width: fit-content;
        margin: 0 auto;
    }

    .doc_img_box img {
        width: 120px;
        height: 120px;
        border-radius: 50%;
        -o-object-fit: cover;
        object-fit: cover;
        -o-object-position: top;
        object-position: top;
        border: 2px solid #3da8c0;
        padding: 2px;
        box-shadow: 0 0 6px #3da8c04d;
    }

    .doctor_spec {
        font-size: 12px;
        color: #666669;
        min-height: 36px;
    }

    .doc_about {
        color: #4d4d4f;
        font-size: 12px;
        min-height: 36px;
    }

    .doc_sess {
        color: #666669;
        font-size: 12px;
    }

    .mr-5p {
        margin-right: 5px;
    }
    .hide{
        display:none;
    }
    .schedule_time {
  cursor: pointer;
  padding: 10px 0 10px 0;
  border-bottom: 1px solid;
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

        <h2 class="site-heading text-center py-3">Our Doctors</h2>

        <div class="row">

            <!-- <div class="col-3 mt-2">
            @include('frontend.components.sideSearch')
            </div> -->
            <div class="col-12 mt-2 fitered_doctors_list">
                @if($doctors->count() > 0)
                <div class="row">
                    @foreach($doctors as $doctor)
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body text-center">
                                <div class="doc_img_box">
                                    <img src="{{asset($doctor->image)}}" height="120px" width="120px">
                                </div>
                                {{$doctor->name}}

                                <p class="doctor_spec">
                                    {{$doctor->specialities->count() > 0 ? $doctor->specialities[0]->name : '-'}}</p>
                                <p class="doc_about">{{$doctor->information->about}}</p>
                                <p class="doc_sess"><i class="fa fa-clock mr-5p"></i>{{count($doctor->docAppointments)}}
                                    Appointments</p>
                                <div class="btn-group w-100" role="group" aria-label="Basic example">
                                    <button type="button" class="btn btn-secondary bg-site-2">View Profile</button>
                                    <button type="button" data-id="{{$doctor->id}}"
                                        class="btn btn-info text-white book_me">Book Me</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- @include('frontend.components.doctorCard') -->
                    @endforeach

                </div>
                @else
                <div class="text-center">
                    <img src="{{ asset('images/panda.png') }}" class="panda-img" alt="">

                    <h3 class="alert alert-danger p-2 mt-4">@lang('site.no_record_founded')</h3>
                    <h6 class="alert alert-danger p-1">@lang('site.try_alternate_search')</h6>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

</div>
<div class="modal fade" id="bookingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width:900px">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Book Appointment</h5>
                <button type="button" class=" btn btn-danger" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body append_schedule">

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
<script></script>
<script>

</script>
<script>
    $(document).on('click', '.book_me', function () {
        let doctor_id = $(this).data('id');
        $.ajax({
            type: 'GET',
            data: {
                doctor_id: doctor_id
            },
            url: '{{route('append.schedules')}}',
            success: function (response) {
                $('.append_schedule').html(response.view);
            },
        });
        $('#bookingModal').modal('show');
    })

    
$(document).on('click','.schedule_time',function(){
    let day = $(this).data('day');

    customPickr = $('.flatpickr-custom');
            if (customPickr.length) {
                customPickr.flatpickr({
                    minDate: 'today',
                    "disable": [
                        function (date) {
                            return (date.getDay() != day );
                        }
                    ],
                });
            }
    $(this).closest('.book_box').addClass('hide');
    $(this).closest('.book_box').next('.book_box').removeClass('hide');
})
$(document).on('click','.back_interval',function(){
    $(this).closest('.book_box').addClass('hide');
    $(this).closest('.book_box').prev('.book_box').removeClass('hide');
})
</script>
@endpush
