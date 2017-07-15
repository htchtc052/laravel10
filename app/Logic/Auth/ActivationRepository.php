<?php

namespace App\Logic\Auth;

use App\Models\Activation;
use App\User;

class ActivationRepository
{

    public function createTokenAndSendEmail(User $user)
    {
        if ($user->verified) {
            //if user changed activated email to new one
            $user->update([
                'verified' => false
            ]);

        }

        $activation = new Activation;
        $activation->user_id = $user->id;
        $activation->token = str_random(64);
        $activation->save();
        
        $user->ActivationNotification($activation->token);
    }

}