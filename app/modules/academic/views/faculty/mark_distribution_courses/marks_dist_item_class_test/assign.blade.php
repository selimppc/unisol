@extends('layouts.master')
@section('sidebar')
    @include('academic::_sidebar')
@stop
@section('content')
    {{ Form::open(array('url' => 'batch/assign')) }}
    {{ Form::hidden('acm_academic_id', $acm_data->id, ['class'=>'form-control acm_academic_id'])}}
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
        @foreach ($cm_data as $cm_data)
            <tr>
                <td><input type="checkbox" name="chk[]"  id="checkbox" class="myCheckbox" value="{{$cm_data->relUser->id}}">
                </td>
                <td>{{$cm_data->relUser->username}}</td>
                <td>{{$cm_data->relSemester->title}}</td>
                <td>{{$cm_data->relYear->title}}</td>
                <td>{{$cm_data->relCourse->relSubject->relDepartment->title}}</td>
                <td></td>
                <td>
                    <a href="" class="btn btn-info btn-xs"> Comments </a>
                    <a href="" class="btn btn-primary btn-xs"> Evaluation </a>
                    <a href="" class="btn btn-success btn-xs"> Assign </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="button" style="margin-top: 10px">
        <a href="{{URL::previous('academic/faculty/marks/dist/item/class_test/')}}" class="btn btn-info btn-xs ">Back</a>
        {{ Form::submit('Do Assign ', array('class'=>'btn btn-success btn-xs'))}}
        {{ Form::submit('Do Revoke', array('class'=>'btn btn-danger btn-xs'))}}

    </div>
    {{ Form::close() }}
@stop

