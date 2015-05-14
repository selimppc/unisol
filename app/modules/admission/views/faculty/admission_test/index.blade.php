@extends('layouts.layout')
@section('sidebar')
    @include('layouts._sidebar_faculty')
@stop

@section('content')
    <h2> Admission Test</h2>


    <div class="row">
          <div class="col-sm-12">
                  {{ Form::open(array('url' => 'admission/faculty/admission-test')) }}
                    <div class="col-sm-8">
                         <div class="col-sm-3">
                                  {{ Form::label('year_id', 'Year') }}
                                  {{ Form::select('year_id',$year_id, Input::old('year_id'), array('class' => 'form-control') ) }}

                         </div>
                         <div class="col-sm-3">
                                  {{ Form::label('semester_id', 'Semester') }}
                                  {{ Form::select('semester_id',$semester_id, Input::old('semester_id'), array('class' => 'form-control')) }}

                         </div>
                         <div class="col-sm-2">
                             </br>
                             {{ Form::submit('Filter', array('class'=>'btn btn-success btn-xs'))}}
                         </div>
                    </div>
                  {{ Form::close() }}
           </div>
    </div>

    {{ Form::open(array('url' => 'admission/faculty/admission-test/adm-test-BatchDelete')) }}
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

                                     <td>{{ HTML::linkAction('AdmFacultyController@viewAdmTest',$index_adm_examiner_list->relBatch->relDegree->relDegreeLevel->code.''.$index_adm_examiner_list->relBatch->relDegree->relDegreeGroup->code ,['id'=>$index_adm_examiner_list->id,'batch_id'=>$index_adm_examiner_list->batch_id], ['data-toggle'=>"modal", 'data-target'=>"#modal"]) }}</td>
                                     <td>{{ $index_adm_examiner_list->relBatch->relDegree->relDepartment->title }}</td>
                                     <td>{{ $index_adm_examiner_list->relBatch->relYear->title }}</td>
                                     <td>{{ $index_adm_examiner_list->relBatch->relSemester->title }}</td>
                                     <td>{{ $index_adm_examiner_list->relBatch->relDegree->total_credit }}</td>
                                     <td>{{ $index_adm_examiner_list->status }}</td>
                                     <td>
                                         @if($index_adm_examiner_list->status == 'requested' )
                                                <a class="btn btn-primary btn-xs" data-href="{{ URL::route('admission.faculty.admission-test.change-status-to-accept',['id'=>$index_adm_examiner_list->id]) }}" data-toggle="modal" data-target="#confirm-delete" href="">Accept</a>
                                                <a class="btn btn-success btn-xs" data-href="{{ URL::route('admission.faculty.admission-test.change-status-to-deny',['id'=>$index_adm_examiner_list->id]) }}" data-toggle="modal" data-target="#confirm-delete" href="">Deny</a>
                                         @elseif( $index_adm_examiner_list->status == 'accepted' )
                                                <a href="{{ URL::route('admission.faculty.question-papers.admtest-question-paper', [ 'year_id'=>$index_adm_examiner_list->relBatch->year_id ,'semester_id'=>$index_adm_examiner_list->relBatch->semester_id ,'batch_id'=>$index_adm_examiner_list->batch_id  ]) }}" class="btn btn-info btn-xs" >Questions</a>
                                         @endif
                                     </td>
                                </tr>
                          @endforeach
                      </tbody>
                    </table>
                    {{ $index_adm_examiner->links() }}
    {{ Form::close() }}

{{--modal--}}
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="z-index:1050">
          <div class="modal-content">

          </div>
    </div>
</div>



<!-- Modal :: Delete Confirmation -->
            <div class="modal fade " id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="confirm-delete" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="myModalLabel">Confirmation</h4>
                      </div>
                      <div class="modal-body">
                            <strong>Are you sure ?</strong>
                      </div>
                      <div class="modal-footer">
                            <a href="" class="btn-sm btn-default">Close</a>
                            <a href="#" class="btn btn-Success danger">OK</a>
                      </div>
                </div>
              </div>
            </div>

            <script>
                      $('#confirm-delete').on('show.bs.modal', function(e) {
                         $(this).find('.danger').attr('href', $(e.relatedTarget).data('href'));
                         $('.debug-url').html('Delete URL: <strong>' + $(this).find('.danger').attr('href') + '</strong>');
                     })
            </script>

@stop