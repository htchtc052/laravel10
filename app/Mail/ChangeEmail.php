<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ChangeEmail extends Mailable
{
    use Queueable, SerializesModels;
    
    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        return $this->view('emails.change_email')
        ->subject('Nofiles - Confirm new email')
        ->with(['token' => $this->data["token"], 'email' => $this->data["email"]]);
    }
}
