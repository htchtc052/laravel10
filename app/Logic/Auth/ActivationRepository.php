<?php

namespace App\Logic\Auth;

use Carbon\Carbon;
use Illuminate\Database\Connection;

class ActivationRepository
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

    public function createActivation($user)
    {

        $activation = $this->getActivation($user);

        if (!$activation) {
            return $this->createToken($user);
        }
        return $this->regenerateToken($user);

    }

    private function regenerateToken($user)
    {

        $token = $this->getToken();
        $this->db->table("activations")->where('user_id', $user->id)->update([
            'token' => $token,
            'created_at' => new Carbon()
        ]);
        return $token;
    }

    private function createToken($user)
    {
        $token = $this->getToken();
        $this->db->table("activations")->insert([
            'user_id' => $user->id,
            'token' => $token,
            'created_at' => new Carbon()
        ]);
        return $token;
    }

    public function getActivation($user)
    {
        return $this->db->table("activations")->where('user_id', $user->id)->first();
    }


    public function getActivationByToken($token)
    {
        return $this->db->table("activations")->where('token', $token)->first();
    }

    public function deleteActivation($token)
    {
        $this->db->table("activations")->where('token', $token)->delete();
    }

}