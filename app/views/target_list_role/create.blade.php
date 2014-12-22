@extends('layouts.master')

@section('sidebar')
    @include('target_list_role._sidebar')
@stop

@section('content')

        <div style="padding: 10px; width: 90%;">
         <h1>Create Task List</h1>

            {{ Form::open(array('route' => 'target_list_role.store', 'method' =>'post', 'role'=>'form','files'=>'true'))  }}

                    @include('target_list_role._form')

            {{ Form::close() }}

        </div>

        <br><br>

@stop


