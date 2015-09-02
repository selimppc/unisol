@extends('layouts.layout')
@section('sidebar')
    {{--@include('layouts._sidebar_applicant')--}}
@stop
@section('content')
<div class="span6 well">
{{ Form::open(array('url'=>'user/username_reset_mail', 'class'=>'form-signin')) }}
<h3 class="form-signin-heading">Forgot Username</h3>
        <br>

        {{ Form::label('email','Email') }}
        {{ Form::text('email', null, array('class'=>'form-control', 'placeholder'=>'Email Address')) }}
        <br>

        {{ Form::submit('submit', array('class'=>'btn btn-large btn-primary '))}}
        <br>
        {{ Form::close() }}

</div>

 @stop