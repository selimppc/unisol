@extends('layouts.master')
@section('sidebar')
    @include('applicant::_sidebar')
@stop
@section('content')


        <div style="padding: 10px; width: 90%;">
         <h1>Add New </h1>

            {{--{{ Form::open(array('route' => 'department.store', 'method' =>'post', 'role'=>'form','files'=>'true'))  }}--}}
               {{ Form::open(array('class'=>'form-horizontal','url' => 'applicant/profile/store', 'method' =>'post', 'files'=>'true','id'=>'signup-form')) }}
               @include('applicant::applicant_profile._form')

            {{ Form::close() }}

        </div>

@stop