@extends('layouts.layout')
@section('sidebar')
    @include('layouts._sidebar_applicant')
@stop
@section('content')

    <!-- left column -->
    <div class="col-md-6">
        <!-- general form elements -->
        <div class="box box-solid">
            <div class="box-header">
                <h3 class="text-center text-green">Signup Here</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                {{ Form::open(array('class'=>'form-horizontal','url' => 'applicant/store', 'method' =>'post', 'files'=>'true','id'=>'signup-form')) }}

                <span class="text-muted ">Please put the Values to following input box and be an registered user as Applicant.</span>
                <div>&nbsp;</div>
                <span class="text-muted "><em><span style="color:red;">*</span>Marked are required fields </em></span>
                <div>&nbsp;</div>

                <div class="control-group">
                    {{ Form::label('first_name', 'First Name:') }}<span style="color:red;">*</span>
                    {{ Form::text('first_name',Input::old('first_name'), array('class' => 'form-control','placeholder'=>'Enter First  name')) }}
                </div>
                <div class="control-group">
                    {{ Form::label('middle_name', 'Middle Name:') }}
                    {{ Form::text('middle_name',Input::old('middle_name'), array('class' => 'form-control','placeholder'=>'Enter Middle Name')) }}
                </div>
                <div class="control-group">
                    {{ Form::label('last_name', 'Last Name:') }}<span style="color:red;">*</span>
                    {{ Form::text('last_name',Input::old('last_name'), array('class' => 'form-control','placeholder'=>'Enter Last Name')) }}
                </div>
                <div class="control-group ">
                    {{ Form::label('username', 'User Name:') }}<span style="color:red;">*</span>
                    {{ Form::text('username',Input::old('username'), array('class' => 'form-control','placeholder'=>'Enter User Name')) }}
                </div>
                <div class="control-group ">
                    {{ Form::label('email', 'Email') }}<span style="color:red;">*</span>
                    {{ Form::text('email', Input::old('email_address'), array('class'=>'form-control','placeholder'=>'Enter a valid email address','required')) }}
                </div>
                <div class="control-group ">
                    {{ Form::label('password', 'Password') }} <span style="color:red;">*</span>
                    {{ Form::password('password', array('placeholder'=>'........','class'=>'form-control')) }}
                </div>
                <div class="control-group ">
                    {{ Form::label('confirmpassword', 'ConfirmPassword') }} <span style="color:red;">*</span>
                    {{ Form::password('confirmpassword', array('placeholder'=>'........','class'=>'form-control')) }}
                </div>
                <br>

                <br>
                {{ Form::submit('Register', array('class' => 'btn btn-primary')) }}
                <a href="{{URL::previous()}}" class="btn btn-default">Close</a>
                <br>
                <br>
                {{ Form::close() }}
                <div class="margin text-center">
                    <span>Register using social networks</span>
                    <br/>
                    <button class="btn bg-light-blue btn-circle"><i class="fa fa-facebook"></i></button>
                    <button class="btn bg-aqua btn-circle"><i class="fa fa-twitter"></i></button>
                    <button class="btn bg-red btn-circle"><i class="fa fa-google-plus"></i></button>

                </div>
            </div><!-- /.box -->
            {{--</div>--}}
        </div>
    </div>


@stop

