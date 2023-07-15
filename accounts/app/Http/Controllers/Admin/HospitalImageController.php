<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\HospitalImage;
use App\DataTables\Admin\HospitalImageDataTable;


class HospitalImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index(HospitalImageDataTable $dataTable,Request $request)
    {
        Session::put('hospital_id',$request->id);
        $id=$request->id;
        $assets = ['data-table'];

        return $dataTable->render('admin.hospitals.images.index', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$hospital_id,$id=null)
    {
        if ($request->hasFile('file')) {
            $image = media($request->file, 'users/');
            $request->merge(['image' => $image]);
        }
        $request->merge(['hospital_id'=>$hospital_id]);
        HospitalImage::updateOrCreate(['id' => $id],$request->all());

        return redirect()->back()->with('message','Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        HospitalImage::findOrFail($id)->delete();

        return redirect()->back()->with('message','Deleted Successfully');
    }
}
