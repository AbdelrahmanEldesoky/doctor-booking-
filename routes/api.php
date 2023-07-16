<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Api\ApisController;
use App\Http\Controllers\Api\AuthApiController;
use App\Http\Controllers\Frontend\DoctorController;
use App\Http\Controllers\Frontend\HospitalController;
use App\Http\Controllers\Frontend\SettingApiController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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


Route::post('payment/callback_json', [PaymentController::class, 'fawaterkWebhook']);



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
 //   Route::get('/search', [DoctorController::class, 'search'])->name('search');
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







// ##############################################################################################

Route::group(['middleware' => ['api','changeLanguage'], 'namespace' => 'Api'], function () {



        Route::get('/', [ApisController::class, 'index']);
        Route::get('doctor/search', [ApisController::class, 'search']);
        Route::get('doctor/profile/{id}/{slug?}', [ApisController::class, 'doctor_profile']);
        Route::get('booking/hospital', [ApisController::class, 'booking_hospital']);
        Route::get('booking/hospital/details/{id}', [ApisController::class, 'booking_hospital_details'])->name('booking_hospital_details');

        ###################################### Routes Middleware Authentication ################################################################
        Route::group(['middleware' => 'jwt.verify'], function () {
            Route::get('sessions/user', [ApisController::class, 'sessions_user']);
            Route::post('update/user/account', [ApisController::class, 'update_user_account']);
            Route::get('user/account', [ApisController::class, 'user_account']);
            Route::get('user/appointments/show/{id}', [ApisController::class, 'appointments_show']);
        });
        ################################################################################################################
    }
);
// ##############################################################################################

Route::group([

    'middleware' => 'api',
    'prefix' => 'ipersona/auth'

], function ($router) {

    Route::post('register', [AuthApiController::class, 'register']);
    Route::post('login', [AuthApiController::class, 'login']);
    Route::post('logout', [AuthApiController::class, 'logout']);
    Route::post('refresh', [AuthApiController::class, 'refresh']);
    Route::post('me', [AuthApiController::class, 'me']);
});
