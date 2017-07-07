<div>
<br>
    For reset password follow this link <a href="{{ $link = route('password.reset', $token) . '?email=' . urlencode($notifiable->email) }}">{{$link}}</a>
</div>