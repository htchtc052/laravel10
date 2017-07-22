<?php

namespace App\Http\Controllers\Auth;

use \App\User;
use \App\Contracts\Auth\ActivateEmailContract;
use \App\Http\Controllers\Controller;
use \App\Exceptions\ActivateUserNotFoundException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;

class ActivateController extends Controller
{
    public function showPage()
    {
       
        $data = [
                'title' => 'Activation',  
                'pageclass' => 'activate',
            ];  
        
        return view('auth.activate', $data);
        
    }
    
    public function sendActivate(ActivateEmailContract $activateEmailService)
    {
        $user = \Auth::user();
        
        $activateEmailService->sendActivationMail($user);
        
        return redirect()->route('activate')->with('message', 'Activation link sended to email '.$user->email);
    }
    
    public function activateUser($token, ActivateEmailContract $activateEmailService)
    {
        $email = Request::get('email');
        
        try {
           $user = $activateEmailService->activateUser($token, $email);
        }
        catch (\App\Exceptions\ActivateUserNotFoundException $e) {
            return redirect()->route('activate')
                ->with('status', $e->getMessage());
        }
        
        Auth::login($user);
       
        return redirect()->route('home')
            ->with('status', 'You successfully activated your email!');
    }
    
}