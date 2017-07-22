<?php

namespace App\Contracts\Auth;

Interface ActivateEmailRepositoryContract
{
    public function createActivation($user);

    public function getActivation($user);
    
    public function getActivationByToken($token);
    
    public function deleteActivation($token);
}