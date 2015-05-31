@extends('layouts.layout')
@section('top_menu')
    @include('layouts._top_menu')
@stop
@section('sidebar')
    @include('layouts._sidebar_public')
@stop
@section('content')
<a class="pull-right btn btn-xs btn-success" href="{{ URL::route('admission.public.degree_offer_list')}}"><b><i class="fa fa-arrow-circle-left"></i>Go Back</b></a>

<h3 class="box-title">Details Information Of Degree</h3>
 <div class="box box-solid">
     <div class="box-tools pull-right">
         <button class="btn btn-info btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
         <button class="btn btn-info btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
     </div>
     <div class="box box-info">
          <div class="box-body">
             <div class="row">
                <div class="col-lg-12">
                   {{ Form::open(['route' => ['admission.applicant.degree_apply']]) }}
                       <table class= "table table-striped table-bordered">
                           @foreach($degree_model as $values)
                                <tbody>
                                    <tr>
                                        <th width="20%">Degree Name</th>
                                        <td>
                                            {{$values->relDegree->relDegreeLevel->code.'  '.$values->relDegree->relDegreeGroup->code.' In '.$values->relDegree->relDegreeProgram->code}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Batch Number #</th>
                                        <td>{{$values->batch_number}}</td>
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
                                        <td>{{$values->relDegree->description}}</td>
                                    </tr>

                                    <tr>
                                        <th>Total Credit:</th>
                                        <td>{{ $values->relDegree->total_credit }}</td>

                                    </tr>

                                    <tr>
                                        <th>Duration:</th>
                                        <td>{{ $values->relDegree->duration }}</td>
                                    </tr>

                                    <tr>
                                        <th>Total Seat</th>
                                        <td>{{$values->seat_total}}</td>
                                    </tr>

                                     <tr>
                                        <th>Waiver (total: {{count($values->relBatchWaiver)}} )</th>
                                        <td>
                                            @foreach($values->relBatchWaiver as $waiver)
                                                {{$waiver->relWaiver->title}}<br>
                                            @endforeach
                                        </td>
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
                                              Min GPA at <b>{{strtoupper($value->level_of_education).' : '.$value->min_gpa}}</b><br><br>
                                         @endforeach
                                      </td>
                                  </tr>
                                  <tr>
                                      <td>
                                        <div><b>Admission On</b></div>
                                        @foreach($batch_adm_subject as $subjects)
                                            {{$subjects->relAdmtestSubject->title}}<br>
                                        @endforeach
                                      </td>
                                      <td>
                                         <div><b>Admission Test Centers</b></div>
                                         @foreach($exm_centers as $centers)
                                         {{$centers->title}}<br>
                                         @endforeach
                                      </td>
                                  </tr>
                                  <tr>
                                      <th>Application Deadline</th>
                                      <td>{{$values->admission_deadline}}</td>
                                  </tr>
                              </tbody>
                           @endif
                       </table>
                       <p>&nbsp;</p>
                   {{ Form::submit('Apply', array('class'=>'pull-right btn btn-xs btn-info'))}}
                   {{ Form::close() }}
                </div>
             </div>
        </div>
     </div>
 </div>

 <p>&nbsp;</p>
 <p>&nbsp;</p>

@stop

