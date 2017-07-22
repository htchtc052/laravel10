<?php

namespace App;

use Illuminate\Mail\Mailer;
use Illuminate\Mail\Message;
use \App\Exceptions\ActivateUserNotFoundException;
use \App\FooContract;


class FooService implements FooContract
{

    protected $mailer;
    
    protected $activationEmailRepo;
    
    public function __construct(FooRepositoryContract $activationEmailRepo)
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