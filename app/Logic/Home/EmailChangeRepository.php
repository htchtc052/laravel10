<?php

namespace App\Logic\Home;

use Carbon\Carbon;
use Illuminate\Database\Connection;

class EmailChangeRepository
{

    protected $db;

    public function __construct(Connection $db)
    {
        $this->db = $db;
    }

    protected function getToken()
    {
        return hash_hmac('sha256', str_random(40), config('app.key'));
    }

    public function createEmailChange($user, $email)
    {
        $email_change = $this->getEmailChange($user);

        if (!$email_change) {
            return $this->createTokenAndEmail($user, $email);
        }
        
        return $this->regenerateTokenAndEmail($user, $email);

    }
    
    private function regenerateTokenAndEmail($user, $email)
    {
        $token = $this->getToken();
        
        $this->db->table("activations_change_email")->where('user_id', $user->id)->update([
            'token' => $token,
            'email' => $email,
            'created_at' => new Carbon()
        ]);
        
        return $token;
    }

    private function createTokenAndEmail($user)
    {
        $token = $this->getToken();
        
        $this->db->table("activations_change_email")->insert([
            'user_id' => $user->id,
            'token' => $token,
            'email' => $email,
            'created_at' => new Carbon()
        ]);
        
        return $token;
    }

    public function getChangeEmail($user)
    {
        return $this->db->table("activations_change_email")->where('user_id', $user->id)->first();
    }


    public function getChangeEmailByToken($token)
    {
        return $this->db->table("activations_change_email")->where('token', $token)->first();
    }

    public function deleteChangeEmail($token)
    {
        $this->db->table("activations_change_email")->where('token', $token)->delete();
    }

}