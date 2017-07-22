<?php

namespace App\Http\Controllers\Auth;

use \App\User;
//use \App\FooContract;
use \App\Contracts\Auth\ActivateEmailContract;
use \App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;


class RegisterController extends Controller
{
    
    use RegistersUsers;
    
    public function showForm()
    {
        
        $data = [
            'title' => 'Registration', 
            'pageclass' => 'register',
            'need_login_modal' => true, 
        ];  
        
        return view('auth.register', $data);
    }

    public function saveForm(Request $request, ActivateEmailContract $activateEmailService)
    {
        $this->validator($request->all())->validate();
        
        $user = $this->create($request->all());

        event(new Registered($user));

        $this->guard()->login($user);
        
        $activateEmailService->sendActivationMail($user);
        
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
