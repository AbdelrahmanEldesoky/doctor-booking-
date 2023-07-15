<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\DataTables\Doctor\ClinicDataTable;
use App\Models\DoctorClinic;
use App\Models\City;
use App\Models\Area;
use App\Models\DoctorArea;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class ClinicController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param ClinicDataTable $dataTable
     * @return Renderable
     */
    public function index(ClinicDataTable $dataTable, Request $request)
    {
        $assets = ['data-table'];
        return $dataTable->render('doctor.clinics.index', get_defined_vars());
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id=null)
    {
        $areas=null;
        $near_areas =[];
        if($id)
        {
            $clinic = DoctorClinic::findOrFail($id);
            $areas = Area::where('city_id',$clinic->city)->get();
            $near_areas = DoctorArea::where('clinic_id',$id)->where('type','nearest')->pluck('area_id')->toArray();
        }
        else{
            $clinic = new DoctorClinic();
        }

        $cities = City::get();

        return view('doctor.clinics.create', get_defined_vars());

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->merge(['doctor_id'=> Auth::user()->id]);
        DoctorClinic::updateOrCreate(['id' => $request->clinic_id],$request->all());

        if($request->nearst_areas)
        {
            $array = $request->nearst_areas;
            $array =  Arr::collapse([$array, array($request->area)]);
            DoctorArea::where('clinic_id',$request->clinic_id)->whereNotIn('area_id',$array)->delete();
            foreach($array as $area)
            {
                $typee = $area == $request->area ? 'main' : 'nearest';
                DoctorArea::updateOrCreate(['clinic_id'=>$request->clinic_id,'area_id' => $area],['type' => $typee]);
            }
        }

        return redirect()->back()->with('message','Doctor has been Successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
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
        DoctorClinic::findOrFail($id)->update(['is_show' => 0]);
        return redirect()->back()->with('message','Successfully Deleted');

    }
}
