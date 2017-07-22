<?php

namespace App\Contracts\Auth;


Interface ActivateEmailContract
{

     public function sendActivationMail($user);
    
     public function activateUser($token, $email);
    
}