<div class="modal-header">

    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel">Edit Degree </h4>
</div>

<div class="modal-body">
      <div style="padding: 0px 20px 20px 20px;">

          {{Form::open(array('route'=> ['admission.amw.degree.update',$model->id], 'class'=>'form-horizontal','files'=>true))}}

          <div class='form-group'>
                <div>{{ Form::label('description', 'Description') }}</div>
                <div>{{ Form::textarea('description',$model->description  ,['onkeyup'=>"javascript:this.value=this.value.replace(/[<,>]/g,'');",'class'=>'form-control input-sm', 'style'=>'height: 100px;'])}}</div>
          </div>

          <div class='form-group'>
              <div class="col-lg-6" style="padding-left: 0;">
                    <div>{{ Form::label('department_id', 'Department') }}<span class="text-danger">*</span></div>
                    <div>{{ Form::select('department_id',$department, $model->department_id,['class'=>'form-control input-sm','required']) }}</div>
              </div>
              <div class="col-lg-6">
                      <div>{{ Form::label('degree_program_id', 'Degree Program') }}<span class="text-danger">*</span></div>
                      <div>{{ Form::select('degree_program_id',$degree_program,$model->degree_program_id,['class'=>'form-control input-sm','required']) }}</div>
              </div>
          </div>
          <div class='form-group'>
              <div class="col-lg-6" style="padding-left: 0;">
                    <div>{{ Form::label('degree_level_id', 'Degree Level') }}<span class="text-danger">*</span></div>
                    <div>{{ Form::select('degree_level_id',$degree_level,$model->degree_level_id,['class'=>'form-control input-sm','required']) }}</div>
              </div>


              <div class="col-lg-6" style="padding-right: 0;">
                    <div>{{ Form::label('degree_group_id', 'Degree Group') }}<span class="text-danger">*</span></div>
                    <div>{{ Form::select('degree_group_id',$degree_group, $model->degree_group_id,['class'=>'form-control input-sm','required']) }}</div>
              </div>
          </div>

          <div class='form-group'>
                <div>{{ Form::label('total_credit', 'Total Credit') }}</div>
                <div>{{ Form::text('total_credit',$model->total_credit ,['class'=>'form-control input-sm','required'])}}</div>
          </div>

           <div class='form-group'>
                  <div>{{ Form::label('duration', 'Duration(in Year)') }}<span class="text-danger">*</span></div>
                  <div>{{ Form::select ('duration', ['' => 'Duration in Year', '1' => '1 Year', '2' => '2 Year','3'=>'3 Year','4'=>'4 Year','5'=>'5 Year','6'=>'6 Year'], $model->duration, ['class' => 'form-control input-sm','required']) }}
                  </div>
            </div>

           <div class='form-group'>
                  <div>{{ Form::label('credit_min_per_semester', 'Min Credit Per Semester') }}</div>
                  <div>{{ Form::text('credit_min_per_semester',$model->credit_min_per_semester ,['class'=>'form-control input-sm','required'])}}</div>
            </div>

            <div class='form-group'>
                <div>{{ Form::label('credit_max_per_semester', 'Max Credit Per Semester') }}</div>
                <div>{{ Form::text('credit_max_per_semester',$model->credit_max_per_semester ,['class'=>'form-control input-sm','required'])}}</div>
            </div>


            <div class='form-group'>
             <div class="col-lg-6" style="padding-left: 0;">
                <div>{{ Form::label('policy_retake', 'Policy Retake') }}<span class="text-danger">*</span></div>
                <div>{{ Form::select ('policy_retake',  array('' => 'Select one',
                    'less-grade' => 'Less Grade', 'no-less' => 'No Less','best-one'=>'Best One',
                    'latest-one'=>'latest One'), $model->policy_retake,
                     array('class' => 'form-control input-sm')) }}</div>
             </div>
            <div class="col-lg-6" style="padding-right: 0;">
                <div>{{ Form::label('policy_course_taking', 'Course Taking Policy') }}<span class="text-danger">*</span></div>
                <div>{{ Form::select ('policy_course_taking',  array('' => 'Select one',
                      'strict' => 'Strict',
                      'relaxed' => 'Relaxed'),
                      $model->policy_course_taking,
                      array('class' => 'form-control input-sm')) }}
                </div>
             </div>
          </div>

          <div class='form-group'>
                <div>{{ Form::label('status	', 'Status') }}</div>
                <div>{{ Form::select('status',array(
                      'open' => 'Open',
                      'close' => 'Close'),$model->status ,['class'=>'form-control input-sm'])}}</div>
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
