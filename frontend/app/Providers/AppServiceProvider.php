<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
     if (str_contains(request()->url(), 'ngrok-free')) {
        \Illuminate\Support\Facades\URL::forceScheme('https');
    }    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
