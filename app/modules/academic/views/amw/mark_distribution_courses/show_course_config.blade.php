@extends('layouts.master')
@section('sidebar')
    @include('academic::_sidebar')
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
        <p>Following is the MarksDistribution of this course.</p>
        {{--<p> Total Marks: {{ $datas['relCourse']['evaluation_total_marks']}}</p>--}}

        <table class="table table-bordered">
            <thead>
            <th>Item</th>
            <th>Marks(%)</th>
            <th>Actual Marks</th>
            {{--<th>Course</th>--}}
            <th>IsAttendance</th>
            </thead>
            <tbody>
            @foreach($config_data as  $dkey => $dvalue)
                {{--<p>Total Marks:</p>--}}
                {{--<p>{{$dvalue['relCourse']['evaluation_total_marks']}}</p>--}}
                <tr>
                    <td>{{$dvalue['relAcmMarksDistItem']['title']}}</td>
                    <td>{{(($dvalue->marks * 100)/$dvalue['relCourse']['evaluation_total_marks'])}}</td>
                    <td>{{$dvalue->marks}}</td>
                    {{--<td>{{$dvalue['relCourse']['title']}}</td>--}}
                    <td>{{($dvalue->is_attendance == 1) ? 'Yes' : '';}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <p>If Marks Distribution is not done then go to distribution and make it done first.<a href="{{URL::to('academic/amw/config/')}}" class="btn btn-link">MarksDist</a>
        </p>
  </div>
</div>
<div class="modal-footer">
    <a href="{{URL::to('academic/amw/config/')}}" class="btn btn-default">Back</a>
</div>
@stop