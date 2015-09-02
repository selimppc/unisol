@extends('layouts.layout')
@section('top_menu')
    @include('layouts._top_menu')
@stop
@section('sidebar')
    {{--@include('layouts._sidebar_u')--}}
@stop
@section('content')

<div class="span6 well">
{{ Form::open(array('url'=>'users/login', 'class'=>'form-signin')) }}

         <h4 class="form-signin-heading">Login</h4>

         {{ Form::label('username','Username') }}
         <label for="username">
                 <a href="/user/username_reset">(forgot username?)</a>
         </label>
        {{ Form::text('username', null, array('class'=>'form-control', 'placeholder'=>'Email Address')) }}
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