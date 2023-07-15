<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\User;
use App\Models\DoctorLog;
use App\Models\DoctorClinicImages;
use App\Models\UserInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\DataTables\Doctor\RatingDataTable;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $patients = User::where('role', 'doctor')->take(5)->get();

        $uniquePatients = getUniquePatients('doctor');
        $total_appointments = getAppointments('total','doctor');
        $complete_appointments = getAppointments('complete','doctor');
        $complete_appointments =  Appointment::where('doctor_id',auth()->user()->id)->whereIn('status',['complete','waiting_for_rating'])->count();
        $canceled_appointments = getAppointments('canceled','doctor');
        $progress_appointments = getAppointments('in progress','doctor');
        $transactions = getTransactions('doctor');
        
        $totalPayment = recievedPayments('doctor','complete');
        $monthPayment = recievedPayments('doctor','month');
        list($complete, $progress, $cancel) = $this->chartGraph('2022');

        return view('doctor.index', get_defined_vars());
    }


    public function chartGraph($year)
    {
        $complete = [];
        $progress = [];
        $cancel = [];
        for ($i = 1; $i <= 12; $i++) {
            $appointments = Appointment::where('doctor_id',Auth::user()->id)->whereYear('created_at', $year)->whereMonth('created_at', $i)->get();
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


    public function show($id)
    {
        $doctor = User::findOrFail($id);
        $doctors = User::where('role', 'doctor')->get();

        return view('doctor.patients.show', get_defined_vars());
    }

    public function profile()
    {
        $user = Auth::user();
        $images = DoctorClinicImages::where('doctor_id',$user->id)->get();
        return view('doctor.settings.profile', get_defined_vars());
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
        $this->isChangedFields($doctor,$request,$changes);
        User::findOrFail(Auth::user()->id)->update($request->all());
        UserInformation::updateOrCreate(['user_id'=> Auth::user()->id],$request->all());
        return redirect()->back()->with('message', 'Updated successfully');
    }
    public function pricesSave(Request $request)
    {
        User::findOrFail(Auth::user()->id)->update($request->all());
        return redirect()->back()->with('message', 'Updated successfully');
    }
    public function clinics(Request $request)
    {
        if($request->default_image_ids && count($request->default_image_ids) >0)
        {
            DoctorClinicImages::where('doctor_id',Auth::user()->id)->whereNotIn('id',$request->default_image_ids)->delete();

        }
        if ($request->file('files')) {
            foreach($request->files as $files)
            {
                foreach($files as $key=>$file)
                {
                $image = customMedia( 'uploads/images',$file);
                $request->merge(['image' => $image]);
                DoctorClinicImages::create([
                    'image' => $image,
                    'doctor_id' => Auth::user()->id,
                ]);
               }


            }

        }
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

    public function ratings(RatingDataTable $dataTable)
    {
        $assets = ['data-table'];
        return $dataTable->render('doctor.settings.ratings', get_defined_vars());
    }
    public function isChangedFields($doctor,$request,$changes)
    {
       if($doctor->name != $request->name)
       {
          $changes['name'] = $doctor->name;
       }
       if($doctor->name_ar != $request->name_ar)
       {
          $changes['name_ar'] = $doctor->name_ar;
       }
       if($doctor->information->job_title != $request->job_title)
       {
          $changes['job_title'] = $doctor->information->job_title;
       }
       if($doctor->information->job_title_ar != $request->job_title_ar)
       {
          $changes['job_title_ar'] = $doctor->information->job_title_ar;
       }
       if($doctor->information->embed_link != $request->embed_link)
       {
          $changes['embed_link'] = $doctor->information->embed_link;
       }
       if($doctor->information->hospital != $request->hospital)
       {
          $changes['hospital'] = $doctor->information->hospital;
       }
       if($doctor->information->clinic != $request->clinic)
       {
          $changes['clinic'] = $doctor->information->clinic;
       }
       if($doctor->information->about != $request->about)
       {
          $changes['about'] = $doctor->information->about;
       }

       if(count($changes) > 0)
       {
        DoctorLog::create(['type' => 'profile','doctor_id' => $doctor->id,'data' => json_encode($changes)]);
       }

    }
}
