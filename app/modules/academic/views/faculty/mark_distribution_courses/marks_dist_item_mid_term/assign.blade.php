@extends('layouts.layout')
@section('sidebar')
    @include('academic::_sidebar')
@stop
@section('content')


    {{--<table>--}}
    {{--<?php $i = 0; ?>--}}
    {{--@foreach($acm_academic_ass_std as $value)--}}

            {{--<tr>--}}
                {{--<td>{{User::FullName($value[$i]['user_id'])}}</td>--}}
                {{--<td>--}}
                    {{--{{Semester::find(CourseManagement::where('course_id', '=', $value[0]['course_id'])--}}
                    {{--->where('user_id', '=', $value[0]['user_id'])--}}
                    {{--->first()->semester_id)->title; }}--}}
                {{--</td>--}}
                {{--<td>--}}
                    {{--{{Year::find(CourseManagement::where('course_id', '=', $value[0]['course_id'])--}}
                    {{--->where('user_id', '=', $value[0]['user_id'])--}}
                    {{--->first()->year_id)->title; }}--}}
                {{--</td>--}}
            {{--</tr>--}}

          {{--@foreach($course_management as $cm)--}}
            {{--{{User::FullName($value[$i]['user_id'])}}--}}
            {{--{{Semester::find($cm[$i]['semester_id'])->title; }}--}}
            {{--{{Year::find($cm[$i]['year_id'])->title;}}--}}
            {{--<br><br>--}}
        {{--@endforeach--}}
        {{--<br><br>--}}
    {{--@endforeach--}}
    {{--</table>--}}
        {{--@foreach($course_management as $cm)--}}
            {{--{{User::FullName($value[$i]['user_id'])}}--}}
            {{--{{Semester::find($cm[$i]['semester_id'])->title; }}--}}
            {{--{{Year::find($cm[$i]['year_id'])->title;}}--}}
            {{--<br><br>--}}
        {{--@endforeach--}}
        {{--<br><br>--}}



    {{ Form::open(array('url' => 'batch/assign')) }}
    {{--{{ Form::text('title', $acm->title, ['class'=>'form-control title'])}}--}}
    <p style="text-align: center;color: #800080;font-size:large ">Assign of {{$acm->title}} to student</p>
    {{ Form::hidden('acm_academic_id', $acm->id, ['class'=>'form-control acm_academic_id'])}}
    {{--<div class="col-md-4">--}}
    <div class='form-group' style="width: 300px">
        {{ Form::label('exam_question', 'Examination Question:') }}
        {{ Form::select('exam_question',$exam_questions,Input::old('exam_question'),['class'=>'form-control','required']) }}
    </div>
    <p style="color: cornflowerblue">Help Text: If CT question is not prepared then tell faculty to create question paper.</p>
    {{--</div>--}}
    <table id="example" class="table table-bordered table-hover table-striped">
        <thead>
        <tr>
            <th>
                <input name="id" type="checkbox" class="checkbox" value="">
            </th>
            <th>Name</th>
            <th>Semester</th>
            <th>Year </th>
            <th>Department</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php $i = 0; ?>
        @foreach($acm_academic_ass_std as $value)
            {{$value[$i]['user_id']}}
        {{--@foreach($acm_academic_ass_std as $value)
            <tr>
                <td><input type="checkbox" name="chk[]"  class="myCheckbox" value=" {{User::FullName($value[$i]['user_id'])}}">
                </td>
                <td>{{User::FullName($value[$i]['user_id'])}}</td>
                <td>{{Semester::find(CourseManagement::where('course_id', '=', $value[0]['course_id'])
                    ->where('user_id', '=', $value[0]['user_id'])
                    ->first()->semester_id)->title; }}</td>
                <td>{{Year::find(CourseManagement::where('course_id', '=', $value[0]['course_id'])
                    ->where('user_id', '=', $value[0]['user_id'])
                    ->first()->year_id)->title; }}</td>
                <td></td>
                <td></td>

                <td>
                    <a href="{{ URL::route('classtest.comments', ['assign_std'=>$value->user_id]) }}" class="btn btn-info btn-xs" data-toggle="modal" data-target="#commentsModal"> Comments </a>

                    <a href="" class="btn btn-primary btn-xs"> Evaluation </a>

                    {{ Form::submit('Assign', ['name' => 'save', 'class' => 'btn btn-success btn-xs']) }}
                </td>
            </tr>--}}
        @endforeach
        </tbody>
    </table>
    <div class="button" style="margin-top: 10px">
        <a href="{{URL::previous('academic/faculty/marks/dist/item/class_test/')}}" class="btn btn-info btn-xs ">Back</a>
        {{ Form::submit('Do Assign', ['name' => 'assign', 'class' => 'btn btn-success btn-xs']) }}
        {{ Form::submit('Do Revoke', ['name' => 'revoke','class' => 'btn btn-danger btn-xs']) }}

    </div>
    {{ Form::close() }}

    <p>&nbsp;</p>
    <p>&nbsp;</p>

    {{--Assign comments modal--}}
    <div class="modal fade" id="commentsModal" tabindex="-1" role="dialog" aria-labelledby="addScholarship" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@stop

