<?php

namespace App\Http\Controllers\Auth;

use \App\User;
use \App\Http\Controllers\Controller;
use \App\Logic\Auth\ActivationService;
use \App\Exceptions\ActivateUserNotFoundException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;

class ActivateController extends Controller
{
    
    public function __construct(ActivationService $activationService)
    {
        $this->activationService = $activationService;
    }
    
    public function showPage()
    {
       
        $data = [
                'title' => 'Activation',  
                'pageclass' => 'activate',
            ];  
        
        return view('auth.activate', $data);
        
    }
    
    public function showError()
    {
        $data = [
            'title' => 'Activation',  
            'pageclass' => 'activate_error',
        ];  
        
        return view('auth.activate_error', $data);
        
    }
    
    public function sendActivate()
    {
        $user = \Auth::user();
        
        $this->activationService->sendActivationMail($user);
        
        return redirect()->route('activate')->with('message', 'Activation link sended');
    }
    
    public function activateUser($token)
    {
        $email = Request::get('email');
        
        try {
           $user = $this->activationService->activateUser($token, $email);
        }
        catch (\App\Exceptions\ActivateUserNotFoundException $e) {
            return redirect()->route('activate_error')
                ->with('status', 'Activation Error');
        }
        
        Auth::login($user);
       
        return redirect()->route('home')
            ->with('status', 'You successfully activated your email!');
    }
    
}