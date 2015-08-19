<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>
<div>
    <br>
    Hi,{{ $username }}
    Thanks for creating an account in our university.
    Please follow the link below to verify your email address.<br>
    {{ URL::to('register/verify/'.$link) }}.
    <br/>
</div>
</body>
</html>