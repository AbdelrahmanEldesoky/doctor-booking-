<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use MacsiDigital\Zoom\Facades\Zoom;

class ZoomIntegrationController extends Controller
{
    public function linkZoom(Request $req)
    {
        $user = Auth::User();
        $user->zoom_email = $req->email;
        $user->save();
        if ($user->zoom_id == "") {
            try {
                $zoom_user = Zoom::user()->create([
                    'name' => $user->name,
                    'email' => $user->zoom_email ?? $user->email,
                    'type' => 1
                ]);
                $user->zoom_id = $zoom_user->id;
                $user->save();
            } catch (\Exception $e) {
                return back()->withError($e->getMessage());
            }
            return back()->with('message', 'Your zoom account has been attached. Check your email inbox to accept invitation.');
        }
        return back()->withError('Account is already linked.');
    }

    public function createMeeting($id, $doctor_id)
    {
        $appoint = Appointment::findOrFail($id);
        $doctor = User::findOrfail($doctor_id);
        $user = Zoom::user()->find($doctor->zoom_id);
        if ($user->status == 'active') {
            $meeting = Zoom::meeting()->make([
                'userId' => 'me',
                'topic' => 'Online Meeting',
                'type' => 2,
                'disable_recording' => false,
                'duration' => 1,
                'timezone' => 'Pakistan',
                'password' => '1234567890',
                'agenda' => 'Meeting for Event Discussion',
            ]);
            if ($meeting) {
                $test = $user->meetings()->save($meeting);
                $appoint->join_url = $test->join_url;
                $appoint->save();
            }
        };

        return null;
    }

    public function joinSession($id)
    {

        $data = [
            'name'  => Auth::User()->name,
            'mn'   => $id,
            'email' => Auth::User()->email
        ];

        return view('zoom.index', get_defined_vars());
    }

    /**
     * Zoom Meeting
     *
     * @return \Illuminate\Http\Response
     */
    public function meeting(Request $req)
    {

        return view('zoom.meeting', get_defined_vars());
    }


    /**
     * Zoom ended
     *
     * @return \Illuminate\Http\Response
     */
    public function ended(Request $req)
    {
        return view('zoom.class-end');
    }

}
