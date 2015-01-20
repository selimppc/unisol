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
                <th>Course Code</th>
                <th>Subject Name</th>
                <th>Description</th>
                <th>Course Type</th>
                <th>Evaluation Total Marks </th>
                <th>Credit</th>
                <th>Hours Per Credit</th>
                <th>Cost Per Credit</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($datas as $value)
            <tr>
               <td>{{ $value->title}}</td>
               <td>{{ $value->course_code }}</td>
               <td>{{ Subject::getSubjectName($value->subject_id) }}</td>
               <td>{{ $value->description }}</td>
               <td>{{CourseType::getCourseName ($value->course_type) }}</td>
               <td>{{ $value->evaluation_total_marks }}</td>
               <td>{{ $value->credit }}</td>
               <td>{{ $value->hours_per_credit }}</td>
               <td>{{ $value->cost_per_credit }}</td>
               <td>
               <a href="{{ URL::route('coursefind.show', ['id'=>$value->id])  }}" class="btn btn-primary" data-toggle="modal" data-target="#addNew" data-toggle="tooltip" data-placement="left" title="Show/View" href="">Marks Dist</a>

               <a href="" class="btn btn-default" data-toggle="modal" data-target="" data-toggle="tooltip" data-placement="left" title="Show/View" href="">View Dist</a>
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