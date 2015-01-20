@extends('layouts.master')

@section('sidebar')
    @include('admission::_sidebar')
@stop

@section('content')

@if(Session::has('message'))
<p class="alert">{{ Session::get('message') }}</p>
@endif

<div class="span6 well">
{{ Form::open(array('url'=>'/password_reset_confirm', 'class'=>'form-signin')) }}
<div class="auth-form">
  <div class="auth-form-header">
    <h3 style="">Password reset confirmation sent!</h3>
  </div>
  <div class="auth-form-body">
    <p>
      We’ve sent you an email containing a link that will allow you to reset your password for the next 30 minutes.
    </p>
    <p>
      Please check your spam folder if the email doesn’t appear within a few minutes.
    </p>
    <a href="usersign/login" class="minibutton">
      <span class="octicon octicon-arrow-right"></span>
      Return to sign in
</a>
  </div>
</div>
</div>

 @stop