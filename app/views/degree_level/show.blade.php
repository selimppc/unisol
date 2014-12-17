@extends('layouts.master')

@section('sidebar')
    @include('degree_level._sidebar')
@stop


@section('content')

    {{ Form::open(array('url'=>'degree_level/show','method' => '')) }}

        <div class="jumbotron text-center">
            <h2>{{ $degree->title }}</h2>
            <p>
                <strong> Description:</strong> {{ $degree->description }}
            </p>
        </div>

    {{ Form::close() }}

@stop


