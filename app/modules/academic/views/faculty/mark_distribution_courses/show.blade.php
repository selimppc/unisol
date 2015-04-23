@extends('layouts.layout')
@section('sidebar')
    @include('layouts._sidebar_amw')
@stop
@section('content')
    <div class="box-body table-responsive ">
        <table class="table table-bordered table-hover table-striped">
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
    </div>
    @if(isset($coursetitle))
        <p>Marks Distribution Done.Following is the Distribution of Course : {{isset($coursetitle->relCourseConduct->relCourse->title) ? $coursetitle->relCourseConduct->relCourse->title: 'No Item Added!' }}</p>
    @else <p>Marks Distribution Is Not Done Yet.</p>
    @endif

    <p>Evaluation Total Marks:<b>{{ isset($coursetitle->relCourseConduct->relCourse->evaluation_total_marks) ? $coursetitle->relCourseConduct->relCourse->evaluation_total_marks : 'No Item Added!'}}</b></p>

    <p>So Far Added Marks:
        <b>@foreach($totalmarks as $value)
                {{ isset($value->marks) ? $value->marks : 'No Item Added!'}}
            @endforeach</b>
    </p>

    <div>&nbsp;</div>
    <div class="box-body table-responsive ">
        <table class="table table-bordered table-hover table-striped">
            <thead>
            <th>Item</th>
            <th>Marks(%)</th>
            <th>Actual Marks</th>
            <th>Policy</th>
            <th>IsAttendance</th>
            </thead>
            <tbody>
            @foreach($config_data as  $dkey => $dvalue)

                <tr>
                    <td>{{$dvalue['relAcmMarksDistItem']['title']}}</td>
                    <td>{{(($dvalue->marks * 100)/$dvalue['relCourseConduct']['relCourse']['evaluation_total_marks'])}}</td>
                    <td>{{$dvalue->marks}}</td>
                    <td>{{$dvalue->acm_marks_policy}}</td>
                    <td>{{($dvalue->is_attendance == 1) ? 'Yes' : '';}}</td>
                </tr>
            @endforeach
            {{--@endif--}}
            </tbody>
        </table>
    </div>
    <p>If Marks Distribution Is Not Done Then Go to Distribution And Make It Done First.
        <button type="button" class="btn-xs btn text-maroon" style="background:#5CE6E6" data-toggle="modal" data-target="#addModal" data-toggle="tooltip" data-placement="left" title="Marks Distribution"> <i class="fa fa-plus text-purple"></i> Marks Distribution
        </button>
    </p>
    <div class="modal-footer">
        <a href="{{URL::to('academic/faculty/course/config')}}" class="pull-right btn-xs btn-success"> <i class="fa fa-arrow-circle-left"></i> Back</a>
    </div>
    <p>&nbsp;</p>

    <!-- add new Dist Item -->
    {{--<div id="addModal" class="modal fade"data-keyboard="false" data-backdrop="static">--}}
        {{--<div class="modal-dialog modal-lg">--}}
            {{--<div class="modal-content">--}}
                {{--<div class="modal-body">--}}
                    {{--{{ Form::open(array('url' => 'academic/faculty/marks/distribution/save', 'method' =>'post', 'role'=>'form','files'=>'true')) }}--}}
                    {{--@include('academic::faculty.mark_distribution_courses.show')--}}
                    {{--{{ Form::close() }}--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

@stop




