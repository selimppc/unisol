@extends('layouts.master')

@section('sidebar')
    @include('test._sidebar')
@stop

@section('content')
    <div style="width: 90%; margin: 0 auto;">
        <h1 style="color: #aaa;"> Oops! You missed something ! </h1>
        {{ HTML::image('/img/404.jpg', '404 error') }}
    </div>

@stop