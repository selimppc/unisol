@extends('layouts.master')

@section('sidebar')
    @include('degree_level._sidebar')
@stop


@section('content')

{{ Form::open([
        'route' => ['degreelevel.store'],
        'role' => 'form',
        //'autoComplete' => 'off',
        ]) }}
        @include('degree_level._form')
{{ Form::close() }}


@stop