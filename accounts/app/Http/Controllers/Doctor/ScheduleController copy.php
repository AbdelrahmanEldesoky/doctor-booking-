<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Schedule;
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

        $from = Carbon::parse($request->from);
        $to = Carbon::parse($request->from)
            ->addMinutes($request->interval);
        if (!$this->validateSchedule($request->date, $from, $to)) {
            return response()->json(['error' => 'Please Change Your Schedule']);
        }
        $to = $to->format('H:i A');
        $request->merge(['to' => $to, 'user_id' => Auth::user()->id]);
        Schedule::create($request->all());
        $route = route('doctor.schedules.index');
        return response()->json(['success' => 'updated successfully', 'redirect_url' => $route]);

    }

    public function createBulk(Request $request)
    {
        if (!$this->validTimeOrDate($request->date_from, $request->date_to) || !$this->validTimeOrDate($request->from, $request->to)) {
            return response()->json(['error' => 'Start date or time should be less then end date or time']);
        }
        $period = CarbonPeriod::create($request->date_from, $request->date_to);
        $dates = $period->toArray();
        $from = Carbon::parse($request->from);
        $to = Carbon::parse($request->to);
        foreach ($dates as $date) {
            if ($this->validateSchedule($date, $from, $to)) {
                $request->merge(['date' => $date, 'user_id' => Auth::user()->id]);
                Schedule::create($request->all());
            }

        }
        $route = route('doctor.schedules.index');
        return response()->json(['success' => 'updated successfully', 'redirect_url' => $route]);
    }

    public function createRepeat(Request $request)
    {
        if (!$this->validTimeOrDate($request->from_time, $request->to_time)) {
            return response()->json(['error' => 'Start time should be less then end time']);
        }
        $hours = HoursHelper::create($request->from_time, $request->to_time, $request->interval, 'h:i A');
        $dates = explode(', ', $request->dates);
        foreach ($dates as $date) {
            for ($i = 0; $i <= (count($hours) - 2); $i++) {
                $start = $hours[$i] == '00:00 AM' ? '12:00 AM' : $hours[$i];
                $from = Carbon::parse($start);
                $to = Carbon::parse($hours[$i + 1]);
                if ($this->validateSchedule($date, $from, $to)) {
                    $request->merge(['date' => $date, 'user_id' => Auth::user()->id, 'from' => $from, 'to' => $to]);
                    Schedule::create($request->all());
                }
            }
        }
        $route = route('doctor.schedules.index');
        return response()->json(['success' => 'updated successfully', 'redirect_url' => $route]);
    }

    public function validateSchedule($date, $from, $to)
    {
        $schedules = Schedule::whereDate('date', $date)->where('user_id', Auth::Id())->get();
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
        Schedule::findOrFail($id)->delete();

        return redirect()->back()->with('message', 'Deleted Successfully');
    }

}
