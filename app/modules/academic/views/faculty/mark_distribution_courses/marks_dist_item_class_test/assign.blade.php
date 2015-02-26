@extends('layouts.master')
@section('sidebar')
    @include('academic::_sidebar')
@stop
@section('content')

    {{--<div class="col-md-4">--}}
        {{--<div>{{ Form::label('exam_question', 'Examination Question:') }}</div>--}}
        {{--{{ Form::select('acm_marks_dist_item_id', [''=>'Select Option'] + AcmMarksDistItem::orderBy('title')->lists('title', 'id'),Input::old('acm_marks_dist_item_id'), ['class'=>'form-control addConfigListItem']) }}--}}
    {{--</div>--}}
    {{--{{ Form::open(array('url' => 'batch/delete')) }}--}}
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
                <td><input type="checkbox" name="id[]"  id="checkbox" class="myCheckbox" value="">
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
        {{--{{ Form::submit('Delete Items', array('class'=>'btn btn-danger', 'id'=>'hide-button', 'style'=>'display:none'))}}--}}
    </table>
    <div class="button" style="margin-top: 10px">
    {{--<button type="button" style="margin-left: 72px" class="btn btn-info btn-xs">Close</button>--}}
    <a href="{{URL::previous()}}" class="btn btn-info btn-xs" style="margin-left: 72px">Back</a>
    <button type="button" style="margin-left: 5px"  class="btn btn-success btn-xs">Do Assign</button>
    <button type="button" style="margin-left: 5px" class="btn btn-danger btn-xs">Do Revoke</button>
    </div>
    {{ Form::close() }}
@stop