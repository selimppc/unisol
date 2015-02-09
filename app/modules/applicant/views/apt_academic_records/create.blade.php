@extends('layouts.master')

@section('sidebar')
    @include('applicant::_sidebar')
@stop

@section('content')

 <div class='control-group'>
 <legend style="color: #0088cc"></legend>

<div class="span6 well">
<h3>Add</h3>

{{ Form::open(array('class'=>'form-horizontal','url' => 'applicant/academic_records/store', 'method' =>'post', 'files'=>'true','id'=>'signup-form')) }}

<br><br>
<div>{{ Form::label('level_of_education', 'Level of Education ') }}
{{ Form::select('level_of_education', array('' => 'Select one',
   'PSC' => 'PSC', 'JSC' => 'JSC', 'SSC'=>'SSC','HSC'=>'HSC'), Input::old('level_of_education'),
    array('class' => 'form-control', 'required'=> true)) }}</div>


<div >{{ Form::label('degree_name', 'Degree Name') }}</div >
<div >{{ Form::text('degree_name', Input::old('degree_name'),['class'=>'form-control ']) }}</div>

<div >{{ Form::label('institute_name', 'Institute Name') }}</div >
<div >{{ Form::text('institute_name', Input::old('institute_name'),['class'=>'form-control ']) }}</div>

<div >{{ Form::label('group', 'Academic Group') }}</div >
{{ Form::select('group', array('' => 'Select one',
         'Science' => 'Science', 'Arts' => 'Arts', 'Commerce'=>'Commerce'), Input::old('group'),
          array('class' => 'form-control')) }}

<div >{{ Form::label('board', 'Board') }}</div >
{{ Form::select('board', array('' => 'Select one',
          'Dhaka' => 'Dhaka', 'Chittagong' => 'Chittagong', 'Comilla'=>'Comilla','Khulna'=>'Khulna','Syllhet'=>'Syllhet'), Input::old('board'),
          array('class' => 'form-control')) }}

<div >{{ Form::label('major_subject', 'Major Subject') }}</div >
<div >{{ Form::text('major_subject', Input::old('major_subject'),['class'=>'form-control ']) }}</div>

{{--<div >{{ Form::label('major_subject', 'Major Subject') }}</div >--}}
{{--<div >{{ Form::text('major_subject', Input::old('major_subject'),['class'=>'form-control ']) }}</div>--}}

<div >{{ Form::label('result', 'Result') }}</div >
<div >{{ Form::text('result',Input::old('result')) }}  Out Of
      {{ Form::text('Result', 5) }}
</div>

<div >{{ Form::label('roll_number', 'Roll') }}</div >
<div >{{ Form::text('roll_number', Input::old('roll_number'),['class'=>'form-control ']) }}</div>

<div >{{ Form::label('registration_number', 'Registration') }}</div >
<div >{{ Form::text('registration_number', Input::old('registration_number'),['class'=>'form-control ']) }}</div>


<div >{{ Form::label('year_of_passing', 'Passing Year') }}</div >
<div >{{ Form::text('year_of_passing', Input::old('year_of_passing'),['class'=>'form-control ']) }}</div>



















<br>
<br>
{{ Form::submit('Save', array('class' => 'btn btn-primary')) }}

<br>
<br>
{{ Form::close() }}

</div>
</div>


@stop
