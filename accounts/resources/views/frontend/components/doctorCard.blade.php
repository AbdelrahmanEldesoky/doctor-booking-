<div class="card-item card-item-list doctor_list_item_@" data-url="{{route('doctor.show',$doctor->id)}}">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12 doctor_card">
                <div class="card-img text-center" style="">
                    <a href="{{route('doctor.show',$doctor->id)}}" class="d-block">
                        <img src="{{$doctor->image}}" alt="hotel-img" style="">
                    </a>
                </div>
                <div class="mt-3 align-items-center text-center">
                    <div class="fz16 text-blue name"> {{$doctor->name}}</div>
                    <div class="fz16 text-blue name">
                        {{$doctor->specialities->count() > 0 ? $doctor->specialities[0]->name : '-'}}</div>
                </div>
                <div class="mt-3 align-items-center text-center">
                    <div class="fz16 text-blue name about_section">
                        {{substr($doctor->information ? $doctor->information->about : '-',0,260)}}
                    </div>
                </div>
                <div class="mt-3 align-items-center text-center">
                    <div class="fz16 text-blue name sessions">
                        <i class="fa fa-clock"></i>
                        {{$doctor->doctorAppointments ? $doctor->doctorAppointments->count() : '-'}} Appointments
                    </div>
                </div>
                <div class="mt-3 align-items-center text-center ">
                    <div class="btn-group w-100" role="group" aria-label="Basic example">
                        <!-- <button type="button" data-id="{{$doctor->id}}" class="btn btn-info text-white book_me_btn">Book Me</button> -->
                        <button type="button" class="btn btn-theme"><a class="text-white w-100" href="{{route('doctor.show',$doctor->id)}}">Profile</a></button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
