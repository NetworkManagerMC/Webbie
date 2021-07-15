<?php

namespace App\Providers;

use Illuminate\Support\Str;
use Illuminate\Support\ServiceProvider;

class MacroProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Str::macro('uniqueId', function (int $length = 8) {
            $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

            $id = '';

            for ($index = 0; $index < $length; $index++) {
                $id .= $characters[rand(0, strlen($characters) - 1)];
            }

            return $id;
        });
    }
}
