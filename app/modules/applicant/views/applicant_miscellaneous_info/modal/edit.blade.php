

<div class="modal-header">

    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel">Edit....</h4>
</div>

<div class="modal-body">
  <div style="padding: 20px;">

        {{Form::open(array('url'=>'applicant/miscellaneous_info/update/'.$model->id, 'class'=>'form-horizontal','files'=>true))}}

        <div class='form-group'>
             {{ Form::label('ever_admit_this_university', 'Ever admit this university') }}
             <div><label class="small">{{ Form::radio('ever_admit_this_university', 1, ($model->ever_admit_this_university == 1),['class'=>'radio']) }} Yes </label></div>
             <div><label class="small">{{ Form::radio('ever_admit_this_university', 0, ($model->ever_admit_this_university == 0),['class'=>'radio']) }} No </label></div>

        </div>

         <div class='form-group'>
             {{ Form::label('ever_dismiss', 'Ever dismiss') }}
              <div><label class="small">{{ Form::radio('ever_dismiss', 1, ($model->ever_dismiss == 1),['class'=>'radio']) }} Yes </label></div>
              <div><label class="small">{{ Form::radio('ever_dismiss', 0, ($model->ever_dismiss == 0),['class'=>'radio'] ) }} No </label></div>
         </div>

          <div class='form-group'>
              {{ Form::label('academic_honors_received', 'Academic honors received') }}
              <div><label class="small">{{ Form::radio('academic_honors_received', 1, ($model->academic_honors_received == 1),['class'=>'radio']) }} Yes </label></div>
              <div><label class="small">{{ Form::radio('academic_honors_received', 0, ($model->academic_honors_received == 0),['class'=>'radio']) }} No </label></div>
          </div>

          <div class='form-group'>
            {{ Form::label('ever_admit_other_university', 'Ever admit other university') }}
            <div><label class="small">{{ Form::radio('ever_admit_other_university', 1, ($model->ever_admit_other_university == 1),['class'=>'radio']) }} Yes </label></div>
            <div><label class="small">{{ Form::radio('ever_admit_other_university', 0, ($model->ever_admit_other_university == 0),['class'=>'radio']) }} No </label></div>
          </div>

           <div class='form-group'>
             {{ Form::label('admission_test_center', 'Admission test Center') }}
             {{ Form::select('admission_test_center',
                 array('' => 'Select one','Dhaka' => 'Dhaka', 'Chittagong' => 'Chittagong', 'Comilla'=>'Comilla','Khulna'=>'Khulna','Syllhet'=>'Syllhet'),
                 $model->admission_test_center,
                 array('class' => 'form-control', 'required'=> true)) }}

           </div>

        <p>&nbsp;</p>

         {{ Form::submit('Save ', array('class'=>'btn btn-primary')) }}
          <a href="{{URL::to('applicant/miscellaneous_info/index') }} " class="btn btn-default" span class="glyphicon-refresh">Close</a>

        {{Form::close()}}
  </div>
</div>
{{--<div class="modal-footer">--}}

 {{----}}

{{--</div>--}}


