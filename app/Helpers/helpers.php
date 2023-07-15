<?php
use Carbon\Carbon;
use App\Models\Area;
use App\Models\User;
use App\Models\Rating;
use GuzzleHttp\Client;
use App\Models\Setting;
use App\Models\Appointment;
use App\Models\Transaction;
use Illuminate\Support\Str;
use App\Models\DoctorClinic;
use App\Jobs\DoctorBookingJob;
use App\Jobs\PatientBookingJob;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Config;

function sendSms($number, $msg, $lang )
{
        $client = new Client();
        $res = $client->request('GET', 'http://dashboard.mobile-sms.com/api/sms/send', [
            'query' => [
                'api_key' => 'M2Z1dDdjVG45U05OQ1dQT2JiV0syOHhZV0s4TDBoeThadmZ0dWgyVExwRFo2d05HeEdUcTFGRGJlVnhC63ee06745da2a',
                'name' => 'Ipersona',
                'message' => $msg,
                'numbers' => $number,
                'sender' => 'IPersona EG',
                'language' => $lang,
            ]
        ]);
        $resp = $res->getBody();
        // dd(json_decode($resp, true));
}

function smsToUser($user,$app,$type, $doc = null)
{
    $lang = Config::get('app.locale');

    if($doc)
    {
     if($type == 'online')
     {
        $msg = 'A Session on Ipersona has been reserved on '. $app->from .' at '.$app->schedule->from.' Kindly join the session room at the specific time from expert Portal at my appointments section.';
     }
     else{
        $msg = 'A Session on Ipersona has been reserved on '. $app->from .' from '.$app->schedule->from.' to '.$app->schedule->to;
     }
    }
    else{
      
            $msg = 'تم تأكيد حجز موعد جديد مع آي بيرسونا لتفاصيل الحجز برجاء مراجعة البريد';
        
    }
 
    try {
        sendSms($user->information->phone, $msg, $lang );
      } catch (\Exception $e) {
      }
}

function customDate($date, $format)
{
    return Carbon::parse($date)->format($format);
}

function setting()
{
    return Setting::pluck('value', 'key')->toArray();
}

function colors()
{
    return [
        'primary',
        'warning',
        'danger',
        'secondary',
        'info',
    ];
}

if (!function_exists('media')) {

    /**
     * @param $file
     * @param $path
     * @return mixed
     */
    function media($file, $path)
    {
        $imageName = time() . '.' . $file->extension();
        $file->move(public_path($path), $imageName);

        return $imageName;
    }

}

function customMedia($path, $file = null, $custom = null)
{
    $image = $file;
    $extension = $image->getClientOriginalExtension();
    $name = $image->getClientOriginalName();
    $file_name = '/'.$name;
    $image->move($path, $file_name);
    $file_name = $path . $file_name;

    if ($custom) {
        return [
            $name,
            $file_name
        ];
    }
    return $file_name;
}

if (!function_exists('sessionStatus')) {

    /**
     * @return mixed
     */
    function sessionStatus()
    {
        return [
            'available',
            'un available',
        ];
    }

}
if (!function_exists('interval')) {

    /**
     * @return mixed
     */
    function interval()
    {
        return [
            '30',
            '60',
        ];
    }

}
function getRangeDate($date)
{
    $date = explode(' to ',$date);
    return [
        $date[0],
        $date[1],
    ];
}

function getUniquePatients($type)
{
if($type == 'doctor')
{
    return User::whereHas('patients',function($query){
        $query->where('doctor_id',Auth::user()->id);
      })->count();
}
return User::whereHas('patients')->count();

}

function getAppointments($type,$user)
{
    $appointments =  Appointment::when($type != 'total',function($q) use($type){
        $q->where('status',$type);
    })
    ->when($user== 'doctor',function($q) {
        $q->where('doctor_id',Auth::user()->id);
    })->get();

    return $appointments->count();
}

function getTransactions($user)
{
    $transactions =  Transaction::when($user== 'doctor',function($q) {
        $q->where('user_id',Auth::user()->id);
    })->get();

    return $transactions->count();
}

function recievedPayments($user,$type)
{
    $transactions =  Transaction::when($user== 'doctor',function($q) {
        $q->where('user_id',Auth::user()->id);
    })->when($type== 'month',function($q) {
        $q->whereDate('created_at',Carbon::now());
    })->get();

    return $transactions->sum('amount');
}


if (!function_exists('weeks')) {

    /**
     * @return mixed
     */
    function weeks()
    {
        return [
            'sunday',
            'monday',
            'tuesday',
            'wednesday',
            'thursday',
            'friday',
            'saturday',
        ];
    }

}
if (!function_exists('getDayNumber')) {

    /**
     * @return mixed
     */
    function getDayNumber($item)
    {
        foreach(weeks() as $key => $day)
        {
            if($item == $day)
            {
                return $key;
            }
        }
    }

}



function doctorProfile($img,$user_path = null,$is_img=null)
{
    if($is_img)
    {
        if($user_path)
        {
            return 'https://accounts.ipersona.me/users/'.$img;
        }
        return 'https://accounts.ipersona.me/uploads/images/'.$img;
    }

    return asset('frontend/images/iper_logo.jpg');
 
}

function subDomainAsset($a,$path = null)
{
    if($path)
    {
       return 'https://accounts.ipersona.me/'.$path.'/'.$a; 
    }
    return 'https://accounts.ipersona.me/'.$a;
}

function sendMail($data)
{

    $mail = Mail::send($data['view'], ['data' => $data['data']], function ($message) use ($data) {
        $message->to($data['to'], $data['data']['name'] ?? '')
          ->subject($data['subject']);
      });

}
function avgRating($id)
{
    $ratings = Rating::where('user_id',$id)->get();
  return [
    $ratings->avg('rating'),
    $ratings->count(),
  ];
}
function maxRating($id)
{
    $rating=Rating::where('user_id',$id)->max('rating');
    return $rating; 
}
function getSessonPrice($doctor,$tel = false,$curr=null)
{
    if(!$tel){
        return [$doctor->ofline_price,'EGP'];
    }
    $location = getLocation();
    $amount = strtolower($location)  == 'egypt' ?  $doctor->online_price : ($doctor->online_price_outside);
    if($curr)
    {
        $currency = strtolower($location)  == 'egypt' ? 'EGP' : 'USD';
        return [
            $amount,
            $currency
        ];

    }

    return  $amount;
}
function getRoomPrice($user,$curr = null)
{
    $location = getLocation();
    $amount = strtolower($location)  == 'egypt' ?  $user->price : ($user->price_outsider);
    if($curr)
    {
        $currency = strtolower($location)  == 'egypt' ? 'EGP' : 'USD';
        return [
            $amount,
            $currency
        ];

    }
    return  $amount;
}

function getLocationCode()
{

    $ip = get_client_ip();

    $access_key = '41ea21fa-42dd-409c-9fbe-274745b44a72';

    $ch = curl_init('http://apiip.net/api/check?ip='.$ip.'&accessKey='.$access_key.'');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $json_res = curl_exec($ch);
    curl_close($ch);

    $api_result = json_decode($json_res, true);

    return $api_result['countryCode'] ?? 'EG';

}


function getLocation()
{
    $ip = get_client_ip();
    $access_key = '41ea21fa-42dd-409c-9fbe-274745b44a72';

    $ch = curl_init('http://apiip.net/api/check?ip='.$ip.'&accessKey='.$access_key.'');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $json_res = curl_exec($ch);
    curl_close($ch);

    $api_result = json_decode($json_res, true);

    return $api_result['countryName']?? 'USA';

}

function get_client_ip()
{
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

function sendDoctorEmail($app)
{
    $subject = Lang::get('site.confirm_booking');
    $details =[
        'subject' => $subject,
        'type' => $app->type,
        'name' => $app->patient->name,
        'email' => $app->doctor->email,
        'phone' => $app->patient->information->phone,
        'day' => $app->schedule->date,
        'date' => $app->from,
        'amount' => $app->amount,
        'from' => '-',
        'to' => '-',
    ];

    dispatch(new DoctorBookingJob($details));
}
function sendPatientEmail($app)
{
    $subject = Lang::get('site.confirm_booking');
   $details =[
        'subject' => $subject,
        'type' => $app->type,
        'name' => $app->doctor->name,
        'email' => $app->patient->email,
        'phone' => $app->doctor->information->phone ?? '-',
        'day' => $app->schedule->date ?? '-',
        'date' => $app->from,
        'from' => $app->schedule->from ?? '-',
        'to' => $app->schedule->to ?? '-',
        'amount' => $app->amount,
        'address' => $app->schedule->clinic ? $app->schedule->clinic->lang_location : '',
        'appointments' => '',
        'duration' => $app->schedule->interval ?? '-',
    ];

    dispatch(new PatientBookingJob($details));
}

function getDocLocation($doctor)
{
  
  if(session('is_area'))
  {
      $doc = DoctorClinic::where('doctor_id',$doctor->id)->whereHas('myAreas',function($q){
         $q->where('area_id',session('is_area'));
      })->first();
  }
  else{
    $doc = DoctorClinic::where('doctor_id',$doctor->id)->first();
  }

  return $doc && $doc->myArea ? $doc->myArea->name : '';
}
function getDocArea($id,$doctors)
{

   
    if(session('is_area') && count($doctors) !=0 && session('is_area') !=null)
    {
        $doc = Area::where('id',session('is_area'))->first();
        $doc=$doc->name;
    }
    else{
      $doc = DoctorClinic::where('doctor_id',$id)->first();
    
      $doc=$doc->myArea->name;
    }
   
   // $doc = Area::where('id',session('is_area'))->first();
   
        
    return $doc ;
}


function getClinicDoctor($id,$doctors)
{

    $clinics = array();
   
    if(session('is_area') && count($doctors) !=0 && session('is_area') !=null)
    {
        $doc = Area::where('id',session('is_area'))->first();
        $doc=$doc->name;
    }
    else{
      $doc = DoctorClinic::where('doctor_id',$id)->get();
    
        foreach($doc as $doctor) $clinics[] = $doctor->myArea->name;
    }
   
   
        
    return $clinics;
}

function getDocApp($doctor)
{
    $count = 0;
    $numDay = 1;
   $day =  Carbon::now()->format('l');

  if(session('is_area'))
  {
      $count = 1;
      $sch = null;

        // $doc = DoctorClinic::where('area',session('is_area'))->where('doctor_id',$doctor->id)->first();
    //   list($schedules,$dday) = getDaySchedules($day,$doc,$numDay);
    $doc = DoctorClinic::where('doctor_id',$doctor->id)->whereHas('myAreas',function($q){
        $q->where('area_id',session('is_area'));
     })->first();
  }else{
    if(!session('is_telehealth'))
    {
        $doc = DoctorClinic::where('doctor_id',$doctor->id)->first();
    }
    else{
        $doc = $doctor;
    }
  }

if($doc)
{
    $typeee = session('is_telehealth') ? 'online' : 'ofline';
     for($i=0;$i<=7;$i++)
  {
      list($schedules,$dday) = getDaySchedules($doc,$i);
      foreach($schedules as $schd)
  {
       $time = Carbon::now()->format('H:i A');
       try {
        if($schd->schedule_type == $typeee)
        {
            // if($day == $dday && $schd->schedule_type == 'online')
            // {
            //     if(Carbon::parse($schd->from)->gte(Carbon::parse($time)))
            //     {
            //       return [$schd->from,$dday];
            //     }
            // }
            // else{
                return [$schd->from,$dday];
            // }
        }

      } catch (\Exception $e) {
        continue;
      }
  }

  }
}




  return [null,null];
}

function getDaySchedules($doc,$numDay)
{
    $day = Carbon::now()->addDays($numDay)->format('l');
    $schedule =  $doc->schedules->where('date',strtolower($day));

    return [$schedule,$day];

}

function getSortCols()
{
    return [
        'rate' => 'Top_Rated',
        'high' => 'Price_Low_To_High',
        'low' => 'Price_High_To_Low',
        'time' => 'Less_Waiting_Time',
    ];
}
function appointRate()
{
  $app =  Appointment::where('patient_id',auth()->user()->id)->where('status','waiting_for_rating')->first();

  if(!$app)
  {
    return [null,null,null];
  }
  return [$app->id,$app->doctor_id,$app->hospital_id];
}

if (!function_exists('setSlug')) {

    /**
     * @return mixed
     */
    function setSlug($val)
    {
        return Str::slug($val,'-');
    }

}

if (!function_exists('getGateway')) {

    /**
     * @return mixed
     */
    function getGateway()
    {
       try{
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://app.fawaterk.com/api/v2/getPaymentmethods',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'GET',
          CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Authorization: Bearer 12580f76f429e721aed4ef5641fae391c5f45d0583fcc525ff'
          ),
        ));
        
        $response = curl_exec($curl);
        
        curl_close($curl);
        $pay = json_decode($response);
        return $pay->data;
       }catch(\Exception $e)
       {
return [];
       }
    }

}


