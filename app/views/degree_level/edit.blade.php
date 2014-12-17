@extends('layouts.master')

@section('sidebar')
    @include('degree_level._sidebar')
@stop

@section('content')

        <h1>Edit Degree Level</h1>

{{ Form::model($degree,array('url'=>'degree_level/update','method' => 'POST')) }}

       {{ Form::hidden('id', $degree->id) }}
       @include('degree_level._form')
    {{ Form::close() }}

@stop