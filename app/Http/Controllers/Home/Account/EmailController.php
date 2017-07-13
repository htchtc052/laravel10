<?php

namespace App\Http\Controllers\Home\Account;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\ResetsPasswords;

class EmailController extends Controller
{
    
    public function showForm(Request $request)
    {
        return view('home.account.email')->with([
                'title' => 'Change email',
                'pageclass' => 'home_account_email',
            ]
        );
    }
    
    public function saveForm(Request $request)
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
        
        
        Validator::make($request->all(), $rules, $messages)->validate();
        
        
        
        $this->resetEmail($user, $request->email);
        
        return redirect()->route('home')->with('status', "Password changed");
    }
    
    protected function resetPassword($user, $email)
    {
        $user->forceFill([
            'password' => bcrypt($password),
            'remember_token' => Str::random(60),
        ])->save();
    }
}
