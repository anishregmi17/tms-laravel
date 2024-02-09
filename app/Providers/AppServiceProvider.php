<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // paginator::useBootstrapFive();
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        paginator::useBootstrapFive();
    }
}
