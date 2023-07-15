<?php

namespace App\Http\Controllers\Auth;

use App\Models\City;
use App\Models\User;
use App\Models\Schedule;
use App\Models\Speciality;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Models\UserInformation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\Auth\LoginRequest;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
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
        Auth::guard('web')->logout();
        // return view('auth.login');
        return view('frontend.pages.second_login', get_defined_vars());

    }
    
    /**
     * Handle an incoming authentication request.
     *
     * @param \App\Http\Requests\Auth\LoginRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();
        $user = Auth::user();

        if(Session::get('prevurl'))
        {
            $url = Session::get('prevurl');
            Session::forget('prevurl');
            return redirect()->to($url);
        }
        if ($user->role == 'user') {
            return redirect()->route('home');
        }
        return redirect()->route('Second_login');
    }

    /**
     * Destroy an authenticated session.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {

        Auth::guard('web')->logout();

        $request->session()->invalidate();
        
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
    public function AddMobile(){
        // return view('auth.mobile');
        return view('frontend.pages.user_mobile');
    }
    public function mobleLogin(Request $request){
        // dd($request->all());
       // dd(Session::get('appointmentData')['schedule_id']);
     
        $randomNumber = random_int(100000, 999999);
        $email = $request->email ?? 'book'.$randomNumber.'@gmail.com';
       
        $data=[
            'name'=>$request->name,
            'email'=>$email,
            'role'=>'user',
            'password' => Hash::make($request->password),
        ];
        $user=User::updateOrCreate(['email' => $request->email],$data);
        Auth::login($user);
        $info=[
            'user_id'=>$user->id,
             'phone'=>$request->phone,
        ];
        UserInformation::updateOrCreate(['user_id' => $user->id],$info);
        Session::put('phone','true');
        // $url = Session::get('prevurl');
        //     Session::forget('prevurl');
        //     return redirect()->to($url);

            $schedule = Schedule::findOrFail(Session::get('appointmentData')['schedule_id']); 
          
            
            if($schedule)
            {
              if($request->type == 'interval'){
                $appointment =   Appointment::where('status','!=','canceled')->where('schedule_id',Session::get('appointmentData')['schedule_id'])->whereDate('from',Session::get('appointmentData')['date'])->first();
                if($appointment)
                {
                  return response()->json(['error' => __('site.app_already_booked')]);
                }
              }
              $request->merge(['from' => Session::get('appointmentData')['date']]);
              Session::put('from_date',Session::get('appointmentData')['date']);
              $doctor = $schedule->user;
             $amount = $schedule->user->ofline_price ?? 0;
             $request->merge(['schedule_id' => $schedule->id,'clinic_id' => $schedule->clinic_id,'amount' => $amount,'doctor_id' => $schedule->user_id,'patient_id'=>Auth::user()->id,'type' => $schedule->schedule_type]);
             if($schedule->schedule_type == 'ofline')
             {
               if(Session::get('phone')=='true'){
                
                Session::put('doctor_id',$schedule->user_id);
                $app = Appointment::create($request->all());
    
                sendDoctorEmail($app);
                sendPatientEmail($app);
                smsToUser($app->doctor,$app,'ofline', 'doctor');
                smsToUser($app->patient,$app,'ofline');
                Session::forget('phone');
                Auth::guard('web')->logout();
    
            $request->session()->invalidate();
            
            $request->session()->regenerateToken();
            $url = Session::get('prevurl');
            Session::forget('prevurl');
            return redirect('/')->with(['message'=> __('site.schedule_is_selected')]);
                return response()->with(['success' => __('site.schedule_is_selected')]);
               }
                
             }
    
             $view = view('frontend.components.appendAppointmentBox',get_defined_vars())->render();
             return response()->json(['view' => $view,'success' => __('site.checkout_your_payment'),'open' => true]);
            }
            return response()->json(['error' => 'This schedule is not exist']);

    }
    
}
