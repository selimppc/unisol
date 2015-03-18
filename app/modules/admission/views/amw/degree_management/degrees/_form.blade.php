<div class="modal-header">

    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel"> Add Degree</h4>
</div>

<div class="modal-body">
      <div style="padding: 20px;">

          {{Form::open(array('url'=>'admission/amw/degree/store', 'class'=>'form-horizontal','files'=>true))}}

          <div class='form-group'>

              <div>{{ Form::label('title', 'Title') }}</div>
              <div>{{ Form::text('title',Input::old('title') ,['class'=>'form-control input-sm','required'])}}</div>
          </div>

          <div class='form-group'>
                <div>{{ Form::label('description', 'Description') }}</div>
                <div>{{ Form::textarea('description',Input::old('description') ,['class'=>'form-control input-sm'])}}</div>
          </div>

          <div class='form-group'>
                  <div>{{ Form::label('department_id', 'Department') }}</div>
                  <div>{{ Form::select('department_id',$department,Input::old('department_id'),['class'=>'form-control input-sm','required']) }}</div>
          </div>
          <div class='form-group'>
                <div>{{ Form::label('degree_program_id', 'Degree Program') }}</div>
                <div>{{ Form::select('degree_program_id',$degree_program,Input::old('degree_program_id'),['class'=>'form-control input-sm','required']) }}</div>
          </div>
          <div class='form-group'>
              <div>{{ Form::label('degree_group_id', 'Degree Group') }}</div>
              <div>{{ Form::select('degree_group_id',$degree_group,Input::old('degree_group_id'),['class'=>'form-control input-sm','required']) }}</div>
          </div>

          <div class='form-group'>

                <div>{{ Form::label('total_credit', 'Total Credit') }}</div>
                <div>{{ Form::text('total_credit',Input::old('total_credit') ,['class'=>'form-control input-sm','required'])}}</div>
          </div>

          <div class='form-group'>

                <div>{{ Form::label('duration', 'Duration') }}</div>
                <div>{{ Form::text('duration',Input::old('duration') ,['class'=>'form-control input-sm','required'])}}</div>
          </div>

          <div class='form-group'>

                <div>{{ Form::label('policy_retake', 'Policy Retake') }}</div>
                <div>{{ Form::select ('policy_retake',  array('' => 'Select one',
                    'less-grade' => 'Less Grade', 'no-less' => 'No Less','best-one'=>'Best One',
                    'latest-one'=>'latest One'), Input::old('policy_retake'),
                     array('class' => 'form-control input-sm')) }}</div>
          </div>

          <div class='form-group'>

                <div>{{ Form::label('policy_course_taking', 'Course Taking Policy') }}</div>
                <div>{{ Form::select ('policy_course_taking',  array('' => 'Select one',
                      'strict' => 'Strict',
                      'relaxed' => 'Relaxed'),
                      Input::old('policy_course_taking'),
                      array('class' => 'form-control input-sm')) }}
                </div>
          </div>

          <div class='form-group'>

                <div>{{ Form::label('credit_min_per_semester', 'Min Credit Per Semester') }}</div>
                <div>{{ Form::text('credit_min_per_semester',Input::old('credit_min_per_semester') ,['class'=>'form-control input-sm','required'])}}</div>
          </div>

          <div class='form-group'>

              <div>{{ Form::label('credit_max_per_semester', 'Max Credit Per Semester') }}</div>
              <div>{{ Form::text('credit_max_per_semester',Input::old('credit_max_per_semester') ,['class'=>'form-control input-sm','required'])}}</div>
          </div>

          <div class='form-group'>

                <div>{{ Form::label('status	', 'Status') }}</div>
                <div>{{ Form::text('status	',Input::old('status	') ,['class'=>'form-control input-sm','required'])}}</div>
          </div>
          <p>&nbsp;</p>

          <div>

          {{ Form::submit('Save', array('class'=>'pull-right btn btn-primary')) }}
          <a  href="" class="pull-right btn btn-default" style="margin-right: 5px">Close</a>


          </div>
          <p>&nbsp;</p>
          {{Form::close()}}
      </div>
</div>
