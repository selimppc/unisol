@extends('layouts.layout')
@section('top_menu')
    @include('layouts._top_menu')
@stop
@section('sidebar')
    @include('layouts._sidebar_public')
@stop
@section('content')
    <!-- left column -->
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-solid">
            <div class="box-header" style="background-color: #0490a6">
                            <h3 class="text-center text-green"><b style="color: #f5f5f5">Sign Up Here.......</b></h3>
            </div><!-- /.box-header -->
            <div class="box-body" style="background-color:aliceblue">
                {{ Form::open(array('class'=>'form-horizontal','url' => 'applicant/store', 'method' =>'post', 'files'=>'true','id'=>'signup-form')) }}

                <span class="text-muted ">Please fillup the following fields and be an registered applicant.</span>
                <span class="text-muted "><em style="color:midnightblue"><span style="color:red;">(*)</span> Marked are required fields. </em></span>
                <p>&nbsp;</p>
                <div class="control-group">
                    <div class="col-lg-4">
                       {{ Form::label('first_name', 'First Name:') }}<span style="color:red;">*</span>
                       {{ Form::text('first_name',Input::old('first_name'), array('class' => 'form-control','placeholder'=>'Enter First  name','required')) }}
                    </div>
                    <div class="col-lg-4">
                         {{ Form::label('middle_name', 'Middle Name:') }}
                         {{ Form::text('middle_name',Input::old('middle_name'), array('class' => 'form-control','placeholder'=>'Enter Middle  name')) }}
                    </div>
                     <div class="col-lg-4">
                         {{ Form::label('last_name', 'Last Name:') }}<span style="color:red;">*</span>
                         {{ Form::text('last_name',Input::old('last_name'), array('class' => 'form-control','placeholder'=>'Enter Last  name','required')) }}
                     </div>
                </div>
                <p>&nbsp;</p>
                <div class="control-group">
                    <div class="col-lg-6" >
                        {{ Form::label('username', 'User Name:') }}<span class="text-danger">*</span>
                        {{ Form::text('username',Input::old('username'), array('class' => 'form-control','placeholder'=>'Enter your user name','required')) }}
                    </div>
                    <div class="col-lg-6">
                        {{ Form::label('email', 'Email:') }}<span style="color:red;">*</span>
                        {{ Form::text('email', Input::old('email_address'), array('class'=>'form-control','placeholder'=>'Enter a valid email address','required')) }}
                    </div>
                </div>
                <p>&nbsp;</p>

                <div class="control-group">
                     <div class="col-lg-6" >
                        {{ Form::label('password', 'Password:') }} <span style="color:red;">*</span>
                        {{ Form::password('password', array('placeholder'=>'','class'=>'form-control','required')) }}
                     </div>
                     <div class="col-lg-6">
                        {{ Form::label('confirm_password', 'Confirm Password:') }} <span style="color:red;">*</span>
                        {{ Form::password('confirm_password', array('placeholder'=>'','class'=>'form-control')) }}
                     </div>
                </div>
                <p>&nbsp;</p>

                <div class="pull-right">
                     {{ Form::submit('Submit', array('class' => 'btn btn-primary btn-sm')) }}
                     <a href="{{URL::previous()}}" class="btn btn-default btn-sm" style="margin-right:8px">Close</a>
                </div>
                <p>&nbsp;</p>
                {{ Form::close() }}
            </div><!-- /.box -->
        </div>
    </div>
@stop
