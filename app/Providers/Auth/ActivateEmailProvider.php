<?php

namespace App\Providers\Auth;

use Illuminate\Support\ServiceProvider;

class ActivateEmailProvider extends ServiceProvider
{
    protected $defer = false;

    public function register()
    {
        $this->app->bind('App\Contracts\Auth\ActivateEmailContract', function ($app) {
          
            return new \App\Services\Auth\ActivateEmailService(
                $app -> make("\App\Contracts\Auth\ActivateEmailRepositoryContract")
            );
        });
    }
    
    public function provides()
    {
        return ['App\Contracts\Auth\ActivateEmailContract'];
        
    }
    
    public function boot()
    {
     
        
    }
}
