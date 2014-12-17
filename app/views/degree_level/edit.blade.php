@extends('layouts.master')

@section('sidebar')
    @include('degree_level._sidebar')
@stop

@section('content')

    <div class="page-header" style="border: 1px solid #0077b3;">
        <h1>Edit Degree Level</h1>
    </div>

    {{ Form::model( $degree, ['route' => ['degreelevel.update', $degree->id], 'method' => 'POST', 'role' => 'form'] ) }}
       {{ Form::hidden('id', $degree->id) }}
       @include('degree_level._form')
    {{ Form::close() }}

@stop