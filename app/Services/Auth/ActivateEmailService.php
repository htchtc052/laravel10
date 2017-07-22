<?php

namespace App\Services\Auth;

use Illuminate\Mail\Mailer;
use Illuminate\Mail\Message;
use \App\Exceptions\ActivateUserNotFoundException;
use \App\Contracts\Auth\ActivateEmailContract;
use \App\FooRepositoryContract;

class ActivateEmailService implements \App\Contracts\Auth\ActivateEmailContract
{

    protected $mailer;
    
    protected $activationEmailRepo;
    
    public function __construct(\App\Contracts\Auth\ActivateEmailRepositoryContract $activationEmailRepo)
    {
       $this->activationEmailRepo = $activationEmailRepo;
    }
    
    public function sendActivationMail($user)
    {
        if (!$user || $user->verified) {
            throw new ActivateUserNotFoundException();
        }
        
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