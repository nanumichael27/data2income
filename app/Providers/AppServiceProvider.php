<?php

namespace App\Providers;

use App\Models\Job;
use App\Models\Setting;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        //
        $settings = Setting::findOrFail(1);
        View::share('settings', $settings);
        $numberOfAvailableJobs = Job::countAllAvailable();
        View::share('numberOfAvailableJobs', $numberOfAvailableJobs);
    }
}
