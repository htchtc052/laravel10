<?php

namespace App\Repositories\Auth;

use \App\Contracts\Auth\ActivateEmailRepositoryContract;
use \App\Models\Activation;
use Carbon\Carbon;
use Illuminate\Database\Connection;
use Illuminate\Support\Facades\DB;


class ActivateEmailRepository implements \App\Contracts\Auth\ActivateEmailRepositoryContract
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
        
        Activation::where('user_id', $user->id)->update([
            'token' => $token,
            'created_at' => new Carbon()
        ]);
        
        return $token;
    }

    private function createToken($user)
    {
        $token = $this->getToken();
        
        Activation::insert([
            'user_id' => $user->id,
            'token' => $token,
            'created_at' => new Carbon()
        ]);
        
        return $token;
    }

    public function getActivation($user)
    {
        return Activation::where('user_id', $user->id)->first();
    }


    public function getActivationByToken($token)
    {
        return Activation::where('token', $token)->first();
    }

    public function deleteActivation($token)
    {
        Activation::where('token', $token)->delete();
    }
}
