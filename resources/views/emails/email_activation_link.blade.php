<div>
<br>
    For activation follow this link <a href="{{ $link = route('activate', $token) . '?email=' . urlencode($notifiable->email) }}">{{$link}}</a>
</div>