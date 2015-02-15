@extends('layouts.master')
@section('sidebar')
    @include('academic::_sidebar')
@stop
@section('content')
    <h4>{{$title}}</h4>

    <table id="example" class="table table-bordered table-hover table-striped">
        <thead>
        <tr>
            <th>CourseName</th>
            <th>Department</th>
            <th>Year</th>
            <th>Semester</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($datas as $value)
            {{--<tr>--}}
                <td><a href="{{ URL::route('config.show', ['course_id'=>$value->course_id])  }}" class="btn btn-link" data-toggle="modal" data-target="#showModal">{{$value->relCourse->title}}</a></td>
                <td>{{$value->relCourse->relSubject->relDepartment->title}}</td>
                <td>{{$value->relYear->title}}</td>
                <td>{{$value->relSemester->title}}</td>
                <td>{{ AcmCourseConfig::getCourseItemStatus($value->course_id, $value->relCourse->evaluation_total_marks) }}</td>

                <td>
                    <a href="{{ URL::route('coursefind.show', ['course_id'=>$value->course_id])  }}" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addNew" data-toggle="tooltip" data-placement="left" title="Mark/Dist" href="">MarksDistConfig</a>

                    <a href="{{ URL::route('marksdist.show', ['course_id'=>$value->course_id]) }}" class="btn btn-sm btn-success" data-toggle="modal" data-target="#marksDistModal" data-toggle="tooltip" data-placement="left" title="Show/Dist" href="">ViewDistConfig</a>
                </td>
            </tr>
        @endforeach
        </tbody>

    </table>
    {{--Start all modal for amw--}}
    {{---------------------------------------------}}

    <!-- Add New Item Modal -->
    <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addScholarship" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content ">

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!-- Show course info Modal -->
    <div class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="showingModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!-- Show course marksdistribution Modal -->
    <div class="modal fade" id="marksDistModal" tabindex="-1" role="dialog" aria-labelledby="showingModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@stop