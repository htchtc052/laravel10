<?php

namespace App\Http\Controllers;

use App\User;
use DB;
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
                'login_area' => 'activate',  
            ];  
        
         
        return view('auth.activate', $data);
        
    }
    
    public function sendActivate()
    {
        $user = \Auth::user();
        
        UserVerification::generate($user);
        UserVerification::send($user, 'Activation NoFiles!');
        
        return redirect()->route('activate')->with('message', 'Activation link sended');
    }
}
