<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
   <div>

      <br>
           We heard that you lost your password. Sorry about that!<br><br>
           But don't worry! You can use the following link within the next day to reset your password:
           <br> <br>

           {{ URL::to('password_reset_confirm/'.$link) }}.
           <br><br>
           If you don't use this link within 30 minutes, it will expire.
</div>

 </body>
</html>