@extends('layouts.layout')
@section('top_menu')
    @include('layouts._top_menu')
@stop
@section('sidebar')
    @include('layouts._sidebar_public')
@stop
@section('content')

    <!-- left column -->
    <div class="col-md-8"style="margin-left: 40px">
        <!-- general form elements -->
        <div class="box box-solid">
            <div class="box-header">
                <h3 class="text-center text-green">Sign Up Here.......</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                {{ Form::open(array('class'=>'form-horizontal','url' => 'applicant/store', 'method' =>'post', 'files'=>'true','id'=>'signup-form')) }}

                <span class="text-muted ">Please fillup the following fields and be an registered user.</span>
                <div>&nbsp;</div>
                <span class="text-muted "><em><span style="color:red;">*</span>Marked are required fields </em></span>
                <div>&nbsp;</div>

                <div class="control-group">
                    <div class="col-lg-6" style="padding-left: 0;">
                        {{ Form::label('username', 'User Name:') }}
                        {{ Form::text('username',Input::old('username'), array('class' => 'form-control','placeholder'=>'Enter your user name')) }}
                    </div>
                    <div class="col-lg-6" style="padding-right: 0;">
                         {{ Form::label('email_address', 'Email') }}
                         {{ Form::text('email_address', Input::old('email_address'), array('class'=>'form-control','placeholder'=>'Enter a valid email address','required')) }}
                    </div>
                </div>

                <div class="control-group">
                     <div class="col-lg-6" style="padding-left: 0;">
                        {{ Form::label('password', 'Password') }}
                        {{ Form::password('password', array('placeholder'=>'........','class'=>'form-control')) }}
                     </div>
                     <div class="col-lg-6" style="padding-right: 0;">
                        {{ Form::label('confirmpassword', 'ConfirmPassword') }}
                        {{ Form::password('confirmpassword', array('placeholder'=>'........','class'=>'form-control')) }}
                    </div>
                </div>
                <div class="control-group">
                    <div class="col-lg-6" style="padding-left: 0;">
                        {{ Form::label('role_id', 'Target Role') }}
                        {{ Form::select('role_id', array(''=>'Select One','10' =>'Applicant', '2' => 'Teacher','8'=>'Alumni','9' => 'Employee'), '', array('class' => 'form-control'))}}
                    </div>
                    <div class="col-lg-6" style="padding-right: 0;">
                        {{ Form::label('to_date', 'End Date') }}
                        {{ Form::text('to_date',  Input::old('to_date'),['class'=>'form-control date_picker']) }}
                    </div>
                </div>
                <p>&nbsp;</p>
                {{ Form::submit('Register', array('class' => 'btn btn-success')) }}
                <a href="{{URL::previous()}}" class="btn btn-default">Close</a>
                <br>
                <br>
                {{ Form::close() }}

            </div><!-- /.box -->
            {{--</div>--}}
        </div>
    </div>
@stop

<script type="text/javascript">
 $(document).ready(function() {
        $('#firstname').tooltip({  title: 'Write your  firstname.This is a required field',placement : 'right' });
        $('#middlename').tooltip({  title: 'Write your  Middlename.(Optional)',placement : 'right' });
        $('#lastname').tooltip({  title: 'Write your lastname.This is a required field',placement : 'right' });
        $('#email').tooltip({  title: 'Write your email address here to varify your account',placement : 'right' });
        $('#username').tooltip({  title: 'Write your  username here to access your account',placement : 'right' });
        $('#password').tooltip({  title: 'Your Password should be at least 8 charecters.1 uppercase,1 lowercase,1 number,1 special charecter is must',placement : 'right' })
        $('#confirmpassword').tooltip({  title: 'Write again your password  to confirm it',placement : 'right' });
});
</script>