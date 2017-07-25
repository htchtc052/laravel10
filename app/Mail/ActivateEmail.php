<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ActivateEmail extends Mailable
{
    use Queueable, SerializesModels;
    
    protected $data;
    
    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        return $this->view('emails.activate_email')
        ->subject('Nofiles - Activate email')
        ->with(['token' => $this->data["token"], 'email' => $this->data["email"]]);
    }
}
