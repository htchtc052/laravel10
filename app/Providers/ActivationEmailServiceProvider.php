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
            dd(333);
            return new ActivationEmailService(
            
                $app -> make("App\Logic\Auth\ActivationEmailRepositoryContract")
            );
        });
        
        
         ///$this->app->resolving(\App\Logic\Auth\ActivationService::class, function (ActivationService $activationService, $app) {
         // $user = \App\User::find(1);
         // dd("fooBar", $activationService->sendActivationMail($user));
       // });
    }

    public function provides()
    {
        return ['App\Logic\Auth\ActivationEmailContract'];
        
    }
    
    public function boot()
    {
     
        
    }
}
