<?php

namespace App\Repositories\Auth;

use \App\Contracts\Auth\ChangeEmailRepositoryContract;
use \App\Models\EmailChange;
use Carbon\Carbon;
use Illuminate\Database\Connection;
use Illuminate\Support\Facades\DB;


class ChangeEmailRepository implements ChangeEmailRepositoryContract
{
    public function createEmailChange($user, $email)
    {
        $email_change = $this->getEmailChange($user);
        
        if (!$email_change) {
            return $this->createEmailChangeRecord($user, $email);
        }
        
        return $this->updateEmailChangeRecord($user, $email);
        
    }
    
    public function getEmailChange($user)
    {
        return EmailChange::where('user_id', $user->id)->first();
    }
    
    public function getChangeEmailByTokenAndEmail($token, $email)
    {
        return EmailChange::where(array('token' => $token, 'email' => $email))->first();
    }
    
    public function deleteChangeEmail($token)
    {
        EmailChange::where('token', $token)->delete();
    }
    
    private function updateEmailChangeRecord($user, $email)
    {
        $token = $this->getToken();
        
        EmailChange::where('user_id', $user->id)->update([
            'token' => $token,
            'email' => $email,
            'created_at' => new Carbon()
        ]);
        
        return $token;
    }
    
    private function getToken()
    {
        return hash_hmac('sha256', str_random(40), config('app.key'));
    }
    
    private function createEmailChangeRecord($user, $email)
    {
        $token = $this->getToken();
        
        EmailChange::insert([
            'user_id' => $user->id,
            'token' => $token,
            'email' => $email,
            'created_at' => new Carbon()
        ]);
        
        return $token;
    }



}