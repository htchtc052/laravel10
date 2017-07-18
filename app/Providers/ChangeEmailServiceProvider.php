<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Logic\Auth\ActivationEmailService;

class ChangeEmailServiceProvider extends ServiceProvider
{
    protected $defer = false;

    public function register()
    {
        $this->app->bind('App\Logic\Auth\ChangeEmailContract', function ($app) {
            return new ChangeEmailService(
                $app -> make("App\Logic\Auth\ChangeEmailRepositoryContract")
            );
        });
        
    }

    public function provides()
    {
        return ['App\Logic\Auth\ActivationEmailContract'];
        
    }
    
    public function boot()
    {
     
        
    }
}
