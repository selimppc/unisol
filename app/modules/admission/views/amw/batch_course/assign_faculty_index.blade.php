@extends('layouts.layout')
@section('sidebar')
    @include('layouts._sidebar_amw')
@stop
@section('content')
    <div class="box-body">
        <div class="row">
            <div class="col-lg-8"  style="margin-left: 15%">
                <div class="box box-warning">
                    <div class="box-body">
                        <p style="text-align: center;color: #800080;font-size:large;margin-top: 5px">Assign Faculty</p>

                     @foreach($batch_course as $value)
                    {{Form::open(array('url' => 'admission/amw/assign-faculty-save'))}}

                        <div class="form-group">
                            <h4>Course:  {{$value->relCourse->title}} ({{$value->relCourse->course_code}})</h4>
                            {{ Form::hidden('course_id',$value->relCourse->id, Input::old('course_id'),array('disabled','size'=>'30'))}}
                        </div>
                        <div class="form-group">
                            <h4>Year:  {{$value->relYear->title}}</h4>
                            {{ Form::hidden('year_id',$value->relYear->id, Input::old('year_id'),array('disabled','size'=>'30')) }}
                        </div>
                        <div class="form-group">
                            <h4>Semester:  {{$value->relSemester->title}}</h4>
                            {{ Form::hidden('semester_id',$value->relSemester->id, Input::old('semester_id'),array('disabled','size'=>'30')) }}
                        </div>
                        <div class="form-group">
                            <h4>Degree:  {{$value->relBatch->relDegree->title}}  </h4>
                            {{ Form::hidden('degree_id',$value->relBatch->relDegree->id ,Input::old('degree_id'),array('disabled','size'=>'30')) }}
                        </div>
                        <div class="form-group">
                            <h4>Department: {{$value->relcourse->relSubject->relDepartment->title}}</h4>
                        </div>

                        @endforeach

                        <div class="form-group">
                            <h4>Status: NA</h4>

                        </div>

                        <div class="form-group">
                            <h4>Faculty:</h4>
                            {{ Form::select('faculty_user_id', $facultyList, Input::old('faculty_user_id'),['required']) }}
                        </div>
                        <div class="jumbotron text-left" style="padding-top: 2px; padding-left: 2px; padding-bottom: 5px; background-color: #FFEBE6;">
                            {{--@foreach($comments_info as $comments_info)--}}
                                <strong>Comments:</strong><h4> </h4>
                                <strong>By:</strong>
                                {{--<h4> {{ $comments_info->commented_by }}</h4>--}}
                                <br>
                            {{--@endforeach--}}
                        </div>
                        <div class='form-group'>
                            <h4>Comments:</h4>
                        <div>{{ Form::textarea('comments', Input::old('comments'),['spellcheck'=> 'true','size'=>'70x8'])}}</div>
                            <div>
                                {{ Form::submit('Request', ['class'=>'btn btn-xs btn-primary']) }}
                                <a href="{{URL::previous()}}" class="btn btn-xs btn-default">Close</a>
                            </div>
                            {{--<div>--}}
                                {{--{{ Form::submit('Comments', ['class'=>'btn btn-xs btn-info']) }}--}}
                                {{--{{ Form::submit('Revoke', ['class'=>'btn btn-xs btn-danger']) }}--}}
                                {{--{{ Form::submit('Close', ['class'=>'btn btn-xs btn-default']) }}--}}
                            {{--</div>--}}

                            {{Form::close()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop