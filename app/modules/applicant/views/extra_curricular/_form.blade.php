@extends('layouts.master')

@section('sidebar')
    @include('applicant::_sidebar')
@stop

@section('content')

 <div class='control-group'>
 <legend style="color: #0088cc"></legend>
<div class="span6 well">

{{ Form::open(array('class'=>'form-horizontal','url' => 'applicant/extra_curricular_store', 'method' =>'post', 'files'=>'true','id'=>'signup-form')) }}

{{ Form::hidden('applicant_id', $applicant_id = 1, array('class'=>'form-control')) }}

 <div class="form-group">
    <span class="text-muted"><em><span style="color:red;">  * </span><b>Indicates required field</b> </em></span>
 </div>

 <div class="form-group">
 {{ Form::label('user_id','Name of Applicant' ) }}
 {{ Form::select('user_id', User::orderBy('username')->lists('username', 'id')+[''=>'Select Option'] ,'', ['class'=>'form-control']) }}
 </div>


<div class="control-group @if ($errors->has('title')) has-error @endif">

<span style="color:red;">*</span>
        {{ Form::label('title', 'title:') }}
        {{ Form::text('title',Input::old('title'), array('class' => 'form-control','placeholder'=>'')) }}
@if ($errors->has('title')) <p class="help-block">{{ $errors->first('title') }}</p> @endif</div>

<div class="control-group @if ($errors->has('description')) has-error @endif">

<span style="color:red;">*</span>
        {{ Form::label('description', 'description') }}
        {{ Form::text('description', Input::old('description'), array('class'=>'form-control','placeholder'=>'')) }}
@if ($errors->has('description')) <p class="help-block" >{{ $errors->first('description') }}</p> @endif</div>

<div class="control-group @if ($errors->has('achivement')) has-error @endif">

<span style="color:red;">*</span>
        {{ Form::label('achivement', 'achivement') }}

        {{ Form::textarea ('achivement', Input::old('achivement'),['class'=>'form-control','size' => '30x5']) }}
@if ($errors->has('achivement')) <p class="help-block">{{ $errors->first('achivement') }}</p> @endif</div>

<div class="control-group @if ($errors->has('certificate_medal')) has-error @endif">

<span style="color:red;">*</span>
        {{ Form::label('certificate_medal', 'certificate_medal') }}
        {{ Form::file('certificate_medal', array('placeholder'=>'........','class'=>'form-control')) }}
@if ($errors->has('certificate_medal')) <p class="help-block">{{ $errors->first('certificate_medal') }}</p> @endif</div>


          <br>

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
