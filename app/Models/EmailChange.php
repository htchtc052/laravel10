<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmailChange extends Model
{
    protected $table = 'email_change';
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}