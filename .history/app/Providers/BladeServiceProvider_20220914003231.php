<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BladeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::if('admin', function () {
            $user = auth()->user();
            return ($user->isAdmin());
        });

        Blade::if('manager', function () {
            $user = auth()->user();
            return ($user->isManager() || $user->isAdmin());
        });

        Blade::if('staff', function () {
            $user = auth()->user();
            return ($user->isStaff() || $user->isManager() || $user->isAdmin());
        });
    }
}