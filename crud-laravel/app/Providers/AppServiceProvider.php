<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // para usas el paginador de bootstrap 5 
        //obliga el uso de bootstrap 5 en el paginador en lugar de el default
        Paginator::useBootstrapFive();
    }
}
