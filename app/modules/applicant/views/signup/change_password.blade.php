@extends('layouts.layout')
@section('sidebar')
    @include('layouts._sidebar_applicant')
@stop
@section('content')
    <div class="box-body">
        <div class="row">
            <div class="col-lg-6"  style="margin-left: 15%">
                <div class="box box-warning">
                    <div class="box-body">
                        <p style="text-align: center;color: #800080;font-size:large;margin-top: 5px">Change Password</p>
                        {{ Form::open(array('url'=>'applicant/change_password/update', 'class'=>'form-signin')) }}

                        {{ Form::label('old_password','Old Password') }}
                        {{ Form::password('password',  array('class'=>'form-control','required')) }}

                        {{ Form::label('password','New Password') }}
                        {{ Form::password('new_password',  array('class'=>'form-control','required')) }}
                        <div class="form-group">
                            <span class="text-muted"><em><span style="color:green;"></span><b>Must contain one lowercase letter,one uppercase letter, one number,one special character and be at least 8 characters long</b> </em></span>
                        </div>
                        <br>
                        {{ Form::label('confirm_password', 'Confirm New Password') }}
                        {{ Form::password('confirm_password', array('class'=>'form-control','required')) }}
                        <br>
                        {{ Form::submit('Update', array('class'=>'btn btn-large btn-primary '))}}
                        <br>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop