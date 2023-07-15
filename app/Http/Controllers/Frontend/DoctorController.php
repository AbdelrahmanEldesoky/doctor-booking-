<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\City;
use App\Models\Rating;
use App\Models\DoctorClinic;
use Illuminate\Support\Facades\Auth;
use App\Models\Speciality;
use App\Models\DoctorClinicImages;
use App\Models\Country;
use App\Models\User;
use App\Models\Area;
use App\Models\Schedule;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class DoctorController extends Controller
{
    public function search(Request $request)
    {
    
        $data = $request->all();
        Session::forget('is_telehealth');
        Session::forget('tab');
        Session::forget('is_area');
        $specialities = Speciality::get();
        $countries = Country::get();
        $cities = City::get();
        $selectedAreas = [];
        // if($request->area_id !=null){
        //     $data=DoctorClinic::select('doctor_id')->where('area',$request->area_id)->get();
        //     $doctors = User::with(['schedules', 'information','specialities'])->whereIn('id',$data)->where('is_show',1)->where('role', 'doctor')->where('status', '1')
        //     ->when($request->name, function ($query) use ($request) {
        //         $query->where(function($q) use($request){
        //           $q->orWhere('name', 'LIKE', '%' . $request->name . '%')
        //           ->orWhere('name_ar', 'LIKE', '%' . $request->name . '%');
        //         });
        //         // $query->where('name', 'LIKE', '%' . $request->name . '%');
        //     })->when($request->city_idff, function ($query) use ($request){
        //         $query->whereHas('information',function ($que) use ($request){
        //             $que->where('city',$request->city_id);
        //         });
            

        //     })->when($request->city_id, function ($query) use ($request){
        //         $query->whereHas('clinics',function ($que) use ($request){
        //               $que->where('city',$request->city_id);
        //         });

        //     })->when($request->gender, function ($query) use ($request){
        //         $query->whereHas('information',function ($que) use ($request){
        //             $que->where('gender',$request->gender);
        //         });
        //     })
        //     ->when($request->availability, function ($query) use ($request){
        //         $query->whereHas('schedules',function ($que) use ($request){
        //             $que->where('schedule_type',$request->availability)->where('status','available');
        //         });
        //     })
        //     ->when($request->entity && $request->entity == 'hospital', function ($query) use ($request){
        //         $query->whereHas('information',function ($que) use ($request){
        //             $que->where('hospital','!=',null);
        //         });
        //     })->when($request->entity && $request->entity == 'clinic', function ($query) use ($request){
        //         $query->whereHas('information',function ($que) use ($request){
        //             $que->where('clinic','!=',null);
        //         });
        //     })->when($request->speciality_id, function ($query) use ($request){
        //         $query->whereHas('specialities',function ($que) use ($request){
        //             $que->where('speciality_id',$request->speciality_id);
        //         });
        //     })->when($request->telehealth, function ($query) use ($request){
        //         Session::put('is_telehealth',true);
        //         Session::put('tab','telehealth');
        //         $query->whereHas('schedules',function ($que) use ($request){
        //             $que->where('schedule_type','online');
        //         });
        //     })
        //     ->when(!$request->telehealth, function ($query) use ($request){
        //         Session::put('tab','offline');
        //         $query->whereHas('schedules',function ($que) use ($request){
        //             $que->where('schedule_type','ofline');
        //         });
        //     })
        //     ->when($request->sort, function ($query) use ($request){
        //         $query ->when($request->sort == 'high' || $request->sort == 'low', function ($quee) use ($request){
        //             $order = $request->sort == 'high' ? 'asc' : 'desc';
        //             $quee->when($request->telehealth,function($q) use($request,$order){
        //                 $location = getLocation();
        //                 $col  = strtolower($location)  == 'egypt' ? 'online_price' : 'online_price_outside';
        //                 $q->orderBy($col,$order);
        //            });
        //            $quee->when(!$request->telehealth,function($q) use($request,$order){
        //                $q->orderBy('ofline_price',$order);
        //             });
        //         });
        //         $query ->when($request->sort == 'time', function ($query) use ($request){
        //             $query->when($request->telehealth,function($q) use($request){
        //                 $q->orderBy('waiting_time','asc');
        //            });
        //         });
        //         $query->when($request->sort == 'rate', function ($q) use ($request){
        //             $q->withCount(['doctorRatings as average_rating' => function($q) {
        //                 $q->select(DB::raw('coalesce(avg(rating),0)'));
        //             }])->orderByDesc('average_rating');
        //         });
        //     });
            
        // }
        $doctors = User::with(['schedules', 'information','specialities'])->where('is_show',1)->where('role', 'doctor')->where('status', '1')
            ->when($request->name, function ($query) use ($request) {
                $query->where(function($q) use($request){
                  $q->orWhere('name', 'LIKE', '%' . $request->name . '%')
                  ->orWhere('name_ar', 'LIKE', '%' . $request->name . '%');
                });
                // $query->where('name', 'LIKE', '%' . $request->name . '%');
            })->when($request->city_idff, function ($query) use ($request){
                $query->whereHas('information',function ($que) use ($request){
                    $que->where('city',$request->city_id);
                });
            })->when($request->area_id, function ($query) use ($request){
                Session::put('is_area',$request->area_id);
                $query->whereHas('clinics',function ($q) use ($request){
                   
                        $q->where('area',$request->area_id)->where('is_show',1);
                });

            })->when($request->city_id, function ($query) use ($request){
                $query->whereHas('clinics',function ($que) use ($request){
                      $que->where('city',$request->city_id);
                });

            })->when($request->gender, function ($query) use ($request){
                $query->whereHas('information',function ($que) use ($request){
                    $que->where('gender',$request->gender);
                });
            })
            ->when($request->availability, function ($query) use ($request){
                $query->whereHas('schedules',function ($que) use ($request){
                    $que->where('schedule_type',$request->availability)->where('status','available');
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
                Session::put('tab','telehealth');
                $query->whereHas('schedules',function ($que) use ($request){
                    $que->where('schedule_type','online');
                });
            })
            ->when(!$request->telehealth, function ($query) use ($request){
                Session::put('tab','offline');
                $query->whereHas('schedules',function ($que) use ($request){
                    $que->where('schedule_type','ofline');
                });
            })
            ->when($request->sort, function ($query) use ($request){
                $query ->when($request->sort == 'high' || $request->sort == 'low', function ($quee) use ($request){
                    $order = $request->sort == 'high' ? 'asc' : 'desc';
                    $quee->when($request->telehealth,function($q) use($request,$order){
                        $location = getLocation();
                        $col  = strtolower($location)  == 'egypt' ? 'online_price' : 'online_price_outside';
                        $q->orderBy($col,$order);
                   });
                   $quee->when(!$request->telehealth,function($q) use($request,$order){
                       $q->orderBy('ofline_price',$order);
                    });
                });
                $query ->when($request->sort == 'time', function ($query) use ($request){
                    $query->when($request->telehealth,function($q) use($request){
                        $q->orderBy('waiting_time','asc');
                   });
                });
                $query->when($request->sort == 'rate', function ($q) use ($request){
                    $q->withCount(['doctorRatings as average_rating' => function($q) {
                        $q->select(DB::raw('coalesce(avg(rating),0)'));
                    }])->orderByDesc('average_rating');
                });
            });

            $doctors = !$request->sort ? $doctors->inRandomOrder()->paginate(10) : $doctors->paginate(10);
           
            $suggestDoctors = $this->getRelatedDocs();
            $addDoctors = User::where('is_add',1)->where('is_show',1)->take(2)->get();  
            
            if($request->ajax())
            {
                
                $view = view('frontend.components.appendDoctors',get_defined_vars())->render();
                return response()->json(['html' => $view]); 
            }
           
        if($request->city_id)
        {
            $selectedAreas = Area::where('city_id',$request->city_id)->get();
        }
        $doctors->appends(['area_id' => $request->area_id,'name' => $request->name]);

        return view('frontend.doctors',get_defined_vars());
    }

    public function getRelatedDocs()
    {
        return  User::with(['schedules', 'information','specialities'])->where('role', 'doctor')->where('status', '1')->where('is_show',1)->take(10)->inRandomOrder()->paginate(10);
    }
    public function appendSchedules(Request $request)
    {
       $doctor =  User::findOrFail($request->doctor_id);
       $schedules = [];
       $schedules[$doctor->id] = $doctor->schedules->where('status','!=','un available')->groupBy('date');

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
    public function show($id,$slug = null)
    {
      $rating=Rating::where('user_id',$id)->max('rating');
      
      
        $selectedAreas = [];
        $typee = 'online';
        $specialities = Speciality::get();
        $countries = Country::get();
        $cities = City::get();
        $images = DoctorClinicImages::where('doctor_id',$id)->get();
        $doctor = User::with(['schedules', 'information','specialities'])->where('id',$id)->first();
        $schedules = [];
        

        if(Session::get('is_telehealth'))
        {
            $typee = 'online';
           $schedules[$doctor->id] = $doctor->schedules->where('status','!=','un available')->where('is_show',1)->where('schedule_type','online')->groupBy('date');
        }
        else{
            $typee = 'ofline';
            foreach($doctor->clinics as $cli)
            {
            $schedules[$cli->id] = $cli->schedules->where('status','!=','un available')->where('is_show',1)->where('schedule_type','ofline')->groupBy('date');
            }
        }
        $doctors = User::get();
        // dd( $schedules);
        return view('frontend.doctorDetail',get_defined_vars());
    }
    public function telehealth($id)
    {
        $doctors = User::with(['schedules', 'information','specialities'])->whereHas('specialities',function ($que) use ($id){
            $que->where('speciality_id',$id);
        })->whereHas('schedules',function($q){
           $q->where('schedule_type','ofline')->where('is_show',1);
        })->get();

        return response()->json(['doctors' => $doctors,'status' => 200]);
    }

    public function appointment(Request $request)
    {
        $schedule = Schedule::findOrFail($request->schedule_id); 
        if(!Auth::user())
        {
            if($schedule->schedule_type == 'ofline'){
                Session::put('prevurl',$request->prevUrl);
                Session::put('bookWithNumber','true');
                Session::put('appointmentData',$request->all());
                return response()->json(['error' => 'Please Enter Mobile Number','url' => route('mobile')]);
            }
            
            Session::put('prevurl',$request->prevUrl);
            return response()->json(['error' => 'Please Login','url' => route('login')]);
        }
        

        if($schedule)
        {
          if($request->type == 'interval'){
            $appointment =   Appointment::where('status','!=','canceled')->where('schedule_id',$schedule->id)->whereDate('from',$request->date)->first();
            if($appointment)
            {
              return response()->json(['error' => __('site.app_already_booked')]);
            }
          }
          $request->merge(['from' => $request->date]);
          Session::put('from_date',$request->date);
          $doctor = $schedule->user;
         $amount = $schedule->user->ofline_price ?? 0;
         $request->merge(['schedule_id' => $schedule->id,'clinic_id' => $schedule->clinic_id,'amount' => $amount,'doctor_id' => $schedule->user_id,'patient_id'=>Auth::user()->id,'type' => $schedule->schedule_type]);
         if($schedule->schedule_type == 'ofline')
         {
           if(Session::get('phone')=='true'){
            
            Session::put('doctor_id',$schedule->user_id);
            $app = Appointment::create($request->all());

            sendDoctorEmail($app);
            smsToUser($app->doctor,$app,'ofline', 'doctor');
            smsToUser($app->patient,$app,'ofline');
            Session::forget('phone');
            Auth::guard('web')->logout();

        $request->session()->invalidate();
        
        $request->session()->regenerateToken();
            return response()->json(['success' => __('site.schedule_is_selected')]);
           }else{
            Session::put('doctor_id',$schedule->user_id);
            $app = Appointment::create($request->all());

            sendDoctorEmail($app);
            sendPatientEmail($app);
            
            
            smsToUser($app->doctor,$app,'ofline', 'doctor');
            smsToUser($app->patient,$app,'ofline');

            return response()->json(['success' => __('site.schedule_is_selected')]);
           }
            
         }

         $view = view('frontend.components.appendAppointmentBox',get_defined_vars())->render();
         return response()->json(['view' => $view,'success' => __('site.checkout_your_payment'),'open' => true]);
        }
        return response()->json(['error' => 'This schedule is not exist']);


    }
}
