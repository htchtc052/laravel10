<?php

namespace App\Http\Controllers\Home;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function showIndex()
    {
        
        return view('home.home', [
            'title' => 'Profile', 
            'pageclass' => 'profile_index',
            'login_area' => 'profile',
        ]);
    }
}
