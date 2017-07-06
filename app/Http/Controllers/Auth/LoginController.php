<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    //use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    
    /**
    * Show the application's login form.
    *
    * @return \Illuminate\Http\Response
    */
    public function showLoginForm()
    {
        $data = [
            'title' => 'Login', 
            'pageclass' => 'login',
        ];  
        
        return view('auth.login', $data);
    }
    
    /**
    * Handle a login request to the application.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
    */
    public function login(Request $request)
    {   
        
        $this->validateLogin($request->all())->validate();

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        
        
        
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }
        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }
    
    
    /**
    * Validate the user login request.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return void
    */
    protected function validateLogin(array $data)
    {
        $rules = [
            'email' => 'required|email|exists:users',
            'password' => 'required',
        ];
        
        $messages = [
            'email.required' => 'Please enter an email address',
            'email.email' => 'Email is invalid. 111',
            'email.exists' => 'This e-mail is not registered. ',
            'password.required' => 'Please enter a password',
        ];
        
        
        //dd($data, $rules, $messages, Validator::make($data, $rules, $messages)->errors());
        
        return Validator::make($data, $rules, $messages);
    }
}
