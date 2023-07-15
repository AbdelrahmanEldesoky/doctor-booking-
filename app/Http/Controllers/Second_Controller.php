<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\City;
use App\Models\User;
use App\Models\Rating;
use App\Models\Country;
use App\Models\Schedule;
use App\Models\Speciality;
use App\Models\Appointment;
use App\Models\DoctorClinic;
use App\Models\HospitalRoom;
use Illuminate\Http\Request;

use App\Models\HospitalImage;
use Illuminate\Support\Carbon;
use App\Models\UserInformation;
use Illuminate\Validation\Rule;
use App\Models\DoctorClinicImages;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\DataTables\User\AppointmentsDataTable;


class Second_Controller extends Controller
{
    public function index()
    {

        $selectedAreas = [];
        $specialities = Speciality::get();

        $countries = Country::get();
        $cities = City::get();
        $doctors = User::with('specialities')->where('role', 'doctor')->where('is_show', 1)->whereStatus('1')->get();

        return view('secand_index', get_defined_vars());
    }

    public function conditions()
    {
        return view('frontend.pages.second_terms');
    }

    public function doctors()
    {
        return view('frontend.pages.second_doctors');
    }

    public function privacy()
    {
        return view('frontend.pages.second_privacy');
    }


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
        $doctors = User::with(['schedules', 'information', 'specialities'])->where('is_show', 1)->where('role', 'doctor')->where('status', '1')
            ->when($request->name, function ($query) use ($request) {
                $query->where(function ($q) use ($request) {
                    $q->orWhere('name', 'LIKE', '%' . $request->name . '%')
                        ->orWhere('name_ar', 'LIKE', '%' . $request->name . '%');
                });
                // $query->where('name', 'LIKE', '%' . $request->name . '%');
            })->when($request->city_idff, function ($query) use ($request) {
                $query->whereHas('information', function ($que) use ($request) {
                    $que->where('city', $request->city_id);
                });
            })->when($request->area_id, function ($query) use ($request) {
                Session::put('is_area', $request->area_id);
                $query->whereHas('clinics', function ($q) use ($request) {

                    $q->where('area', $request->area_id)->where('is_show', 1);
                });
            })->when($request->city_id, function ($query) use ($request) {
                $query->whereHas('clinics', function ($que) use ($request) {
                    $que->where('city', $request->city_id);
                });
            })->when($request->gender, function ($query) use ($request) {
                $query->whereHas('information', function ($que) use ($request) {
                    $que->where('gender', $request->gender);
                });
            })
            ->when($request->availability, function ($query) use ($request) {
                $query->whereHas('schedules', function ($que) use ($request) {
                    $que->where('schedule_type', $request->availability)->where('status', 'available');
                });
            })
            ->when($request->entity && $request->entity == 'hospital', function ($query) use ($request) {
                $query->whereHas('information', function ($que) use ($request) {
                    $que->where('hospital', '!=', null);
                });
            })->when($request->entity && $request->entity == 'clinic', function ($query) use ($request) {
                $query->whereHas('information', function ($que) use ($request) {
                    $que->where('clinic', '!=', null);
                });
            })->when($request->speciality_id, function ($query) use ($request) {
                $query->whereHas('specialities', function ($que) use ($request) {
                    $que->where('speciality_id', $request->speciality_id);
                });
            })->when($request->telehealth, function ($query) use ($request) {
                Session::put('is_telehealth', true);
                Session::put('tab', 'telehealth');
                $query->whereHas('schedules', function ($que) use ($request) {
                    $que->where('schedule_type', 'online');
                });
            })
            ->when(!$request->telehealth, function ($query) use ($request) {
                Session::put('tab', 'offline');
                $query->whereHas('schedules', function ($que) use ($request) {
                    $que->where('schedule_type', 'ofline');
                });
            })
            ->when($request->sort, function ($query) use ($request) {
                $query->when($request->sort == 'high' || $request->sort == 'low', function ($quee) use ($request) {
                    $order = $request->sort == 'high' ? 'asc' : 'desc';
                    $quee->when($request->telehealth, function ($q) use ($request, $order) {
                        $location = getLocation();
                        $col  = strtolower($location)  == 'egypt' ? 'online_price' : 'online_price_outside';
                        $q->orderBy($col, $order);
                    });
                    $quee->when(!$request->telehealth, function ($q) use ($request, $order) {
                        $q->orderBy('ofline_price', $order);
                    });
                });
                $query->when($request->sort == 'time', function ($query) use ($request) {
                    $query->when($request->telehealth, function ($q) use ($request) {
                        $q->orderBy('waiting_time', 'asc');
                    });
                });
                $query->when($request->sort == 'rate', function ($q) use ($request) {
                    $q->withCount(['doctorRatings as average_rating' => function ($q) {
                        $q->select(DB::raw('coalesce(avg(rating),0)'));
                    }])->orderByDesc('average_rating');
                });
            });

        $doctors = !$request->sort ? $doctors->inRandomOrder()->paginate(10) : $doctors->paginate(10);

        $suggestDoctors = $this->getRelatedDocs();
        $addDoctors = User::where('is_add', 1)->where('is_show', 1)->take(2)->get();

        if ($request->ajax()) {

            $view = view('frontend.components.appendDoctors2', get_defined_vars())->render();
            return response()->json(['html' => $view]);
        }

        if ($request->city_id) {
            $selectedAreas = Area::where('city_id', $request->city_id)->get();
        }
        $doctors->appends(['area_id' => $request->area_id, 'name' => $request->name]);

        return view('frontend.pages.second_telehealth', get_defined_vars());
    }

    public function getRelatedDocs()
    {
        return  User::with(['schedules', 'information', 'specialities'])->where('role', 'doctor')->where('status', '1')->where('is_show', 1)->take(10)->inRandomOrder()->paginate(10);
    }

    public function  doctor_profile($id, $slug = null)
    {
        $rating = Rating::where('user_id', $id)->max('rating');


        $selectedAreas = [];
        $typee = 'online';
        $specialities = Speciality::get();
        $countries = Country::get();
        $cities = City::get();
        $images = DoctorClinicImages::where('doctor_id', $id)->get();
        $doctor = User::with(['schedules', 'information', 'specialities'])->where('id', $id)->first();
        $schedules = [];

        if (Session::get('is_telehealth')) {
            $typee = 'online';
            $schedules[$doctor->id] = $doctor->schedules->where('status', '!=', 'un available')->where('is_show', 1)->where('schedule_type', 'online')->groupBy('date');
        } else {
            $typee = 'ofline';
            foreach ($doctor->clinics as $cli) {
                $schedules[$cli->id] = $cli->schedules->where('status', '!=', 'un available')->where('is_show', 1)->where('schedule_type', 'ofline')->groupBy('date');
            }
        }
        $doctors = User::get();
        // dd( $schedules);
        // return view('frontend.doctorDetail',get_defined_vars());
        return view('frontend.pages.second_doctor_profile', get_defined_vars());
    }


    public function  online_sessions()

    {
        return view('frontend.pages.second_online_sessions');
    }

    public function  booking_hospital(Request $request)
    {
        $selectedAreas = [];
        Session::put('tab', 'hospital');
        if ($request->from) {
            Session::put('from_date', $request->from);
        }
        if ($request->to) {
            Session::put('to_date', $request->to);
        }
        $specialities = Speciality::get();
        $countries = Country::get();
        $cities = City::get();
        $hospitals = User::with('information')->where('role', 'hospital')->where('is_show', 1)
            ->when($request->country_id, function ($query) use ($request) {
                $query->whereHas('information', function ($que) use ($request) {
                    $country = Country::where('id', $request->country_id)->first();
                    $que->where('country',  $country->name);
                });
            })->when($request->city_id, function ($query) use ($request) {
                $query->whereHas('information', function ($que) use ($request) {
                    $que->where('city', $request->city_id);
                });
            })->when($request->min_price, function ($query) use ($request) {
                $query->where('my_price', '>=', $request->min_price);
            })->when($request->max_price, function ($query) use ($request) {
                $query->where('my_price', '<=', $request->max_price);
            })->when($request->name, function ($query) use ($request) {
                $query->where(function ($q) use ($request) {
                    $q->orWhere('name', 'LIKE', '%' . $request->name . '%')
                        ->orWhere('name_ar', 'LIKE', '%' . $request->name . '%');
                });
                // $query->where('name', 'LIKE', '%' . $request->name . '%');
            })->get();

        if ($request->city_id) {
            $selectedAreas = Area::where('city_id', $request->city_id)->get();
        }

        return view('frontend.pages.second_booking_hospital', get_defined_vars());
    }
    public function  user_account()
    {

        $user = auth()->user();

        return view('frontend.pages.second_user_account', compact('user'));
    }


    public function  login(Request $request)
    {
        $cities  = City::get();
        $type = $request->type;
        $specialities = Speciality::get();
        $route =  route('register');
        if ($type == 'doctor') {
            $route =  route('doctor.register');
        }
        Auth::guard('web')->logout();

        return view('frontend.pages.second_login', get_defined_vars());
    }

    public function  sessions_user(AppointmentsDataTable $dataTable, Request $request)
    {

        $appointments = Appointment::with(['doctor', 'hospital', 'patient', 'schedule'])
            ->where('patient_id', Auth::user()->id)
            ->when($request->status, function ($query) use ($request) {
                $query->where('status', $request->status);
            })->when($request->date, function ($query) use ($request) {
                $date = Carbon::parse($request->date);
                $query->whereHas('patient', function ($que) use ($date) {
                    return $que->whereDate('date', $date);
                });
            })->orderBy('created_at', 'desc')->get();

        return view('frontend.pages.second_sessions_user', get_defined_vars());
    }

    public function update_user_account(Request $request)
    {

        // User::findOrFail($request->user_id)->update($request->all());
        // if ($request->hasFile('file')) {
        //     $image = media($request->file, 'users/');
        //     $request->merge(['image' => $image]);
        // }

        // UserInformation::updateOrCreate(['user_id'=>$request->user_id],$request->all());

        // dd($request->input());


        $id = auth()->user()->id;

        $data = $request->validate([
            'name'          => ['required', 'min:3', 'max:50', 'string'],
            'password'      => ['nullable', 'min:8'],
            'residence'     => 'nullable',
            'phone'         => 'required'

        ]);

        if ($data['password'] === null) unset($data['password']);

        $update = User::find($id);
        $update->update($data);

        if ($request->hasFile('file')) {
            $image = media($request->file, 'users/');
            $request->merge(['image' => $image]);
        }

        UserInformation::updateOrCreate(['user_id' => $id], $request->all());


        return redirect()->route('home')->withSuccess('Updated Successfully');
    }

    public function appointments_show($id)
    {
        $appointment = Appointment::findOrFail($id);
        $user = $appointment->patient;

        return view('frontend.pages.user_appoint_show', get_defined_vars());
    }

    public function booking_hospital_details($id){
        $selectedAreas = [];
        $specialities = Speciality::get();
        $countries = Country::get();
        $cities = City::get();
        $images = HospitalImage::where('hospital_id',$id)->get();
        $rooms = HospitalRoom::where('hospital_id',$id)->get();
        $hospital = User::where('id',$id)->first();
        $schedules = [];
        
        return view("frontend.pages.second_booking_hospital_details", get_defined_vars());
    }
    
}
