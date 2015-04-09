@extends('layouts.layout')
@section('sidebar')
    @include('layouts._sidebar_faculty')
@stop
@section('content')
    <h2> Admission Test</h2>
    <div class="row">
          <div class="col-sm-12">
                  {{ Form::open(array('url' => 'admission/faculty/admission-test/search-adm-examiner-index')) }}
                    <div class="col-sm-8">
                         <div class="col-sm-3">
                                  {{ Form::label('year_id', 'Year') }}
                                  {{ Form::select('year_id',$year_id, Input::old('year_id'), array('class' => 'form-control','required'=>'required') ) }}

                         </div>
                         <div class="col-sm-3">
                                  {{ Form::label('semester_id', 'Semester') }}
                                  {{ Form::select('semester_id',$semester_id, Input::old('semester_id'), array('class' => 'form-control','required'=>'required')) }}

                         </div>
                         <div class="col-sm-2">
                             </br>
                             {{ Form::submit('Filter', array('class'=>'btn btn-success btn-xs'))}}
                         </div>
                    </div>
                  {{ Form::close() }}
           </div>
    </div>

    <a href="{{ URL::previous() }}" class="pull-left btn btn-success btn-xs">Back</a>

     {{ Form::open(array('url' => 'admission/faculty/admission_test/batchDelete')) }}
                    <table id="example" class="table table-striped  table-bordered"  >
                          <thead>
                               {{ Form::submit('Delete Items', array('class'=>'btn btn-danger btn-xs', 'id'=>'hide-button', 'style'=>'display:none'))}}

                                 <br>
                                 <tr>
                                    <th><input name="id" type="checkbox" id="checkbox" class="checkbox" value=""></th>
                                    <th>Degree</th>
                                    <th>Dept</th>
                                    <th>Year</th>
                                    <th>Term</th>
                                    <th>Credit</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                 </tr>
                      </thead>
                      <tbody>

                         @foreach($search_index_adm_examiner as $index_adm_examiner_list)
                             <tr>
                                 <td><input type="checkbox" name="id[]" class="myCheckbox" value="{{ $index_adm_examiner_list['id'] }}"></td>
                                  <td>{{ isset($index_adm_examiner_list->relBatch->relDegree->relDegreeProgram->code) ? $index_adm_examiner_list->relBatch->relDegree->relDegreeProgram->code.''.$index_adm_examiner_list->relBatch->relDegree->relDegreeGroup->code :'' }}</td>
                                  <td>{{ isset($index_adm_examiner_list->relBatch->relDegree->relDepartment->title) ? $index_adm_examiner_list->relBatch->relDegree->relDepartment->title : '' }}</td>
                                  <td>{{ isset($index_adm_examiner_list->relBatch->relYear->title) ? $index_adm_examiner_list->relBatch->relYear->title : ''}}</td>
                                  <td>{{ isset($index_adm_examiner_list->relBatch->relSemester->title) ? $index_adm_examiner_list->relBatch->relSemester->title : '' }}</td>
                                  <td>{{ isset($index_adm_examiner_list->relBatch->relDegree->total_credit) ? $index_adm_examiner_list->relBatch->relDegree->total_credit : '' }}</td>
                                  <td>{{ isset($index_adm_examiner_list->status) ? $index_adm_examiner_list->status : '' }} </td>
                                 <td>
                                         @if($index_adm_examiner_list->status == 'Requested' )
                                           <a href="#" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#confirm_deny">Deny</a>
                                            <a href="#" class="btn btn-success btn-xs" data-toggle="modal" data-target="#confirm_accept">Accept</a>
                                         @elseif( $index_adm_examiner_list->status == 'Accepted' )
                                            <a href="{{ URL::route('admission.faculty.question-papers.admtest-question-paper', [ 'year_id'=>$index_adm_examiner_list->relBatch->year_id ,'semester_id'=>$index_adm_examiner_list->relBatch->semester_id ,'batch_id'=>$index_adm_examiner_list->batch_id  ]) }}" class="btn btn-info btn-xs" >Questions</a>
                                         @endif
                                 </td>
                             </tr>
                        @endforeach
                      </tbody>
                    </table>
     {{ Form::close() }}


<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="z-index:1050">
          <div class="modal-content">
          </div>
        </div>
</div>


 <div class="modal fade " id="confirm_accept" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Confirm Accept</h4>
                </div>
                <div class="modal-body">
                    <strong>Are you sure to Accept This Request?</strong>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <a href="{{ URL::route('admission.faculty.admission-test.change-status-to-accept',['id'=>$index_adm_examiner_list->id]) }}" class="btn btn-success">Accept</a>
                </div>
            </div>
        </div>
    </div>


 <div class="modal fade " id="confirm_deny" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Confirm Deny</h4>
                </div>
                <div class="modal-body">
                    <strong>Are you sure to Deny This Request?</strong>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <a href="{{ URL::route('admission.faculty.admission-test.change-status-to-deny', ['id'=>$index_adm_examiner_list->id])}}" class="btn btn-warning">Deny</a>
                </div>
            </div>
        </div>
    </div>

@stop