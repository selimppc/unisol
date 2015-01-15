@extends('layouts.master')

@section('sidebar')
    @include('test._sidebar')
@stop

@section('content')

    <h3 style="color: red">    @if($pageTitle)
               {{$pageTitle}}
           @endif
    </h3>
    <h1>Welcome to Dashboard </h1>
    Your username is : {{$user_id}} <br>
    for logout click here: {{ HTML::linkAction('HomeController@userLogout', 'Logout') }}


@stop