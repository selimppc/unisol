@extends('layouts.master')

@section('sidebar')
    @include('test._sidebar')
@stop
@section('content')

    <h1>{{ trans('localization_test.title') }}</h1>
    <h2>{{ trans('localization_test.subtitle') }}</h2>


@stop