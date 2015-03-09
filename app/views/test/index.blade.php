@extends('layouts.layout')

@section('sidebar')
    @include('layouts._sidebar_layout')
@stop

@section('content')
   <h1>Welcome Home! </h1>
   <p style="color: green">hello...90909</p>
   {{Form::select('size', array('L' => 'Large', 'S' => 'Small'));}}

   {{ Form::text('title', null, ['data-toggle'=>'tooltip', 'data-placement'=>'left', 'title'=>'Tooltip on left']) }}

@stop