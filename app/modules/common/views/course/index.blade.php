@extends('layouts.layout')
@section('sidebar')
    @include('layouts._sidebar_amw')
@stop
@section('content')
    <h3 class="box-title text-purple">All Course List</h3>
    <div class="row">
        <div class="pull-right col-sm-4">
            <a class="pull-right btn btn-sm btn-info" href="{{ URL::to('common/course/create')}}" data-toggle="modal" data-target="#modal" >Add</a>
        </div>
    </div>
    {{ Form::open(array('url' => 'common/course/batchDelete')) }}
    <table id="example" class="table table-striped  table-bordered"  >
        <thead>
        {{ Form::submit('Delete Items', array('class'=>'btn btn-danger', 'id'=>'hide-button', 'style'=>'display:none'))}}
        <br>
        <tr>
            <th><input name="id" type="checkbox" id="checkbox" class="checkbox" value=""></th>
            <th>Title</th>
            <th>Course Code</th>
            <th>Subject Name</th>
            <th>Course Type</th>
            <th>Evaluation Total Marks </th>
            <th>Credit</th>
            <th>Hours Per Credit</th>
            <th>Cost Per Credit</th>
            <th>Evaluation System</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @if(isset($course))
            @foreach($course as $course_list)
                <tr>
                    <td><input type="checkbox" name="id[]"  id="checkbox" class="myCheckbox" value="{{ $course_list->id }}"></td>
                    <td>{{ $course_list->title }}</td>
                    <td>{{ $course_list->course_code }}</td>
                    <td>{{ isset($course_list->course_type_id)? $course_list->relSubject->title :'' }}</td>
                    <td>{{ isset($course_list->course_type_id)? $course_list->relCourseType->title :'' }}</td>
                    <td>{{ $course_list->evaluation_total_marks }}</td>
                    <td>{{ $course_list->credit }}</td>
                    <td>{{ $course_list->hours_per_credit }}</td>
                    <td>{{ $course_list->cost_per_credit }}</td>
                    <td>{{ $course_list->evaluation_system }}</td>
                    <td>
                        <a href="{{ URL::to('common/course/show/'.$course_list->id) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#modal" style="font-size: 12px;color: darkmagenta"><span class="fa fa-eye"></span></a>
                        <a class="btn btn-xs btn-default" href="{{ URL::to('common/course/edit/'.$course_list->id) }}" data-toggle="modal" data-target="#modal" style="font-size: 12px;color: lightseagreen"><i class="fa fa-edit"></i></a>
                        <a data-href="{{ URL::to('common/course/destroy/'.$course_list->id) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#confirm-delete" style="font-size: 12px;color: lightcoral"><span class="fa fa-trash-o"></span></a>
                    </td>
                </tr>
            @endforeach
        @endif
        </tbody>
    </table>
    {{form::close() }}
    <div class="text-right">
        {{ $course->links() }}
    </div>
    <p>&nbsp;</p><p>&nbsp;</p>
    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

            </div>
        </div>
    </div>


    <!-- Modal for delete -->
    <div class="modal fade " id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Confirm Delete</h4>
                </div>
                <div class="modal-body">
                    <strong>Are you sure to delete?</strong>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <a href="#" class="btn btn-danger danger">Delete</a>
                </div>
            </div>
        </div>
    </div>


@stop