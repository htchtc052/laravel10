<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{

    use SendsPasswordResetEmails;
    
    public function showForm()
    {
        $data = [
            'title' => 'Forgot password', 
            'pageclass' => 'forgot_password',
        ];
        
        return view('auth.password_reset', $data);
    }
    
    public function saveForm(Request $request)
    {
        $this->sendResetLinkValidator($request::all())->validate();
        
        $response = Password::broker()->sendResetLink(
            $request::only('email')
        );
        
        return $response == Password::RESET_LINK_SENT
                    ? $this->sendResetLinkResponse($response)
                    : $this->sendResetLinkFailedResponse($request, $response);
    }
    
    protected function sendResetLinkValidator(array $data)
    {
        $rules = [
            'email' => 'required|email|exists:users',
        ];
        
        $messages = [
            'email.required' => 'Please enter an email',
            'email.email' => 'Please enter a valid email address',
            'email.exists' => 'This e-mail is not registered. ',
        ];
        
        return Validator::make($data, $rules, $messages);
    }
    
    public function broker()
    {
        return Password::broker();
    }
}
