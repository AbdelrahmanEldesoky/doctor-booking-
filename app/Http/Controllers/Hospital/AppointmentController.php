<?php

namespace App\Http\Controllers\Hospital;

use App\DataTables\Hospital\AppointmentsDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Appointment;

use Illuminate\Support\Facades\Session;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param AppointmentsDataTable $dataTable
     * @return Renderable
     */
    public function index(AppointmentsDataTable $dataTable, Request $request)
    {
        Session::forget('date');
        Session::forget('status');
        if($request->status)
        {
            Session::put('status',$request->status);
        }
        if($request->date)
        {
            Session::put('date',$request->date);
        }
        $assets = ['data-table'];

        
        return $dataTable->render('hospital.appointments.index', get_defined_vars());
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $appointment = Appointment::findOrFail($id);
        $user = $appointment->patient;

        return view('hospital.appointments.show', get_defined_vars());
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
        //
    }

    public function status($id,$status)
    {
        $appointment = Appointment::findOrFail($id)->update(['status' => $status]);

        return redirect()->back()->with('message','Status Change Successfully');
    }
}
