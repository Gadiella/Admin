<?php

namespace App\Providers;

use App\Interfaces\AuthenticationInterfaces;
use App\Repositories\AuthenticationRepository;
use Illuminate\Support\ServiceProvider;

class AuthenticationServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(AuthenticationInterfaces::class, AuthenticationRepository::class);   
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
