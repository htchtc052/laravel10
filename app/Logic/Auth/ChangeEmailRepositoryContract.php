<?php

namespace App\Logic\Auth;

Interface ChangeEmailRepositoryContract
{
    public function createEmailChange($user, $email);
    
    public function getChangeEmailByTokenAndEmail($token, $email);
    
    public function deleteActivation($token);
    
    public function deleteChangeEmail($token);
}