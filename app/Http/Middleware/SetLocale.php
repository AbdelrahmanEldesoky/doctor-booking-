<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // dd(\Config::get('app.locale'),Session::get('locale'));
        if (!Session::has('locale'))
        {
            Session::put('locale', Config::get('app.locale'));
        }
        app()->setLocale(Session::get('locale'));
        return $next($request);
    }
}
