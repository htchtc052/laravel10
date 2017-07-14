<?php

namespace App\Http\Controllers\Auth;

use App\ActivationService;
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
    
    use RegistersUsers;
    
    use VerifiesUsers;
    
    protected $activationService;
    
    public function __construct(ActivationService $activationService)
    {
        $this->activationService = $activationService;
    }
    
    public function showForm()
    {
        $data = [
            'title' => 'Registration', 
            'pageclass' => 'register',
            'need_login_modal' => true, 
        ];  
        
        return view('auth.register', $data);
    }

    public function saveForm(Request $request)
    {
        $this->validator($request->all())->validate();

        $user = $this->create($request->all());

        event(new Registered($user));

        $this->guard()->login($user);

        UserVerification::generate($user);

        UserVerification::send($user, 'Nofiles Activation');

        return $this->registered($request, $user)
                        ?: redirect()->route('activate');
    }
    
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
            'email.email' => 'Please enter a valid email address',
            'email.unique' => 'This e-mail is already taken. ',
            'name.required' => 'Please enter your name',        
            'password.required' => 'Please enter a password',
            'password.min' => 'Passwords must be 4 characters or more',
            'agree.required' => 'Please agree to the terms of service'
        ];
        
       
        return Validator::make($data, $rules, $messages);
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
    
}
