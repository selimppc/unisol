@extends('layouts.master')

@section('sidebar')
    @include('admission::_sidebar')
@stop

@section('content')


<div class="span6 well">
{{ Form::open(array('url'=>'/password_reset_mail', 'class'=>'form-signin')) }}
<h3 class="form-signin-heading">Password Reminder</h3>
        <br>
        {{ Form::label('email_address','Email') }}
        {{ Form::text('email_address', null, array('class'=>'form-control', 'placeholder'=>'Email Address')) }}
        <br>

        {{ Form::submit('Send Reminder', array('class'=>'btn btn-large btn-primary '))}}
        <br>
        {{ Form::close() }}

</div>

 @stop