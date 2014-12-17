@extends('layouts.master')

@section('sidebar')
    @include('degree_level._sidebar')
@stop


@section('content')

        <div padding="10px 10px 10px 10px">

            {{ Form::open(array('route' => 'degreelevel.store', 'method' =>'post', 'role'=>'form','files'=>'true'))  }}

                    @include('degree_level._form')

            {{ Form::close() }}

        </div>


@stop