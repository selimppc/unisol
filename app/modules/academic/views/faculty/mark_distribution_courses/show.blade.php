@extends('layouts.layout')
@section('sidebar')
    @include('academic::_sidebar')
@stop
@section('content')
    {{--<h4>{{$title}}</h4>--}}
        <table class="table table-bordered">
            <thead>
            <th>CourseName</th>
            <th>Department</th>
            <th>Year</th>
            <th>Semester</th>
            </thead>
            <tbody>

            @foreach($data as $value)
                <tr>
                    <td>{{$value['relCourse']['title']}}</td>
                    <td>{{$value->relCourse->relSubject->relDepartment->title}}</td>
                    <td>{{$value['relYear']['title']}}</td>
                    <td>{{$value['relSemester']['title']}}</td>

                </tr>
            @endforeach
            </tbody>
        </table>
        <p>Following is the MarksDistribution of this course.</p>



        <table class="table table-bordered">
            <thead>
            <th>Item</th>
            <th>Marks(%)</th>
            <th>Actual Marks</th>
            <th>Policy</th>
            <th>IsAttendance</th>
            </thead>
            <tbody>
            {{--Determine whether a variable is considered to be empty. A variable is considered empty if it does not exist or if its value equals FALSE. empty() does not generate a warning if the variable does not exist.--}}
            {{--@if(!empty($notFound))--}}
            {{--<p>Sorry nothing found for your query!</p>--}}
            {{--@else--}}
            @foreach($config_data as  $dkey => $dvalue)

                <tr>
                    <td>{{$dvalue['relAcmMarksDistItem']['title']}}</td>
                    <td>{{(($dvalue->marks * 100)/$dvalue['relCourseManagement']['relCourse']['evaluation_total_marks'])}}</td>
                    <td>{{$dvalue->marks}}</td>
                    <td>{{$dvalue->acm_marks_policy}}</td>
                    <td>{{($dvalue->is_attendance == 1) ? 'Yes' : '';}}</td>
                </tr>
            @endforeach
            {{--@endif--}}
            </tbody>
        </table>
        <p>If Marks Distribution is not done then go to distribution and make it done first.<a href="{{URL::to('academic/faculty/')}}" class="btn btn-link">MarksDistribution</a>

            <a href="{{URL::to('academic/faculty/')}}" class="btn btn-primary" style="margin-left: 260px">Back </a>

        </p>
    </div>
</div>
<div class="modal-footer">

</div>
@stop