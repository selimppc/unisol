@extends('layouts.master')

@section('sidebar')
    @include('subject.sidebar')
@stop

@section('content')

      {{ Form::open(array('url' => 'subject/save', 'method' =>'post', 'role'=>'form','files'=>'true')) }}  
    
            @include('subject._form')

      {{ Form::close() }} 
  
 
@stop