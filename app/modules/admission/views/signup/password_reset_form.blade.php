@extends('layouts.layout')
@section('sidebar')
    {{--@include('layouts._sidebar_applicant')--}}
@stop
@section('content')

@if(Session::has('message'))
<p class="alert">{{ Session::get('message') }}</p>
@endif


<div class="span5 well">
{{ Form::open(array('url'=>'users/user_password_update', 'class'=>'form-signin')) }}
<h3 class="form-signin-heading">Change Your Password</h3>
        <br>
        {{ Form::hidden('id', $user_id, array('class'=>'form-control')) }}

        {{ Form::label('password','Password') }}
        {{ Form::password('password',  array('class'=>'form-control')) }}

        <div class="form-group">
            <span class="text-muted"><em><span style="color:green;"></span><b>Must contain one lowercase letter,one uppercase letter, one number,one special character and be at least 8 characters long</b> </em></span>
         </div>
        <br>
         {{ Form::label('confirm_password', 'Confirm Password') }}
         {{ Form::password('confirm_password', array('class'=>'form-control')) }}
        <br>

        {{--{{ Form::hidden('reset_password_token', $reset_password_token) }}--}}

        {{ Form::submit('submit', array('class'=>'btn btn-large btn-primary '))}}
        <br>
        {{ Form::close() }}

</div>

 @stop