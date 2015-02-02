@extends('layouts.master')
@section('sidebar')
    @include('academic::mark_distribution_courses.amw.sidebar')
@stop
@section('content')
    <h4>{{$title}}</h4>

    <table id="example" class="table table-bordered table-hover table-striped">
        <thead>
        <tr>
            {{--<td>{{ AcmCourseConfig::getCourseItemStatus($value->id, $value->evaluation_total_marks) }}</td>--}}
            <th>CourseName</th>
            <th>Department</th>
            <th>Year</th>
            <th>Semester</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>
        {{--<td>{{ AcmCourseConfig::getCourseItemStatus($value->course_id, $value->course->evaluation_total_marks) }}</td>--}}
        <tbody>
        @foreach ($datas as $value)
            <tr>
                <td>{{$value->course->title}}</td>
                <td>{{$value->course->subject->department->title}}</td>
                <td>{{$value->year->title}}</td>
                <td>{{$value->semester->title}}</td>
                <td>{{ AcmCourseConfig::getCourseItemStatus($value->course_id, $value->course->evaluation_total_marks) }}</td>

                <td>
                    <a href="{{ URL::route('coursefind.show', ['course_id'=>$value->id])  }}" class="btn btn-primary" data-toggle="modal" data-target="#addNew" data-toggle="tooltip" data-placement="left" title="Show/View" href="">MarksDistConfig</a>

                    {{--<a href="{{ URL::route('config.show', ['id'=>$value->id])  }}" class="btn btn-default" data-toggle="modal" data-target="#showModal" data-toggle="tooltip" data-placement="left" title="Show/View" href="">View Dist</a>--}}
                </td>
            </tr>
        @endforeach
        </tbody>

    </table>

    {{--Start all modal for amw--}}
    {{---------------------------------------------}}

    <!-- Add New Item Modal -->
    <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addScholarship" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!-- Show Modal -->
    <div class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="showingModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">Show Course Item</h4>
                </div>
                <div class="modal-body">



                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal" >Cencel</button>
                </div>
            </div>
        </div>
    </div>
@stop