@extends('layouts.master')

@section('sidebar')
    @include('test._sidebar')
@stop

@section('content')

<div class="container" style="margin-top: 30px; width:500px">

    <div class='row clearfix'>
    <div class='col-md-12'style="width:450px;background:#FFFFFF">
   {{--<h2>Welcome to Admission Module...! </h2>--}}
<div class="span6 well">
<legend style="color: #0088cc">Sign Up Here.......</legend>


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


         <br>

        {{ Form::submit('Save', array('class' => 'btn btn-primary')) }}


{{ Form::close() }}

</div>
</div>
</div>
</div>
@stop