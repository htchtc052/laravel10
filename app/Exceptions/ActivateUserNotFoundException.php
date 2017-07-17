<?php

namespace App\Exceptions;

use Exception;

class ActivateUserNotFoundException extends Exception
{
    protected $message = 'Wrong activaction link';
    
    public function report(Exception $exception)
    {
        parent::report($exception);
    }
}