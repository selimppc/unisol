@extends('layouts.master')

@section('sidebar')
    @include('test._sidebar')
@stop

@section('content')
   <h1>Welcome to New Module! </h1>
   <p style="color: red"> ERROR :: This is Common Module !!</p>
@stop