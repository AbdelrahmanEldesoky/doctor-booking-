<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\Appointment;
use App\Models\Hospital;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Speciality;
use Illuminate\Support\Facades\Auth;

class HospitalController extends Controller
{
    public function search(Request $request)
    {
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
        $hospitals = User::with('information')->where('role','hospital')
        ->when($request->country_id, function ($query) use ($request){
            $query->whereHas('information',function ($que) use ($request){
                $country = Country::where('id',$request->country_id)->first();
                $que->where('country',  $country->name);
            });
        })->when($request->city_id, function ($query) use ($request){
            $query->whereHas('information',function ($que) use ($request){
                $que->where('city',$request->city_id);
            });
        })->get();

        return view('frontend.hospitals',get_defined_vars());
    }

    public function appointment(Request $request)
    {
         $request->merge(['hospital_id' => $request->hospital_id,'patient_id'=>Auth::user()->id]);
         Appointment::create([
            'hospital_id' => $request->hospital_id,
            'patient_id' => Auth::user()->id,
            'from' =>  session('from_date'),
            'to' =>  session('to_date'),
         ]);

        return response()->json(['success' => 'This schedule is selected']);
    }
}
