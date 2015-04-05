@extends('layouts.layout')
@section('sidebar')

@stop
@section('content')
{{--<a class="pull-right btn btn-xs btn-success" href="{{ URL::route('admission.degree_offer_details',['batch-applicant-id'=>$adm_test_details->$batch_applicant_id])}}"><b><i class="fa fa-arrow-circle-left"></i>Go Back</b></a>--}}
    <div class="help-text-top">
              You can view details information of degree and subject on admission test. Also this panel will allow you to choice exam center sequence to <b>Exam Center Choice</b> button.
                     {{--<small>Someone famous in <cite title="Source Title">Source Title</cite></small>--}}
    </div>
 <h4>Admission Test Details On</h4>
 <div class="box box-solid">

     <div class="box box-info">
          <div class="box-body">
             <div class="row">
                 <div class="col-lg-12">

                       <table>
                              <tr>
                                 <th>Degree Name :</th>
                                 <td>{{$adm_test_details->relBatch->relDegree->title}}</td>
                              </tr>
                              <tr>
                                  <th>Year :</th>
                                  <td>{{$adm_test_details->relBatch->relSemester->title}}</td>
                              </tr>
                              <tr>
                                 <th>Semester :</th>
                                 <td>{{$adm_test_details->relBatch->relYear->title}}</td>
                              </tr>
                              <tr>
                                 <th>Batch Number: </th>
                                 <td>{{$adm_test_details->relBatch->batch_number}}</td>
                              </tr>
                       </table>


                 </div>
             </div>
        </div>
     </div>
 </div>

 {{--------------- Admission Test Subjects  ----------------------------------------------------------}}
<h5><b>Admission Test will be taken On </b></h5>
  <div class="box box-solid">
     <div class="box-header">

     </div>
     <div class="box box-info">
         <div class="box-body">
              <div class="row">
                  <div class="col-lg-12">
                      <table class="table table-bordered table-striped">
                          <thead>
                               <tr>
                                      <th>Subject Name</th>
                                      <th>Marks</th>
                                      <th>Test Time Duration(in Minutes)</th>
                               </tr>
                          </thead>
                          <tbody>
                              @if(isset($adm_test_subject))
                                 @foreach($adm_test_subject as $value)
                                      <tr>
                                             <td>{{$value->relAdmtestSubject->title}}</td>
                                             <td>{{$value->marks}}</td>
                                             <td>{{$value->duration}}</td>
                                      </tr>
                                 @endforeach
                                 @endif
                          </tbody>
                        </table>
                  </div>
              </div>
         </div>
     </div>
  </div>

  {{-------- Exam Center Choice -----------------------------------------------------------------------}}
  <h5><b>Exam Center Choice </b></h5>
    <div class="box box-solid">
       <div class="box-header">

       </div>
       <div class="box box-info">
           <div class="box-body">
                <div class="row">
                    <div class="col-lg-12">
                        <table class="table table-striped table-bordered">
                          @if($exm_center_choice_lists != null)
                          <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#exmCenterModal">
                                Launch demo modal
                          </button>
                             <a class="pull-right btn btn-sm btn-info" href="{{ URL::route('admission.public.exm-center' , ['batch_applicant_id'=>$batch_applicant_id]) }}" data-toggle="modal" data-target="#exmCenterModal" >Change Exam Center Sequence</a>
                          @else
                             <a class="pull-right btn btn-sm btn-info"  href="{{URL::route('admission.public.exm-center',['batch_applicant_id'=>$batch_applicant_id])}}" data-toggle="modal" data-target="#exmCenterModal"><b></b> Exam Center Choice </a>
                          @endif

                          @if (isset($exm_center_choice_lists))
                          <tbody>
                                 <tr>
                                    <th rowspan="100%" style="vertical-align: middle"><b style="font-size: medium">Sequence Name Of Exam Center </b></th>
                                 </tr>
                                 @foreach(($exm_center_choice_lists) as $value)
                                      <tr>
                                         <td class="col-lg-10">
                                            {{ $value->relExmCenter->title }}
                                         </td>
                                      </tr>
                                 @endforeach
                          </tbody>
                          @else
                            <div class="col-xs-12" style="text-align: center;">
                                 <span class="btn btn-xs btn btn-info" style="color:#ffffff;">Exam Center List Not Added !</span>
                            </div>
                          @endif
                        </table>
                    </div>
                </div>
           </div>
       </div>
    </div>

{{--<a class="pull-right btn btn-sm btn-info"  href="{{URL::route('admission.public.exm-center',['batch_applicant_id'=>$batch_applicant_id])}}" data-toggle="modal" data-target="#exmCenterModal"><b></b> Exam Center Choice </a>--}}

{{----------------------------------------------Modal --------------------------------------------------------------------------}}
 {{--<div class="modal fade" id="exmCenterModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">--}}
       {{--<div class="modal-dialog">--}}
         {{--<div class="modal-content">--}}

        {{--</div>--}}
       {{--</div>--}}
 {{--</div>--}}


<div class="modal fade" id="exmCenterModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Modal title</h4>
          </div>
          <div class="modal-body">
            <div class="row">
                    <!-- Left col -->
                    <section class="col-lg-12 connectedSortable">
                        <!-- Custom tabs (Charts with tabs)-->
                        <div class="nav-tabs-custom">
                            <!-- Tabs within a box -->
                            <ul class="nav nav-tabs pull-right">
                                <li class="active"><a href="#revenue-chart" data-toggle="tab">Area</a></li>
                                <li><a href="#sales-chart" data-toggle="tab">Donut</a></li>
                                <li class="pull-left header"><i class="fa fa-inbox"></i> Sales</li>
                            </ul>
                        </div><!-- /.nav-tabs-custom -->

                        <!-- Chat box -->
                        <div class="box box-success">
                            <div class="box-header">
                                <i class="fa fa-comments-o"></i>
                                <h3 class="box-title">Chat</h3>
                                <div class="box-tools pull-right" data-toggle="tooltip" title="Status">
                                    <div class="btn-group" data-toggle="btn-toggle" >
                                        <button type="button" class="btn btn-default btn-sm active"><i class="fa fa-square text-green"></i></button>
                                        <button type="button" class="btn btn-default btn-sm"><i class="fa fa-square text-red"></i></button>
                                    </div>
                                </div>
                            </div>

                        </div><!-- /.box (chat box) -->

                        <!-- TO DO List -->
                        <div class="box box-primary">
                            <div class="box-header">
                                <i class="ion ion-clipboard"></i>
                                <h3 class="box-title">To Do List</h3>
                                <div class="box-tools pull-right">
                                    <ul class="pagination pagination-sm inline">
                                        <li><a href="#">&laquo;</a></li>
                                        <li><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">&raquo;</a></li>
                                    </ul>
                                </div>
                            </div><!-- /.box-header -->
                        </div><!-- /.box -->

                        <!-- quick email widget -->
                        <div class="box box-info">
                            <div class="box-header">
                                <i class="fa fa-envelope"></i>
                                <h3 class="box-title">Quick Email</h3>
                                <!-- tools box -->
                                <div class="pull-right box-tools">
                                    <button class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                                </div><!-- /. tools -->
                            </div>

                        </div>

                    </section><!-- /.Left col -->

                </div><!-- /.row (main row) -->
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>

@stop

