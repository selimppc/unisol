@extends('layouts.master')

@section('sidebar')
    @include('admission::_sidebar')
@stop

@section('content')


    <div class="span6 well">
        {{ Form::open(array('class'=>'form-signin')) }}
        <h4 class="form-signin-heading">Mail Notification</h4>

        <div>
            <p>Thanks for signing up! Please check your email.</p>
        </div>
        {{ Form::close() }}

    </div>

@stop