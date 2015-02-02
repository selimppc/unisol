@extends('layouts.master')

@section('sidebar')
    @include('admission::_sidebar')
@stop

@section('content')

<div class="span6 well">
{{ Form::open(array('url'=>'applicant/login', 'class'=>'form-signin')) }}

         <h4 class="form-signin-heading">Login</h4>

         {{ Form::label('email','Username or Email address') }}
         <label for="username">
                 <a href="/user/username_reset">(forgot username?)</a>
         </label>
        {{ Form::text('email', null, array('class'=>'form-control', 'placeholder'=>'Email Address')) }}
        <br>
        {{ Form::label('password','Password') }}
        <label for="password">
         <a href="/password_reset">(forgot password?)</a>
        </label>
        {{ Form::password('password', array('class'=>'form-control', 'placeholder'=>'Password')) }}

        <br>
        {{ Form::submit('Login', array('class'=>'btn btn-large btn-primary '))}}
        <br>
        {{ Form::close() }}

</div>

 @stop