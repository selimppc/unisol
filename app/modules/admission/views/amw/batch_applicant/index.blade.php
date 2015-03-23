@extends('layouts.layout')

@section('sidebar')
 @include('layouts._sidebar_amw')
@stop

@section('content')

<h3>Admission On </h3>
    <p>
     {{--<b style="font-style: italic">--}}
     @if(isset($batchApt))
           {{$batchApt->relDegree->relDegreeProgram->title}}
           {{$batchApt->relDegree->relDegreeGroup->title}} On
           {{$batchApt->relDegree->relDepartment->title}}
           {{$batchApt->relSemester->title}},
           {{$batchApt->relYear->title}}
       @endif
    </p>

 <div class="box box-solid ">
        <div class="box box-info">
              <div class="box-header">
              <h3 class="box-title">Batch Applicant</h3>

              <p>&nbsp;</p>
{{-------------------------------------------------------------Filter Starts--------------------------------------------------------------}}
              <table id="example1">

              {{ Form::open(array('url'=>'admission/amw/batch-apt/status','class'=>'form-horizontal')) }}

              <div  class="col-lg-3">{{ Form::label('status', 'Status') }}
              {{ Form::select('status', $status , Input::old('status'),['class'=>'form-control input-sm '])}}</div>
              <p>&nbsp;</p>
              {{ Form::submit('Filter',['class'=>'pull-left btn btn-xs btn btn-success']) }}
              </table>
              {{ Form::close() }}

{{--------------------------------------------------------------Filter Ends--------------------------------------------------------------------}}

              </div>
              <div class="box-body">
                   <div class="row">
                       <div class="col-lg-12">
                       {{ Form::open(array('url' => 'common/course-type/batch-delete')) }}
                          <table class="table table-bordered">

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
                                                <td> {{ $status[$value->status] }}</td>
                                                <td>{{$value->relBatch->relSemester->title}}</td>

                                                <td>
                                                     {{--<a href="{{ URL::to('admission/amw/batch-edu-const/show/'.$value->id) }}" class="btn btn-xs btn-default" data-toggle="modal" data-target="#eduConstModal" style="font-size: 12px;color: darkmagenta"><span class="fa fa-eye"></span></a>--}}
                                                     <a class="btn btn-xs btn-default" href="{{ URL::to('admission/amw/batch-applicant/change/'.$value->id) }}" data-toggle="modal" data-target="#batchAptModal" style="font-size: 12px;color:darkmagenta"><i class="fa fa-edit"></i>Change Status</a>

                                                </td>
                                            </tr>
                                        @endforeach
                                   @endif
                             </tbody>

                       {{ Form::submit('Apply', array('class'=>'pull-right btn btn-sm btn-success', 'id'=>'hide-button', 'style'=>'display:none'))}}
                          </table>
                          <p>&nbsp;</p>


                       {{ Form::close() }}
                       </div>
                   </div>
              </div>
        </div>

 </div>
<div class="text-right">
    {{--{{ $batchApplicant->links() }}--}}
</div>

{{----------------------------------------------Modal : degreeGroupModal--------------------------------------------------------------------------}}
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