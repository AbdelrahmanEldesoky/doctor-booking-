<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\Appointment;
use App\Models\Hospital;
use App\Models\User;
use App\Models\Area;
use Carbon\Carbon;
use App\Models\HospitalImage;
use App\Models\HospitalRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Speciality;
use Illuminate\Support\Facades\Auth;

class HospitalController extends Controller
{
    public function search(Request $request)
    {
        $selectedAreas = [];
        Session::put('tab','hospital');
        if($request->from)
        {
            Session::put('from_date',$request->from);
        }
        if($request->to)
        {
            Session::put('to_date',$request->to);
        }
        $specialities = Speciality::get();
        $countries = Country::get();
        $cities = City::get();
        $hospitals = User::with('information')->where('role','hospital')->where('is_show',1)
        ->when($request->country_id, function ($query) use ($request){
            $query->whereHas('information',function ($que) use ($request){
                $country = Country::where('id',$request->country_id)->first();
                $que->where('country',  $country->name);
            });
        })->when($request->city_id, function ($query) use ($request){
            $query->whereHas('information',function ($que) use ($request){
                $que->where('city',$request->city_id);
            });
        })->when($request->min_price, function ($query) use ($request){
                $query->where('my_price', '>=',$request->min_price);
        })->when($request->max_price, function ($query) use ($request){
            $query->where('my_price', '<=',$request->max_price);
        })->when($request->name, function ($query) use ($request){
            $query->where(function($q) use($request){
                $q->orWhere('name', 'LIKE', '%' . $request->name . '%')
                ->orWhere('name_ar', 'LIKE', '%' . $request->name . '%');
              });
            // $query->where('name', 'LIKE', '%' . $request->name . '%');
        })->get();

        if($request->city_id)
        {
            $selectedAreas = Area::where('city_id',$request->city_id)->get();
        }

        return view('frontend.hospitals',get_defined_vars());
    }

    public function appointment(Request $request)
    {
        $diff = Carbon::parse(session('to_date'))->diffInDays(Carbon::parse(session('from_date')));
        $room = HospitalRoom::where('id',$request->room_id)->first();
        $amount = $room->price * $diff;

        $location = getLocation();
        $location = strtolower($location)  == 'egypt' ? 'egyption' : 'outsider';

         Appointment::create([
            'hospital_id' => $request->hospital_id,
            'patient_id' => Auth::user()->id,
            'amount' => $amount,
            'type' => 'online',
            'user_type' => $location,
            'room_id' => $room->id,
            'from' =>  $request->froom_date,
            'to' =>  $request->too_date,
         ]);

        return response()->json(['success' => 'This schedule is selected']);
    }

    public function show($id)
    {
        $selectedAreas = [];
        $specialities = Speciality::get();
        $countries = Country::get();
        $cities = City::get();
        $images = HospitalImage::where('hospital_id',$id)->get();
        $rooms = HospitalRoom::where('hospital_id',$id)->get();
        $hospital = User::where('id',$id)->first();
        $schedules = [];

        return view('frontend.hospitalDetail',get_defined_vars());
    }
}
