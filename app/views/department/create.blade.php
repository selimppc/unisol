@extends('layouts.master')

@section('content')


<legend>Department Entry Form</legend>
<div class="span4 well">

{{ Form::open(array('url'=>'department/store','class'=>'form-horizontal')) }}


        {{ Form::label('dept_name','Department Name:') }}
        {{ Form::text('dept_name',Input::old('dept_name'), array('class' => 'form-control')) }}


        {{ Form::label('description', 'Description:') }}
        {{ Form::textarea('description',Input::old('description'), array('class' => 'form-control')) }}

         <br>

        {{ Form::submit('Save', array('class' => 'btn btn-primary')) }}


{{ Form::close() }}
</div>


@stop