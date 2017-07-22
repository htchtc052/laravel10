<?php

namespace App\Exceptions;

use Exception;

class ActivateUserCantSendEmail extends Exception
{
    protected $message = 'Can not send activation email';
    
    public function report(Exception $exception)
    {
        parent::report($exception);
    }
}