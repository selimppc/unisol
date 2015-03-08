@extends('layouts.master')
@section('sidebar')
    {{--@include('applicant::_sidebar')--}}
@stop
@section('content')


  <h3>Degree Details</h3>
<div class="well well-sm">

   <table id="example1">

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
                        <th>Total Credit:</th>
                        <td>{{ $values->total_credit }}</td>

                    </tr>

                    <tr>
                        <th>Duration:</th>
                        <td>{{ $values->duration }}</td>

                    </tr>

                    <tr>
                        <th>Total Seat</th>
                        <td>{{$values->seat}}</td>
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
                        <div><b>Major Courses</b></div>
                        @foreach($major_courses as $major_courses)
                            {{$major_courses->relCourse->title}}<br>
                        @endforeach
                    </td>
                    <td>
                        <div><b>Minor Courses</b></div>
                        @foreach($minor_courses as $minor_courses)
                             {{$minor_courses->relCourse->title}}<br>
                        @endforeach
                    </td>
                </tr>

                <tr>
                        <th>Minimum Requirements</th>

                        <td>
                           @foreach($edu_gpa_model as $value)
                                Min GPA at {{$value->level_of_education.' : '.$value->min_gpa }}<br><br>
                           @endforeach
                        </td>
                </tr>
            </tbody>

      @endif
  </table>

</div>
@stop

