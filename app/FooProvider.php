<?php

namespace App;

use Illuminate\Support\ServiceProvider;

class FooProvider extends ServiceProvider
{
    protected $defer = false;

    public function register()
    {
        $this->app->bind('App\FooContract', function ($app) {
          
            return new \App\FooService(
                $app -> make("\App\FooRepositoryContract")
            );
        });
    }
    
    public function provides()
    {
        return ['\App\Foo'];
        
    }
    
    public function boot()
    {
     
        
    }
}
