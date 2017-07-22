<?php

namespace App\Providers\Auth;

use Illuminate\Support\ServiceProvider;

class ChangeEmailProvider extends ServiceProvider
{
    protected $defer = false;

    public function register()
    {
       
        $this->app->bind('App\Contracts\Auth\ChangeEmailContract', function ($app) {
          
            return new \App\Services\Auth\ChangeEmailService(
               $app -> make("\App\Contracts\Auth\ChangeEmailRepositoryContract")
            );
        });
        
    }

    public function provides()
    {
        return ['\App\Contracts\Auth\ChangeEmailContract'];
        
    }
    
    public function boot()
    {
     
        
    }
}
