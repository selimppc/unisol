@extends('layouts.master')

@section('sidebar')
    @include('test._sidebar')
@stop

@section('content')

 <div class='control-group'>
 <legend style="color: #0088cc">Sign Up Here.......</legend>
<div class="span6 well">



{{ Form::open(array('class'=>'form-horizontal')) }}


        {{ Form::label('firstname','First Name:') }}
        {{ Form::text('firstname',Input::old('firstname'), array('class' => 'form-control','placeholder'=>'Enter your first name')) }}


        {{ Form::label('middlename', 'Middle Name:') }}
        {{ Form::text('middlename',Input::old('middlename'), array('class' => 'form-control','placeholder'=>'Enter your middle name')) }}

        {{ Form::label('lastname', 'Last Name:') }}
        {{ Form::text('lastname',Input::old('lastname'), array('class' => 'form-control','placeholder'=>'Enter your last name')) }}

        {{ Form::label('email', 'Email') }}
        {{ Form::text('email', Input::old('email'), array('class'=>'form-control','required'=>'required')) }}

        {{ Form::label('username', 'User Name:') }}
        {{ Form::text('username',Input::old('username'), array('class' => 'form-control','placeholder'=>'Enter your user name')) }}

        {{ Form::label('password', 'Password') }}
        {{ Form::password('password', array('placeholder'=>'........','class'=>'form-control','required'=>'required')) }}

        {{ Form::label('targetrole', 'Target Role') }}
        {{ Form::select('targetrole', array(''=>'Select','applicant' => 'Applicant', 'teacher' => 'Teacher','staff'=>'Staff','alumni'=>'Alumni','employer' => 'Employer'), '', array('class' => 'form-control','required'=>'required'))}}


        {{ HTML::image(Captcha::img(), 'Captha image') }}


        {{ Form::text('captcha_value', null, ['class'=>'form-control']) }}
        <div class="g-recaptcha" data-sitekey="6LeYvf4SAAAAAE72M_jBFJdzfx7mglsnK_0C4cr6"></div>



         <br>

        {{ Form::submit('Save', array('class' => 'btn btn-primary')) }}


{{ Form::close() }}

</div>

</div>

@stop