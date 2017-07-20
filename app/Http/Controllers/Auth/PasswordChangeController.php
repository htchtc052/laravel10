<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\ResetsPasswords;

class PasswordChangeController extends Controller
{
    use ResetsPasswords;
    
    public function showForm(Request $request)
    {
        return view('home.account.password')->with([
                'title' => 'Change password',
                'pageclass' => 'home_account_password',
            ]
        );
    }
    
    public function saveForm(Request $request)
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
