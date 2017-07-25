<div>
<br>
    Change email link <a href="{{ $link = route('home.account.email_set', $token) . '?email=' . urlencode($email) }}">{{$link}}</a>
</div>