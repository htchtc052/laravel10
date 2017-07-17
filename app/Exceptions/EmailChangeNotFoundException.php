<?php

namespace App\Exceptions;

use Exception;

class EmailChangeNotFoundException extends Exception
{
    protected $message = 'Wrong change email link';
    
    public function report(Exception $exception)
    {
        parent::report($exception);
    }
}