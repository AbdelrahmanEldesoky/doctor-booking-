<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\HospitalDataTable;
use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Area;
use App\Models\Appointment;
use App\Models\Country;
use App\Models\Hospital;
use App\Jobs\SendPasswordEmailJob;
use Illuminate\Contracts\Support\Renderable;
use App\Models\User;
use App\Models\UserInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HospitalController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param HospitalDataTable $dataTable
     * @return Renderable
     */
    public function index(HospitalDataTable $dataTable)
    {
        $assets = ['data-table'];
        return $dataTable->render('admin.hospitals.index', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::get();
        return view('admin.hospitals.create', get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->email),
            'role' => 'hospital',
            'my_price' => $request->my_price,
            'status' => 1,
            'percentage' => $request->percentage,
            'ofline_percentage' => $request->ofline_percentage,
        ]);
        $request->merge(['user_id' => $user->id]);
        if ($request->hasFile('file')) {
            $image = media($request->file, 'uploads/images');
            $request->merge(['image' => $image]);
            $user->image = $image;
            $user->save();
        }
        UserInformation::create($request->all());

               $details =[
            'name' => $request->name,
            'email' => $request->email,
        ];
        dispatch(new SendPasswordEmailJob($details));

        return redirect()->route('admin.hospitals.index')->with('message', 'Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $hospital = User::findOrFail($id);
        $cities = City::get();
        return view('admin.hospitals.edit', get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $user = User::findOrFail($id);
        $information  = UserInformation::where('user_id',$id)->first();

        $user->update([
            'name' => $request->name,
            'my_price' => $request->my_price,
            'percentage' => $request->percentage,
            'ofline_percentage' => $request->ofline_percentage,
        ]);


        $information->update([
            'city'=>$request->city,
            'area'=>$request->area,
            'image'=>$request->area,
            'about'=>$request->about,
        ]);

        if ($request->file) {
            $image = media($request->file, 'uploads/images');
            $request->merge(['image' => $image]);
            $user->image = $image;
            $information->image = $image;
            $user->save();
        }

        return redirect()->route('admin.hospitals.index')->with('message', 'Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::findOrFail($id)->update(['is_show' => 0]);

        return redirect()->route('admin.hospitals.index')->with('message', 'Deleted Successfully');
    }

    public function getAreas(Request $request)
    {
        $custom_city = $request->area;

        $areas = Area::where('city_id', $request->city)->get();
        $view = view('admin.components.appendAreas', get_defined_vars())->render();
        return response()->json(['view' => $view]);
    }
    public function myAppointments($id)
    {
        $appointments = Appointment::where('hospital_id',$id)->get();

        return view('admin.hospitals.appointments', get_defined_vars());
    }
    public function myAppointmentsStatus($id)
    {
        $appointments = Appointment::findOrFail($id)->update(['status' => 'waiting_for_rating']);

        return redirect()->back()->with('messgae','Updated Successfully');
    }
}
