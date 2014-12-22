@extends('layouts.master')

@section('sidebar')
    @include('test._sidebar')
@stop

@section('content')
   <h1>Welcome Home! </h1>
   <p style="color: green">hello...</p>
   {{Form::select('size', array('L' => 'Large', 'S' => 'Small'));}}

   {{ Form::text('title', null, ['data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'Tooltip on left']) }}

   <button type="button" class="btn btn-default" data-toggle="tooltip" data-placement="left" title="Tooltip on left">Tooltip on left</button>

@stop