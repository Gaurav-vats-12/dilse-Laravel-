<?php

namespace App\Providers;
use Illuminate\Pagination\Paginator;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        Blade::directive('lang_u', function ($s) {
            return "<?php echo ucfirst(trans($s)); ?>";
        });
    

        Paginator::useBootstrap();

        Blade::directive('capture', function ($expression) {
            return "<?php ob_start(); ?>";
        });


        Blade::directive('endcapture', function ($expression) {
            return "<?php \$__captured = ob_get_clean(); echo \$__captured; ?>";
        });
    }
}
