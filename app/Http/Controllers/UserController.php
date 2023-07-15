<?php

namespace App\Http\Controllers;

use App\Http\Requests\DoctorRegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\PasswordRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use App\Models\UserInformation;
use App\Models\UserSpeciality;
use App\Models\Appointment;
use App\Models\Country;
use Illuminate\Http\Request;
use App\Jobs\RegisterEmailJob;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Registration
     * @param RegisterRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(RegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role ?? 'user',
        ]);
        $request->merge(['user_id'=>$user->id]);
        UserInformation::create($request->all());
        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json(['token' => $token,'user' => $user,'information' => $user->information], 200);
    }

    /**
     * Registration
     * @param DoctorRegisterRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function doctorRegister(DoctorRegisterRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->email),
            'role' => 'doctor',
        ]);


        $request->merge(['user_id' => $user->id]);
        if ($request->hasFile('file')) {
            $image = media($request->file, 'users/');
            $request->merge(['image' => $image]);

            $user->image = $image;
            $user->save();
        }
        // $country = Country::findOrFail($request->country_id);
        // $request->merge(['country' => $country->name]);
        UserInformation::create($request->all());

        $details =[
            'name' => $request->name,
            'role' => $request->role,
            'email' => $request->email,
        ];

        dispatch(new RegisterEmailJob($details));

        foreach ($request->speciality_id as $item) {
            UserSpeciality::create([
                'user_id' => $user->id,
                'speciality_id' => $item,
            ]);
        }

        return redirect('/wait');
    }

    /**
     * Login
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(LoginRequest $request)
    {
        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (auth()->attempt($data)) {
            // $token = auth()->user()->createToken('auth_token')->accessToken;
            $token = auth()->user()->createToken('auth_token')->plainTextToken;
            return response()->json(['token' => $token,'user' => auth()->user(),'information' => auth()->user()->information], 200);
        } else {
            return response()->json(['error' => 'Unauthorised'], 401);
        }
    }

    public function myAppointments($id)
    {
        $appointments = Appointment::with(['doctor','patient','schedule'])->where('patient_id',$id)->get();

        return response()->json(['appointments' => $appointments,'status' => 200]);
    }

    public function profile(ProfileRequest $request)
    {

        User::findOrFail($request->user_id)->update($request->all());
        if ($request->hasFile('file')) {
            $image = media($request->file, 'users/');
            $request->merge(['image' => $image]);
        }

        UserInformation::updateOrCreate(['user_id'=>$request->user_id],$request->all());

        return response()->json(['status' => 200]);
    }

    public function getProfile($id)
    {
        $user = User::with('information')->findOrFail($id);


        return response()->json(['user' => $user,'status' => 200]);
    }

    public function password(PasswordRequest $request)
    {
        $user = User::findOrFail($request->user_id);
        if (Hash::check($request->password, $user->password)) {
            $user->fill([
             'password' => Hash::make($request->new_password)
             ])->save();

             return response()->json(['status' => 200]);
         } else {
            return response()->json(['status' => 403]);
         }

    }

    public function logout()
    {
         auth()->user()->tokens()->delete();
        return response()->json(['status' => 200]);
    }
}
