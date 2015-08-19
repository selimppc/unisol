<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
 <div class="span6 well">
   {{ Form::open(array( 'class'=>'form-signin')) }}

      <br>
            <p>We heard that you lost your username. Sorry about that!</p>
            <p>But don't worry! We have sent your <b>username</b></p>
            Your username is: "<b>{{ $link }}.</b>"
           <br><br>
 {{ Form::close() }}
</div>

 </body>
</html>

