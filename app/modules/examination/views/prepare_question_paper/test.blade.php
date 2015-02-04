@extends('layouts.master')
@section('sidebar')
    @include('academic::mark_distribution_courses.amw.sidebar')
@stop
@section('content')

{{--@foreach($datas as $value)--}}
    {{--{{ $value->coursemanagement->id; }}--}}
{{--@endforeach--}}

@for($i=0; $i<count($datas); $i++ )
    ID: {{$datas[$i]['id']}} <br>
    Title: {{$datas[$i]['title']}} <br>
    DeadLine: {{$datas[$i]['deadline']}} <br>
    Year: {{$datas[$i]['coursemanagement']['year']['title']}} <br>
    Semester: {{$datas[$i]['coursemanagement']['semester']['title']}} <br>
    <br>
@endfor


@stop
