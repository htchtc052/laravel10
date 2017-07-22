<?php

namespace App\Contracts\Auth;

Interface ChangeEmailRepositoryContract
{
    public function createEmailChange($user, $email);
    
    public function getChangeEmailByTokenAndEmail($token, $email);
    
    public function deleteChangeEmail($token);
}