<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel"> Edit Admission Test Question</h4>
</div>
{{ HTML::script('assets/js/custom.js')}}
<div class="modal-body">
      <div style="padding: 20px;">
          {{Form::open(array('route'=> ['admission.amw.update-admtest-question-paper',$question->id], 'class'=>'form-horizontal','files'=>true))}}

               <div class='form-group'>
                    <strong> Batch# </strong> {{ isset($batch->batch_number) ? $batch->batch_number : '' }} </br>
                    <strong> Degree Name: </strong> {{isset( $batch->relVDegree->title) ?$batch->relVDegree->title : ''}} at {{isset( $batch->relYear->title) ? $batch->relYear->title :'' }}
              </div>

                <div class='form-group'>
                    {{ Form::label('batch_admtest_subject_id', 'Admission Test Subject') }}
                    {{ Form::Select('batch_admtest_subject_id', $batch_admtest_subject , $question->batch_admtest_subject_id,['class'=>'form-control input-sm','required'])}}
                </div>

                <div class='form-group'>
                    {{ Form::label('title', 'Title') }}
                    {{ Form::text('title', $question->title,['class'=>'form-control input-sm','required'])}}
                </div>

                <div class='form-group'>
                    {{ Form::label('deadline', 'Deadline') }}
                    {{ Form::text('deadline', $question->deadline, ['class'=>'form-control date_picker','required'=>'required']) }}
                </div>

                <div class='form-group'>
                    {{ Form::label('total_marks', 'Total Marks') }}
                    {{ Form::text('total_marks', $question->total_marks,['class'=>'form-control input-sm','required'=>'required'])}}
                </div>

                <div class='form-group'>
                    {{ Form::label('s_faculty_user_id', 'Question Setter') }}
                    {{ Form::Select('s_faculty_user_id', $examiner_faculty_lists , $question->s_faculty_user_id,['class'=>'form-control input-sm','required'])}}
                </div>

                  <div class='form-group'>
                      {{ Form::label('e_faculty_user_id', 'Question Evaluator') }}
                      {{ Form::Select('e_faculty_user_id', $examiner_faculty_lists , $question->e_faculty_user_id,['class'=>'form-control input-sm','required'])}}
                  </div>
                  <div class='form-group'>
                      {{ Form::label('status', 'Question Status') }}
                      {{ Form::select('status', ['open'=> 'Open', 'selected'=>'Selected','close' => 'Close'], $question->staus,['class'=>'form-control input-sm','required']) }}
                  </div>


          <p>&nbsp;</p>

          <div>

          {{ Form::submit('Update', array('class'=>'pull-right btn btn-info')) }}
          <a href="" class="pull-right btn btn-default" style="margin-right: 5px">Close</a>

          </div>
          <p>&nbsp;</p>
          {{Form::close()}}
      </div>
</div>
{{ HTML::script('assets/js/custom.js')}}