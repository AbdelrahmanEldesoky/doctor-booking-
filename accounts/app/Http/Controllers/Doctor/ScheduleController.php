<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
use App\Models\DoctorLog;
use App\Models\DoctorClinic;
use App\Traits\Admin\SearchModelTrait;
use App\DataTables\Doctor\ScheduleDataTable;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Label84\HoursHelper\Facades\HoursHelper;

class ScheduleController extends Controller
{
    public function index(ScheduleDataTable $dataTable,Request $request)
    {
        $clinics = DoctorClinic::where('is_show',1)->where('doctor_id',Auth::user()->id)->get();
        Session::forget('date');
        if($request->date)
        {
            Session::put('date',$request->date);
        }
        $assets = ['data-table'];
        return $dataTable->render('doctor.schedules.index', get_defined_vars());
    }

    public function createSchedule(Request $request)
    {
        $clinic_id  = $request->clinic_id;
        $from = Carbon::parse($request->from);
        $to = Carbon::parse($request->from)
            ->addMinutes($request->interval);

        if (!$this->validateSchedule($request->date, $from, $to,$clinic_id)) {

            return response()->json(['error' => 'Please Change Your Schedule']);
        }

        $to = $to->format('h:i A');
        
        $request->merge(['to' => $to, 'user_id' => Auth::user()->id]);
        Schedule::create($request->all());
        $route = route('doctor.schedules.index');
        return response()->json(['success' => 'updated successfully', 'redirect_url' => $route]);

    }

    
    public function createBulk(Request $request)
    {
        $clinic_id  = $request->clinic_id;
        $from = Carbon::parse($request->from);
        $to = Carbon::parse($request->to);
  
        if (!$this->validateSchedule($request->date, $from, $to,$clinic_id)) {
            return response()->json(['error' => 'Please Change Your Schedule']);
        }
                $request->merge(['date' => $request->date, 'user_id' => Auth::user()->id]);
                Schedule::create($request->all());
        $route = route('doctor.schedules.index');
        return response()->json(['success' => 'updated successfully', 'redirect_url' => $route]);
    }

    public function createRepeat(Request $request)
    {
        $clinic_id  = $request->clinic_id;
        if (!$this->validTimeOrDate($request->from_time, $request->to_time)) {
            return response()->json(['error' => 'Start time should be less then end time']);
        }
        $hours = HoursHelper::create($request->from_time, $request->to_time, $request->interval, 'h:i A');
        
            for ($i = 0; $i <= (count($hours) - 2); $i++) {
                $start = $hours[$i] == '00:00 AM' ? '12:00 AM' : $hours[$i];
                $from = $start;
                $to = $hours[$i + 1];
                if ($this->validateSchedule($request->date, Carbon::parse($from), Carbon::parse($to),$clinic_id)) {
                    $request->merge(['date' => $request->date, 'user_id' => Auth::user()->id, 'from' => $from, 'to' => $to]);
                    Schedule::create($request->all());
                }
            }
        
        $route = route('doctor.schedules.index');
        return response()->json(['success' => 'updated successfully', 'redirect_url' => $route]);
    }

    public function validateSchedule($date, $from, $to,$clinic_id = null)
    {
        // dd($date, $from, $to,$clinic_id);
        $schedules = Schedule::where('is_show',1)->where('date', $date)->where('user_id', Auth::Id())->get();
        if($clinic_id)
        {
            $schedules = Schedule::where('is_show',1)->where('date', $date)->where('user_id', Auth::Id())->where('clinic_id',$clinic_id)->get();
        }

        if (count($schedules) > 0) {
            $start_time = $from;
            $end_time = $to;
            foreach ($schedules as $slot) {
                $to_slot = $slot->to == '00:30 AM' ? '12:30 AM' : $slot->to;
                $start_slot = Carbon::parse($slot->from);
                $end_slot = Carbon::parse($to_slot);
                if ((($start_time->gte($start_slot) && $start_time->lt($end_slot)) || ($end_time->gt($start_slot) && $end_time->lte($end_slot)))) {
                    return false;
                }
                  if (( ($start_slot->gte($start_time) && $end_slot->lte($end_time)) )) {
                    return false;
                }
            }
        }
        return true;
    }
    
       public function validateScheduleUpdate($date, $from, $to,$id,$clinic_id = null)
    {
        // dd($date, $from, $to,$clinic_id);
        $schedules = Schedule::where('id','!=',$id)->where('is_show',1)->where('date', $date)->where('user_id', Auth::Id())->get();
        if($clinic_id)
        {
            $schedules = Schedule::where('id','!=',$id)->where('is_show',1)->where('date', $date)->where('user_id', Auth::Id())->where('clinic_id',$clinic_id)->get();
        }
    //  dd($schedules);
        if (count($schedules) > 0) {
            $start_time = $from;
            $end_time = $to;
            foreach ($schedules as $slot) {
                $to_slot = $slot->to == '00:30 AM' ? '12:30 AM' : $slot->to;
                $start_slot = Carbon::parse($slot->from);
                $end_slot = Carbon::parse($to_slot);
          
                if ((($start_time->gte($start_slot) && $start_time->lt($end_slot)) || ($end_time->gt($start_slot) && $end_time->lte($end_slot)))) {
                    return false;
                }
                 if (( ($start_slot->gte($start_time) && $end_slot->lte($end_time)) )) {
                    return false;
                }
            }
        }
        return true;
    }

    public function validTimeOrDate($from, $to)
    {
        $from = Carbon::parse($from);
        $to = Carbon::parse($to);
        if ($from->gte($to)) {
            return false;
        }
        return true;
    }

    public function destroy($id)
    {
        Schedule::findOrFail($id)->update(['is_show' => 0]);

        return redirect()->back()->with('message', 'Deleted Successfully');
    }
    public function edit($id)
    {
        $clinics = DoctorClinic::where('doctor_id',Auth::user()->id)->get();
        $schedule = Schedule::findOrFail($id);
        $view = view('doctor.schedules.appendSchedule', get_defined_vars())->render();
        return response()->json(['view' => $view]);
    }
    public function update(Request $request, $id)
    {
        $changes=[];
        $sch = Schedule::findOrFail($id);
        $from = Carbon::parse($request->from);
        $to = Carbon::parse($request->to);
        $sch_from = Carbon::parse($sch->from);
        $sch_to = Carbon::parse($sch->to);
  
        if(!$sch_from->eq($from)  || !$sch_to->eq($to))
        {
            if(!$sch_from->eq($from) )
            {
                $changes['from'] = $sch->from;
            }
            if(!$sch_to->eq($to) )
            {
                $changes['to'] = $sch->to;
            }
            if (!$this->validateScheduleUpdate($request->date, $from, $to,$id,$request->clinic_id)) {
                return response()->json(['error' => 'Please Change Your Schedule']);
            }
        }
       
        $request->merge(['date' => $request->date, 'user_id' => Auth::user()->id]);
        $this->isChangedFields($sch,$request,$changes);
        Schedule::findOrFail($id)->update($request->all());
        $route = route('doctor.schedules.index');
        return response()->json(['success' => 'updated successfully', 'redirect_url' => $route]);
    }

    public function isChangedFields($sch,$request,$changes)
    {
       if($sch->date != $request->date)
       {
          $changes['date'] = $sch->date;
       }
       if($sch->schedule_type != $request->schedule_type)
       {
          $changes['schedule_type'] = $sch->schedule_type;
       }
       if($sch->session_price != $request->session_price)
       {
          $changes['session_price'] = $sch->session_price;
       }
       if($sch->session_price_outside != $request->session_price_outside)
       {
          $changes['session_price_outside'] = $sch->session_price_outside;
       }
       if(count($changes) > 0)
       {
        DoctorLog::create(['type' => 'schedule','doctor_id' => $sch->user_id,'schedule_id' => $sch->id,'data' => json_encode($changes)]);
       }

    }

}
