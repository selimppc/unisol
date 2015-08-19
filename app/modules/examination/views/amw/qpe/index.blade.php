@extends('layouts.layout')
@section('top_menu')
    @include('layouts._top_menu')
@stop
@section('sidebar')
    @include('layouts._sidebar_amw')
@stop
@section('content')

<h4> Question Paper Evaluation</h4>

<div class="box">
    <div class="box-header">
    <p>
        {{--<div class="col-xs-4">--}}
            {{--<b>Degree</b> :: {{$batch->relVDegree->title }} - {{ $batch->batch_number }}--}}
        {{--</div>--}}
        {{--<div class="col-xs-4">--}}
            {{--<b>Credit</b> : {{$batch->relVDegree->total_credit}}--}}
        {{--</div>--}}
        {{--<div class="col-xs-4">--}}
            {{--<b>Department</b> : {{$batch->relVDegree->dept_title}}--}}
        {{--</div>--}}
        {{--<div class="col-xs-4">--}}
            {{--<b>Duration</b> : {{$batch->relVDegree->duration}} Years--}}
        {{--</div>--}}
        {{--<div class="col-xs-4">--}}
            {{--<b>Year</b> : {{$batch->relYear->title}}--}}
        {{--</div>--}}
        {{--<div class="col-xs-4">--}}
            {{--<b>Semester</b> : {{$batch->relSemester->title}}--}}
        {{--</div>--}}
    </p>
    </div><!-- /.box-header -->

    <div class="box-body table-responsive">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Subject </th>
                <th>Question Setter</th>
                <th>Question Evaluator</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @if($exm_question)
                @foreach($exm_question as $value)
                <tr>
                    <td> {{$value->relCourseConduct->relCourse->relSubject->title}}</td>
                    <td> {{isset($value->s_faculty_user_id) ? $value->relSUser->relUserProfile->first_name.' '.$value->relSUser->relUserProfile->middle_name.' '.$value->relSUser->relUserProfile->last_name:''}}</td>
                    <td> {{isset($value->e_faculty_user_id) ? $value->relEUser->relUserProfile->first_name.' '.$value->relEUser->relUserProfile->middle_name.' '.$value->relEUser->relUserProfile->last_name : ''}}</td>
                    <td> {{$value->status}}</td>
                    <td>
                        <a href="{{ URL::route('amw.student-list-qpe', ['exm_question_id'=> $value->id ]) }}" class="btn btn-xs btn-info"><span class="fa fa-eye"></span> view</a>
                    </td>
                </tr>
                @endforeach
            @endif
            </tbody>
        </table>
    </div><!-- /.box-body -->
    {{--<p style="padding: 1%">--}}
        {{--<a href="{{ URL::route('admission.amw.admission-test-home') }}" class="btn btn-xs bg-black"></span> Back to Admission Test </a>--}}
    {{--</p>--}}

</div><!-- /.box -->

@stop