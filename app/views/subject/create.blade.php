@extends('layouts.master')

@section('sidebar')
    @include('subject.sidebar')
@stop

@section('content')
<h1>{{$title}}</h1>
      {{ Form::open(array('url' => 'subject/save', 'method' =>'post', 'role'=>'form','files'=>'true')) }}  
    
         @include('subject._form')

      {{ Form::close() }} 
  
 <br>

@stop