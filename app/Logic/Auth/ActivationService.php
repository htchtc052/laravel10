<?php

namespace App\Logic\Auth;

use Illuminate\Mail\Mailer;
use Illuminate\Mail\Message;
use \App\Exceptions\ActivateUserNotFoundException;


class ActivationService
{

    protected $mailer;

    protected $activationRepo;

    public function __construct(Mailer $mailer, ActivationRepository $activationRepo)
    {
        $this->mailer = $mailer;
        $this->activationRepo = $activationRepo;
    }

    public function sendActivationMail($user)
    {
        $token = $this->activationRepo->createActivation($user);
        
        $user->ActivationNotification($token);
    }
    
    public function sendChangeEmailMail($user)
    {
        $token = $this->activationRepo->createActivation($user);
        
        $user->ActivationNotification($token);
    }

    public function activateUser($token, $email)
    {
        $activation = $this->activationRepo->getActivationByToken($token);

        if ($activation === null) {
            throw new ActivateUserNotFoundException();
        }
        $user = \App\User::find($activation->user_id);
        
        if (!$user) {
            throw new ActivateUserNotFoundException();
        }

        $user->verified = true;

        $user->save();

        $this->activationRepo->deleteActivation($token);

        return $user;

    }
    
}