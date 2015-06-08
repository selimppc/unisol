<div class="modal-header">

    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel">Add </h4>
</div>

 <div class="modal-body">
    <div style="padding: 20px;">

        <div class="form-group">
          {{ Form::label('cfo_category_id', 'Cfo Category') }}<span class="text-danger">*</span>
          {{ Form::select('cfo_category_id', $cfo_category_id, Input::old('cfo_category_id'), array('class' => 'form-control','required'=>'required')) }}
        </div>

        <div class='form-group'>
           {{ Form::label('name', 'Name') }}
           {{ Form::text('name', Input::old('name'),[ 'class'=>'form-control', 'required']) }}
        </div>

        <div class='form-group'>
           {{ Form::label('email', 'Email') }}
           {{ Form::text('email', Input::old('email'),['class'=>'form-control',  'required']) }}
        </div>

        <div class='form-group'>
           {{ Form::label('purpose', 'Purpose') }}
           {{ Form::textarea('purpose', Input::old('purpose'),['onkeyup'=>"javascript:this.value=this.value.replace(/[<,>]/g,'');", 'size' => '30x5', 'class'=>'form-control']) }}
        </div>

        <div class="form-group">
          {{ Form::label('section_dept_id', 'Department') }}<span class="text-danger">*</span>
          {{ Form::select('section_dept_id', $dept_id, Input::old('section_dept_id'), array('class' => 'form-control','required'=>'required')) }}
        </div>

        <div class="form-group">
          {{ Form::label('specific_user_id', 'Assigned To') }}<span class="text-danger">*</span>
          {{ Form::select('specific_user_id', $user_id, Input::old('specific_user_id'), array('class' => 'form-control','required'=>'required')) }}
        </div>

        <div class="form-group">
          {{ Form::label('status', 'Status') }}<span class="text-danger">*</span>
          {{ Form::select('status', array('' => 'Select one',
           'open' => 'Open', 'waiting' => 'Waiting', 'serving'=>'Serving','closed'=>'Closed','re-open'=>'Re-Open'),
           Input::old('board_university'),
           array('class' => 'form-control')) }}
        </div>

        {{ Form::submit('Save', array('class'=>'pull-right btn btn-info')) }}
        <a href="" class="pull-right btn btn-default" style="margin-right: 5px">Close</a>

        <p>&nbsp;</p>
    </div>
 </div>