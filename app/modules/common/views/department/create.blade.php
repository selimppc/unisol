@extends('layouts.layout')
@section('top_menu')
    @include('layouts._top_menu')
@stop
@section('sidebar')
    @include('layouts._sidebar_amw')
@stop

@section('content')

        <div style="padding: 10px; width: 90%;">
         <h1>Add New Department</h1>

            {{ Form::open(array('route' => 'department.store', 'method' =>'post', 'role'=>'form','files'=>'true'))  }}

                    @include('common::department._form')

            {{ Form::close() }}

        </div>

@stop