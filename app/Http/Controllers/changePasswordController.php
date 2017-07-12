<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class changePasswordController extends Controller
{
    //
    use ResetsPasswords;
    
    //protected $redirectTo = "/";
    
    public function showPasswordChangeForm(Request $request)
    {
        return view('home.password_change')->with([
                'title' => 'Profile change password',
                'pageclass' => 'setpass',
                'login_area' => 'profile'
            ]
        );
    }
    
    public function writePasswordChange(Request $request)
    {
        
        $user = Auth::user();
        
        $rules = [
            'password_old' => 'required|min:6|checkpassword:'.$user->email,
            'password' => 'required|confirmed|min:6',
        ];
        
        $messages = [
            'password_old.required' => 'Please enter a old password',
            'password_old.checkpassword' => 'Old password wrong',
            'password.required' => 'Please enter a new password',
            'password.min' => 'New passwords must be 6 characters or more',
            'password.confirmed' => 'New Password and Confirm Password should be same',
        ];
        
        
        Validator::make($request->all(), $rules, $messages)->validate();
        
        $this->resetPassword($user, $request->password);
    
        return redirect()->route('home')->with('status', "Password changed");
    }
   
  
    protected function resetPassword($user, $password)
    {
        $user->forceFill([
            'password' => bcrypt($password),
            'remember_token' => Str::random(60),
        ])->save();
    }
    
}
