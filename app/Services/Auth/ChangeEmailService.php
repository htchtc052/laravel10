<?php

namespace App\Services\Auth;

use Illuminate\Mail\Mailer;
use Illuminate\Mail\Message;
use \App\Exceptions\ChangeEmailNotFoundException;
use \App\Contracts\Auth\ChangeEmailContract;
use \App\Contracts\Auth\ChangeEmailRepositoryContract;

class ChangeEmailService implements ChangeEmailContract
{

    protected $mailer;
    
    protected $changeEmailRepo;
    
    public function __construct(ChangeEmailRepositoryContract $changeEmailRepo)
    {
       $this->changeEmailRepo = $changeEmailRepo;
    }
  
    public function sendChangeEmailMail($user, $email)
    {
        $token = $this->changeEmailRepo->createEmailChange($user, $email);
        
        \Mail::to($email)->send(
            new \App\Mail\EmailChange(array(
                'email' => $email,
                'token' => $token,
            ))
        );
    }
    
    public function setEmail($token, $email)
    {
        $changeEmail = $this->changeEmailRepo->getChangeEmailByTokenAndEmail($token, $email);
        
        if ($changeEmail === null) {
            throw new ChangeEmailNotFoundException();
        }
        
        $user = \App\User::find($changeEmail->user_id);
        
        if (!$user) {
            throw new ChangeEmailNotFoundException();
        }

        $user->email = $email;

        $user->save();

        $this->changeEmailRepo->deleteChangeEmail($token);

        return $user;

    }
    
}