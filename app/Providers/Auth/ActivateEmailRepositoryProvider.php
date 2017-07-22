<?php

namespace App\Providers\Auth;

use Illuminate\Support\ServiceProvider;

class ActivateEmailRepositoryProvider extends ServiceProvider
{
    protected $defer = false;

    public function register()
    {
        $this->app->bind('\App\Contracts\Auth\ActivateEmailRepositoryContract', function ($app) {
            return new \App\Repositories\Auth\ActivateEmailRepository();
        });
    }

    public function provides()
    {
        return ['\App\Contracts\Auth\ActivateEmailRepositoryContract'];
        
    }
    
    public function boot()
    {
     
        
    }
}
