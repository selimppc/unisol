@extends('layouts.layout')
@section('sidebar')
    @include('layouts._sidebar_amw')
@stop
@section('content')
<a class="pull-right btn btn-sm btn-success" href="{{ URL::to('admission/amw/batch-management' )}}"> <i class="fa fa-arrow-circle-left"></i> Go Back</a>

<h3 class="box-title">Batch Waiver </h3>
    <div class="box box-solid ">
        <div class="box box-info">
            <div class="box-header">
                <p>&nbsp;</p>

            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-lg-12">

                        <table id="example" class="table table-bordered table-striped">
                            @if (!$batch_info == null)

                            <tr>
                                <th>  Title :</th>
                                <td>{{ $batch_info->relDegree->relDegreeProgram->title.' '.$batch_info->relDegree->relDegreeGroup->title }}</td>
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
                                    <span class="btn btn-xs btn btn-info" style="color: #e02222;">{{ HTML::linkAction('UserSignupController@batchWaiverIndex' ,'Go Back'  ) }}</span>

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


                 <div class="box-tools pull-right">
                     <a class="pull-right btn btn-sm btn-info" href="{{ URL::route('admission.amw.batch-waiver.create',['batch_id'=>$batch_info->id])}}" data-toggle="modal" data-target="#WaiverModal" style="color: #ffffff"><b>Add Waiver..</b></a>
                 </div>
                 <p>&nbsp;</p>

             </div>
             <div class="box-body">
                 <div class="row">
                     <div class="col-lg-12">

                       <table id="example" class="table table-bordered table-striped">
                              <thead>
                                    <tr>
                                       {{--<th>Degree Title</th>--}}
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
                                               <td></td>

                                               <td>
                                                  <a data-href="{{ URL::route('admission.amw.batch-waiver.delete',['batch_id'=>$value->batch_id]) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#confirm-delete"  style="font-size: 12px;color: lightcoral"><span class="fa  fa-trash-o"></span></a>
                                                  <a href="{{ URL::route('admission.amw.waiver-constraint.index', ['batch_id'=>$value->batch_id, 'waiver_id'=>$value->waiver_id]) }}">Const</a>
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