<?php

namespace App\Providers;

use App\Models\Setting;
use Illuminate\Support\ServiceProvider;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Session;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function ($view) {
            $view->with(
                'setting', Setting::pluck('value', 'key')->toArray());
        });

        ResetPassword::toMailUsing(function ($user, string $token) {
            Session::put('sent_email',true);
            $mail = new MailMessage;
            $mail->subject('Reset Password Notification');
            $mail->markdown('mail.reset', ['url' => 'https://accounts.ipersona.me/reset-password/'.$token.'?email='.$user->email]);
            return $mail;
        });
    }
}
