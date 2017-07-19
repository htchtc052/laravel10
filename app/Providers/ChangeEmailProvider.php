<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Logic\Auth\ChangeEmailService;

class ChangeEmailProvider extends ServiceProvider
{
    protected $defer = false;

    public function register()
    {
       
        $this->app->bind('App\Logic\Auth\ChangeEmailContract', function ($app) {
           
            return new ChangeEmailService(
            
                $app -> make("App\Logic\Auth\ChangeEmailRepositoryContract")
            );
        });
        
        
         ///$this->app->resolving(\App\Logic\Auth\ActivationService::class, function (ActivationService $activationService, $app) {
         // $user = \App\User::find(1);
         // dd("fooBar", $activationService->sendActivationMail($user));
       // });
    }

    public function provides()
    {
        return ['App\Logic\Auth\ChangeEmailContract'];
        
    }
    
    public function boot()
    {
     
        
    }
}
