@extends('layouts.layout')
@section('sidebar')
    @include('layouts._sidebar_amw')
@stop
@section('content')
<a class="pull-right btn btn-xs btn-success" href="{{ URL::route('admission.amw.batch-waiver.index',['batch_id'=>$batchWaiver->batch_id] )}}"> <i class="fa fa-arrow-circle-left"></i> Go Back</a>

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
                         @if ($batchWaiver != null)
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
                   {{--<a class="pull-right btn btn-sm btn-info" href="{{ URL::route('admission.amw.waiver-constraint.create' )}}" data-toggle="modal" data-target="#waiverConstModal" style="color: #ffffff"><b>Add Time Constraint</b></a>--}}
               </div>

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
                                      <tbody>
                                      @if(isset($timeDependent))
                                          @foreach($timeDependent as $value)
                                             <tr>
                                                  <td>{{ $value->start_date }}</td>
                                                  <td>{{ $value->end_date }}</td>
                                                  <td>
                                                       <a class="btn btn-xs btn-default" href="{{ URL::route('admission.amw.waiver-time-constraint.edit', $value->id) }}" data-toggle="modal" data-target="#waiverConstModal" style="font-size: 12px;color: darkmagenta"><span class="fa fa-eye"></span></a>
                                                       <a data-href="{{ URL::to('admission/amw/constraint-waiver/delete/'.$value->id) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#confirm-delete" href="" style="font-size: 12px;color: lightcoral"><span class="fa  fa-trash-o"></span></a>
                                                  </td>
                                             </tr>

                                          @endforeach
                                      @endif
                                      <div>
                                          <a class="pull-right btn btn-xs btn-info" href="{{ URL::route('admission.amw.waiver-time-constraint.create', ['batch_waiver_id'=>$batch_waiver_id] )}}" data-toggle="modal" data-target="#waiverConstModal" style="color: #ffffff"><b>Add Time Constraint</b></a>
                                      </div>
                                      <p>&nbsp;</p>
                                      </tbody>
                          </table>

                      </div>
                  </div>
              </div>
          </div>
      </div>

 {{-------------------------Degree Waiver Const Table (Time dependent):Ends-----------------------------------------------------------------------}}

{{-------------------------Batch Waiver Const Table (GPA dependent):Starts-----------------------------------------------------------------------}}
      <div class="box box-solid ">
          <div class="box box-info">
              <div class="box-header">

              </div>
              <div class="box-body">
                  <div class="row">
                      <div class="col-lg-12">

                          <table id="example" class="table table-bordered table-striped">
                             <h4>GPA Dependent Info</h4>

                                      <thead>
                                           <tr>
                                              <th>Start Date</th>
                                              <th>End Date</th>
                                              <th>Action</th>
                                           </tr>
                                      </thead>
                                      <tbody>
                                        @if(isset($gpaDependent))
                                          @foreach($gpaDependent as $value)
                                             <tr>
                                                 <td>{{ $value->level_of_education }}</td>
                                                 <td>{{ $value->gpa }}</td>
                                                 <td>
                                                      <a class="btn btn-xs btn-default" href="{{ URL::route('admission.amw.waiver-gpa-constraint.edit', $value->id) }}" data-toggle="modal" data-target="#waiverConstModal" style="font-size: 12px;color: darkmagenta"><span class="fa fa-eye"></span></a>
                                                      <a data-href="{{ URL::to('admission/amw/constraint-waiver/delete/'.$value->id) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#confirm-delete" href=""style="font-size: 12px;color: lightcoral"><span class="fa  fa-trash-o"></span></a>
                                                 </td>
                                             </tr>
                                          @endforeach
                                        @endif
                                        <div>
                                          <a class="pull-right btn btn-xs btn-info" href="{{ URL::route('admission.amw.waiver-gpa-constraint.create', ['batch_waiver_id'=>$batch_waiver_id] )}}" data-toggle="modal" data-target="#waiverConstModal" style="color: #ffffff"><b>Add GPA Constraint</b></a>
                                      </div>
                                      <p>&nbsp;</p>
                                      </tbody>
                          </table>

                      </div>
                  </div>
              </div>
          </div>
      </div>

 {{-------------------------Degree Waiver Const Table (GPA dependent):Ends-----------------------------------------------------------------------}}


{{----------------------------------------------Modal : Batch Waiver Modal--------------------------------------------------------------------------}}
    <div class="modal fade" id="waiverConstModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="z-index:1050">
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