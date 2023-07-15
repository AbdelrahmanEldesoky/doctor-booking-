<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Speciality;
use App\Models\Country;
use App\Models\City;
use App\Models\UserInformation;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Jobs\RegisterEmailJob;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create(Request $request)
    {
        $cities  = City::get();
        $type = $request->type;
        $specialities = Speciality::get();
        $route =  route('register');
        if($type == 'doctor')
        {
           $route =  route('doctor.register');
        }
        return view('auth.register', get_defined_vars());
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {


        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'numeric'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required'],
            'confirm_password' => ['required', 'same:password'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role ?? 'user',
        ]);

        $request->merge(['user_id'=>$user->id]);
        UserInformation::create($request->all());

        // $details =[
        //     'name' => $request->name,
        //     'role' => $request->role,
        //     'email' => $request->email,
        // ];

        // dispatch(new RegisterEmailJob($details));

        Auth::login($user);
        return redirect()->route('user.dashboard')->with('register successfully');
    }
}
