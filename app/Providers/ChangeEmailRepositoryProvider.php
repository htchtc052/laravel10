<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Logic\Auth\ChangeEmailRepository;

class ChangeEmailRepositoryProvider extends ServiceProvider
{
    protected $defer = false;

    public function register()
    {
       
        $this->app->bind('App\Logic\Auth\ChangeEmailRepositoryContract', function ($app) {
           
            return new ChangeEmailRepository();
        });
    }

    public function provides()
    {
        return ['App\Logic\Auth\ChangeEmailRepository'];
        
    }
    
    public function boot()
    {
     
        
    }
}
