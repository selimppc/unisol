@extends('layouts.master')

@section('sidebar')
    @include('target_role._sidebar')
@stop

@section('content')

        <div style="padding: 10px; width: 90%;">
         <h1>Create Target Role</h1>

            {{ Form::open(array('route' => 'target_role.store', 'method' =>'post', 'role'=>'form','files'=>'true'))  }}

                    @include('target_role._form')

            {{ Form::close() }}

        </div>

@stop


