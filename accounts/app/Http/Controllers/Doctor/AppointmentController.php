<?php

namespace App\Http\Controllers\Doctor;

use App\DataTables\Doctor\AppointmentsDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Report;
use Illuminate\Support\Facades\Mail;

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
        Session::forget('type');
        if($request->status)
        {
            Session::put('status',$request->status);
        }
        if($request->type)
        {
            Session::put('type',$request->type);
        }
        if($request->date)
        {
            Session::put('date',$request->date);
        }
        $assets = ['data-table'];


        return $dataTable->render('doctor.appointments.index', get_defined_vars());
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

        return view('doctor.appointments.show', get_defined_vars());
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function cancel($id)
    {
        $appointment = Appointment::findOrFail($id)->update(['status' => 'canceled']);

        return redirect()->back()->with('message','Status Change Successfully');
    }
    public function close($id)
    {
        $appointment = Appointment::findOrFail($id);
        Report::updateOrCreate(
            ['appointment_id' => $appointment->id],
            [
            'schedule_id' => $appointment->schedule_id,
            'doctor_id' => $appointment->doctor_id,
            'patient_id' => $appointment->patient_id,
            'session_amount' => $appointment->amount,
            'paid_amount' => $appointment->amount,
            'status' => 'paid',]
        );
        $appointment->update(['status' => 'waiting_for_rating']);

        return redirect()->back()->with('message','Status Change Successfully');
    }
    public function accept($id)
    {
        $appointment = Appointment::findOrFail($id)->update(['status' => 'accepted']);

        return redirect()->back()->with('message','Status Change Successfully');
    }

    public function status($id,$status)
    {
        $appointment = Appointment::findOrFail($id)->update(['status' => $status]);

        return redirect()->back()->with('message','Status Change Successfully');
    }
    public function email(Request $request,$id)
    {
        $appointment = Appointment::findOrFail($id);
        $email = $appointment->patient->email;
        $data =[
            'name' => $appointment->patient->name,
            'subject' => $request->subject,
            'message' => $request->message,
        ];
        Mail::send('mail.appointmentClient', ['data' => $data], function ($message) use ($email,$request) {
            $message->to($email, 'Ipersona')->subject($request->subject);
        });
        $route = route('doctor.appointments.index');

        return response()->json(['success' => 'Send Successfully', 'redirect_url' =>$route]);
    }
}
