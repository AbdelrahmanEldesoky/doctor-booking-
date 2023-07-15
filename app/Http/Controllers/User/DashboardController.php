<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\DataTables\Doctor\RatingDataTable;

class DashboardController extends Controller
{
    public function index()
    {
        return redirect()->route('user.appointments.index');
    }
    
    public function login()
    {
        return view('auth.login');
    }


    public function show($id)
    {
        $user = User::findOrFail($id);
        $doctors = User::where('role', 'doctor')->get();

        return view('user.patients.show', get_defined_vars());
    }

    public function profile()
    {
        $user = Auth::user();

        return view('user.settings.profile', get_defined_vars());
    }

    public function profileSave(Request $request)
    {
        if ($request->file('profile_image')) {
            $image = media($request->profile_image, 'uploads/images');
            $request->merge(['image' => $image]);
        }
        User::findOrFail(Auth::user()->id)->update($request->all());
        return redirect()->back()->with('message', 'Updated successfully');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'password' => ['required', 'confirmed'],
        ]);
        $user = User::findOrFail(Auth::user()->id);
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->back()->with('message', 'Updated successfully');
    }
}
