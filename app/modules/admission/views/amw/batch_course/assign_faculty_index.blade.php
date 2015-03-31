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
                            {{Form::open(array('url' => 'admission/amw/assign-faculty-save'))}}
                            <table id="" class="table table-bordered table-hover table-striped">
                                <tr>
                                    <td>Course:</td>
                                    <td>
                                        {{$batch_course->relCourse->title}} ( {{$batch_course->relCourse->course_code}} )
                                        {{ Form::hidden('course_id', $batch_course->relCourse->id, Input::old('course_id'))}}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Year:</td>
                                    <td>
                                        {{$batch_course->relYear->title}}
                                        {{ Form::hidden('year_id',$batch_course->relYear->id, Input::old('year_id')) }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Semester:</td>
                                    <td>
                                        {{$batch_course->relSemester->title}}
                                        {{ Form::hidden('semester_id',$batch_course->relSemester->id, Input::old('semester_id')) }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Degree:</td>
                                    <td>
                                        {{$batch_course->relBatch->relDegree->title}}
                                        {{ Form::hidden('degree_id',$batch_course->relBatch->relDegree->id ,Input::old('degree_id')) }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>Department:</td>
                                    <td>
                                        {{$batch_course->relcourse->relSubject->relDepartment->title}}
                                    </td>
                                </tr>

                            </table>


                        <div class="form-group">
                        <p>&nbsp;</p>
                            <p>you can assign faculty for commenting</p>
                            <h4>Assign Faculty:</h4>
                            {{ Form::select('faculty_user_id', $facultyList, Input::old('faculty_user_id'),['class' => 'form-control', 'required']) }}
                        </div>
                        <div class="form-group">
                            <h4 class="text-purple">Status:  {{ isset($cc_status->status)? $cc_status->status : 'No Status Yet'}}</h4>
                        </div>
                        <div class="jumbotron text-left" style="padding-top: 2px; padding-left: 2px; padding-bottom: 5px; background-color: #FFEBE6;">
                            @foreach($comments_info as $comments)
                                <p>
                                    <b> {{isset($comments->relCourseConductComments->commented_by) ? User::FullName($comments->relCourseConductComments->commented_by) :'Faculty Not found!' }} </b>
                                    <span class="pull-right"> As {{isset($comments->relCourseConductComments->commented_by) ? User::FullName($comments->relCourseConductComments->commented_by) :'Role ' }} </span>
                                </p>
                                <p>
                                    <strong>Comments:</strong> <br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        {{$comments->relCourseConductComments->comments }}

                                </p>
                            @endforeach
                        </div>
                        <div class='form-group'>
                            <h4>Comments:</h4>
                            <div>{{ Form::textarea('comments', Input::old('comments'),['class' => 'form-control', 'style'=>'height: 100px;'])}}</div>
                            <div>
                                {{--<a href="{{URL::previous()}}" class="btn btn-xs btn-default">Close</a>--}}
                                @if(isset( $cc_status->status) == 'requested')
                                    {{ Form::submit('Revoke',['name' => 'revoke', 'class'=>'btn btn-xs btn-danger']) }}
                                @else
                                    {{ Form::submit('Request',['name' => 'request', 'class'=>'btn btn-xs btn-primary']) }}
                                @endif
                            </div>
                            {{Form::close()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop