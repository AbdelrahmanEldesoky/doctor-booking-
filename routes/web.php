<?php

use App\Jobs\SendPasswordEmailJob;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use \Mcamara\LaravelLocalization\Facades\LaravelLocalization;

use App\Models\Appointment;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PaymobController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\Frontend\DoctorController;
use App\Http\Controllers\ZoomIntegrationController;
use App\Http\Controllers\Frontend\HospitalController;
use App\Http\Controllers\Frontend\SettingApiController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Second_Controller;
use GuzzleHttp\Psr7\Request;

// use Mcamara\LaravelLocalization\LaravelLocalization;
/*
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



Route::get('/dashboard', [HomeController::class, 'mySpace'])->name('dashboard')->middleware(['auth']);

Route::get('set-lang/{locale}', function ($lang) {
  \Session::put('locale', $lang);
  return redirect()->back();
})->name('set.lang');




Route::middleware(['setLocale'])->group(function () {



  Route::get('/index',[HomeController::class,'index']);
  Route::get('/wait', [HomeController::class, 'wait'])->name('wait');
  Route::get('contact', [HomeController::class, 'contact'])->name('contact');
  Route::post('contact/message', [HomeController::class, 'contactMessage'])->name('contactMessage');
  Route::post('newsletter', [HomeController::class, 'newsletter'])->name('newsletter');
  Route::get('about', [HomeController::class, 'about'])->name('about');
  // Route::get('privacy',[HomeController::class,'privacy'])->name('privacy');
  Route::get('terms', [HomeController::class, 'terms'])->name('terms');
  // Route::get('for-doctors',[HomeController::class,'doctors'])->name('doctors');


  Route::get('append/schedules', [DoctorController::class, 'appendSchedules'])->name('append.schedules');

  Route::get('/append/rate', [DoctorController::class, 'getRatings'])->name('append.rate');
  Route::get('/append/areas', [HomeController::class, 'getAreas'])->name('append.areas');
  Route::get('/valid/code', [HomeController::class, 'validCode'])->name('validCode');
  Route::get('/check', function () {
    return view('mail.doctor.register_email');
  });

  Route::as('user.')->prefix('user')->group(function () {
    Route::post('/register', [UserController::class, 'register']);
    Route::get('/appointments/{id}', [UserController::class, 'myAppointments']);
    Route::get('/profile/{id}', [UserController::class, 'getProfile']);
    Route::post('/profile', [UserController::class, 'profile']);
    Route::post('/password/update', [UserController::class, 'password']);
  });
  Route::as('doctor.')->prefix('doctor')->group(function () {
    // Route::get('/search', [DoctorController::class, 'search'])->name('search');
    Route::post('/register', [UserController::class, 'doctorRegister'])->name('doctor.register');
    Route::get('/appointment', [DoctorController::class, 'appointment'])->name('appointment');
    Route::get('/show/{id}/{slug?}', [DoctorController::class, 'show'])->name('show');
    Route::get('/telehealth/{speciality_id}', [DoctorController::class, 'telehealth']);
    // Route::get('/is/valid/slot/{schedule_id}', [DoctorController::class, 'isValidSlot']);
  });
  Route::as('hospitals.')->prefix('hospitals')->group(function () {
    Route::get('/search', [HospitalController::class, 'search'])->name('search');
    Route::get('/show/{id}', [HospitalController::class, 'show'])->name('show');
    Route::get('/appointment', [HospitalController::class, 'appointment'])->name('appointment');
  });

  Route::get('/pending/payment', [HomeController::class, 'paymentPending'])->name('paymentPending');
  Route::get('/thankyou', [HomeController::class, 'thankyou'])->name('thankyou');
  Route::get('class-end', [ZoomIntegrationController::class, 'ended'])->name('zoom.ended');

  Route::get('/rate/{appointment_id?}/{doctor_id?}', [HomeController::class, 'rate'])->name('rate');
  Route::get('/rate/{appointment_id?}/{hospital_id?}', [HomeController::class, 'hospitalRate'])->name('hospitalRate');
});



Route::post('/rate', [HomeController::class, 'rateSave'])->name('rate.save');
Route::post('/credit', [PaymentController::class, 'index'])->name('credit');
Route::get('/callback', [PaymentController::class, 'callback'])->name('callback');


require __DIR__ . '/auth.php';
require __DIR__ . '/hospital.php';
require __DIR__ . '/user.php';


// Route::get('/dashboard',[HomeController::class,'dashboard'])->name('dashboard');


Route::get('/check', function () {
  $app = Appointment::findOrFail(129);
  sendDoctorEmail($app);
  sendPatientEmail($app);
  // return view('check');

});



Route::get('join-session/{id}', [ZoomIntegrationController::class, 'joinSession'])->name('join.session');
Route::get('class-meeting', [ZoomIntegrationController::class, 'meeting'])->name('zoom.meeting');

Route::get('pl/{YWJkdmlsbGVyc2JhYmFyYXphbQ}/{id}', [HomeController::class, 'loginPatient']);


Route::get('/payment', [PaymentController::class, 'index']);
Route::get('payment/callback', [PaymentController::class, 'callback']);
Route::get('payment/error', [PaymentController::class, 'error']);





Route::group(
  [
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
  ],
  function () {
  Route::group(['middleware' => 'authenticate'], function(){

    // Route::get('login', [Second_Controller::class, 'login'])->name('login'); // Done
    // Route::post('login', [AuthenticatedSessionController::class, 'store']); // Done
  });

    Route::get('/', [Second_Controller::class, 'index'])->name('home'); // Done
    Route::get('doctor/profile/{id}/{slug?}', [Second_Controller::class, 'doctor_profile'])->name('Second_doctor_profile');
    Route::get('doctor-search', [Second_Controller::class, 'search'])->name('doctor-search');
    Route::get('booking_hospital', [Second_Controller::class, 'booking_hospital'])->name('Second_booking_hospital');
    Route::get('booking_hospital_details/{id}', [Second_Controller::class, 'booking_hospital_details'])->name('booking_hospital_details');


    ######################################## Routes For Static text ####################################################################################
    Route::get('for-doctors', [Second_Controller::class, 'doctors'])->name('doctors');
    Route::get('/conditions', [Second_Controller::class, 'conditions'])->name('Second_conditions');
    Route::get('privacy', [Second_Controller::class, 'privacy'])->name('privacy');
    ############################################################################################################################

    ###################################### Routes Middleware Authentication ################################################################
    Route::group(['middleware' => 'auth'], function () {
      Route::post('update/user/account', [Second_Controller::class, 'update_user_account'])->name('update_user_account');
      Route::get('sessions_user', [Second_Controller::class, 'sessions_user'])->name('Second_sessions_user');
      Route::get('user/appointments/show/{id}', [Second_Controller::class, 'appointments_show'])->name('user.appoint.show');
      Route::get('user_account', [Second_Controller::class, 'user_account'])->name('Second_user_account');
    });
    ################################################################################################################
  }
);

