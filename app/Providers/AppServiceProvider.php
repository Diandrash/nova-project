<?php
// File: App\Providers\AppServiceProvider.php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Set batas maksimum listener untuk EventEmitter
        ini_set('default_socket_timeout', 15);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

