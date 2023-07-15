<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\Speciality;
use Illuminate\Http\Request;

class SettingApiController extends Controller
{
    public function specialities()
    {
        $specialities = Speciality::get();
        return response()->json(['specialities' => $specialities]);
    }
    public function countries()
    {
        $countries = Country::get();
        return response()->json(['countries' => $countries]);
    }

    public function cities(Request $request)
    {
        $cities = City::where('country_id',$request->country_id)->get();
        return response()->json(['cities' => $cities]);
    }
}
