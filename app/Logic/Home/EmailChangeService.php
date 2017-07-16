<?php

namespace App\Logic\Home;

use Illuminate\Mail\Mailer;
use Illuminate\Mail\Message;
use \App\Exceptions\ChangeEmailNotFoundException;

class ChangeEmailService
{

    protected $mailer;

    protected $changeEmailRepo;

    public function __construct(Mailer $mailer, ChangeEmailRepository $changeEmailRepo)
    {
        $this->mailer = $mailer;
        $this->changeEmailRepo = $changeEmailRepo;
    }

    public function sendChangeEmailMail($user)
    {
        $token = $this->changeEmailRepo->createChangeEmail($user);
        
        $user->ChangeEmailNotification($token);
    }
    
    public function changeUserEmail($token, $email)
    {
        $changeEmail = $this->changeEmailRepo->getChangeEmailByToken($token);

        if ($changeEmail === null) {
            throw new ChangeEmailNotFoundException();
        }
        $user = \App\User::find($activation->user_id);
        
        if (!$user) {
            throw new ChangeEmailNotFoundException();
        }

        $user->email = $email;

        $user->save();

        $this->changeEmailRepo->deleteChangeEmail($token);

        return $user;

    }
    

}