@extends('layouts.layout')
@section('sidebar')
    @include('layouts._sidebar_amw')
@stop
@section('content')
    <table class="table table-bordered">
        <thead>
        <th>CourseName</th>
        <th>Department</th>
        <th>Year</th>
        <th>Semester</th>
        </thead>
        <tbody>
        @foreach($datas as $value)
            <tr>
                <td>{{$value['relCourse']['title']}}</td>
                <td>{{$value->relCourse->relSubject->relDepartment->title}}</td>
                <td>{{$value['relYear']['title']}}</td>
                <td>{{$value['relSemester']['title']}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <p>Following is the MarksDistribution of {{isset($coursetitle->relCourse->title) ? $coursetitle->relCourse->title: '' }}</p>
    <p>Total Marks:
        <b>@foreach($totalmarks as $value)
                {{ isset($value->marks) ? $value->marks : 'No Item Added!'}}
            @endforeach</b>
    </p>
    <table class="table table-bordered">
        <thead>
        <th>Item</th>
        <th>Marks(%)</th>
        <th>Actual Marks</th>
        <th>IsAttendance</th>
        </thead>
        <tbody>
        @foreach($config_data as  $dkey => $dvalue)
            <tr>
                <td>{{$dvalue['relAcmMarksDistItem']['title']}}</td>
                <td>{{(($dvalue->marks * 100)/$dvalue['relCourse']['evaluation_total_marks'])}}</td>
                <td>{{$dvalue->marks}}</td>
                <td>{{($dvalue->is_attendance == 1) ? 'Yes' : '';}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <p>If Marks Distribution is not done then go to distribution and make it done first.<a href="{{URL::to('academic/amw/config/')}}" class="btn btn-link">Marks Distribution</a>
    </p>
    <div class="modal-footer">
        <a href="{{URL::to('academic/amw/config/')}}" class="btn btn-primary">Back</a>
    </div>
@stop