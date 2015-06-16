
<!DOCTYPE html>
<html lang="en-US">
 <head>
    <meta charset="utf-8">
 </head>
 <body>
    <div class="span6 well">
        @if(isset(Auth::user()->get()->id))
            <div>
               {{--Thanks, <b>{{$username}}</b><br>--}}
                <div style="background-color: blanchedalmond">
                    <p>&nbsp;</p>
                        &nbsp;&nbsp;{{$link}}
                    <p>&nbsp;</p>
                </div>
                <br>

               <div style="background-color: lightblue">
                   <p>&nbsp;</p>
                      &nbsp;&nbsp;You can view details with the following link using your support code. Your Support code is : {{$support_code}}
                  <br>
                   &nbsp;&nbsp;Follow This Link And Submit Your Support Code.  {{ URL::route('support-head.create')}}.<p>&nbsp;</p>
               </div>
            </div>
        @else
            <div>
               {{--Thanks For Your Support.<br>--}}
                <div style="background-color: blanchedalmond">
                    <p>&nbsp;</p>
                        &nbsp;&nbsp;{{$link}}
                    <p>&nbsp;</p>
                </div>
                <br>
            </div>
        @endif
    </div>
 </body>
</html>