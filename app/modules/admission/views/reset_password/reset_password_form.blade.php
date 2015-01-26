@extends('layouts.master')

@section('sidebar')
    @include('admission::_sidebar')
@stop

@section('content')


<div class="span5 well">
{{ Form::open(array('url'=>'user/reset_password_update', 'class'=>'form-signin')) }}
<h3 class="form-signin-heading">Change Your Password</h3>
        <br>

        {{ Form::label('old_password','Old Password') }}
        {{ Form::password('old_password',  array('class'=>'form-control')) }}

        {{ Form::label('new_password','New Password') }}
        {{ Form::password('new_password',  array('class'=>'form-control')) }}

        <div class="form-group">
            <span class="text-muted"><em><span style="color:green;"></span><b>Must contain one lowercase letter,one uppercase letter, one number,one special character and be at least 8 characters long</b> </em></span>
         </div>
        <br>
         {{--{{ Form::label('confirm_password', 'Confirm New Password') }}--}}
         {{--{{ Form::password('confirm_password', array('class'=>'form-control')) }}--}}
        <br>



        {{ Form::submit('Update Password', array('class'=>'btn btn-large btn-primary '))}}
        <br>
        {{ Form::close() }}

</div>

 @stop