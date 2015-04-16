@extends('layouts.layout')

@section('sidebar')
 @include('layouts._sidebar_amw')
@stop

@section('content')
{{-----------------------------------------Help Text -------------------------------------------------------------------------------------}}
<div class="row" xmlns="http://www.w3.org/1999/html">
    <div class="col-md-12">
    <a class="pull-right btn btn-xs btn-success" href="{{ URL::route('admission.amw.batch',['degree_id'=> $batchApt->degree_id])}}"> <i class="fa fa-arrow-circle-left"></i>Back To Batch Management</a>


                <h3>Batch Applicant</h3>

            <div class="help-text-top">
             You can view all lists of Applicant Lists. Also this panel will allow you to perform some actions to <b>Change Status</b>, <b>View</b> under the column <b>Action</b>. And you can change more than one applicant's status selecting them.
            </div><!-- /.box-body -->
    </div><!-- ./col -->
</div><!-- /.row -->
{{-----------------------------------------Help Text ends ----------------------------------------------------------------------}}


<h4>Admission On </h4>
      <p>
     {{--<b style="font-style: italic">--}}
        @if(isset($batchApt))
           {{$batchApt->relDegree->relDegreeLevel->code}}
           {{$batchApt->relDegree->relDegreeGroup->code}} In
           {{$batchApt->relDegree->relDegreeProgram->code}} ,
           {{$batchApt->relSemester->title}} -
           {{$batchApt->relYear->title}}
       @endif
     </p>

 <div class="box box-solid ">
    <div class="box box-info">
    <br>
     {{--------------------------------------- Filter Starts --------------------------------------------------------------}}

          {{ Form::open(array('route'=>['admission.amw.batch-applicant.index',$batch_id],'class'=>'form-horizontal')) }}
          <div  class="col-lg-3 pull-right" >
              <div class="input-group input-group-sm">
                  {{ Form::select('status', ['' => 'Select Status']+$status , Input::old('status'),['class'=>'form-control input-sm ','required'])}}
                  <span class="input-group-btn">
                      <button class="btn btn-info btn-flat" type="submit" >Filter</button>
                  </span>
              </div>
          </div>

          {{ Form::close() }}

      {{---------------------------------- Filter Ends --------------------------------------------------------------------}}
          <div class="box-body">
               <div class="row">
                   <div class="col-lg-12">

                        {{ Form::open(['route' => ['admission.amw.batch-applicant.apply']]) }}

                            <div class="col-lg-3" style="margin-left: -1%;">
                                <div class="input-group input-group-sm">
                                  {{ Form::select('status', ['' => 'Select Status']+$status , Input::old('status'),['class'=>'form-control input-sm','required'])}}
                                  <span class="input-group-btn">
                                      <button class="btn btn-info btn-flat" type="submit">Apply</button>
                                  </span>
                                </div>
                            </div>

                            @if($apt_data->count())

                            <table id="example" class="table table-bordered">

                                 <thead>
                                     <tr>
                                         <th>
                                             <input name="id" type="checkbox" id="checkbox" class="checkbox" value="">
                                         </th>
                                        <th>Applicant Name</th>
                                        <th>Status</th>
                                        <th>Term</th>
                                        <th>Action</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                       @if(isset($apt_data))
                                            @foreach($apt_data as $value)
                                                <tr>
                                                    <td><input type="checkbox" name="ids[]"  class="myCheckbox" value="{{ $value->id }}">
                                                    </td>
                                                    <td>{{$value->relApplicant->first_name.''.$value->relApplicant->last_name}}</td>
                                                    <td> {{ empty($value->status) ? 'Status Do not added' : $status[$value->status] }}</td>
                                                    <td>{{$value->relBatch->relSemester->title}}</td>

                                                    <td>
                                                         <a href="{{ URL::route('admission.amw.batch-applicant.view-applicant',['id'=>$value->id,'batch_id'=>$value->batch_id, 'applicant_id'=>$value->applicant_id])  }}" class="btn btn-default btn-xs" title="View Applicant's Info" ><b>View</b></a>
                                                         <a class="btn btn-xs btn-success" href="{{ URL::to('admission/amw/batch-applicant/change/'.$value->id) }}" data-toggle="modal" data-target="#batchAptModal" ><b>Change Status</b></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                       @endif
                                 </tbody>

                                 <p>&nbsp;</p>
                            </table>

                            @else
                            <p>&nbsp;</p>
                                <div>
                                   <p style="margin-left: 350px;color:#000000"><em>There Are No Applicant.</em>
                                </div>
                            @endif
                            <p>&nbsp;</p>
                        {{ Form::close() }}
                   </div>
               </div>
          </div>
    </div>
 </div>
<div class="text-right">
    {{--{{ $apt_data->links() }}--}}
</div>

{{----------------------------------------------Modal : BatchApplicantModal--------------------------------------------------------------------------}}
<div class="modal fade" id="batchAptModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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