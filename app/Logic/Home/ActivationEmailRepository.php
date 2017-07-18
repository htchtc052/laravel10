<?php

namespace App\Logic\Auth;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ActivationEmailRepository implements ActivationEmailRepositoryContract
{
    public function createActivation($user)
    {

        $activation = $this->getActivation($user);

        if (!$activation) {
            return $this->createToken($user);
        }
        return $this->regenerateToken($user);

    }

    private function getToken()
    {
        return hash_hmac('sha256', str_random(40), config('app.key'));
    }
    
    private function regenerateToken($user)
    {
        $token = $this->getToken();
        
        DB::table("activations")->where('user_id', $user->id)->update([
            'token' => $token,
            'created_at' => new Carbon()
        ]);
        
        return $token;
    }

    private function createToken($user)
    {
        $token = $this->getToken();
        
        DB::table("activations")->insert([
            'user_id' => $user->id,
            'token' => $token,
            'created_at' => new Carbon()
        ]);
        
        return $token;
    }

    public function getActivation($user)
    {
        return DB::table("activations")->where('user_id', $user->id)->first();
    }


    public function getActivationByToken($token)
    {
        return DB::table("activations")->where('token', $token)->first();
    }

    public function deleteActivation($token)
    {
        DB::table("activations")->where('token', $token)->delete();
    }

}