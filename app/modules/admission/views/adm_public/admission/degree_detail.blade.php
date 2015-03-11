@extends('layouts.layout')
@section('sidebar')

@stop
@section('content')
<a class="pull-right btn btn-sm btn-success" href="{{ URL::route('admission.degree_list')}}"><b><i class="fa fa-arrow-circle-left"></i>Go Back</b></a>

<p>&nbsp;</p><p>&nbsp;</p>

<div class="box box-solid box-info">

     <div class="box-header">
             <h3 class="box-title">Details Information Of Degree</h3>
             <div class="box-tools pull-right">
                 <button class="btn btn-info btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                 <button class="btn btn-info btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
             </div>
     </div>
     <div class="box box-info">
        <div class="box-header">
        <p>&nbsp;</p>
        </div>
        <div class="box-body">
             <div class="row">

                 <div class="col-lg-12">
                       <table class= "table table-bordered">
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
             </div>
        </div>

        <div class="box-footer clearfix">
            <button class="pull-right btn btn-default" id="sendEmail">Edit <i class="fa fa-arrow-circle-right"></i></button>
        </div>
     </div>

</div>
<p>&nbsp;</p>
<p>&nbsp;</p>

@stop

