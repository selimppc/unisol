@extends('layouts.master')

@section('sidebar')
    @include('admission::_sidebar')
@stop

@section('content')

<div class="container">
    <h1>Dashboard</h1>

    @if(Session::has('message'))
    <p class="alert">{{ Session::get('message') }}</p>
    @endif

    <p>Welcome to your Dashboard. You are <b class="btn btn-sm btn-info">{{Auth::user()->username}}</b>! </p>


    {{ HTML::linkAction('UserController@logout', 'Logout') }}
    <br>
    <a href= "{{URL::to('applicant/profile') }}" class="btn btn-sm btn-info">Create Profile</a>

</div>

@stop