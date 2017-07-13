<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    protected $redirectTo = '/home';
    
    protected $maxAttempts = 10;
    
    protected $decayMinutes = 360;

    public function showForm()
    {
        $data = [
            'title' => 'Login', 
            'pageclass' => 'login',
        ];  
        
        return view('auth.login', $data);
    }
    
    public function saveForm(Request $request)
    {   
        
        $validator = $this->validateLogin($request->all())->validate();
         
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }
        
        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }
        
        $this->incrementLoginAttempts($request);
        
        return $this->sendFailedLoginResponse($request);
    }
    
    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();
        
        $this->clearLoginAttempts($request);
        
        if ($request->expectsJson()) {
            return Response::json(array('success' => true, 'redirect_to' => $this->redirectPath()), 200);
        } else {
            return $this->authenticated($request, $this->guard()->user())
                    ?: redirect()->route('home');
        }
    }
    
    protected function validateLogin(array $data)
    {
        $rules = [
            'email' => 'required|email|exists:users',
            'password' => 'required',
        ];
        
        $messages = [
            'email.required' => 'Please enter an email',
            'email.email' => 'Please enter a valid email address',
            'email.exists' => 'This e-mail is not registered. ',
            'password.required' => 'Please enter a password',
        ];
        
        return Validator::make($data, $rules, $messages);
    }
}