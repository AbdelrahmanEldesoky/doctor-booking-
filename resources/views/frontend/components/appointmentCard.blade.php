<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body text-center">
                <div class="doc_img_box">
                    <img src="{{asset($doctor->image)}}" height="120px" width="120px">
                </div>
                @if (!empty(Session::get('locale') == 'ar'))
                    {{$doctor->name_ar}}
                    @else
                    {{$doctor->name}}
                    @endif

                <p class="doctor_spec">
                    {{$doctor->specialities->count() > 0 ? $doctor->specialities[0]->name : '-'}}</p>
                <p class="doc_about" style="font-size:12px">{{$doctor->information->about}}</p>
                <p class="doc_sess"><i class="fa fa-clock mr-5p"></i>{{count($doctor->doctorAppointments)}}
                    Appointments</p>
            </div>
        </div>
    </div>
    <div class="col-md-8 ">
        <div class="book_box">
            @include('frontend.components.schedules')
        </div>
        <div class="book_box hide">
            <div style="text-align:right"><button class="btn btn-danger back_interval" type="button">Back</button></div>
            <div class="ml-1 w-300p">
                <label>Select Specific Date For Appointment :</label>
                <input type="text" id="fp-default" name="date" class="form-control appoint_date flatpickr-custom">
            </div>
            <div style="text-align:right"><button class="btn btn-site mt-2 book_appointment_btn" style="width:100px"> Book</button></div>
        </div>
    </div>
    
</div>
<style>
    .flatpickr-calendar {
        z-index: 99999999999999999999 !important;
    }

</style>
