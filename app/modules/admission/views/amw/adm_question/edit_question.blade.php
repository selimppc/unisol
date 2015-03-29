<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel"> Edit Admission Test Question</h4>
</div>

<div class="modal-body">
      <div style="padding: 20px;">
          {{Form::open(array('route'=> ['admission.amw.admission-test-question.update-admtest-question-paper',$edit_admtest_question->id], 'class'=>'form-horizontal','files'=>true))}}

               <div class='form-group'>
                     <strong> Batch# </strong> {{ Batch::findOrFail($batch_id)->batch_number }}
               </div>

               <div class='form-group'>
                     <strong> Degree Name: </strong>
                            {{
                                Degree::findOrFail($degree_id)->relDegreeProgram->code.'
                                '.Degree::findOrFail($degree_id)->relDegreeGroup->code.' in
                                '.$degree_data->relDepartment->title.',
                                '.Semester::findOrFail($semester_id)->title.',
                                '.Year::findOrFail($year_id)->title
                            }}
               </div>

                <div class='form-group'>
                    {{ Form::label('batch_admtest_subject_id', 'Subject') }}
                    {{ Form::Select('batch_admtest_subject_id',$batch_admtest_subject , $edit_admtest_question->batch_admtest_subject_id,['class'=>'form-control input-sm','required'])}}
                </div>

                <div class='form-group'>
                    {{ Form::label('title', 'Title') }}
                    {{ Form::text('title',$edit_admtest_question->title,['class'=>'form-control input-sm','required'])}}
                </div>

                <div class='form-group'>
                    {{ Form::label('deadline', 'Deadline') }}
                    {{ Form::text('deadline', $edit_admtest_question->deadline, ['class'=>'form-control date_picker','required'=>'required']) }}
                </div>

                <div class='form-group'>
                    {{ Form::label('total_marks', 'Total Marks') }}
                    {{ Form::text('total_marks' ,$edit_admtest_question->total_marks,['class'=>'form-control input-sm','required'])}}
                </div>

                <div class='form-group'>
                    {{ Form::label('examiner_facutly_user_id', 'Assign To') }}
                    {{ Form::Select('examiner_facutly_user_id',User::AmwList() , $edit_admtest_question->examiner_facutly_user_id,['class'=>'form-control input-sm','required'])}}
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