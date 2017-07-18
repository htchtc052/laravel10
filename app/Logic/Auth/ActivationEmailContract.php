<?php

namespace App\Logic\Auth;


Interface ActivationEmailContract
{

    public function sendActivationMail($user);
    
    public function activateUser($token, $email);
    
}