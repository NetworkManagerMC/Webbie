<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BladeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('echoIf', function (string $expression) {
            list($expression, $value) = explode(',', $expression);

            return "<?php echo ({$expression} ? {$value} : '') ?>";
        });
    }
}
