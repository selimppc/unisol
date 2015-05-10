@extends('layouts.layout')

@section('sidebar')
    @include('layouts._sidebar_layout')
@stop

@section('content')

    <div style="width: 98%; margin: 0 auto; background: #ffffff; padding: 2%;">
        <h1 style="color: red;"> Oops! You missed something.</b> ! </h1>
        {{ HTML::image('/img/404.jpg', '404 error') }}
    </div>

@stop