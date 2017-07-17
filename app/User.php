<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use App\Notifications\CustomResetPassword;
use App\Notifications\SendActivationEmail;
use App\Notifications\SendEmailChangeEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function EmailChangeNotification($token, $email)
    {
        
        $this->notify(new SendEmailChangeEmail($token, $email));
    }
    
    public function ActivationNotification($token)
    {
        
        $this->notify(new SendActivationEmail($token));
    } 
    
    public function sendPasswordResetNotification($token)
    {
        
        $this->notify(new CustomResetPassword($token));
    }  
}
