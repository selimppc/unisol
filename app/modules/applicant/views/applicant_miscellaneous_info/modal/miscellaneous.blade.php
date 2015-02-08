
<!-- Modal : add goal -->
<div class="modal-header">

    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel">Add</h4>
</div>

<div class="modal-body">
  <div style="padding: 20px;">
        <h4> </h4>

        {{Form::open(array('url'=>'applicant/miscInfoStore', 'class'=>'form-horizontal','files'=>true))}}

        <div class="form-group">
         {{ Form::label('applicant_id','Name of Applicant' ) }}
         {{ Form::select('applicant_id', Applicant::orderBy('username')->lists('username', 'id')+[''=>'Select Option'] ,'', ['class'=>'form-control']) }}
         </div>

         <div class='form-group'>
                      {{ Form::label('ever_admit_this_university', 'Ever admit this university') }}
                      {{ Form::radio('ever_admit_this_university','1') }} Yes
                      {{ Form::radio('ever_admit_this_university','0') }} No
                 </div>

         <div class='form-group'>
             {{ Form::label('ever_dismiss', 'Ever dismiss') }}
             {{ Form::radio('ever_dismiss','1') }} Yes
             {{ Form::radio('ever_dismiss','0') }} No
         </div>

          <div class='form-group'>
              {{ Form::label('academic_honors_received', 'Academic honors received') }}
              {{ Form::radio('academic_honors_received','1') }} Yes
              {{ Form::radio('academic_honors_received','0') }} No
          </div>

          <div class='form-group'>
            {{ Form::label('ever_admit_other_university', 'Ever admit other university') }}
            {{ Form::radio('ever_admit_other_university','1') }} Yes
            {{ Form::radio('ever_admit_other_university','0') }} No
          </div>

           <div class='form-group'>
              {{ Form::label('admission_test_center', 'Admission test center') }}
              {{ Form::radio('admission_test_center','1') }} Yes
              {{ Form::radio('admission_test_center','0') }} No
           </div>

        <p>&nbsp;</p>
        {{--{{ Form::hidden('id', $supporting_docs->id, ['class'=>'form-control sdoc_id'])}}--}}
        {{--{{ Form::hidden('doc_type', $doc_type, ['class'=>'form-control sdoc_id'])}}--}}
        {{ Form::submit('Save ', array('class'=>'btn btn-primary')) }}
        <a href="" class="btn btn-default" span class="glyphicon-refresh">Close</a>
        {{Form::close()}}
  </div>
</div>
<div class="modal-footer">

</div>


