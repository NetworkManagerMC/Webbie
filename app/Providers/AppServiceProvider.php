<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('installed', function ($app) {
            return env('MANAGER_DB_HOST', false) &&
                   env('MANAGER_DB_DATABASE', false) &&
                   env('MANAGER_DB_USERNAME', false) &&
                   env('MANAGER_DB_PASSWORD', false);
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
