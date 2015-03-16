@extends('layouts.master')

@section('sidebar')
    @include('course._sidebar')
@stop

@section('content')

        <div style="padding: 10px; width: 90%;">
         <h1>Create Course</h1>

            {{ Form::open(array('route' => 'course.store', 'method' =>'post', 'role'=>'form','files'=>'true'))  }}

                    @include('course._form')

            {{ Form::close() }}

        </div>

@stop


