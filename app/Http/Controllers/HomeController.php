<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function showHomeIndex()
    {
        
        $data = [
        'title' => 'Profile', 
        'pageclass' => 'profile_index',
        'login_area' => 'profile',
        ];  
        
        return view('home', $data);
    }
}
