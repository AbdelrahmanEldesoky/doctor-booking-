<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\City;
use Illuminate\Support\Facades\Auth;
use App\Models\Speciality;
use App\Models\DoctorClinicImages;
use App\Models\Country;
use App\Models\User;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DoctorController extends Controller
{
    public function search(Request $request)
    {
        Session::forget('is_telehealth');
        $specialities = Speciality::get();
        $countries = Country::get();
        $cities = City::get();
        $doctors = User::with(['schedules', 'information','specialities'])->where('role', 'doctor')->where('status', '1')
            ->when($request->name, function ($query) use ($request) {
                $query->where('name', 'LIKE', '%' . $request->name . '%');
            })->when($request->country_id, function ($query) use ($request){
                $query->whereHas('information',function ($que) use ($request){
                    $country = Country::where('id',$request->country_id)->first();
                    $que->where('country',  $country->name);
                });
            })->when($request->city_id, function ($query) use ($request){
                $query->whereHas('information',function ($que) use ($request){
                    $que->where('city',$request->city_id);
                });
            })->when($request->area_id, function ($query) use ($request){
                $query->whereHas('areas',function ($que) use ($request){
                    $que->where('id',$request->area_id);
                });

            })->when($request->gender, function ($query) use ($request){
                $query->whereHas('information',function ($que) use ($request){
                    $que->where('gender',$request->gender);
                });
            })
            ->when($request->availability, function ($query) use ($request){
                $query->whereHas('schedules',function ($que) use ($request){
                    $que->where('schedule_type',$request->availability);
                });
            })
            ->when($request->entity && $request->entity == 'hospital', function ($query) use ($request){
                $query->whereHas('information',function ($que) use ($request){
                    $que->where('hospital','!=',null);
                });
            })->when($request->entity && $request->entity == 'clinic', function ($query) use ($request){
                $query->whereHas('information',function ($que) use ($request){
                    $que->where('clinic','!=',null);
                });
            })->when($request->speciality_id, function ($query) use ($request){
                $query->whereHas('specialities',function ($que) use ($request){
                    $que->where('speciality_id',$request->speciality_id);
                });
            })->when($request->telehealth, function ($query) use ($request){
                Session::put('is_telehealth',true);
                $query->whereHas('schedules',function ($que) use ($request){
                    $que->where('schedule_type','online');
                });
            })
            ->when(!$request->telehealth, function ($query) use ($request){
                $query->whereHas('schedules',function ($que) use ($request){
                    $que->where('schedule_type','ofline');
                });
            })->get();

        return view('frontend.doctors',get_defined_vars());
    }

    public function appendSchedules(Request $request)
    {
       $doctor =  User::findOrFail($request->doctor_id);
       $schedules = [];
       $schedules[$doctor->id] = $doctor->schedules->groupBy('date');

       $view = view('frontend.components.appointmentCard',get_defined_vars())->render();
       return response()->json(['view' => $view]);
    }
    public function isValidSlot($id)
    {
       $appoint = Appointment::where('schedule_id',$id)->first();
       if($appoint)
       {
        return response()->json(['status' => 403]);
       }
       return response()->json(['status' => 200]);
    }
    public function show($id)
    {
        $specialities = Speciality::get();
        $countries = Country::get();
        $cities = City::get();
        $images = DoctorClinicImages::where('doctor_id',$id)->get();
        $doctor = User::with(['schedules', 'information','specialities'])->where('id',$id)->first();
        $schedules = [];
        if(Session::get('is_telehealth'))
        {
            $schedules[$doctor->id] = $doctor->schedules->where('schedule_type','online')->groupBy('date');
        }
        else{
            $schedules[$doctor->id] = $doctor->schedules->where('schedule_type','ofline')->groupBy('date');
        }
        $doctors = User::get();
        return view('frontend.doctorDetail',get_defined_vars());
    }
    public function telehealth($id)
    {
        $doctors = User::with(['schedules', 'information','specialities'])->whereHas('specialities',function ($que) use ($id){
            $que->where('speciality_id',$id);
        })->whereHas('schedules',function($q){
           $q->where('schedule_type','ofline');
        })->get();

        return response()->json(['doctors' => $doctors,'status' => 200]);
    }

    public function appointment(Request $request)
    {
        if(!Auth::user())
        {
            Session::put('prevurl',$request->prevUrl);
            return response()->json(['error' => 'Please Login','url' => route('login')]);
        }
        $schedule = Schedule::findOrFail($request->schedule_id);

        if($schedule)
        {
          if($request->type == 'interval'){
            $appointment =   Appointment::where('schedule_id',$schedule->id)->whereDate('from',$request->date)->first();
            if($appointment)
            {
              return response()->json(['error' => __('site.app_already_booked')]);
            }
            $request->merge(['from' => $request->date]);
          }

          $doctor = $schedule->user;
          $amount = Auth::user()->residence == 'egyption' ? $schedule->session_price : $schedule->session_price_outside;
         $request->merge(['amount' => $amount,'doctor_id' => $schedule->user_id,'patient_id'=>Auth::user()->id,'type' => $schedule->schedule_type]);
         if($schedule->schedule_type == 'ofline')
         {
            Appointment::create($request->all());
            return response()->json(['success' => __('site.schedule_is_selected')]);
         }

         $view = view('frontend.components.appendAppointmentBox',get_defined_vars())->render();
         return response()->json(['view' => $view,'open' => true]);
        }
        return response()->json(['error' => 'This schedule is not exist']);


    }
}
