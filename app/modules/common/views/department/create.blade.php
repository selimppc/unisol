@extends('layouts.master')

@section('sidebar')
    @include('department._sidebar')
@stop

@section('content')

        <div style="padding: 10px; width: 90%;">
         <h1>Add New Department</h1>

            {{ Form::open(array('route' => 'department.store', 'method' =>'post', 'role'=>'form','files'=>'true'))  }}

                    @include('department._form')

            {{ Form::close() }}

        </div>

@stop