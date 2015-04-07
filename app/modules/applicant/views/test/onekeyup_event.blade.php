@extends('layouts.layout')
@section('sidebar')
    @include('layouts._sidebar_applicant')
@stop
@section('content')
    {{--Example 1--}}
    <!DOCTYPE html>
    <html>
    <body>

    <p>A function is triggered when the user releases a key in the input field. The function outputs the actual key/letter that was released inside the text field.</p>

    Enter your name: <input type="text" id="fname" onkeyup="myFunction()">
    <p>My name is: <span id="demo"></span></p>

    <script>
        function myFunction() {
            var x = document.getElementById("fname").value;
            document.getElementById("demo").innerHTML = x;
        }
    </script>
    <br>
    {{--Example 2--}}
    </body>
    </html>

    <head>
        <script type="text/javascript">
            function GetChar (event){
                var keyCode = ('which' in event) ? event.which : event.keyCode;
                alert ("The Unicode key code of the released key: " + keyCode);
            }
        </script>
    </head>
    <body>
    <input size="40" value="Write a character into this field!" onkeyup="GetChar (event);"/>
    </body>
@stop