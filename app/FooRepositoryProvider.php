<?php

namespace App;

use Illuminate\Support\ServiceProvider;

class FooRepositoryProvider extends ServiceProvider
{
    protected $defer = false;

    public function register()
    {
        $this->app->bind('\App\FooRepositoryContract', function ($app) {
            return new \App\FooRepository();
        });
    }

    public function provides()
    {
        return ['\App\FooRepositoryContract'];
        
    }
    
    public function boot()
    {
     
        
    }
}
