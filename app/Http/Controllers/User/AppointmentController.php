<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\DataTables\User\AppointmentsDataTable;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     * @param AppointmentsDataTable $dataTable
     * @return Renderable
     */
    public function index(AppointmentsDataTable $dataTable, Request $request)
    {
        $appointments = Appointment::with(['doctor','hospital','patient','schedule'])
        ->where('patient_id',Auth::user()->id)
        ->when($request->status,function($query) use($request){
          $query->where('status',$request->status);
        })->when($request->date,function($query) use($request){
            $date = Carbon::parse($request->date);
            $query->whereHas('patient',function($que) use($date){
                return $que->whereDate('date',$date);
             });
          })->orderBy('created_at','desc')->get();

        return view('user.appointments.index', get_defined_vars());
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

        return view('user.appointments.show', get_defined_vars());
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

    // public function status($id,$status)
    // {
    //     $appointment = Appointment::findOrFail($id)->update(['status' => $status]);

    //     return redirect()->back()->with('message','Status Change Successfully');
    // }
}
