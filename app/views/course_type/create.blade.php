@extends('layouts.master')

@section('sidebar')
    @include('course_type._sidebar')
@stop

@section('content')

        <div style="padding: 10px; width: 90%;">
         <h1>Create Semester</h1>

            {{ Form::open(array('route' => 'course_type.store', 'method' =>'post', 'role'=>'form','files'=>'true'))  }}

                    @include('course_type._form')

            {{ Form::close() }}

        </div>

@stop


