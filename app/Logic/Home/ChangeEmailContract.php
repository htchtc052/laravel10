<?php

namespace App\Logic\Home;


Interface ChangeEmailContract
{

    public function sendChangeEmailMail($user, $email);
    
    public function setEmail($token, $email);
    
}