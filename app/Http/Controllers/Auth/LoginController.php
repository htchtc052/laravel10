<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
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

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';
    
    protected $maxAttempts = 10;
    
    protected $decayMinutes = 360;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest')->except('logout');
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
            'login_area' => 'login',   
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
                    ?: redirect()->intended($this->redirectPath());
        }
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
            'email.required' => 'Please enter an email',
            'email.email' => 'Please enter a valid email address',
            'email.exists' => 'This e-mail is not registered. ',
            'password.required' => 'Please enter a password',
        ];
        
        return Validator::make($data, $rules, $messages);
    }
}
