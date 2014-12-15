@extends('layouts.master')

@section('sidebar')
    @include('degree_level._sidebar')
@stop


@section('content')

    <div class="page-header" style="border: 1px solid #0077b3;">
            <h1>Edit Degree level</h1>
        </div>

        {{ Form::model( $employee, ['route' => ['employees.update', $employee->id], 'method' => 'POST', 'role' => 'form'] ) }}
           {{ Form::hidden('id', $employee->id) }}
           @include('employee._form')
        {{ Form::close() }}


@stop