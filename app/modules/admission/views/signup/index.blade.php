@extends('layouts.master')

@section('sidebar')
    @include('admission::_sidebar')
@stop

@section('content')

 <div class='control-group'>
 <legend style="color: #0088cc">Sign Up Here.......</legend>
<div class="span6 well">

{{ Form::open(array('class'=>'form-horizontal','url' => 'user/store', 'method' =>'post', 'files'=>'true','id'=>'signup-form')) }}


 <div class="form-group">
    <span class="text-muted"><em><span style="color:red;">  * </span><b>Indicates required field</b> </em></span>
 </div>


<div class="control-group @if ($errors->has('username')) has-error @endif">

<span style="color:red;">*</span>
        {{ Form::label('username', 'User Name:') }}
        {{ Form::text('username',Input::old('username'), array('class' => 'form-control','placeholder'=>'Enter your user name')) }}
@if ($errors->has('username')) <p class="help-block">{{ $errors->first('username') }}</p> @endif</div>

<div class="control-group @if ($errors->has('email_address')) has-error @endif">

<span style="color:red;">*</span>
        {{ Form::label('email_address', 'Email') }}
        {{ Form::text('email_address', Input::old('email_address'), array('class'=>'form-control','placeholder'=>'Enter a valid email address','required')) }}
@if ($errors->has('email_address')) <p class="help-block" >{{ $errors->first('email_address') }}</p> @endif</div>

<div class="control-group @if ($errors->has('password')) has-error @endif">

<span style="color:red;">*</span>
        {{ Form::label('password', 'Password') }}
        {{ Form::password('password', array('placeholder'=>'........','class'=>'form-control')) }}
@if ($errors->has('password')) <p class="help-block">{{ $errors->first('password') }}</p> @endif</div>

<div class="control-group @if ($errors->has('confirmpassword')) has-error @endif">

<span style="color:red;">*</span>
        {{ Form::label('confirmpassword', 'ConfirmPassword') }}
        {{ Form::password('confirmpassword', array('placeholder'=>'........','class'=>'form-control')) }}
@if ($errors->has('confirmpassword')) <p class="help-block">{{ $errors->first('confirmpassword') }}</p> @endif</div>

<div class="control-group @if ($errors->has('targetrole')) has-error @endif">

<span style="color:red;">*</span>
        {{ Form::label('targetrole', 'Target Role') }}
        {{ Form::select('targetrole', array(''=>'Select One','applicant' => 'Applicant', faculty => 'Teacher','staff'=>'Staff','alumni'=>'Alumni','employer' => 'Employer'), '', array('class' => 'form-control'))}}
@if ($errors->has('targetrole')) <p class="help-block">{{ $errors->first('targetrole') }}</p> @endif</div>
          <br>

        {{--{{ HTML::image(Captcha::img(), 'Captha image') }}--}}


        {{--{{ Form::text('captcha_value', null, ['class'=>'form-control']) }}--}}
        {{--<div class="g-recaptcha" data-sitekey="6LeYvf4SAAAAAE72M_jBFJdzfx7mglsnK_0C4cr6"></div>--}}



         <br>

        {{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}

<br>
<br>

{{ Form::close() }}

</div>

</div>


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

@stop
