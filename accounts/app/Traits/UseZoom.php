<?php

namespace App\Traits;

use Auth;
use App\Models\User;
use App\Traits\UseZoom;
use Illuminate\Support\Arr;
use MacsiDigital\Zoom\Facades\Zoom;
use MacsiDigital\API\Support\Authentication\JWT;

/**
 * Class SyncsWithFirebase
 * @package App\Traits
 */
trait UseZoom
{

    /**
     * Display a generateZoomToken.
     *
     * @return \Illuminate\Http\Response
     */
    public function generateZoomToken()
    {
        return JWT::generateToken(
            [
                'iss' => config('zoom.api_key'),
                'exp' => time() + config('zoom.token_life')
            ],
            config('zoom.api_secret')
        );
    }

    /**
     * Display a zoomRequest.
     *
     * @return \Illuminate\Http\Response
     */
    public function zoomRequest()
    {
        $token = $this->generateZoomToken();

        return \Illuminate\Support\Facades\Http::withHeaders([
            'authorization' => 'Bearer ' . $token,
            'content-type' => 'application/json',
        ]);
    }

    /**
     * Display a zoomGet.
     *
     * @return \Illuminate\Http\Response
     */
    public function zoomGet(string $path, array $body = [])
    {
        $request = $this->zoomRequest();
        return $request->get(config('zoom.base_url') . $path, $body);
    }

    /**
     * Display a zoomPost.
     *
     * @return \Illuminate\Http\Response
     */
    public function zoomPost(string $path, array $body = [])
    {
        $request = $this->zoomRequest();
        return $request->post(config('zoom.base_url') . $path, $body);
    }

    /**
     * Display a createZoomMeeting.
     *
     * @return \Illuminate\Http\Response
     */
    public function createZoomMeeting()
    {


        $record = [];
        $grades = Grade::get(['id', 'name']);

        foreach ($grades as $item) {

            $users = OnlineSchoolRegisteredStudent::with('students')
                ->whereGradeId($item->id)
                ->select('user_id')
                ->distinct()
                ->get()
                ->pluck('students.email');


            $teachers = OnlineSchoolPackageTimetable::with('teacher')
                ->whereGradeId($item->id)
                ->whereDayId(now()->format('w'))
                ->select('teacher_id')
                ->distinct()
                ->get()
                ->pluck('teacher.email');

            $participants = Arr::collapse([$users, $teachers]);

            $data = [
                "name" => "Grade-" . $item->name,
                "participants" => $users
            ];

            array_push($record, $data);
        }

        $extra_rooms = [
            "name" => "Makeup-Class",
            "participants" => []
        ];

        array_push($record, $extra_rooms);

        $body = [
            'agenda' => "BLIS Meeting",
            'password' => "090078601",
            'settings' => [
                'auto_recording' => "cloud",
                'meeting_authentication' => true,
                'authentication_exception' => [
                      "email" => "deviotechshahzad@gmail.com",
                      "name" =>  "ABC DEF"
                    ],
                "breakout_room" => [
                    "enable" => true,
                    "rooms" => $record

                ]
            ]
        ];

        $res = $this->zoomPost('users/me/meetings', $body);



        return $response = [
            'data' => json_decode($res->body(), true),
            'status'  => $res->status()
        ];
    }








    public function linkZoom($id, $email)
    {


        $user = User::findOrFail($id);

        if ($user->zoom_id == "") {

            $body = [
                'action' => "create",
                'user_info' => [
                    'email' => $email,
                    'first_name' => $user->name,
                    'type' => 1
                ]
            ];


            $res = $this->zoomPost('users', $body);
             
            $res = json_decode($res->body(), true);
            
            if(isset($res['id']))
            {
                    $user->zoom_id = $res['id'];
            $user->zoom_email = $email;
            $user->save();

            return $data = [
                'message' => 'You have been associated with Ipersona Zoom portol.However, check your email inbox to accept invitation.'
            ];
            }
            
            return $data = ['message' => 'This email is already exist plz use another'];
        

        }

        return $data = [
            'message' => 'You have already linked with Zoom.'
        ];



    }

    public function liveZoomMeetings()
    {

        $meetings = [];

        $users = User::where('zoom_access_token', "!=", "")
            ->where('company_id', Auth::user()->companyId())
            ->get();


        foreach ($users as $item) {
            $meeting = Zoom::user()
                ->find($item->zoom_access_token)
                ->meetings()
                ->where('type', 'live')
                ->first();


            if ($meeting) {


                $timetable = OnlineSchoolPackageTimetable::with(['grade:id,name', 'teacher:id,f_name,l_name,email'])->whereZoomId($meeting->id)->first(['id', 'grade_id', 'teacher_id']);

                array_push($meetings, ['meeting_link' => $meeting->join_url, 'timetable' => $timetable]);
            }
        }

        return $meetings;
    }


    public function removeZoom()
    {
        $user = Zoom::user()->find(Auth::user()->zoom_email);
        $user->delete();

        Auth::User()->update(['zoom_access_token' => NULL]);
        return true;
    }
}
