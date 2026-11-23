<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        // PHP / Carbon: hora Colombia (sin DST).
        $timezone = config('app.timezone', 'America/Bogota');
        date_default_timezone_set($timezone);
        Carbon::setLocale(config('app.locale', 'es'));
    }
}
