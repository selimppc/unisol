@extends('layouts.master')
@section('sidebar')
    @include('academic::_sidebar')
@stop
@section('content')
    <h4 style="text-align: center">{{$title}}</h4>
    <table id="example" class="table table-bordered table-hover table-striped">
        <thead>
        <th>CourseName</th>
        <th>Department</th>
        <th>Year</th>
        <th>Semester</th>
        <th>Status</th>
        <th>Action</th>
        </thead>
        <tbody>

        @foreach ($datas as $value)
            <tr>

                <td><a href="{{ URL::route('coursemarksdist.show', ['cm_id'=>$value->id])  }}" class="btn btn-link">{{$value->relCourse->title}}</a></td>
                <td>{{$value->relCourse->relSubject->relDepartment->title}}</td>
                <td>{{$value->relYear->title}}</td>
                <td>{{$value->relSemester->title}}</td>
                <td>{{ AcmMarksDistribution::getMarksDistItemStatus($value->id, $value->relCourse->evaluation_total_marks) }}</td>

                <td>
                    <a href="{{ URL::route('marksdistfind.show', ['course_id'=>$value->course_id])  }}" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#marksDist" data-toggle="tooltip" data-placement="left" title="Mark/Dist" href="">MarksDist</a>

                    <a href="{{ URL::route('marksdist.show', ['cm_id'=>$value->id])  }}" class="btn btn-success" data-toggle="modal" data-target="#showMarksDist" data-toggle="tooltip" data-placement="left" title="Show/View" href="">View Dist</a>

                </td>
            </tr>
        @endforeach

        </tbody>

    </table>

    {{--Start all modal for amw--}}
    {{---------------------------------------------}}

    <!-- Add New marks dist Item Modal -->
    <div class="modal fade" id="marksDist" tabindex="-1" role="dialog" aria-labelledby="addScholarship" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content ">

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!-- Show course info and marks_distribution Modal -->
    {{--<div class="modal fade" id="showModal" tabindex="-1" role="dialog" aria-labelledby="addScholarship" aria-hidden="true">--}}
        {{--<div class="modal-dialog">--}}
            {{--<div class="modal-content">--}}

            {{--</div><!-- /.modal-content -->--}}
        {{--</div><!-- /.modal-dialog -->--}}
    {{--</div><!-- /.modal -->--}}

    <!-- Show marks_distribution Modal -->
    <div class="modal fade" id="showMarksDist" tabindex="-1" role="dialog" aria-labelledby="addScholarship" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

@stop