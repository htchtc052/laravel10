<?php

namespace App;

Interface FooContract
{
    public function sendActivationMail($user);

    public function activateUser($token, $email);
    
}