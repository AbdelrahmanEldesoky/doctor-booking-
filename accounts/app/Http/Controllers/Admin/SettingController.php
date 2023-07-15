<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\DataTables\Admin\NotificationDataTable;
use App\DataTables\Admin\NewsLetterDataTable;
use App\DataTables\Admin\MessageDataTable;
use App\Models\DoctorLog;
use App\Models\Setting;
use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SettingController extends Controller
{
    public function index()
    {
        return view('admin.setting.index');
    }
    public function update(Request $request)
    {


        $setting = $request->except('_token');
        foreach ($setting as $key => $value) {
            if (empty($value))
                continue;
            $set = Setting::where('key', $key)->first() ?: new Setting();
            $set->key = $key;
            $set->value = $value;
            $set->save();

            if ($request->hasFile($key)) {
                $existing = Setting::where('key', '=', $key)->first();
                if ($existing) {
                    $ex_path = "uploads/cms/".$existing->setting;
                    if (File::exists($ex_path)) {
                        File::delete($ex_path);
                    }
                    $image = $request->file($key);
                    $name = $image->getClientOriginalName();
                    $image->move('uploads/cms/', $name);
                    Setting::where('key', '=', $key)->update([
                        'value' => "uploads/cms/".$name
                    ]);
                }
            }
        }
        return redirect()->back()->with('message', 'The settings has been updated.');
    }

    /**
     * Display a listing of the resource.
     * @param AppointmentsDataTable $dataTable
     * @return Renderable
     */
    public function news(NewsLetterDataTable $dataTable)
    {
        $assets = ['data-table'];


        return $dataTable->render('admin.setting.news', get_defined_vars());
    }
    /**
     * Display a listing of the resource.
     * @param AppointmentsDataTable $dataTable
     * @return Renderable
     */
    public function messages(MessageDataTable $dataTable)
    {
        $assets = ['data-table'];


        return $dataTable->render('admin.setting.messages', get_defined_vars());
    }
    /**
     * Display a listing of the resource.
     * @param AppointmentsDataTable $dataTable
     * @return Renderable
     */
    public function messageShow($id)
    {
        $m = ContactMessage::findOrFail($id);

        return view('admin.setting.messageShow', get_defined_vars());
    }
   
    public function notifications(NotificationDataTable $dataTable)
    {
        $assets = ['data-table'];

        return $dataTable->render('admin.notifications.index', get_defined_vars());
    }
    public function notificationDetail($id)
    {
        $log = DoctorLog::findOrFail($id);
        $doc = $log->doctor;
        $data = json_decode($log->data);
        $schedule = $log->schedule;
        return view('admin.notifications.show', get_defined_vars());
    }
}
