@extends('layouts.master')

@section('sidebar')
    @include('role_task_user._sidebar')
@stop

@section('content')

        <div style="padding: 10px; width: 90%;">
         <h1>Create Role task User</h1>

            {{ Form::open(array('route' => 'role_task_user.store', 'method' =>'post', 'role'=>'form','files'=>'true'))  }}

                    @include('role_task_user._form')

            {{ Form::close() }}

        </div>

        <br><br>

@stop


