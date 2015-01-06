@extends('layouts.master')

@section('sidebar')
    @include('test._sidebar')
@stop

@section('content')
   {{--<h2>Welcome to Admission Module...! </h2>--}}
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

         {{ Form::label('lastname', 'Last Name:') }}
         {{ Form::text('lastname',Input::old('lastname'), array('class' => 'form-control','placeholder'=>'Enter your last name')) }}




         <br>

        {{ Form::submit('Save', array('class' => 'btn btn-primary')) }}


{{ Form::close() }}
</div>



@stop