<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Speciality;
use App\Models\Country;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $specialities = Speciality::get();
        $countries = Country::get();
        $cities = City::get();
        $user = Auth::user();
        return view('user.index',get_defined_vars());
    }
}
