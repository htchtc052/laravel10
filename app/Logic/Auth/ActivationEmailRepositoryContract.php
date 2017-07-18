<?php

namespace App\Logic\Auth;

Interface ActivationEmailRepositoryContract
{
    public function createActivation($user);

    public function getActivation($user);
    
    public function getActivationByToken($token);
    
    public function deleteActivation($token);
}