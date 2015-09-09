@extends('layouts.layout')
@section('top_menu')
    @include('layouts._top_menu')
@stop
@section('sidebar')
    @include('layouts._sidebar_public')
@stop
@section('content')
    <div class="box-body">
        <div class="row">
            <div class="col-lg-6"  style="margin-left: 15%">
                <div class="box box-warning">
                    <div class="box-body">
                        <p style="text-align: center;color: #800080;font-size:large;margin-top: 5px">Forgot Password</p>
                        {{ Form::open(array('url'=>'user/password_reminder_mail', 'class'=>'form-signin')) }}
                        {{ Form::hidden('status',2)}}
                        {{ Form::label('email','Email Address') }}
                        {{ Form::text('email', null, array('class'=>'form-control', 'placeholder'=>'Email Address')) }}
                        <p>&nbsp;</p>
                        {{ Form::submit('Submit', array('class'=>'pull-right btn btn-sm btn-primary'))}}
                        <br>
                        {{ Form::close() }}
                         <p>&nbsp;</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop