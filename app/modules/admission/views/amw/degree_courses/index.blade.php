@extends('layouts.layout')
@section('sidebar')
    @include('layouts._sidebar_amw')
@stop
@section('content')
    <div class="box box-solid ">
        <div class="box-header">
          {{ Form::open(array('url' => 'admission/amw/degree-courses/save')) }}
            {{ Form::hidden('degree_id', $degree_id , ['class'=>'form-control degree_id'])}}
            <p style="text-align: center;color: #800080;font-size:large;">Degree Course:  {{$degree_title->title}}</p>
            <div class="form-group" style="float: left; width: 35%; padding-left: 1%; ">
                {{ Form::label('course_list[]', 'List Of all Course ') }}
                {{ Form::select('course_list[]', $course_list, Request::old('course_list') ? Request::old('course_list') : $course_list,['multiple' => true, 'class'=>'form-control', 'required']); }}
            </div>
            <div style=" float: left; padding-left: 1%; padding-top: 4%;">
                {{ Form::submit('Add Course', ['class'=>'btn btn-primary']) }}
            </div>

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
                        @if(!empty($deg_course_info))
                            @foreach ($deg_course_info as $value)
                                <tr>
                                    <td>{{$value->relCourse->title}}</td>
                                    <td>{{$value->relCourse->course_code}}</td>
                                    <td>{{isset($value->relCourse->relSubject->relDepartment->title) ? $value->relCourse->relSubject->relDepartment->title : ''}}</td>
                                    <td>{{isset($value->relCourse->relCourseType->title) ? $value->relCourse->relCourseType->title : ''}}</td>
                                    <td>{{isset($value->relCourse->credit) ? $value->relCourse->credit : ''}}</td>
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
                    <a class="pull-right btn btn-xs btn-primary" href="{{ URL::route('admission.amw.degree.index')}}"> <i class="fa fa-arrow-circle-left"></i> Back To Degree</a>
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