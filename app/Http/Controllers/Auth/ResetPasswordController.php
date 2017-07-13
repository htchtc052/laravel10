<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class ResetPasswordController extends Controller
{

    use ResetsPasswords;

    //protected $redirectTo = '/home';
    
    public function showForm(Request $request, $token)
    {
        return view('auth.password_change')->with([
                'token' => $token,
                'email' => $request->get('email'),
                'title' => 'Set password',
                'pageclass' => 'setpass',
            ]
        );
    }
    
    public function saveForm(Request $request)
    {
        $rules = [
            'password' => 'required|confirmed|min:6',
        ];
        
        $messages = [
            'password.required' => 'Please enter a new password',
            'password.min' => 'New passwords must be 6 characters or more',
            'password.confirmed' => 'New Password and Confirm Password should be same',
        ];
        
        Validator::make($request->all(), $rules, $messages)->validate();
        
        $this->broker()->validator(function($data) use ($rules, $messages){
            return Validator($data, $rules, $messages);
        });
        
        $response = $this->broker()->reset(
            $this->credentials($request), function ($user, $password) {
                $this->resetPassword($user, $password);
            }
        );
        
        return $response == Password::PASSWORD_RESET
                    ? $this->sendResetResponse($response)
                    : $this->sendResetFailedResponse($request, $response);
    }
   
    
    protected function credentials(Request $request)
    {
        $credentials_arr = array(
            "email" => $request->get('email'), 
            "password" => $request->get('password'), 
            "password_confirmation" => $request->get('password_confirmation'), 
            "token" => $request->get('token')
        );
        return $credentials_arr;
    }
    
    protected function resetPassword($user, $password)
    {
        $user->forceFill([
            'password' => bcrypt($password),
            'remember_token' => Str::random(60),
        ])->save();

        $this->guard()->login($user);
    }
    
    protected function sendResetResponse($response)
    {
        return redirect()->route('home')->with('status', trans($response));
    }
    
    protected function sendResetFailedResponse(Request $request, $response)
    {
        return redirect()->back()->withErrors(['email' => trans($response)]);
    }
    
    public function broker()
    {
        return Password::broker();
    }
    
    protected function guard()
    {
        return Auth::guard();
    }
}
