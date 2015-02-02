@extends('layouts.master')
@section('sidebar')
    @include('applicant::_sidebar')
@stop
@section('content')


<a href= "{{URL::to('applicant/extra_curricular/create') }}" class="btn btn-sm btn-info">Extra-Curricular Activities</a>

<a href= "{{URL::to('applicant/applicant_profile/create') }}" class="btn btn-sm btn-info">Applicant profile</a>







@stop