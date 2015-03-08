@extends('layouts.master')
@section('sidebar')
    {{--@include('applicant::_sidebar')--}}
@stop
@section('content')

  <h3>Degree Details</h3>
  <table id="example1" class="table table-bordered table-striped">
  @foreach($degree_model as $values)
    <tbody>
        <tr>
            <th width="20%">Degree Name</th>
            <td><b>{{$values->title}}</b></td>
        </tr>
         <tr>
            <th>Year</th>
            <td>{{$values->relYear->title}}</td>
        </tr>
        <tr>
            <th>Semester</th>
            <td>{{$values->relSemester->title}}</td>
        </tr>
        <tr>
            <th>Description</th>
            <td>{{$values->description}}</td>
        </tr>

         <tr>
            <th>Waiver (total: {{count($values->relDegreeWaiver)}} )</th>
            <td>
                @foreach($values->relDegreeWaiver as $waiver)
                    {{$waiver->relWaiver->title}}<br>
                @endforeach
            </td>
        </tr>

         <tr>
            <th>Total Credit</th>
            <td>{{$values->total_credit}}</td>
        </tr>
    </tbody>
    @endforeach

    @if(isset($major_courses))

    <tbody>
        <tr>
            <td>
                @foreach($major_courses as $major_courses)
                    <div><b>Major Courses</b></div>
                    {{$major_courses->relCourse->title}}
                @endforeach
            </td>
            <td>
                @foreach($minor_courses as $minor_courses)
                    <div><b>Major Courses</b></div>
                    {{$minor_courses->relCourse->title}}
                @endforeach
            </td>
        </tr>

    </tbody>

    @endif
  </table>

@stop

