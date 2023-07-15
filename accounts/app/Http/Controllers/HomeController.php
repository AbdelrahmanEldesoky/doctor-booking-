<?php

namespace App\Http\Controllers;

use App\Models\Speciality;
use App\Models\Country;
use App\Models\City;
use App\Models\ContactMessage;
use App\Models\Area;
use App\Models\User;
use App\Models\Report;
use App\Models\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;


class HomeController extends Controller
{
    public function mySpace()
    {
        $user = Auth::user();
        if ($user->role == 'admin') {
            return redirect()->route('admin.dashboard');
        }
        if ($user->role == 'doctor') {
            return redirect()->route('doctor.dashboard');
        }
        if ($user->role == 'hospital') {
            return redirect()->route('hospital.dashboard');
        }
        if ($user->role == 'user') {
            return redirect()->route('user.dashboard');
        }
    }


    public function index()
    {

        $specialities = Speciality::get();

        $countries = Country::get();
        $cities = City::get();
        $doctors = User::with('specialities')->where('role','doctor')->get();
        // $doctor = User::with('specialities')->findOrFail(2);
        // dd($doctor->specialities[0]->id);
        return view('index',get_defined_vars());
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

    public function contactMessage(Request $request)
    {
        ContactMessage::create($request->all());
        return response()->json(['success' => 'Message sent successfully']);
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

     public function invoice($id)
     {
      
          $doc = User::findOrFail($id);
          $date = Carbon::now()->format('M Y');
          
          if(session('date'))
          {
              list($start,$end) = getRangeDate(session('date'));
              $date = Carbon::parse($start)->format('M Y');
          }
          
          $reports = Report::query()->where('doctor_id',$id)->when(session('date'),function($q) {
              list($start,$end) = getRangeDate(session('date'));
              $q->whereHas('appointment',function($qq) use($start,$end){
                     $qq->whereDate('from','>=',$start)->whereDate('from','<=',$end);
                     });
          })->get();
          
        //   $date = Carbon::now()->format('M Y');
        
          return view('frontend.invoice.index',get_defined_vars());
     }
     public function invoiceDownload($id)
     {
        set_time_limit(0);
          $doc = User::findOrFail($id);
          $date = Carbon::now()->format('M Y');
             if(session('date'))
          {
              list($start,$end) = getRangeDate(session('date'));
              $date = Carbon::parse($start)->format('M Y');
          }
            $reports = Report::query()->where('doctor_id',$id)->when(session('date'),function($q) {
              list($start,$end) = getRangeDate(session('date'));
              $q->whereHas('appointment',function($qq) use($start,$end){
                     $qq->whereDate('from','>=',$start)->whereDate('from','<=',$end);
                     });
          })->get();
          
        //   $pdf = PDF::loadView('frontend.invoice.index', get_defined_vars())->setPaper('a4')->setOptions(['defaultFont' => 'sans-serif', 'isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
          $pdf = PDF::loadView('frontend.invoice.index', get_defined_vars())->setPaper('a4');
          return $pdf->download('Invoice- .pdf');
     }

}
