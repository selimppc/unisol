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
                 {{--<a href="{{ URL::route('course.edit', ['id'=>$course->id])  }}" class="btn btn-default" data-toggle="modal" data-target="#edit-modal" data-toggle="tooltip" data-placement="left" title="Edit" href="#"><span class="glyphicon glyphicon-edit text-info"></span></a>--}}

                 {{--<a data-href="{{ URL::route('course.destroy',['id'=>$course->id]) }}" class="btn btn-danger" data-toggle="modal" data-target="#confirm-delete" data-toggle="tooltip" data-placement="left" title="Delete" href="" ><span class="glyphicon glyphicon-trash text-danger"></span></a>--}}

                 {{--<a href="{{ URL::route('course.show', ['id'=>$course->id])  }}" class="btn btn-default" data-toggle="modal" data-target="#showModal" data-toggle="tooltip" data-placement="left" title="Show/View" href=""><span class="glyphicon glyphicon-list-alt text-info"></span></a>--}}

              </td>

            </tr>
            @endforeach
          </tbody>
          {{ Form::submit('Delete Items', array('class'=>'btn btn-danger', 'id'=>'hide-button', 'style'=>'display:none'))}}
    </table>
    {{ Form::close() }}




{{--End all modal for amw course config--}}
{{---------------------------------------------}}

@stop