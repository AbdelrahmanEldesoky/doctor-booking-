<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HospitalController;
use App\Http\Controllers\Admin\AreaController;
use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\Admin\HospitalImageController;
use App\Http\Controllers\Admin\HospitalRoomController;

use App\Http\Controllers\Admin\AppointmentController;
use App\Http\Controllers\Admin\PatientController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PromoController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SpecialityController;

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

Route::as('admin.')->prefix('admin')->middleware(['auth', 'admin'])->group(function () {

    Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');
    Route::get('/login', [DashboardController::class,'login'])->name('login');
     Route::get('/profile', [DashboardController::class, 'profile'])->name('profile');
    Route::post('/profile', [DashboardController::class, 'profileSave'])->name('profile');
    Route::post('/update/password', [DashboardController::class, 'updatePassword'])->name('update.password');

    Route::get('/revenue', [DashboardController::class,'revenue'])->name('revenue.index');
    
    Route::get('/ratings', [DashboardController::class,'ratings'])->name('ratings.index');
    Route::delete('/ratings/{id}', [DashboardController::class,'ratingsDestroy'])->name('ratings.destroy');

    Route::as('doctors.')->prefix('doctors')->group(function () {
        Route::get('/', [DoctorController::class,'index'])->name('index');
        Route::get('create/{id?}', [DoctorController::class,'create'])->name('create');
        Route::post('store', [DoctorController::class,'store'])->name('store');
        Route::get('/show/{id}', [DoctorController::class,'show'])->name('show');
        Route::delete('/destroy/{id}', [DoctorController::class,'destroy'])->name('destroy');
        Route::get('/status/{id}', [DoctorController::class,'toggleStatus'])->name('status');
        Route::get('/dashboard/{id}', [DoctorController::class,'dashboard'])->name('dashboard');
    });

    Route::as('patients.')->prefix('patients')->group(function () {
        Route::get('/', [PatientController::class, 'index'])->name('index');
        Route::get('/show/{id}', [PatientController::class, 'show'])->name('show');
        Route::get('/edit/{id}', [PatientController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [PatientController::class, 'update'])->name('update');
    });

    Route::as('appointments.')->prefix('appointments')->group(function () {
        Route::get('/', [AppointmentController::class, 'index'])->name('index');
        Route::post('/export', [AppointmentController::class, 'index']);
        Route::get('/show/{id}', [AppointmentController::class, 'show'])->name('show');
    });
    Route::as('specialities.')->prefix('specialities')->group(function () {
        Route::get('/', [SpecialityController::class,'index'])->name('index');
        Route::post('/create/{id?}', [SpecialityController::class,'create'])->name('create');
        Route::delete('/destroy/{id?}', [SpecialityController::class,'delete'])->name('destroy');
    });
    Route::as('promocodes.')->prefix('promocodes')->group(function () {
        Route::get('/', [PromoController::class,'index'])->name('index');
        Route::post('/create/{id?}', [PromoController::class,'create'])->name('create');
        Route::delete('/destroy/{id?}', [PromoController::class,'delete'])->name('destroy');
    });

    Route::post('/save/counter', [DashboardController::class,'rateCounter'])->name('save.ratecounter');
    Route::get('/append/areas', [HospitalController::class,'getAreas'])->name('append.areas');
    Route::get('hospitals/appointments/{id}', [HospitalController::class,'myAppointments'])->name('hospitals.appointments');
    Route::get('hospitals/appointments/status/{id}', [HospitalController::class,'myAppointmentsStatus'])->name('hospitals.appointments.status');
    Route::resource('/hospitals', HospitalController::class);

    Route::as('hospital_images.')->prefix('hospital_images')->group(function () {
        Route::get('/', [HospitalImageController::class,'index'])->name('index');
        Route::post('/store/{hospital_id}/{id?}', [HospitalImageController::class,'store'])->name('store');
        Route::delete('/destroy/{id}', [HospitalImageController::class,'destroy'])->name('destroy');
    });
    Route::as('hospital_rooms.')->prefix('hospital_rooms')->group(function () {
        Route::get('/', [HospitalRoomController::class,'index'])->name('index');
        Route::post('/store/{hospital_id}/{id?}', [HospitalRoomController::class,'store'])->name('store');
        Route::delete('/destroy/{id}', [HospitalRoomController::class,'destroy'])->name('destroy');
    });
    // Route::resource('/hospital_images', HospitalImageController::class);
    // Route::resource('/hospital_rooms', HospitalRoomController::class);
    Route::resource('/areas', AreaController::class);

    /*
    |--------------------------------------------------------------------------
    | DOCTOR ROUTES
    |--------------------------------------------------------------------------
    */
    // Route::as('doctors.')->prefix('doctors')->group(function () {
    //     Route::get('/', [DashboardController::class,'doctors'])->name('index');
    //     Route::get('/show/{id}', [DashboardController::class,'show'])->name('show');
    // });

    /*
    |--------------------------------------------------------------------------
    | SETTING & CMS ROUTES
    |--------------------------------------------------------------------------
    */
    Route::name('setting.')->prefix('setting')->group(function () {

        Route::get('/', [SettingController::class,'index'])->name('index');
        Route::get('/newsletter', [SettingController::class,'news'])->name('news');
        Route::get('/messages', [SettingController::class,'messages'])->name('messages');
        Route::get('/message/show/{id}', [SettingController::class,'messageShow'])->name('messages.show');
        Route::post('update', [SettingController::class,'update'])->name('update');

     });
    Route::name('notifications.')->prefix('notifications')->group(function () {
        Route::get('/', [SettingController::class,'notifications'])->name('index');
        Route::get('/show/{id}', [SettingController::class,'notificationDetail'])->name('show');

     });


});
