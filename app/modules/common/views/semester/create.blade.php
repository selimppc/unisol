@extends('layouts.master')

@section('sidebar')
    @include('semester._sidebar')
@stop

@section('content')

        <div style="padding: 10px; width: 90%;">
         <h1>Create Semester</h1>

            {{ Form::open(array('route' => 'semester.store', 'method' =>'post', 'role'=>'form','files'=>'true'))  }}

                    @include('semester._form')

            {{ Form::close() }}

        </div>

@stop


