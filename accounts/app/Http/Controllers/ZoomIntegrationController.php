<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Traits\UseZoom;
use App\Models\Appointment;
use Illuminate\Http\Request;
use MacsiDigital\Zoom\Facades\Zoom;
use Illuminate\Support\Facades\Auth;

class ZoomIntegrationController extends Controller
{
    use UseZoom;

    public function linkZoomAccount(Request $req)
    {
            $response = $this->linkZoom(Auth::Id(), $req->email);
            return back()->with('message', $response['message']);
    }

    public function createMeeting($id,$doctor_id)
    {


        $appoint = Appointment::findOrFail($id);

        $doctor = User::findOrfail($doctor_id);

        $user = Zoom::user()->find($doctor->zoom_id);

        if ($user->status == 'active')
        {
            
            
            if($appoint->start_url == null)
            {
                
                $meeting = Zoom::meeting()->make([
                    'userId' => 'me',
                    'topic' => 'Online Meeting',
                    'type' => 2,
                    'disable_recording' => false,
                    'duration' => 1,
                    'timezone' => 'Pakistan',
                    'password' => '1234567890',
                    'agenda' => 'Meeting for Patient',
                    'waiting_room' => false,
                    'audio' => 'voip'
                ]);

                if ($meeting)
                {
                    $test = $user->meetings()->save($meeting);
                    $appoint->start_url = $test->start_url;
                    $appoint->join_url = $test->join_url;
                    $appoint->save();
    
                    
    
    
                }
                else
                {
                    return redirect()->back()->with('error','Sorry No Meeting create');
                }
                
                
                
                
            }
            
            
            return redirect($appoint->start_url);
            
            // $data = [
            //             'name'  => Auth::User()->name ?? '',
            //             'mn'   => $appoint->join_url,
            //             'email' => Auth::User()->zoom_email
            //         ];
            // return view('zoom.index', get_defined_vars());
            
            
        };

        return redirect()->route('doctor.profile')->with('error','Please create zoom account');
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
