@extends('layouts.layout')
@section('top_menu')
    @include('layouts._top_menu')
@stop
@section('sidebar')
    {{--@include('layouts._sidebar_applicant')--}}
@stop
@section('content')
    <div class="col-md-12">
        {{--<div class="row">--}}
            <div class="col-lg-6"  style="margin-left: 15%">
                <div class="box box-warning">
                    <div class="box-body">
                        <p style="text-align: center;color: #800080;font-size:large;margin-top: 5px">Change Password</p>
                        {{ Form::open(array('url' => 'user/change_password', 'method' =>'post','id'=>'signup-form')) }}
                            <div class="col-lg-6">
                                    {{ Form::label('old_password', 'Old Password') }}
                                    {{ Form::password('old_password', ['class' => 'form-control','placeholder'=>'Enter Old Password']) }}
                            </div>
                            <p>&nbsp;</p>
                            <div class="col-lg-6">
                                {{ Form::label('new_password', 'New Password') }}
                                {{ Form::password('new_password',Input::old('new_password'), array('class' => 'form-control','placeholder'=>'Enter New Password')) }}
                            </div>
                            <p>&nbsp;</p>
                            <div class="col-lg-6">
                                {{ Form::label('confirm_password', 'Confirm Password') }}
                                {{ Form::password('confirm_password',Input::old('confirm_password'), array('class' => 'form-control','placeholder'=>'Re-Enter New Password')) }}
                            </div>

                               {{ Form::submit('Update Password', array('class'=>'pull-right btn btn-sm btn-primary '))}}

                        {{ Form::close() }}
                        <p>&nbsp;</p>
                    </div>
                    <p>&nbsp;</p>
                </div>
            </div>
        {{--</div>--}}
    </div>
@stop