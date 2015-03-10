@extends('layouts.layout')
@section('sidebar')
    @include('academic::_sidebar')
@stop
@section('content')
    {{ Form::open(array('url' => 'assignment/assign')) }}
    {{ Form::hidden('acm_academic_id', $acm->id, ['class'=>'form-control acm_academic_id'])}}
    <div class="col-md-4">
        <div class='form-group'>
            {{ Form::label('exam_question', 'Examination Question:') }}
            {{ Form::select('exam_question',$exam_questions,Input::old('exam_question'),['class'=>'form-control','required']) }}
        </div>
        <p style="color: cornflowerblue">Help Text: If CT question is not prepared then tell faculty to create question paper.</p>
    </div>
    <table id="example" class="table table-bordered table-hover table-striped">
        <thead>
        <tr>
            <th>
                <input name="id" type="checkbox" id="checkbox" class="checkbox" value="">
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
        @foreach ($cm_data as $value)
            <tr>
                {{--<td><input type="checkbox" name="chk[]"  id="checkbox" class="myCheckbox" value="{{$value->relCourseManagement->relUser->id}}">--}}
                {{--</td>--}}
                {{--<td>{{$value->relCourseManagement->relUser->username}}</td>--}}
                {{--<td>{{$value->relCourseManagement->relSemester->title}}</td>--}}
                {{--<td>{{$value->relCourseManagement->relYear->title}}</td>--}}
                {{--<td>{{$value->relCourseManagement->relCourse->relSubject->relDepartment->title}}</td>--}}
                {{--<td>{{ AcmAcademicAssignStudent::getAssignStudentStatus($value->acm_academic_id)}}</td>--}}
                {{--<td></td>--}}

                <td><input type="checkbox" name="chk[]"  id="checkbox" class="myCheckbox" value="{{$value->relUser->id}}">
                </td>
                <td>{{$value->relUser->username}}</td>
                <td>{{$value->relSemester->title}}</td>
                <td>{{$value->relYear->title}}</td>
                <td>{{$value->relCourse->relSubject->relDepartment->title}}</td>
                <td></td>

                <td>
                    <a href="{{ URL::route('assignment.comments', ['assign_std'=>$value->user_id]) }}" class="btn btn-info btn-xs" data-toggle="modal" data-target="#commentsModal"> Comments </a>

                    <a href="" class="btn btn-primary btn-xs"> Evaluation </a>

                    {{ Form::submit('Assign', ['name' => 'save', 'class' => 'btn btn-success btn-xs']) }}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="button" style="margin-top: 10px">
        <a href="{{URL::previous('academic/faculty/marks/dist/item/assignment/')}}" class="btn btn-info btn-xs ">Back</a>
        {{ Form::submit('Do Assign', ['name' => 'save', 'class' => 'btn btn-success btn-xs']) }}
        {{ Form::submit('Do Revoke', ['name' => 'update','class' => 'btn btn-danger btn-xs']) }}

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

