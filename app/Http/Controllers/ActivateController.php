<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Jrean\UserVerification\Facades\UserVerification;


class ActivateController extends Controller
{
    
    public function showActivatePage()
    {
       
        $data = [
            'title' => 'Activation',  
                'pageclass' => 'activate',
            ];  
        
         
        return view('auth.activate', $data);
        
    }
    
    public function sendActivate(Request $request)
    {
        //$user = \Auth::user();
        
        $code = Code::generateCode(8);
        
        $code_obj = Code::create([
            'user_id' => $user->id,
            'code' => $code,
        ]);
        
        
        $url = url('/').'/activate/confirm?user_id='.$user->id.'&code='.$code;
        
        $mail_return = Mail::send('emails.registration', array("url" => $url, "email" => $user->email), function ($m) use($user)  {
            $m->from('hello@nofiles.com', 'NoFiles.com');
            $m->to($user->email)->subject('Activation NoFiles!');
        });

        return redirect()->route('activate')->with('message', 'Activation link sended');
    }
}
