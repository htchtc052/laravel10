<?php

namespace App\Providers\Auth;

use Illuminate\Support\ServiceProvider;

class ChangeEmailRepositoryProvider extends ServiceProvider
{
    protected $defer = false;

    public function register()
    {
        $this->app->bind('\App\Contracts\Auth\ChangeEmailRepositoryContract', function ($app) {
            return new \App\Repositories\Auth\ChangeEmailRepository();
        });
    }

    public function provides()
    {
        return ['\App\Contracts\Auth\ChangeEmailRepositoryContract'];
        
    }
    
    public function boot()
    {
     
        
    }
}
