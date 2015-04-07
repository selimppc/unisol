@extends('layouts.layout')
@section('sidebar')

@stop
@section('content')
<a class="pull-right btn btn-xs btn-success" href="{{ URL::route('admission.public.applicant_details',['batch-applicant-id'=>Auth::applicant()->get()->id])}}"><b><i class="fa fa-arrow-circle-left"></i>Go Back</b></a>
    <div class="help-text-top">
              You can view details information of degree and subject on admission test. Also this panel will allow you to choice exam center sequence to <b>Exam Center Choice</b> button.
                     {{--<small>Someone famous in <cite title="Source Title">Source Title</cite></small>--}}
    </div>
 <h3>Admission Test Details On</h3>
     <div class="col-lg-12">
        <table>
              <tr>
                 <th>Degree Name :</th>
                 <td>
                    {{$adm_test_details->relBatch->relDegree->title}} Of {{$adm_test_details->relBatch->relDegree->relDegreeGroup->title}} On {{$adm_test_details->relBatch->relDegree->relDepartment->title}} ,{{$adm_test_details->relBatch->relSemester->title}} ,{{$adm_test_details->relBatch->relYear->title}} .
                 </td>
              </tr>

              <tr>
                 <th>Batch Number: </th>
                 <td>{{$adm_test_details->relBatch->batch_number}}</td>
              </tr>
        </table>
     </div>
<p>&nbsp;</p>
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
                             <a class="pull-right btn btn-sm btn-info" data-toggle="modal" data-target="#exmCenterModal"   href="{{URL::route('admission.public.exm-center',['batch_applicant_id'=>$batch_applicant_id])}}">Choose Exam Center Sequence</a>
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

    <div class="modal fade" id="exmCenterModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
        </div>
      </div>
    </div>

@stop

