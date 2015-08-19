@extends('layouts.layout')
@section('top_menu')
    @include('layouts._top_menu')
@stop
@section('sidebar')
    @include('layouts._sidebar_amw')
@stop
@section('content')
<a class="pull-right btn btn-xs btn-success" href="{{ URL::route('admission.amw.batch',['degree_id'=> $batch_info->degree_id])}}"> <i class="fa fa-arrow-circle-left"></i>Back To Batch Management</a>

<h3 class="box-title">Batch Waiver </h3>
    <div class="box box-solid ">
        <div class="box box-info">
            <div class="box-header">
            <div class="col-lg-10">
            <div class="help-text-top">
               You can view information according to corresponding Batch.
            </div><!-- /.box-body -->
            </div>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-lg-12">

                        <table id="example" class="table table-bordered table-striped">
                            @if (!$batch_info == null)

                            <tr>
                                <th>Degree Title :</th>
                                <td>{{ $batch_info->relDegree->relDegreeLevel->code.' '.$batch_info->relDegree->relDegreeGroup->code }}</td>
                            </tr>

                            <tr>
                                <th> Department:</th>
                                <td>{{ $batch_info->relDegree->relDepartment->title }}</td>
                            </tr>

                            <tr>
                                <th> Year:</th>
                                <td>{{ $batch_info->relYear->title }}</td>
                            </tr>

                            <tr>
                                <th> Semester:</th>
                                <td>{{ $batch_info->relSemester->title }}</td>

                            </tr>

                            <tr>
                                <th>Duration:</th>
                                <td>{{ $batch_info->reldegree->duration }}</td>

                            </tr>

                            <tr>
                                <th>Total Credit :</th>
                                <td>{{ $batch_info->reldegree->total_credit }}</td>

                            </tr>
                            @else

                                <div class="col-xs-12" style="text-align: center;">
                                    No data found !
                                    <span class="btn btn-xs btn btn-info" style="color: #e02222;">{{ HTML::linkAction('AdmAmwController@batchWaiverIndex' ,'Go Back'  ) }}</span>

                                </div>
                            @endif
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-right">
        {{--{{ $model->links() }}--}}
    </div>


 {{---------------------------Batch Waiver -------------------------------------------------------------------------------------}}

 <div class="box box-solid ">
     <div class="box box-info">
         <div class="box-header">

                <div class="col-lg-10">
                    <b>Waiver List: </b> You can add waiver by clicking on the button <b>Add Waiver</b>. Also you can add constraint by clicking the button <b>Const</b> under the action column.
                </div>
             <div class="box-tools pull-right">

                 <a class="pull-right btn btn-xs btn-info" href="{{ URL::route('admission.amw.batch-waiver.create',['batch_id'=>$batch_info->id])}}" data-toggle="modal" data-target="#WaiverModal" style="color: #ffffff"><b>Add Waiver</b></a>
             </div>
             <p>&nbsp;</p>

         </div>
         <div class="box-body">
             <div class="row">
                 <div class="col-lg-12">
                   <table id="example" class="table table-bordered table-striped">
                      <thead>
                            <tr>
                               <th>Waiver</th>
                               <th>Amount</th>
                               <th>Status</th>
                               <th>Action</th>
                            </tr>
                       </thead>
                       <tbody>
                         @foreach($waiver_info as $value)
                             <tr>
                               <td>{{ $value->relWaiver->title }}</td>
                               <td>{{ $value->relWaiver->amount }}</td>
                               <td> {{empty( WaiverConstraint::where('batch_waiver_id', $value->id)->first()->id) ? "No Const." : "Const. Added" }}</td>
                               <td>
                               <a href="{{ URL::route('admission.amw.waiver-constraint.index', ['batch_id'=>$value->batch_id, 'bw_id'=>$value->id]) }}" class="btn btn-xs btn-info">Const</a>
                               <a data-href="{{ URL::route('admission.amw.batch-waiver.delete',['bw_id'=>$value->id]) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#confirm-delete"  style="font-size: 12px;color: lightcoral"><span class="fa  fa-trash-o"></span></a>
                               </td>
                             </tr>
                         @endforeach
                       </tbody>

                   </table>

                 </div>
             </div>
         </div>
     </div>
 </div>
 <div class="text-right">
     {{--{{ $model->links() }}--}}
 </div>
{{----------------------------------------------Modal : Batch Waiver Modal--------------------------------------------------------------------------}}
    <div class="modal fade" id="WaiverModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            </div>
        </div>
    </div>

    <!-- Modal for delete -->
        <div class="modal fade " id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Confirm Delete</h4>
                  </div>
                  <div class="modal-body">
                        <strong>Are you sure to delete?</strong>

                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <a href="#" class="btn btn-danger danger">Delete</a>

                  </div>
            </div>
          </div>
        </div>



@stop