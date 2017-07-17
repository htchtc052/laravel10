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
            return $this->createEmailChangeRecord($user, $email);
        }
        
        return $this->updateEmailChangeRecord($user, $email);

    }
    
    private function updateEmailChangeRecord($user, $email)
    {
        $token = $this->getToken();
        
        $this->db->table("email_change")->where('user_id', $user->id)->update([
            'token' => $token,
            'email' => $email,
            'created_at' => new Carbon()
        ]);
        
        return $token;
    }

    private function createEmailChangeRecord($user, $email)
    {
        $token = $this->getToken();
        
        $this->db->table("email_change")->insert([
            'user_id' => $user->id,
            'token' => $token,
            'email' => $email,
            'created_at' => new Carbon()
        ]);
        
        return $token;
    }

    public function getEmailChange($user)
    {
        return $this->db->table("email_change")->where('user_id', $user->id)->first();
    }


    public function getChangeEmailByTokenAndEmail($token, $email)
    {
        return $this->db->table("email_change")->where(array('token' => $token, 'email' => $email))->first();
    }

    public function deleteChangeEmail($token)
    {
        $this->db->table("email_change")->where('token', $token)->delete();
    }

}