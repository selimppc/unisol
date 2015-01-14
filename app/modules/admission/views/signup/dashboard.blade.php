@extends('layouts.master')

@section('sidebar')
    @include('test._sidebar')
@stop

@section('content')

<div class="container">
    <h1>Dashboard</h1>

    @if(Session::has('message'))
    <p class="alert">{{ Session::get('message') }}</p>
    @endif

    <p>Welcome to your Dashboard. You rock!</p>
</div>

@stop