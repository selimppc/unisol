@extends('layouts.master')
@section('sidebar')
    @include('academic::mark_distribution_courses.amw.sidebar')
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
            <tr>

                <td>{{ Course::getCourseName($value->course_id) }}</td>
                <td>{{$value->d_title}}</td>
                <td>{{ Year::getYearsName($value->year_id ) }}</td>
                <td>{{ Semester::getSemesterName($value->semester_id ) }}</td>
                <td></td>

                <td>
                    <a href="" class="btn btn-primary" data-toggle="modal" data-target="#addNew" data-toggle="tooltip" data-placement="left" title="Show/View" href="">Marks Dist</a>

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


@stop

@stop