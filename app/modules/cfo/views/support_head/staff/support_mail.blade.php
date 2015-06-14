
<!DOCTYPE html>
<html lang="en-US">
 <head>
    <meta charset="utf-8">
 </head>
 <body>
       <div class="span6 well">
           <div>
           Thanks, {{$username}}<br>
            {{ URL::to('support-head/reply-to-cfo/'.$link) }}.
           </div>
       </div>
 </body>
</html>