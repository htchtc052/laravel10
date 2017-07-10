<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function showHomeIndex()
    {
        
        return view('home.home', [
            'title' => 'Profile', 
            'pageclass' => 'profile_index',
            'login_area' => 'profile',
        ]);
    }
    
    public function showSettingsPage(Request $request)
    {
        return view('home.settings', [
            'title' => 'Profile settings', 
            'pageclass' => 'profile_settings',
            'login_area' => 'profile',
        ]);
        
    }
    
    public function showUpdateForm(Request $request)
    {
        return view('home.update', [
            'title' => 'Profile update', 
            'pageclass' => 'profile_update',
            'login_area' => 'profile',
        ]);
        
    }
    
    public function postUpdate(Request $request)
    {
        $this->updateValidator($request->all())->validate();
        
        $user = Auth::user();
        
        $user->name = $request['name'];
        
        $user->save();
        
        return redirect()->back()->with('status', "Changes saved");
    }
    
    protected function updateValidator(array $data)
    {
        $rules = [
            'name' => 'required',
        ];
        
        $messages = [
            'name.required' => 'Please enter your name',
        ];
       
        return Validator::make($data, $rules, $messages);
    }
    
    
}
