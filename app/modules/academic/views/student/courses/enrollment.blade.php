
@extends('layouts.layout')

@section('sidebar')
 @include('layouts._sidebar_student')
@stop

@section('content')

<a class="pull-right btn btn-xs btn-success" href="{{ URL::route('academic.student.courses.index')}}"><b><i class="fa fa-arrow-circle-left"></i>Go Back</b></a>

<h4 class="box-title"><b>Course Enrollment At {{$semester_title }} ,{{$year_title}}</b></h4>

{{--<div style="background-color:white; color:white; padding:8px;">--}}
   {{--<b style="margin-left: 60px;color: #005580">Max Credit : </b>--}}
      {{--<br>--}}
   {{--<b style="margin-left: 60px;color: #005580">Min Credit : </b>--}}
{{--</div>--}}

 <div class="row">
    <div class="col-lg-12">
        <div class="box box-solid">
            <div class="box-header">

            </div><!-- /.box-header -->
            <div class="box-body">
                <div class="box-group" id="accordion">
                {{Form::open(['route' => ['academic.student.course-enrollment']]) }}
                {{Form::hidden('taken_in_year',  $current_year_id)}}
                {{Form::hidden('taken_in_semester', $current_semester_id)}}
                    <!---------------------------- Previous Incomplete Courses :Starts -------------------->
                    <div class="panel box box-primary">
                        <div class="box-header">
                            <h5 class="box-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" style="font-size: smaller;text-decoration: underline">
                                  Previous Incomplete Courses
                                </a>
                            </h5>
                        </div>
                        <div id="collapseOne" class="panel-collapse ">
                            <div class="box-body">
                                <div class="row">
                                      <div class="col-lg-12">
                                      {{--{{Form::open(['route' => ['academic.student.course-enrollment']]) }}--}}
                                      {{--{{Form::hidden('taken_in_year',  $current_year_id)}}--}}
                                      {{--{{Form::hidden('taken_in_semester', $current_semester_id)}}--}}
                                           <table class="table  table-bordered">
                                                  <thead>
                                                      <tr>
                                                         <th>Course</th>
                                                         <th>Credit</th>
                                                         <th>GPA</th>
                                                         <th>Status</th>
                                                         <th>Action</th>
                                                      </tr>
                                                  </thead>
                                                  <tbody>
                                                     @if(isset($previous_incomplete_courses))
                                                        @foreach($previous_incomplete_courses as $value)
                                                           <tr>
                                                                <td>{{($value->relBatchCourse->relCourse->title )}}</td>
                                                                <td>{{ $value->relBatchCourse->relCourse->credit}}</td>
                                                                <td></td>
                                                                <td>{{strtoupper($value->status)}}</td>
                                                                <td><input type="checkbox" name="ids[]"  id="check" class="myCheckbox" value="{{$value->batch_course_id}}" ></td>

                                                           </tr>
                                                        @endforeach
                                                     @else
                                                         {{"No Data found !"}}
                                                     @endif
                                                  </tbody>
                                           </table>
                                      </div>
                                  </div>
                            </div>
                        </div>
                    </div>
                    <!--------------------- Current Semester: Starts ------------------------------------------------>
                    <div class="panel box box-danger">
                        <div class="box-header">
                            <h5 class="box-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" style="font-size: smaller;text-decoration: underline">
                                    Current Semester
                                </a>
                            </h5>
                        </div>
                        <div id="collapseTwo" class="panel-collapse ">
                             <div class="box-body">
                                  <div class="row">
                                      <div class="col-lg-12">
                                         {{--{{ Form::open(['route' => ['academic.student.course-enrollment']]) }}--}}
                                         {{--{{Form::hidden('taken_in_year',  $current_year_id)}}--}}
                                         {{--{{Form::hidden('taken_in_semester', $current_semester_id)}}--}}
                                              <table class="table  table-bordered">
                                                   <thead>
                                                       <tr>
                                                          <th>Course</th>
                                                          <th>Credit</th>
                                                          <th>GPA</th>
                                                          <th>Is Mandatory?</th>
                                                          <th>Status</th>
                                                          <th>Action</th>
                                                       </tr>
                                                   </thead>
                                                   <tbody>
                                                      @if(isset($batch_courses))
                                                         @foreach($batch_courses as $value)
                                                            <tr>
                                                                 <td>{{($value->relCourse->title )}}</td>
                                                                 <td>{{ $value->relCourse->credit}}</td>
                                                                 <td></td>
                                                                 <td>{{$value['is_mandatory']==1 ? 'Yes' : 'No'}}</td>
                                                                 <td>New</td>
                                                                 <td>
                                                                     @if($value['is_mandatory']==1)
                                                                        <input type="checkbox" name="ids[]" id="checkboxID" class="myCheckbox" value="{{$value->id}}" checked="checked">
                                                                     @else
                                                                         <input type="checkbox" name="ids[]"  id="check" class="myCheckbox" value="{{$value->id}}" >
                                                                     @endif
                                                                 </td>
                                                            </tr>
                                                         @endforeach
                                                      @else
                                                          {{"No Data found !"}}
                                                      @endif
                                                   </tbody>
                                              </table>
                                              <p>&nbsp;</p>
                                         {{ Form::submit('Next', ['class'=>'pull-right btn btn-xs btn-info'])}}
                                         {{ Form::close() }}

                                      </div>
                                  </div>
                             </div>
                        </div>
                    </div>
                    {{--------------------- Current Semester:Ends ------------------------------------------------}}
                </div>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div><!-- /.col -->
 </div><!-- /.row -->


@stop


