@extends('layouts.master')

@section('sidebar')
    @include('admission::_sidebar')
@stop

@section('content')

@if(Session::has('message'))
<p class="alert">{{ Session::get('message') }}</p>
@endif

<div class="span6 well">
{{ Form::open(array('url'=>'/password_reset', 'class'=>'form-signin')) }}
<h3 class="form-signin-heading">Forgot Password</h3>
        <br>
        {{ Form::label('email','Email') }}
        {{ Form::text('email', null, array('class'=>'form-control', 'placeholder'=>'Email Address')) }}
        <br>

        {{ Form::submit('submit', array('class'=>'btn btn-large btn-primary '))}}
        <br>
        {{ Form::close() }}

</div>

 @stop