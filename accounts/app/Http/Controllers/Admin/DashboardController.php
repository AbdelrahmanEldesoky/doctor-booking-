<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Rating;
use App\Models\UserInformation;
use App\Models\Appointment;
use App\DataTables\Admin\RatingDataTable;
use App\DataTables\Admin\RevenueDataTable;
use App\Traits\Admin\SearchModelTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $patients = User::where('role', 'doctor')->take(5)->get();
// $daat
        $uniquePatients = getUniquePatients('admin');
        $total_appointments = getAppointments('total','admin');
        $complete_appointments = Appointment::whereIn('status',['complete','waiting_for_rating'])->count();
        $canceled_appointments = getAppointments('canceled','admin');
        $progress_appointments = getAppointments('in progress','admin');
        $transactions = getTransactions('admin');
        $totalDoctors = User::where('role', 'doctor')->count();
        $totalHospitals = User::where('role', 'hospital')->count();
        list($complete, $progress, $cancel) = $this->chartGraph('2022');

        $doctors = User::where('role', 'doctor')->take(5)->get();

        $totalPayment = recievedPayments('admin','complete');
        $monthPayment = recievedPayments('admin','month');
        
        return view('admin.index', get_defined_vars());
        $user = Auth::user();
        return view('admin.index', get_defined_vars());
    }

    public function chartGraph($year)
    {
        $complete = [];
        $progress = [];
        $cancel = [];
        for ($i = 1; $i <= 12; $i++) {
            $appointments = Appointment::whereYear('created_at', $year)->whereMonth('created_at', $i)->get();
            $r = $appointments->where('status','completed')->count();
            $r ? $complete[] = $r : $complete[] = 0;

            $p = $appointments->where('status','in progress')->count();
            $p ? $progress[] = $p : $progress[] = 0;

            $p =  $appointments->where('status','canceled')->count();
            $p ? $cancel[] = $p : $cancel[] = 0;
        }
        return [$complete, $progress, $cancel];
    }

    public function login()
    {
        return view('auth.login');
    }

    public function doctors(Request $request)
    {
        if ($request->ajax()) {
            $searchResults = SearchModelTrait::SearchModel('User', ['name', 'email'], $request->table_filter_search ?? '', 'doctor');
            $searchResults = $searchResults->paginate($request->table_length_limit);
            return view('admin.doctors.result', get_defined_vars());
        }
        return view('admin.doctors.index', get_defined_vars());
    }
   public function patients(Request $request)
    {
        if ($request->ajax()) {
            $searchResults = SearchModelTrait::SearchModel('User', ['name', 'email'], $request->table_filter_search ?? '', 'doctor');
            $searchResults = $searchResults->paginate($request->table_length_limit);
            return view('admin.patients.result', get_defined_vars());
        }
        return view('admin.patients.index', get_defined_vars());
    }

    public function appointments(Request $request)
    {
        if ($request->ajax()) {
            $searchResults = SearchModelTrait::SearchModel('User', ['name', 'email'], $request->table_filter_search ?? '', 'doctor');
            $searchResults = $searchResults->paginate($request->table_length_limit);
            return view('admin.appointments.result', get_defined_vars());
        }
        return view('admin.appointments.index', get_defined_vars());
    }

    public function show($id)
    {
        $doctor = User::findOrFail($id);
        $doctors = User::where('role', 'doctor')->get();

        return view('admin.doctors.show', get_defined_vars());
    }
    public function rateCounter(Request $request)
    {
        UserInformation::updateOrCreate(['user_id'=>$request->id],['rate_count' => $request->rate_counter]);

        return redirect()->back()->with('message','Updated Successfully');
    }

    public function ratings(RatingDataTable $dataTable)
    {
        $assets = ['data-table'];
        return $dataTable->render('admin.ratings.index', get_defined_vars());
    }
    
    public function revenue(RevenueDataTable $dataTable,Request $request)
    {
        Session::forget('from_date');
        Session::forget('to_date');
        if($request->date)
        {
           list($start,$end) = getRangeDate($request->date);
           Session::put('from_date',$start);
           Session::put('to_date',$end);
        }

        $assets = ['data-table'];
        return $dataTable->render('admin.setting.RevenueIndex', get_defined_vars());
    }
    
    public function ratingsDestroy($id)
    {
        Rating::findOrFail($id)->delete();

        return redirect()->back()->with('message','Deleted Successfully');
    }
    
     public function profile()
    {
        $user = Auth::user();
        return view('admin.setting.profile', get_defined_vars());
    }

    public function profileSave(Request $request)
    {
       
        $changes = [];
        $doctor = User::findOrFail(Auth::user()->id);
        if ($request->profile_image)
        {
            $base64Image = explode(";base64,", $request->profile_image);
            $explodeImage = explode("image/", $base64Image[0]);
            $imageType = $explodeImage[1];
            $image_base64 = base64_decode($base64Image[1]);
            $image_name = time().'.png';
            $image_path = 'uploads/images/'.$image_name;
            file_put_contents($image_path, $image_base64);
            $request['image'] = $image_name;
            $changes['image'] = $doctor->image;
        }
        
        User::findOrFail(Auth::user()->id)->update($request->all());
        UserInformation::updateOrCreate(['user_id'=> Auth::user()->id],$request->all());
        return redirect()->back()->with('message', 'Updated successfully');
    }
    
        public function updatePassword(Request $request)
    {
        $request->validate([
            'password' => ['required', 'confirmed'],
        ]);
        $user = User::findOrFail(Auth::user()->id);
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->back()->with('message', 'Updated successfully');
    }
}
