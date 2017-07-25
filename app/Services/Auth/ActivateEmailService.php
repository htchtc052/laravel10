<?php

namespace App\Services\Auth;

use \App\Exceptions\ActivateUserNotFoundException;
use \App\Contracts\Auth\ActivateEmailContract;
use \App\Contracts\Auth\ActivateEmailRepositoryContract;
use \App\Models\User;
use Illuminate\Mail\Mailer;
use Illuminate\Mail\Message;

class ActivateEmailService implements ActivateEmailContract
{

    protected $mailer;
    
    protected $activationEmailRepo;
    
    public function __construct(ActivateEmailRepositoryContract $activationEmailRepo)
    {
       $this->activationEmailRepo = $activationEmailRepo;
    }
    
    public function sendActivationMail($user)
    {
        if (!$user || $user->verified) {
            throw new ActivateUserNotFoundException();
        }
        
        $token = $this->activationEmailRepo->createActivation($user);
        
        \Mail::to($user->email)->send(
            new \App\Mail\ActivateEmail(array(
                'email' => $user->email,
                'token' => $token,
            ))
        );
        
    }
    
    public function activateUser($token, $email)
    {
        $activation = $this->activationEmailRepo->getActivationByToken($token);
         
        if ($activation === null) {
            throw new ActivateUserNotFoundException();
        }
        $user = User::find($activation->user_id);
        
        if (!$user) {
            throw new ActivateUserNotFoundException();
        }

        $user->verified = true;

        $user->save();

        $this->activationEmailRepo->deleteActivation($token);

        return $user;

    }
  
}