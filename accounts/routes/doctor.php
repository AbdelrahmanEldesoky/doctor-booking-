<?php

use App\Http\Controllers\Doctor\DashboardController;
use App\Http\Controllers\Doctor\TransactionController;
use App\Http\Controllers\Doctor\AppointmentController;
use App\Http\Controllers\Doctor\PatientController;
use App\Http\Controllers\Doctor\ReportController;
use App\Http\Controllers\Doctor\ScheduleController;
use App\Http\Controllers\Doctor\ClinicController;
use App\Http\Controllers\ZoomIntegrationController;
use Illuminate\Support\Facades\Route;

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

Route::as('doctor.')->prefix('doctor')->middleware(['auth', 'doctor', 'setLocale'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/login', [DashboardController::class, 'login'])->name('login');
    Route::get('/profile', [DashboardController::class, 'profile'])->name('profile');
    Route::post('/profile', [DashboardController::class, 'profileSave'])->name('profile');
    Route::post('/prices', [DashboardController::class, 'pricesSave'])->name('prices');
    Route::post('/clinic', [DashboardController::class, 'clinics'])->name('clinics');
    Route::post('/update/password', [DashboardController::class, 'updatePassword'])->name('update.password');

    Route::as('payments.')->prefix('payments')->group(function () {
        Route::get('/', [TransactionController::class, 'index'])->name('index');
        Route::get('/detail/{id}', [TransactionController::class, 'show'])->name('show');
        Route::post('/bank/account', [TransactionController::class, 'bankAccont'])->name('bank');
        Route::post('/mobile/account', [TransactionController::class, 'mobileAccont'])->name('mobile');
    });

    Route::post('/link/zoom', [ZoomIntegrationController::class, 'linkZoomAccount'])->name('linkZoom');
    Route::get('/create/meeting/{id}/{doctor_id}', [ZoomIntegrationController::class, 'createMeeting'])->name('create.meeting');


    // Route::as('patients.')->prefix('patients')->group(function () {
    //     Route::get('/', [DashboardController::class, 'patients'])->name('index');
    //     Route::get('/show/{id}', [DashboardController::class, 'show'])->name('show');

    // });

    Route::as('schedules.')->prefix('schedules')->group(function () {
        Route::get('/', [ScheduleController::class, 'index'])->name('index');
        Route::post('/create', [ScheduleController::class, 'createSchedule'])->name('create');
        Route::post('/bulk', [ScheduleController::class, 'createBulk'])->name('bulk');
        Route::post('/repeat', [ScheduleController::class, 'createRepeat'])->name('repeat');
        Route::delete('/destroy/{id}', [ScheduleController::class, 'destroy'])->name('destroy');
        Route::get('/edit/{id}', [ScheduleController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [ScheduleController::class, 'update'])->name('update');
    });

    Route::as('clinics.')->prefix('clinics')->group(function () {
        Route::get('/', [ClinicController::class, 'index'])->name('index');
        Route::get('/create/{id?}', [ClinicController::class, 'create'])->name('create');
        Route::post('/store', [ClinicController::class, 'store'])->name('store');
        Route::delete('/destroy/{id}', [ClinicController::class, 'destroy'])->name('destroy');
    });

    // Route::get('/reports', [DashboardController::class, 'reports'])->name('reports');
    Route::get('/ratings', [DashboardController::class, 'ratings'])->name('ratings');

    Route::as('appointments.')->prefix('appointments')->group(function () {
        Route::get('/', [AppointmentController::class, 'index'])->name('index');
        Route::post('/export', [AppointmentController::class, 'index']);
        Route::get('/show/{id}', [AppointmentController::class, 'show'])->name('show');
        Route::post('/email/{id}', [AppointmentController::class, 'email'])->name('email');
        Route::delete('cancel/{id}', [AppointmentController::class, 'cancel'])->name('cancel');
        Route::get('close/{id}', [AppointmentController::class, 'close'])->name('close');
        Route::get('accept/{id}', [AppointmentController::class, 'accept'])->name('accept');
    });

    Route::as('reports.')->prefix('reports')->group(function () {
        Route::get('/', [ReportController::class, 'index'])->name('index');
    });
    Route::as('patients.')->prefix('patients')->group(function () {
        Route::get('/', [PatientController::class, 'index'])->name('index');
        Route::get('/show/{id}', [PatientController::class, 'show'])->name('show');
    });
});
