@extends('layouts.layout')

@section('sidebar')
 @include('layouts._sidebar_student')
@stop

@section('content')
<div>
     <a class="pull-right btn btn-xs btn-info btn-link" href="{{ URL::route('academic.student.enrollment')}}"  title="Enrollment"><strong style="color: darkgreen;font-size: medium">Enrollment</strong></a>
</div>
<h3 class="box-title">Courses</h3>
<div style="background-color:lightgray; color:white; padding:8px;">
   <b style="margin-left: 80px;color: #005580">Total Credit : {{ isset($total_credit->relBatch->relDegree->total_credit) ? $total_credit->relBatch->relDegree->total_credit:'0' }}</b>
   <b style="margin-left: 60px;color: #005580">Accomplished Credit : {{isset($accomplished_credit->accomplished_credit) ? $accomplished_credit->accomplished_credit:'0'}}</b>
   @if(isset($total_credit->relBatch->relDegree->total_credit))
       <b style="margin-left: 60px;color: #005580">Left Yet(Credit) : {{$total_credit->relBatch->relDegree->total_credit - $accomplished_credit->accomplished_credit}}</b>
   @endif

</div>
<br>
<div class="row">
    <div class="col-lg-12">
        <div class="box box-solid">
            <div class="box-header">

            </div><!-- /.box-header -->
            <div class="box-body">
                <div class="box-group" id="accordion">

                    <div class="panel box box-primary">
                        <div class="box-header">

                            <h5 class="box-title">

                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" style="font-size: smaller;text-decoration: underline">
                                   Completed
                                </a>
                            </h5>
                        </div>
                        <div id="collapseOne" class="panel-collapse">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-lg-12">
                                         <table class="table  table-bordered">
                                             @if(isset($completed_course_in_year))
                                                <a  style="font-size:medium;text-decoration: underline;color:teal">
                                                     {{$completed_course_in_year->relSemester->title}}, {{$completed_course_in_year->relYear->title}}
                                                </a>
                                             @endif
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
                                               @if(isset($completed_course))
                                                  @foreach($completed_course as $value)
                                                     <tr>
                                                          <td>{{($value->relBatchCourse->relCourse->title )}}</td>
                                                          <td>{{ $value->relBatchCourse->relCourse->credit}}</td>
                                                          <td></td>
                                                          <td>
                                                              @if($value['status']== 'pass')
                                                                 {{strtoupper($value->status)}}
                                                              @else
                                                                 <b style="color: lightcoral">{{strtoupper($value->status)}}</b>
                                                              @endif
                                                          </td>
                                                          <td>
                                                               @if($value['status']== 'pass')
                                                                 <a class="btn btn-xs btn-success" href=""  title="Retake">Retake</a>
                                                               @endif
                                                          </td>
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
                    <div class="panel box box-danger">
                        <div class="box-header">
                            <h5 class="box-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" style="font-size: smaller;text-decoration: underline">
                                    Running
                                </a>
                            </h5>
                        </div>
                        <div id="collapseTwo" class="panel-collapse ">
                             <div class="box-body">
                                   <div class="row">
                                         <div class="col-lg-12">
                                             <table class="table  table-bordered">
                                                  @if(isset($running_course_in_year))
                                                     <a  style="font-size:medium;text-decoration: underline;color:#005580">
                                                        {{$running_course_in_year->relSemester->title}}, {{$running_course_in_year->relYear->title}}
                                                     </a>
                                                  @endif
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
                                                    @if(isset($running_course))
                                                       @foreach($running_course as $value)
                                                          <tr>
                                                               <td>
                                                                   <a href="{{ URL::route('academic.student.courses.obtained-marks',
                                                                       ['id' => $value->batch_course_id]) }}" class="btn-link" >
                                                                       {{($value->relBatchCourse->relCourse->title )}}
                                                                   </a>
                                                               </td>
                                                               <td>{{ $value->relBatchCourse->relCourse->credit}}</td>
                                                               <td></td>
                                                               <td>
                                                                 {{strtoupper($value->status)}}
                                                               </td>
                                                               <td>
                                                                   @if($value->status == 'enrolled')
                                                                      <a data-href="{{ URL::route('academic.student.courses.status',['id'=>$value->id, 'value'=>'revoked'])}}" class="btn btn-xs btn-info" data-toggle="modal" data-target="#confirm-status-one" href="" >Revoke</a>

                                                                   @endif
                                                                   @if($value->status == 'revoked')
                                                                      <a class="btn btn-xs btn-info"  data-href="{{ URL::route('academic.student.courses.status',['id'=>$value->id,'value'=>'invoked'])}}" title="Retake" data-toggle="modal" data-target="#confirm-status-one">Invoke</a>
                                                                   @endif
                                                               </td>
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
                      {{-------------Left Courses ----------------------------------------------------------}}
                    <div class="panel box box-success">
                        <div class="box-header">

                        </div>
                        <div class="box-header">
                            <h4 class="box-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" style="font-size:smaller;text-decoration: underline;color:lightcoral">
                                  Left
                                </a>
                            </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse ">
                            <div class="box-body">
                                <div class="row">

                                      <div class="col-lg-12">
                                          @if(isset($left_courses))
                                               @foreach($left_courses as $yr => $semesters)
                                                   @foreach($semesters as $sm => $courses)
                                                   <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree" style="font-size:medium;text-decoration: underline;color:lightseagreen">
                                                        {{$sm}}, {{$yr}}
                                                   </a>
                                                       <div id="collapseThree" class="panel-collapse ">
                                                           @if(isset($left_courses))
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
                                                                     @foreach($courses as $c => $v)
                                                                        <tr>
                                                                           <td>{{$v['title']}}</td>
                                                                           <td>{{$v['credit']}}</td>
                                                                           <td></td>
                                                                           <td></td>
                                                                           <td></td>
                                                                        </tr>
                                                                     @endforeach
                                                                  </tbody>
                                                              </table>
                                                           @else
                                                                {{"No Data found !"}}
                                                           @endif
                                                       </div>
                                                   @endforeach
                                               @endforeach
                                          @else
                                               {{"No Data found !"}}
                                          @endif
                                      </div>
                                  </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div><!-- /.col -->
</div><!-- /.row -->

<!-- Modal for status -->
    <div class="modal fade " id="confirm-status" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel" >Status Change Confirmation</h4>
              </div>
              <div class="modal-body">
                    <p style="font-size: medium;color:#000000">Are You Sure to do this  ?</p>

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-xs btn-default" data-dismiss="modal">Cancel</button>
                <a href="" class="btn btn-xs btn-primary">Yes</a>
              </div>
        </div>
      </div>
    </div>



{{--<!-- Modal for delete -->--}}
    <div class="modal fade" id="confirm-status-one" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Confirm to change status</h4>
                </div>
                <div class="modal-body">
                    <strong>Are you sure to change status?</strong>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <a href="#" class="btn btn-primary primary">Change</a>

                </div>
            </div>
        </div>
    </div>

@stop

