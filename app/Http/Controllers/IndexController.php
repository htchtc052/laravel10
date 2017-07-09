<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    //
    public function showIndexPage()
    {
        $data = [
            'title' => 'Main', 
            'pageclass' => 'index',
            'login_area' => 'index',
        ];
        
        return view("indexpage", $data);
    } 
    
    /* plan security about contact help privacy */
    public function plans(Request $request)
    {
        $data = [
            'title' => 'Plans', 
            'pageclass' => 'plans',
            'login_area' => 'footer_pages',
        ];
        
        
        return view("infopages.plans", $data);
    }
    
    public function security(Request $request)
    {
        
        $data = [
        'title' => 'Security', 
        'pageclass' => 'security',
        'login_area' => 'footer_pages',
        
        ];
        
        return view("infopages.security", $data);
    }
    
    public function about(Request $request)
    {
        
        
        
        $data = [
        'title' => 'About', 
        'pageclass' => 'about',
        'login_area' => 'footer_pages',
        
        ];
        
        
        return view("infopages.about", $data);
    }
    public function contact(Request $request)
    {
        
        
        
        $data = [
        'title' => 'Contact', 
        'pageclass' => 'contact',
        'login_area' => 'footer_pages',
        
        ];
        
        
        return view("infopages.contact", $data);
    }
    public function help(Request $request)
    {
        $data = [
        'title' => 'Help', 
        'pageclass' => 'help',
        'login_area' => 'footer_pages',
        ];
        return view("help.help", $data);
    }

    public function payments_and_billing(Request $request)
    {
        $data = [
        'title' => 'Help', 
        'pageclass' => 'help',
        'login_area' => 'footer_pages',
        ];
        return view("help.payments_and_billing", $data);
    }    
    
    public function security_and_privacy(Request $request)
    {
        $data = [
        'title' => 'Help', 
        'pageclass' => 'help',
        'login_area' => 'footer_pages',
        ];
        return view("help.security_and_privacy", $data);
    }
    
    public function syncing_and_uploads(Request $request)
    {
        $data = [
        'title' => 'Help', 
        'pageclass' => 'help',
        'login_area' => 'footer_pages',
        ];
        return view("help.syncing_and_uploads", $data);
    }    

    public function log_in_help(Request $request)
    {
        $data = [
        'title' => 'Help', 
        'pageclass' => 'help',
        'login_area' => 'footer_pages',
        ];
        return view("help.log_in_help", $data);
    }    

    public function manage_account(Request $request)
    {
        $data = [
        'title' => 'Help', 
        'pageclass' => 'help',
        'login_area' => 'footer_pages',
        ];
        return view("help.manage_account", $data);
    }    

    public function space_and_storage(Request $request)
    {
        $data = [
        'title' => 'Help', 
        'pageclass' => 'help',
        'login_area' => 'footer_pages',
        ];
        return view("help.space_and_storage", $data);
    }        

    public function photos_and_videos(Request $request)
    {
        $data = [
        'title' => 'Help', 
        'pageclass' => 'help',
        'login_area' => 'footer_pages',
        ];
        return view("help.photos_and_videos", $data);
    }    
    
    public function privacy(Request $request)
    {
        
        
        
        $data = [
        'title' => 'Privacy', 
        'pageclass' => 'privacy',
        'login_area' => 'footer_pages',
        
        ];
        
        
        return view("infopages.privacy", $data);
    }

    public function principles(Request $request)
    {
        $data = [
        'title' => 'Principles', 
        'pageclass' => 'principles',
        'login_area' => 'footer_pages',
        ];
        return view("infopages.principles", $data);
    }
}
