<?php

namespace App\Http\Controllers\Home\Account;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\ResetsPasswords;
use App\Logic\Home\ChangeEmailContract;

class EmailController extends Controller
{
 
    public function showForm(Request $request, \App\Logic\Auth\ChangeEmailContract $service)
    {
       dd($service);
        
        return view('home.account.email')->with([
                'title' => 'Change email',
                'pageclass' => 'home_account_email',
            ]
        );
    }
    
    public function saveForm(Request $request, ChangeEmailContract $changeEmailService)
    {
        $user = Auth::user();
        
        $rules = [
            'email' => 'required|email|unique:users',
            'password' => 'required|checkpassword:'.$user->email,
        ];
        
        $messages = [
            'email.required' => 'Please enter an email address',
            'email.email' => 'Please enter a valid email address',
            'email.unique' => 'This e-mail is already taken. ',
            'password.required' => 'Please enter your password',
            'password.checkpassword' => 'Your enter wrong password',
            
        ];
        
        
        Validator::make($request::all(), $rules, $messages)->validate();
        
        $user = $changeEmailService->sendChangeEmailMail($user, Request::get('email'));
        
        return redirect()->route('home')->with('status', "Confirmation change E-mail link send to ".Request::get('email'));
    }
    
    public function emailSet($token)
    {
        $email = Request::get('email');
        
        try {
           $user = $this->emailChangeService->setEmail($token, $email);
        }
        catch (\App\Exceptions\EmailChangeNotFoundException $e) {
            return redirect()->route('home')
                ->with('status', 'Email change link error');
        }
        
        Auth::login($user);
       
        return redirect()->route('home')
            ->with('status', 'You successfully activated your email!');
    }
  
}
