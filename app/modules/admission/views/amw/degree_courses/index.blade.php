@extends('layouts.layout')
@section('sidebar')
    @include('layouts._sidebar_amw')
@stop
@section('content')
    <div class="box box-solid ">
        <div class="box-header">
          {{ Form::open(array('url' => 'admission/amw/degree-courses/save')) }}
            {{ Form::hidden('degree_id', $degree_id , ['class'=>'form-control degree_id'])}}
            <div class="form-group" style="width: 350px">
                {{ Form::label('course_list[]', 'List Of all Course ') }}
                {{ Form::select('course_list[]', $course_list, Request::old('course_list') ? Request::old('course_list') : $course_list,['multiple' => true, 'class'=>'form-control', 'required']); }}
            </div>
            {{ Form::submit('Add Course', ['class'=>'btn btn-primary']) }}
            {{ Form::close() }}
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-lg-12">
                    <table id="example" class="table table-bordered table-hover table-striped">
                        <thead>
                        <tr>
                            <th>Course Name </th>
                            <th>Course Code</th>
                            <th>Department</th>
                            <th>Course Type</th>
                            <th>Credit</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(isset($deg_course_info))
                        @foreach ($deg_course_info as $value)
                            <tr>
                                <td>{{$value->relCourse->title}}</td>
                                <td>{{$value->relCourse->course_code}}</td>
                                <td>{{$value->relCourse->relSubject->relDepartment->title}}</td>
                                <td>{{$value->relCourse->relCourseType->title}}</td>
                                <td>{{$value->relCourse->credit}}</td>
                                <td>
                                <a data-href="{{ URL::to('admission/amw/degree-courses/delete/'.$value->id) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#confirm-delete" href="" ><i class="fa fa-trash-o" style="color: red"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        @endif
                        </tbody>
                    </table>
                    {{ Form::close() }}
                    {{ $deg_course_info->links() }}
                    <p>&nbsp;</p>
                    <p>&nbsp;</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal for delete --}}
    <div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
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