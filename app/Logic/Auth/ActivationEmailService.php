<?php

namespace App\Logic\Auth;

use Illuminate\Mail\Mailer;
use Illuminate\Mail\Message;
use \App\Exceptions\ActivateUserNotFoundException;
use \App\Logic\Auth\ActivationEmailRepositoryContract;

class ActivationEmailService implements ActivationEmailContract
{

    protected $mailer;
    
    protected $activationEmailRepo;
    
    public function __construct(ActivationEmailRepositoryContract $activationEmailRepo)
    {
       $this->activationEmailRepo = $activationEmailRepo;
    }
  
    public function sendActivationMail($user)
    {
        $token = $this->activationEmailRepo->createActivation($user);
        
        $user->ActivationNotification($token);
    }
    
    public function activateUser($token, $email)
    {
        $activation = $this->activationEmailRepo->getActivationByToken($token);
         
        if ($activation === null) {
            throw new ActivateUserNotFoundException();
        }
        $user = \App\User::find($activation->user_id);
        
        if (!$user) {
            throw new ActivateUserNotFoundException();
        }

        $user->verified = true;

        $user->save();

        $this->activationEmailRepo->deleteActivation($token);

        return $user;

    }
    
}