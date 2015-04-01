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


     {{ Form::open(array('url' => 'admission/faculty/admission-test/batchDelete')) }}
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
                          @foreach($index_adm_examiner as $index_adm_examiner_list)
                                <tr>
                                    <td><input type="checkbox" name="id[]" class="myCheckbox" value="{{ $index_adm_examiner_list['id'] }}"></td>

                                     <td>{{ HTML::linkAction('AdmFacultyController@viewAdmTest',$index_adm_examiner_list->relBatch->relDegree->relDegreeProgram->code.''.$index_adm_examiner_list->relBatch->relDegree->relDegreeGroup->code ,['id'=>$index_adm_examiner_list->id], ['data-toggle'=>"modal", 'data-target'=>"#modal"]) }}</td>

                                     <td>{{ $index_adm_examiner_list->relBatch->relDegree->relDepartment->title }}</td>

                                     <td>{{ $index_adm_examiner_list->relBatch->relYear->title }}</td>

                                     <td>{{ $index_adm_examiner_list->relBatch->relSemester->title }}</td>

                                     <td>{{ $index_adm_examiner_list->relBatch->relDegree->total_credit }}</td>

                                     <td>{{ $index_adm_examiner_list->status }}</td>

                                    <td>
                                        <a href="{{ URL::route('admission.faculty.admission-test.accept-admtest') }}" class="btn btn-success btn-xs" data-toggle="modal" data-target="#modal">Accept</a>
                                        <a href="{{ URL::route('admission.faculty.admission-test.deny-admtest') }}" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#modal">Deny</a>
                                        <a href="{{ URL::route('admission.faculty.question-papers.admtest-question-paper', [ 'year_id'=>$index_adm_examiner_list->relBatch->year_id ,'semester_id'=>$index_adm_examiner_list->relBatch->semester_id ,'batch_id'=>$index_adm_examiner_list->batch_id  ]) }}" class="btn btn-info btn-xs" >Questions</a>


{{--,'batch_admtest_subject_id'=>$index_adm_examiner_list->id--}}
                                 {{--<a href="{{ URL::route('admission.faculty.admission-test.', [ 'year_id'=>$adm_test_mgt->relBatch->year_id ,'semester_id'=>$adm_test_mgt->relBatch->semester_id ,'batch_id'=>$adm_test_mgt->batch_id ]) }}" class="btn btn-default btn-xs" >EX</a>--}}
                                    </td>
                                </tr>
                          @endforeach
                      </tbody>
                    </table>
     {{ Form::close() }}

{{--modal--}}
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="z-index:1050">
          <div class="modal-content">

          </div>
    </div>
</div>

{{--confirmation--}}
{{--<div class="modal fade" id="confirmation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">--}}
        {{--<div class="modal-dialog">--}}
            {{--<div class="modal-content">--}}
                {{--<div class="modal-header">--}}
                    {{--<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>--}}
                    {{--<h4 class="modal-title" id="myModalLabel">Confirm Delete</h4>--}}
                {{--</div>--}}
                {{--<div class="modal-body">--}}
                    {{--<strong>Are you sure you want to accept this examiner role ?</strong>--}}
                {{--</div>--}}
                {{--<div class="modal-footer">--}}
                    {{--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>--}}
                    {{--<a href="#" class="btn btn-danger">OK</a>--}}

                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
{{--</div>--}}


@stop