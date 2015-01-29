@extends('layouts.master')
@section('sidebar')
    @include('applicant::_sidebar')
@stop
@section('content')


<a href= "{{URL::to('applicant/extra_curricular/create') }}" class="btn btn-sm btn-info">Extra-Curricular Activities</a>







@stop