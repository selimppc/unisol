@extends('layouts.master')

@section('sidebar')
    @include('admission::_sidebar')
@stop

@section('content')

@if(Session::has('message'))
<p class="alert">{{ Session::get('message') }}</p>
@endif

<div class="span5 well">
{{ Form::open(array('url'=>'password_reset_confirm', 'class'=>'form-signin')) }}
<h3 class="form-signin-heading">Change Your Password</h3>
        <br>
        {{ Form::label('password','Password') }}
        {{ Form::password('password',  array('class'=>'form-control')) }}
        <div class="form-group">
            <span class="text-muted"><em><span style="color:green;"></span><b>Must contain one lowercase letter,one uppercase letter, one number,one special character and be at least 8 characters long</b> </em></span>
         </div>
        <br>
         {{ Form::label('confirmpassword', 'ConfirmPassword') }}
         {{ Form::password('confirmpassword', array('class'=>'form-control')) }}
        <br>
        {{ Form::submit('submit', array('class'=>'btn btn-large btn-primary '))}}
        <br>
        {{ Form::close() }}

</div>

 @stop