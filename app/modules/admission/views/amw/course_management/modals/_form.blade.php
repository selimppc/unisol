
<div class="modal-header">

    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel"> Add Course</h4>
</div>

<div class="modal-body">
  <div style="padding: 20px;">

{{Form::open(array('url'=>'course_manage/store', 'class'=>'form-horizontal','files'=>true))}}

 <div class='form-group'>
        <div>{{ Form::label('degree_id', 'Degree') }}</div>
        <div>{{ Form::select('degree_id',$degree,Input::old('degree_id'),['class'=>'form-control input-sm','required']) }}</div>
 </div>

 <div class='form-group'>
     <div>{{ Form::label('course_type', 'Course Type') }}</div>
     <div>{{ Form::select('course_type_id', $courseType, Input::old('course_type_id'),['class'=>'form-control input-sm','required'] )}}</div>
 </div>

  <div class='form-group'>
       <div>{{ Form::label('course_id', 'Course') }}</div>
       <div>{{ Form::select('course_id',$course,Input::old('course_id'),['class'=>'form-control input-sm','required'] )}}</div>
  </div>

  <div class='form-group'>

      <div>{{ Form::label('year_id', 'Year') }}</div>
      <div>{{ Form::select('year_id', $year, Input::old('year_id') ,['class'=>'form-control input-sm','required'])}}</div>
  </div>

  <div class='form-group'>

      <div>{{ Form::label('semester_id', 'Semester') }}</div>
      <div>{{ Form::select('semester_id',$semester,Input::old('semester_id'),['class'=>'form-control input-sm','required']) }}</div>
  </div>

<div class='form-group'>

  <div>{{ Form::label('user_id', 'Assigned Faculty') }}</div>
  <div>{{ Form::select('user_id',$facultyList,Input::old('user_id'),['class'=>'form-control input-sm','required']) }}</div>
</div>

<div class='form-group'>

  <div>{{ Form::label('evolution_system', 'Evaluation System') }}</div>
  <div>{{ Form::select ('evolution_system',  array('' => 'Select one',
          'automatic' => 'Automatic', 'manual' => 'Manual'), Input::old('evolution_system'),
           array('class' => 'form-control input-sm')) }}</div>
</div>

<div class='form-group'>

  <div>{{ Form::label('major_minor', 'Major/Minor') }}</div>
  <div>{{ Form::select ('major_minor',  array('' => 'Select one',
          'major' => 'Major', 'minor' => 'Minor'), Input::old('major_minor'),
           array('class' => 'form-control input-sm')) }}</div>
</div>


<div class='form-group'>
 {{ Form::label('start_date', 'Start Time') }}
 {{ Form::text('start_date', Input::old('start_date'),['class'=>'form-control date_picker']) }}

 {{ Form::label('end_date', 'End Time') }}
 {{ Form::text('end_date', Input::old('end_date'),['class'=>'form-control date_picker'])  }}

</div>

<p>&nbsp;</p>


<div><a  href="{{URL::previous() }}" class="pull-right btn btn-default">Close</a></div>
{{--<a class="pull-right btn btn-sm btn-info input-large" href="{{ URL::to('amw/degree_manage' )}}">Close</a>--}}

{{ Form::submit('Save ', array('class'=>'pull-right btn btn-primary input-small')) }}


<p>&nbsp;</p>
{{Form::close()}}

<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
</div>

</div>

<p>&nbsp;</p>
{{ HTML::script('assets/js/custom.js')}}