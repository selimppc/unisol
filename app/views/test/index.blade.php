@extends('layouts.master')

@section('sidebar')
    @include('test._sidebar')
@stop

@section('content')
   <h1>Welcome Home! </h1>
   <p style="color: red"> ERROR :: You Lost !!</p>
@stop