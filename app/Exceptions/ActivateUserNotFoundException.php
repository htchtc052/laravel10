<?php

namespace App\Exceptions;

use Exception;

class ActivateUserNotFoundException extends Exception
{
    protected $message = 'No user found by activaction link';
    
    public function report(Exception $exception)
    {
        parent::report($exception);
    }
}