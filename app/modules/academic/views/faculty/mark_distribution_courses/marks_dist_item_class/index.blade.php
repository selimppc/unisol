@extends('layouts.master')
@section('sidebar')
    @include('academic::_sidebar')
@stop
@section('content')
    {{--css link--}}
    {{--{{ HTML::style('assets/css/dropzone/dropzone.css') }}--}}
    <h4 style="text-align: center">{{$title}}</h4>
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addClass">Add Class</button>
    <table id="example" class="table table-bordered table-hover table-striped">
        <thead>
        <th>Title</th>
        <th>Description</th>
        <th>status</th>
        <th>Class date</th>
        <th>Action</th>
        </thead>
        <tbody>

        @foreach ($datas as $value)
            <tr>
                <td>{{$value->title}}</td>
                <td>{{$value->description}}</td>
                <td>{{($value->status == 1) ? 'Active' : 'Inactive';}}</td>
                <td>{{$value->relAcmClassSchedule->day}}</td>
                <td>
                    <a href="{{ URL::route('class.edit', ['id'=>$value->id]) }}" class="subEdit btn btn-xs btn-default" data-toggle="modal" data-target="#editModal" href="" ><span class="glyphicon glyphicon-edit text-info"></span></a>
                    <a href="{{ URL::route('class.show', ['id'=>$value->id])  }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#showModal" href=""><span class="glyphicon glyphicon-list-alt text-info"></span></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{--All Modal--}}
    {{---------------------------------------------}}
    <!-- Add New class Modal -->
    <div id="addClass" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Add New Class</h4>
                </div>
                <div class="modal-body">
                    {{ Form::open(array('url' => 'academic/faculty/marksdistitem/class/save', 'method' =>'post', 'role'=>'form','files'=>'true')) }}
                    {{ Form::hidden('course_management_id', $cmid, ['class'=>'form-control course_management_id'])}}
                    {{ Form::hidden('marks_dist_id', $marks_dist_id, ['class'=>'form-control course_management_id'])}}
                    @include('academic::faculty.mark_distribution_courses.marks_dist_item_class._form')
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>

    {{--Show single class info --}}
    <div class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="addScholarship" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!-- Edit Class Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="addScholarship" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

@stop

{{--@section('script_section')--}}
{{--{{HTML::script('assets/js/dropzone/dropzone.js')}}--}}

{{--@stop--}}