<?php

namespace App\Exceptions;

use Exception;

class ChangeEmailNotFoundException extends Exception
{
    protected $message = 'Wrong change email link';
    
    public function report(Exception $exception)
    {
        parent::report($exception);
    }
}