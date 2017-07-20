<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Logic\Auth\ActivationEmailService;

class ActivationEmailServiceProvider extends ServiceProvider
{
    protected $defer = false;

    public function register()
    {
        $this->app->bind('App\Logic\Auth\ActivationEmailContract', function ($app) {
            return new ActivationEmailService(
            
                $app -> make("App\Logic\Auth\ActivationEmailRepositoryContract")
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
