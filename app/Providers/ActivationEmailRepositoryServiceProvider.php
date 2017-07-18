<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Logic\Auth\ActivationEmailRepository;

class ActivationEmailRepositoryServiceProvider extends ServiceProvider
{
    protected $defer = false;

    public function register()
    {
        $this->app->bind('App\Logic\Auth\ActivationEmailRepositoryContract', function ($app) {
            return new ActivationEmailRepository();
        });
    }

    public function provides()
    {
        return ['App\Logic\Auth\ActivationEmailRepositoryContract'];
        
    }
    
    public function boot()
    {
     
        
    }
}
