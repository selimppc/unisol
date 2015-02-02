@extends('layouts.master')

@section('sidebar')
    @include('applicant::_sidebar')
@stop

@section('content')

 <div class='control-group'>
 <legend style="color: #0088cc"></legend>
<div class="span6 well">

{{ Form::open(array('class'=>'form-horizontal','url' => 'applicant/profile/store', 'method' =>'post', 'files'=>'true','id'=>'signup-form')) }}


 <div class="form-group">
    <span class="text-muted"><em><span style="color:red;">  * </span><b>Indicates required field</b> </em></span>
 </div>

 <div class="form-group">
 {{ Form::label('applicant_id','Name of Applicant' ) }}
 {{ Form::select('applicant_id', Applicant::orderBy('username')->lists('username', 'id')+[''=>'Select Option'] ,'', ['class'=>'form-control']) }}
 </div>


<div class="control-group @if ($errors->has('date_of_birth')) has-error @endif">

<span style="color:red;">*</span>
        {{ Form::label('date_of_birth', 'date_of_birth:') }}
        {{ Form::text('date_of_birth', null, array('type' => 'text', 'class' => 'form-control datepicker','placeholder' => 'Pick the date this task should be completed', 'id' => 'date')) }}
        {{--{{ Form::text('date_of_birth',Input::old('date_of_birth'), array('class' => 'form-control','placeholder'=>'')) }}--}}
@if ($errors->has('date_of_birth')) <p class="help-block">{{ $errors->first('date_of_birth') }}</p> @endif</div>

<div class="control-group @if ($errors->has('birth_place')) has-error @endif">

<span style="color:red;">*</span>
        {{ Form::label('birth_place', 'birth_place') }}
        {{ Form::text('birth_place', Input::old('birth_place'), array('class'=>'form-control','placeholder'=>'')) }}
@if ($errors->has('birth_place')) <p class="help-block" >{{ $errors->first('birth_place') }}</p> @endif</div>

<div class="control-group @if ($errors->has('gender')) has-error @endif">

<span style="color:red;">*</span>
        {{ Form::label('gender', 'gender') }}

        {{ Form::text ('gender', Input::old('gender'),['class'=>'form-control','size' => '30x5']) }}
@if ($errors->has('gender')) <p class="help-block">{{ $errors->first('gender') }}</p> @endif</div>

<div class="control-group @if ($errors->has('profile_image')) has-error @endif">

<span style="color:red;">*</span>
        {{ Form::label('profile_image', 'profile_image') }}
        {{ Form::file('profile_image', Input::old('profile_image'),array('class' => 'form-control','placeholder'=>'')) }}
@if ($errors->has('profile_image')) <p class="help-block">{{ $errors->first('profile_image') }}</p> @endif</div>

<div class="control-group @if ($errors->has('city')) has-error @endif">

<span style="color:red;">*</span>
        {{ Form::label('city', 'city') }}
        {{ Form::text('city', Input::old('profile_image'),array('class' => 'form-control','placeholder'=>'')) }}
@if ($errors->has('city')) <p class="help-block">{{ $errors->first('city') }}</p> @endif</div>

<div class="control-group @if ($errors->has('state')) has-error @endif">

<span style="color:red;">*</span>
        {{ Form::label('state', 'state') }}
        {{ Form::text('state', Input::old('state'),array('class' => 'form-control','placeholder'=>'')) }}
@if ($errors->has('state')) <p class="help-block">{{ $errors->first('state') }}</p> @endif</div>

<div class="control-group @if ($errors->has('country')) has-error @endif">

<span style="color:red;">*</span>
        {{ Form::label('country', 'country') }}
        {{ Form::text('country', Input::old('country'),array('class' => 'form-control','placeholder'=>'')) }}
@if ($errors->has('country')) <p class="help-block">{{ $errors->first('country') }}</p> @endif</div>

<div class="control-group @if ($errors->has('zip_code')) has-error @endif">

<span style="color:red;">*</span>
        {{ Form::label('zip_code', 'zip_code') }}
        {{ Form::text('zip_code', Input::old('zip_code'),array('class' => 'form-control','placeholder'=>'')) }}
@if ($errors->has('zip_code')) <p class="help-block">{{ $errors->first('zip_code') }}</p> @endif</div>




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

<script>
$(function() {
  // Enable Pickadate on an input field and
  // specifying date format for hidden input field
  $('#date').pickadate({
    formatSubmit : 'yyyy/mm/dd'
  });
});
</script>


@stop
