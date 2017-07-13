<?php

namespace App\Http\Controllers\Home\Account;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function showIndex()
    {
        
        return view('home.account.index', [
            'title' => 'Home', 
            'pageclass' => 'home_account',
        ]);
    }
    
}
