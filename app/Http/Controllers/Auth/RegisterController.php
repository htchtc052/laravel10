<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;
use Jrean\UserVerification\Traits\VerifiesUsers;
use Jrean\UserVerification\Facades\UserVerification;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;
    
    use VerifiesUsers;

    /**
    * Where to redirect users after registration.
    *
    * @var string
    */
    protected $redirectTo = '/activate';
    //protected $redirectIfVerified = '/home';

    /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function __construct()
    {
        // Based on the workflow you need, you may update and customize the following lines.

        $this->middleware('guest', ['except' => ['getVerification', 'getVerificationError']]);
    }

    /**
    * Get a validator for an incoming registration request.
    *
    * @param  array  $data
    * @return \Illuminate\Contracts\Validation\Validator
    */
    protected function validator(array $data)
    {
        $rules = [
            'email' => 'required|email|unique:users',
            'name' => 'required',
            'password' => 'required|min:4',
            'agree' => 'required',
        ];
        
        $messages = [
            'email.required' => 'Please enter an email address',
            'email.email' => 'Please enter an email address',
            'email.unique' => 'This e-mail is already taken. ',
            'name.required' => 'Please enter your name',        
            'password.required' => 'Please enter a password',
            'password.min' => 'Passwords must be 4 characters or more',
            'agree.required' => 'Please agree to the terms of service'
        ];
        
       
        return Validator::make($data, $rules, $messages);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
    
    public function showRegistrationForm()
    {
        $data = [
            'title' => 'Registration', 
            'pageclass' => 'signup',
        ];  
        
        return view('auth.register', $data);
    }
    
    /**
    * Handle a registration request for the application.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        $user = $this->create($request->all());

        event(new Registered($user));

        $this->guard()->login($user);

        UserVerification::generate($user);

        UserVerification::send($user, 'Nofiles Activation');

        return $this->registered($request, $user)
                        ?: redirect($this->redirectPath());
    }

}
