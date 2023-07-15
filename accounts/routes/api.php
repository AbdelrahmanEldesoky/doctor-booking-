<?php

use App\Http\Controllers\Frontend\DoctorController;
use App\Http\Controllers\Frontend\HospitalController;
use App\Http\Controllers\Frontend\SettingApiController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();

});
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('logout', [UserController::class, 'logout']);
});
Route::post('login', [UserController::class, 'login']);


Route::as('user.')->prefix('user')->group(function () {
    Route::post('/register', [UserController::class, 'register']);
    Route::get('/appointments/{id}', [UserController::class, 'myAppointments']);
    Route::get('/profile/{id}', [UserController::class, 'getProfile']);
    Route::post('/profile', [UserController::class, 'profile']);
    Route::post('/password/update', [UserController::class, 'password']);

});
Route::as('doctor.')->prefix('doctor')->group(function () {
    Route::get('/search', [DoctorController::class, 'search'])->name('search');
    Route::post('/register', [UserController::class, 'doctorRegister']);
    Route::post('/appointment', [DoctorController::class, 'appointment']);
    Route::get('/show/{id}', [DoctorController::class, 'show']);
    Route::get('/telehealth/{speciality_id}', [DoctorController::class, 'telehealth']);
    // Route::get('/is/valid/slot/{schedule_id}', [DoctorController::class, 'isValidSlot']);

    
});
Route::as('hospitals.')->prefix('hospitals')->group(function () {
    Route::get('/search', [HospitalController::class, 'search'])->name('search');
});
Route::get('/specialities', [SettingApiController::class, 'specialities'])->name('specialities');
Route::get('/countries', [SettingApiController::class, 'countries'])->name('countries');
Route::get('/cities', [SettingApiController::class, 'cities'])->name('cities');
