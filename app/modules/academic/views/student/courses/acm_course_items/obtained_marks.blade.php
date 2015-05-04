@extends('layouts.layout')

@section('sidebar')
 @include('layouts._sidebar_student')
@stop
@section('content')

<a class="pull-right btn btn-xs btn-info" href="{{ URL::route('academic.student.exam-enrollment',$batch_course_id)}}"><b>Enroll For Exam</b></a>

<div class="wrapper row-offcanvas row-offcanvas-left">

    <h2 class="page-header">Course : {{isset($courses) ? $courses->relBatchCourse->relCourse->title : ''}}</h2>
    <div class="row">
        <div class="col-md-12">
            <!-- Custom Tabs -->
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab">Obtained Marks </a></li>
                    <li><a href="#tab_2" data-toggle="tab">Class</a></li>
                    <li><a href="#tab_3" data-toggle="tab">Class Test</a></li>
                    <li><a href="#tab_4" data-toggle="tab">Assignment</a></li>
                    <li><a href="#tab_5" data-toggle="tab">Mid Term</a></li>
                    <li><a href="#tab_6" data-toggle="tab">Term Final</a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            Settings  <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li role="presentation" data-toggle="modal" data-target="#addCategory"><a role="menuitem" tabindex="-1" href="#">  Enroll For Exam </a></li>
                            {{--<li role="presentation" data-toggle="modal" data-target="#addResearchReview"><a role="menuitem" tabindex="-1" href="#"> Add Journal </a></li>--}}
                        </ul>
                    </li>
                    <li class="pull-right" class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-gear"></i>&nbsp;</a>
                        <ul class="dropdown-menu">
                            <li role="presentation" data-toggle="modal" data-target="#addCategory"><a role="menuitem" tabindex="-1" href="#"> Enroll For Exam </a></li>
                        </ul>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <div class="box-body table-responsive"><p>&nbsp;</p>
                            <table id="" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <tr>
                                            <th>Item</th>
                                            <th>Obtain</th>
                                            <th>Out To</th>
                                        </tr>
                                    </tr>
                                </thead>
                                <tbody>
                                   @if(isset($acm_marks_dist_item))
                                       @foreach($acm_marks_dist_item as $value)
                                             <tr>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                             </tr>
                                       @endforeach
                                   @endif
                                </tbody>
                            </table>
                        </div><!-- /.box -->
                        <a class="pull-right btn btn-xs btn-circle" href="{{ URL::route('academic.student.courses.index')}}" title="Back To Courses"><b style="color: #000000;font-size: medium"><i class="fa fa-arrow-circle-left"></i></b></a><p>&nbsp;</p>
                    </div><!-- /.tab-pane -->

                    <div class="tab-pane" id="tab_2">
                        <div class="box-body table-responsive"><p>&nbsp;</p>
                            <table id="" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Class Date</th>
                                    <th>View Status </th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                   @if(isset($class))
                                      @foreach($class as $value)
                                            <tr>
                                               <td>{{$value->title}}</td>
                                               <td>{{$value->relAcmClassSchedule->day}}</td>
                                               <td></td>
                                               <td>
                                                  <a href="{{ URL::route('academic.student.courses.class-view',['id'=>$value->id]) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#course_item" style="font-size: 11px;color: darkmagenta"><span class="fa fa-eye"></span></a>
                                               </td>
                                            </tr>
                                      @endforeach
                                   @endif
                                </tbody>

                            </table>
                        </div><!-- /.box -->
                    </div><!-- /.tab-pane -->

 {{------------------Starts :Class Test  -----------------------------------------------------}}
                    <div class="tab-pane" id="tab_3">
                        <div class="box-body table-responsive"><p>&nbsp;</p>
                            <table id="" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Date</th>
                                    <th>Time </th>
                                    <th>Status </th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                   @if(isset($class_test))
                                      @foreach($class_test as $value)
                                            <tr>
                                               <td>{{$value->title}}</td>
                                               <td>{{$value->relAcmClassSchedule->day}}</td>
                                               <td>{{$value->relAcmClassSchedule->relAcmClassTime->start_time}}</td>
                                               <td></td>
                                               <td>
                                                   <a href="{{ URL::route('academic.student.courses.class-view',['id'=>$value->id]) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#course_item" style="font-size: 11px;color: darkmagenta"><span class="fa fa-eye"></span></a>
                                               </td>
                                            </tr>
                                      @endforeach
                                   @endif
                                </tbody>

                            </table>
                        </div><!-- /.box -->
                    </div><!-- /.tab-pane -->
{{------------------Ends :Class Test  -----------------------------------------------------}}

{{------------------Starts :Assignment  -----------------------------------------------------}}
                   <div class="tab-pane " id="tab_4">
                       <div class="box-body table-responsive"><p>&nbsp;</p>
                           <table id="" class="table table-bordered table-striped">
                               <thead>
                               <tr>
                                   <th>Title</th>
                                   <th>Status</th>
                                   <th>DeadLine </th>
                                   <th>Action </th>
                               </tr>
                               </thead>
                               <tbody>
                                  @if(isset($assignment))
                                     @foreach($assignment as $value)
                                           <tr>
                                              <td>{{$value->title}}</td>
                                              <td>
                                                  @if( ($value->relAcmClassSchedule->day) > date('Y-m-d'))
                                                  @else
                                                       <span style="color: red">Date Over</span>
                                                  @endif
                                              </td>
                                              <td>
                                                  {{$value->relAcmClassSchedule->day}}
                                              </td>
                                              <td>
                                                  <a href="{{ URL::route('academic.student.courses.assignment-view',['id'=>$value->id,'value'=>$value->status]) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#course_item" style="font-size: 11px;color: darkmagenta"><span class="fa fa-eye"></span></a>
                                              </td>
                                           </tr>
                                     @endforeach
                                  @endif
                               </tbody>

                           </table>
                       </div><!-- /.box -->
                   </div><!-- /.tab-pane -->
{{------------------Ends : Assignment  -----------------------------------------------------}}

{{------------------Starts :Mid Term  -----------------------------------------------------}}
                   <div class="tab-pane" id="tab_5">
                      <div class="box-body table-responsive"><p>&nbsp;</p>
                          <table id="" class="table table-bordered table-striped">
                              <thead>
                              <tr>
                                  <th>Title</th>
                                  <th>Date</th>
                                  <th>Time </th>
                                  <th>Enrollment Status </th>
                                  <th>Status</th>
                                  <th>Action</th>
                              </tr>
                              </thead>
                              <tbody>
                                 @if(isset($midterm))
                                    @foreach($midterm as $value)
                                          <tr>
                                             <td>{{$value->title}}</td>
                                             <td>{{$value->relAcmClassSchedule->day}}</td>
                                             <td></td>
                                             <td></td>
                                             <td></td>
                                             <td></td>
                                          </tr>
                                    @endforeach
                                 @endif
                              </tbody>

                          </table>
                      </div><!-- /.box -->
                   </div><!-- /.tab-pane -->
{{------------------Ends : Mid Term  -----------------------------------------------------}}

{{------------------Starts :Term  Final-----------------------------------------------------}}
                   <div class="tab-pane" id="tab_6">
                       <div class="box-body table-responsive"><p>&nbsp;</p>
                            <table id="" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Date</th>
                                    <th>Time </th>
                                    <th>Enrollment Status </th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                   @if(isset($term_final))
                                      @foreach($term_final as $value)
                                            <tr>
                                               <td>{{$value->title}}</td>
                                               <td>{{$value->relAcmClassSchedule->day}}</td>
                                               <td></td>
                                               <td></td>
                                               <td></td>
                                               <td></td>
                                            </tr>
                                      @endforeach
                                   @endif
                                </tbody>
                            </table>
                       </div><!-- /.box -->
                   </div><!-- /.tab-pane -->
{{------------------Ends :Term  Final-----------------------------------------------------}}

                </div><!-- /.tab-content -->
            </div><!-- nav-tabs-custom -->
        </div><!-- /.col -->
    </div> <!-- /.row -->
    <!-- END CUSTOM TABS -->
</div><!-- ./wrapper -->

{{----------------------------------------------Modal : course_itemModal--------------------------------------------------------------------------}}
<div class="modal fade" id="course_item" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">

        </div>
      </div>
 </div>

@stop
