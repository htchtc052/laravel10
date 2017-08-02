<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use App\Notifications\CustomResetPassword;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Plunk\Mediable\Mediable;
class User extends Authenticatable
{
    use Notifiable;
    use Mediable;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function sendPasswordResetNotification($token)
    {

        $this->notify(new CustomResetPassword($token));
    }
}
