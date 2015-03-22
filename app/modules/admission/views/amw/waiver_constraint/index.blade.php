@extends('layouts.layout')
@section('sidebar')
    @include('layouts._sidebar_amw')
@stop
@section('content')
{{--<a class="pull-right btn btn-sm btn-success" href="{{ URL::route('admission.amw.batch-waiver.index' )}}"> <i class="fa fa-arrow-circle-left"></i> Go Back</a>--}}

<h3 class="box-title">Waiver Constraint</h3>
    <div class="box box-solid ">
        <div class="box box-info">
            <div class="box-header">
                <p>&nbsp;</p>

            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-lg-12">

                        <table id="example" class="table table-bordered table-striped">
                         @if (!$batchWaiver == null)
                               <tr>
                                   <th> Waiver :</th>
                                   <td>{{ $batchWaiver->relWaiver->title }}</td>
                                </tr>

                                <tr>
                                    <th> Waiver Type:</th>
                                    <td>{{ $batchWaiver->relWaiver->waiver_type }}</td>
                                </tr>
                                @else
                                    <div class="col-xs-12" style="text-align: center;">
                                         No data found !
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

 {{-------------------------Batch Waiver Const Table (Time dependent):Starts-----------------------------------------------------------------------}}
      <div class="box box-solid ">
          <div class="box box-info">
              <div class="box-header">
               <div class="box-tools pull-right">
                   <a class="pull-right btn btn-sm btn-info" href="{{ URL::route('admission.amw.waiver-constraint.create', ['batch_waiver_id'=>$deg_waiver_const->batch_waiver_id ] )}}" data-toggle="modal" data-target="#WaiverModal" style="color: #ffffff"><b>Add Time Constraint</b></a>
               </div>
{{--<a class="pull-right btn btn-sm btn-info" href="{{ URL::route('deg_waiver_time_const.create', ['degree_waiver_id'=>$degree_model->id ] )}}" data-toggle="modal" data-target="#addModal" >Add Time Constraint</a>--}}

              </div>
              <div class="box-body">
                  <div class="row">
                      <div class="col-lg-12">

                          <table id="example" class="table table-bordered table-striped">
                             <h4>Time Dependent Info</h4>

                                      <thead>
                                           <tr>
                                              <th>Start Date</th>
                                              <th>End Date</th>
                                              <th>Action</th>
                                           </tr>
                                      </thead>
                                      {{--<tbody>--}}
                                              {{--@foreach($deg_waiver_const as $value)--}}
                                                     {{--<tr>--}}

                                                          {{--@if($value->is_time_dependent == 1)--}}

                                                              {{--<td>{{ $value->start_date }}</td>--}}
                                                              {{--<td>{{ $value->end_date }}</td>--}}
                                                              {{--<td>--}}
                                                                   {{--<a data-href="{{ URL::to('amw/degree_manage/waiver_const/delete/'.$value->id) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#confirm-delete" href="" ><span class="glyphicon glyphicon-trash text-danger"></span></a>--}}
                                                                   {{--<a class="btn btn-xs btn-default" href="{{ URL::route('deg_waiver_time_const.edit', $value->id) }}" data-toggle="modal" data-target="#addModal" ><span class="glyphicon glyphicon-edit"></span></a>--}}
                                                              {{--</td>--}}
                                                          {{--@endif--}}

                                                     {{--</tr>--}}
                                              {{--@endforeach--}}
                                      {{--</tbody>--}}
                          </table>

                      </div>
                  </div>
              </div>
          </div>
      </div>

 {{-------------------------Degree Waiver Const Table (Time dependent):Ends-----------------------------------------------------------------------}}




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