
<div class="modal-header">

    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel"> Add Batch Education Constraint</h4>
</div>

<div class="modal-body">
      <div style="padding: 20px;">

          {{Form::open(array('url'=>'admission/amw/batch-edu-const/store', 'class'=>'form-horizontal','files'=>true))}}

          <div class='form-group'>
                  <div>{{ Form::label('batch_id', 'Batch') }}</div>
                  <div>{{ Form::select('batch_id',$batch,Input::old('batch_id'),['class'=>'form-control input-sm','required']) }}</div>
          </div>
          <div class='form-group'>

              <div>{{ Form::label('level_of_education', 'Level Of Education') }}</div>
              <div>{{ Form::select ('level_of_education',  array('' => 'Select one',
                    'psc' => 'PSC',
                    'jsc' => 'JSC',
                    'ssc' => 'SSC',
                    'hsc' => 'HSC',
                    'grad' => 'Grad',
                    'under_grad' => 'Under Grad',
                    'bachelor' => 'Bachelor',
                     'diploma' => 'Diploma',
                     'post_grad' => 'Post Grad',
                     'o_level' => ' O-level',
                     'a_level' => ' A-level'),
                    Input::old('level_of_education'),
                    array('class' => 'form-control input-sm')) }}
              </div>
          </div>

           <div class='form-group'>
                <div>{{ Form::label('min_gpa', 'Min Gpa') }}</div>
                <div>{{ Form::text('min_gpa',Input::old('min_gpa'),['class'=>'form-control input-sm','required']) }}</div>
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
