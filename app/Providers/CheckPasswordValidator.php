<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class CheckPasswordValidator extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Validator::extend('checkpassword', function ($attribute, $value, $parameters, $validator) {
        
        if (Auth::attempt(array('email' => $parameters[0], 'password' => $value))){
                return true;
            }else{
                return false;
            }
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
