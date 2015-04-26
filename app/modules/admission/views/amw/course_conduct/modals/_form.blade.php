
<div class="modal-header">

    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel"> Add Course</h4>
</div>

<div class="modal-body">
  <div style="padding: 20px;">

  {{Form::open(array('url'=>'course_manage/store', 'class'=>'form-horizontal','files'=>true))}}

  <div class='form-group'>

      <div>{{ Form::label('title', 'Course Title') }}</div>
      <div>{{ Form::text('title',Input::old('title') ,['class'=>'form-control input-sm','required'])}}</div>
  </div>

  <div class='form-group'>

        <div>{{ Form::label('course_code', 'Course Code') }}</div>
        <div>{{ Form::text('course_code',Input::old('course_code') ,['class'=>'form-control input-sm','required'])}}</div>
  </div>

  <div class='form-group'>
          <div>{{ Form::label('subject_id', 'Subject') }}</div>
          <div>{{ Form::select('subject_id',$subject,Input::old('subject_id'),['class'=>'form-control input-sm','required']) }}</div>
  </div>

  <div class='form-group'>
       <div>{{ Form::label('course_type', 'Course Type') }}</div>
       <div>{{ Form::select('course_type_id', $courseType, Input::old('course_type_id'),['class'=>'form-control input-sm','required'] )}}</div>
  </div>

  <div class='form-group'>
        <div>{{ Form::label('description', 'Description') }}</div>
        <div>{{ Form::text('description',Input::old('description') ,['onkeyup'=>"javascript:this.value=this.value.replace(/[<,>]/g,'');",'class'=>'form-control input-sm','required'])}}</div>
  </div>

  <div class='form-group'>
        <div>{{ Form::label('evaluation_total_marks', 'Evaluation Total Marks') }}</div>
        <div>{{ Form::text('evaluation_total_marks',Input::old('evaluation_total_marks') ,['class'=>'form-control input-sm','required'])}}</div>
  </div>

  <div class='form-group'>
        <div>{{ Form::label('credit', 'Credit') }}</div>
        <div>{{ Form::text('credit',Input::old('credit') ,['class'=>'form-control input-sm','required'])}}</div>
  </div>

  <div class='form-group'>
       <div>{{ Form::label('hours_per_credit', 'Hours Per Credit') }}</div>
       <div>{{ Form::text('hours_per_credit',Input::old('hours_per_credit') ,['class'=>'form-control input-sm','required'])}}</div>
  </div>

  <div class='form-group'>
      <div>{{ Form::label('cost_per_credit', 'Cost Per Credit') }}</div>
      <div>{{ Form::text('cost_per_credit',Input::old('cost_per_credit') ,['class'=>'form-control input-sm','required'])}}</div>
  </div>


  <div class='form-group'>

      <div>{{ Form::label('evolution_system', 'Evaluation System') }}</div>
      <div>{{ Form::select ('evolution_system',  array('' => 'Select one',
          'automatic' => 'Automatic', 'manual' => 'Manual'), Input::old('evolution_system'),
           array('class' => 'form-control input-sm')) }}</div>
  </div>

<p>&nbsp;</p>

<a  href="{{URL::previous() }}" class="pull-right btn btn-default">Close</a>

{{ Form::submit('Save ', array('class'=>'pull-right btn btn-primary input-small')) }}

<p>&nbsp;</p>

{{Form::close()}}

<p>&nbsp;</p>

</div>
</div>

{{ HTML::script('assets/js/custom.js')}}