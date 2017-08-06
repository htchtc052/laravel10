<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class MasterComposer
{
    protected $guard;

    public function __construct()
    {
        //$this->guard = $guard;
    }

    public function compose(View $view)
    {

        $user_avatar_url = null;

        $user = Auth::user();
        if ($user) {
            if($user->hasMedia('avatar')) {
                $user_avatar_url = $user->getMedia('avatar')->first()->getUrl();
            }
        }

        $view->with('avatar_url', $user_avatar_url);
    }
}
