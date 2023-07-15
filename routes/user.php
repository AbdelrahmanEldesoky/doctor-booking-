<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\AppointmentController;

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

Route::as('user.')->prefix('user')->middleware(['auth', 'user','setLocale'])->group(function () {
    // Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');

    Route::get('/profile', [DashboardController::class, 'profile'])->name('profile');
    Route::post('/profile', [DashboardController::class, 'profileSave'])->name('profile');
    Route::post('/update/password', [DashboardController::class, 'updatePassword'])->name('update.password');

    Route::as('appointments.')->prefix('appointments')->group(function () {
        Route::get('/', [AppointmentController::class, 'index'])->name('index');
        Route::post('/export', [AppointmentController::class, 'index']);
        Route::get('/show/{id}', [AppointmentController::class, 'show'])->name('show');
    });
  });
