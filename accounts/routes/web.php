<?php

use App\Jobs\SendPasswordEmailJob;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PaymobController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Frontend\DoctorController;
use App\Http\Controllers\ZoomIntegrationController;
use App\Http\Controllers\Frontend\HospitalController;
use App\Http\Controllers\Frontend\SettingApiController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/dashboard', [HomeController::class,'mySpace'])->name('dashboard')->middleware(['auth']);
Route::get('/invoice/{id}', [HomeController::class,'invoice'])->name('invoice');
Route::get('/invoice/save/{id}', [HomeController::class,'invoiceDownload'])->name('invoiceDownload');


Route::get('/append/areas',[HomeController::class,'getAreas'])->name('append.areas');

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
require __DIR__.'/doctor.php';
require __DIR__.'/hospital.php';
require __DIR__.'/user.php';


Route::get('class-meeting', [ZoomIntegrationController::class, 'meeting'])->name('zoom.meeting');
Route::get('class-end', [ZoomIntegrationController::class, 'ended'])->name('zoom.ended');



Route::get('set-lang/{locale}', function ($lang) {
    \Session::put('locale', $lang);
    return redirect()->back();
})->name('set.lang');
