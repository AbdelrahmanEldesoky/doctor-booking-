<?php

namespace App\Http\Controllers\Admin;

use App\Models\Area;
use App\Models\City;
use App\Models\User;
use App\Models\Speciality;
use App\Models\DoctorArea;
use Illuminate\Http\Request;
use App\Models\UserSpeciality;
use App\Models\UserInformation;
use App\Jobs\SendPasswordEmailJob;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Jobs\RegisterEmailJob;
use Illuminate\Support\Facades\Auth;
use App\DataTables\Admin\DoctorDataTable;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(DoctorDataTable $dataTable)
    {
        $assets = ['data-table'];
        return $dataTable->render('admin.doctors.index', get_defined_vars());
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id = null)
    {
        $doc = null;
        $areas=null;
        if($id)
        {
            $doc = User::findOrFail($id);
            $areas = Area::where('city_id',$doc->information->city)->get();
        }
        $cities  = City::get();
        $specialities = Speciality::get();

        return view('admin.doctors.create', get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        
        $is_present = 0;
        $user = User::where('id',$request->doc_id)->first();
        if(!$user)
        {
            $is_present = 1;
        }
        if($user && $user->email == $request->email)
        {
             $request->validate([
                 'name' => 'required',
                 'email' => 'required',
             ]);
        }
        else{
            $request->validate([
                'name' => 'required',
                'email' => 'required|unique:users'.$request->doc_id,
            ]);

        }
     
     
        $user = User::updateOrCreate(['id' => $request->doc_id],[
            'name' => $request->name,
            'name_ar' => $request->name_ar,
            'email' => $request->email,
            'password' => Hash::make($request->email),
            'role' => 'doctor',
            'percentage' => $request->percentage,
            'ofline_percentage' => $request->ofline_percentage,
            'percentage_outside' => $request->percentage_outside,
            'is_add' => (int)$request->is_add,
            'zoom_id' => $request->zoom_id,
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

        UserInformation::updateOrCreate(['user_id'=> $request->doc_id],$request->all());


        $details =[
            'name' => $request->name,
            'role' => $request->role,
            'email' => $request->email,
        ];
      

        foreach ($request->speciality_id as $item) {
            if($request->doc_id)
            {
                UserSpeciality::where('user_id',$user->id)->whereNotIn('speciality_id',$request->speciality_id)->delete();
            }
            UserSpeciality::updateOrCreate([
                'user_id' => $user->id,
                'speciality_id' => $item,
            ]);
        }
        if($request->areas)
        {
            if($request->doc_id)
            {
                DoctorArea::whereNotIn('area_id',$request->areas)->delete();
            }
            foreach ($request->areas as $item) {
                DoctorArea::updateOrCreate([
                    'doctor_id' => $user->id,
                    'area_id' => $item,
                ]);
            }  
        }
        if($is_present == 1)
        {
         dispatch(new RegisterEmailJob($details));
        }
        return redirect()->route('admin.doctors.index')->with('message','Doctor has been Successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $doctor = User::findOrFail($id);
        return view('admin.doctors.show', get_defined_vars());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::findOrFail($id)->update(['is_show' => 0]);

        return redirect()->route('admin.doctors.index')->with('message','Deleted Successfully');

    }
    public function toggleStatus($id)
    {
        $user = User::findOrFail($id);
        if($user->status == 0 && $user->email_verified_at == null)
        {
            $details =[
            'name' => $user->name,
            'email' => $user->email,
        ];
        dispatch(new SendPasswordEmailJob($details));
        }
        $user->status = $user->status == '1' ? '0' : '1';
        $user->save();
        return redirect()->route('admin.doctors.index')->with('message','Successfully Updated');
    }

    public function dashboard($id)
    {
         $doc = User::findOrFail($id);
         Auth::logout();
         Auth::login($doc);

         return redirect()->route('doctor.dashboard');
    }
 
}
