<?php
use Carbon\Carbon;
use App\Models\User;
use App\Models\Setting;
use App\Models\Appointment;
use App\Models\Transaction;
use App\Models\Report;
use Illuminate\Support\Facades\Auth;

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
        $date[1] ?? Carbon::now()->addYears(50),
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
    $transactions =  Report::when($user== 'doctor',function($q) {
        $q->where('doctor_id',Auth::user()->id);
    })->get();

    return $transactions->count();
}

function recievedPayments($user,$type)
{
    $transactions =  Report::when($user== 'doctor',function($q) {
        $q->where('doctor_id',Auth::user()->id);
    })->when($type== 'month',function($q) {
        $q->whereMonth('created_at',Carbon::now()->month);
    })->get();

    return $transactions->sum('paid_amount');
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
if (!function_exists('getSpecialities')) {

    /**
     * @return mixed
     */
    function getSpecialities($item)
    {
        return $item->specialities ? $item->specialities->pluck('id')->toArray() : [];
    }

}
if (!function_exists('getDocAreas')) {

    /**
     * @return mixed
     */
    function getDocAreas($item)
    {
        return $item->areas ? $item->areas->pluck('id')->toArray() : [];
    }

}

function userColumns()
{
    return [
        'name',
        'name_ar',
    ];
}
function informationColumns()
{
    return [
        'clinic',
        'hospital',
        'embed_link',
        'job_title',
        'job_title_ar',
        'about',
    ];
}
function getPersentage($report,$doc)
{
    $app = $report->appointment;
    if($app->type == 'online')
    {
       if($app->user_type == 'egyption')
       {
        return $doc->percentage;
       }
       return $doc->percentage_outside;
    }
    return $doc->ofline_percentage;
}