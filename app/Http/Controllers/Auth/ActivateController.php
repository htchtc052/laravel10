<?php

namespace App\Http\Controllers\Auth;

use App\User;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Jrean\UserVerification\Facades\UserVerification;


class ActivateController extends Controller
{
    
    public function showPage()
    {
       
        $data = [
                'title' => 'Activation',  
                'pageclass' => 'activate',
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
    
    public function activate($token)
    {
        if (auth()->user()->activated) {

            return redirect()->route('public.home')
                ->with('status', 'success')
                ->with('message', 'Your email is already activated.');
        }

        $activation = Activation::where('token', $token)
            ->where('user_id', auth()->user()->id)
            ->first();

        if (empty($activation)) {

            return redirect()->route('public.home')
                ->with('status', 'Activation Error');

        }

        auth()->user()->active = true;
        auth()->user()->save();

        $activation->delete();

        return redirect()->route('home')
            ->with('status', 'You successfully activated your email!');

    }

}
