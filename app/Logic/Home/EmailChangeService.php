<?php

namespace App\Logic\Home;

use Illuminate\Mail\Mailer;
use Illuminate\Mail\Message;
use \App\Exceptions\EmailChangeNotFoundException;
use \App\Mail\EmailChange;

class EmailChangeService
{

    protected $mailer;

    protected $emailChangeRepo;

    public function __construct(Mailer $mailer, EmailChangeRepository $emailChangeRepo)
    {
        $this->mailer = $mailer;
        $this->emailChangeRepo = $emailChangeRepo;
    }

    public function sendChangeEmailMail($user, $email)
    {
        $token = $this->emailChangeRepo->createEmailChange($user, $email);
        
        \Mail::to($email)->send(
            new EmailChange(array(
                'email' => $email,
                'token' => $token,
            ))
        );
        
        
        //Mail::to($email)->send({
          //  new Verify_Email(array(
            //    'email' => $email, 'token' => $token
               // ))
        //});
    }
    
    public function setEmail($token, $email)
    {
        $changeEmail = $this->emailChangeRepo->getChangeEmailByTokenAndEmail($token, $email);
        
        if ($changeEmail === null) {
            throw new ChangeEmailNotFoundException();
        }
        
        $user = \App\User::find($changeEmail->user_id);
        
        if (!$user) {
            throw new ChangeEmailNotFoundException();
        }

        $user->email = $email;

        $user->save();

        $this->emailChangeRepo->deleteChangeEmail($token);

        return $user;

    }
    

}