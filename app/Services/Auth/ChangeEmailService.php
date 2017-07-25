<?php

namespace App\Services\Auth;

use \App\Models\User;
use \App\Contracts\Auth\ChangeEmailContract;
use \App\Contracts\Auth\ChangeEmailRepositoryContract;
use \App\Exceptions\ChangeEmailNotFoundException;
use Illuminate\Mail\Mailer;
use Illuminate\Mail\Message;

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
            new \App\Mail\ChangeEmail(array(
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
        
        $user = User::find($changeEmail->user_id);
        
        if (!$user) {
            throw new ChangeEmailNotFoundException();
        }

        $user->email = $email;

        $user->save();

        $this->changeEmailRepo->deleteChangeEmail($token);

        return $user;

    }
    
}