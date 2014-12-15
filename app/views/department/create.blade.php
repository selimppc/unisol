@extends('layouts.master')
@section('sidebar')
    @include('test._sidebar')
@stop
@section('content')
<div class="span8" >
<div class="row-fluid section">
<!-- block -->
<div class="block">
<div class="navbar navbar-inner block-header">
<div class="muted pull-left">Department Entry Form</div>
</div>
<div class="container">
<div class="span6"  >
<div class="offset4 span4">
{{ Form::open(array('url'=>'department/store','class'=>'form-signup')) }}


        {{ Form::label('dept_name', 'Department Name:') }}
        {{ Form::text('dept_name',Input::old('dept_name'), array('class' => 'form-control')) }}


        {{ Form::label('description', 'Description:') }}
        {{ Form::textarea('description',Input::old('description'), array('class' => 'form-control')) }}

         <br>

        {{ Form::submit('Save', array('class' => 'btn btn-primary')) }}


{{ Form::close() }}
</div>
</div>
</div>

</div>
</div>
</div>



@stop