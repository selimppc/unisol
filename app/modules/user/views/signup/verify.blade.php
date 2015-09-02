
<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>Verify Your Email Address</h2>

        <div>

          <br>

            Thanks for creating an account with the verification app.
            Please follow the link below to verify your email address.<br>
            {{ URL::to('register/verify/'.$link) }}.<br/>

        </div>

    </body>
</html>