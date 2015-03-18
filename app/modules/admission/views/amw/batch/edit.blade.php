<div class="modal-header">

    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel"> Edit Course</h4>
</div>

<div class="modal-body">
      <div style="padding: 20px;">

          {{Form::open(array('route'=> ['batch.amw.update',$batch_edit->id], 'class'=>'form-horizontal','files'=>true))}}

                <div class='form-group'>
                       {{ Form::label('title', 'Course Name') }}
                       {{ Form::text('title',$batch_edit->title ,['class'=>'form-control input-sm','required'])}}
                </div>

                <div class='form-group'>
                       {{ Form::label('course_code', 'Course Code') }}
                       {{ Form::text('course_code', $batch_edit->course_code,['class'=>'form-control input-sm'])}}
                </div>

                <div class='form-group'>
                       {{ Form::label('subject_id', 'Subject Name') }}
                       {{ Form::Select('subject_id',$subject_name ,$batch_edit->subject_id,['class'=>'form-control input-sm'])}}
                </div>

                <div class='form-group'>
                    {{ Form::label('description', 'Description') }}
                    {{ Form::text('description' ,$batch_edit->description,['class'=>'form-control input-sm','required'])}}
                </div>

                <div class='form-group'>
                    {{ Form::label('evaluation_total_marks', 'Evaluation Total Marks') }}
                    {{ Form::text('evaluation_total_marks' ,$batch_edit->evaluation_total_marks,['class'=>'form-control input-sm','required'])}}
                </div>

                <div class='form-group'>
                    {{ Form::label('credit', 'Credit') }}
                    {{ Form::text('credit' ,$batch_edit->credit,['class'=>'form-control input-sm','required'])}}
                </div>

                <div class='form-group'>
                    {{ Form::label('hours_per_credit', 'Hours Per Credit') }}
                    {{ Form::text('hours_per_credit' ,$batch_edit->hours_per_credit,['class'=>'form-control input-sm','required'])}}
                </div>

                <div class='form-group'>
                    {{ Form::label('cost_per_credit', 'Cost Per Credit') }}
                    {{ Form::text('cost_per_credit' ,$batch_edit->cost_per_credit,['class'=>'form-control input-sm','required'])}}
                </div>

                <div class='form-group'>
                    {{ Form::label('course_type_id', 'Course Type') }}
                    {{ Form::select('course_type_id',$batch_edit,$course->course_type_id,['class'=>'form-control input-sm'])}}
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