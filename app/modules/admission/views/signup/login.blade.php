@extends('layouts.master')

@section('sidebar')
    @include('admission::_sidebar')
@stop

@section('content')

@if(Session::has('message'))
<p class="alert">{{ Session::get('message') }}</p>
@endif
<div class="span6 well">
{{ Form::open(array('url'=>'users/login', 'class'=>'form-signin')) }}
<h2 class="form-signin-heading">Please Login</h2>

        {{ Form::label('email','Email') }}
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