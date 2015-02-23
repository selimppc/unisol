
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel"> Add Course</h4>
</div>

<div class="modal-body" style="padding: 50px;">

    {{Form::open(array('url'=>'course_manage/store', 'class'=>'form-horizontal','files'=>true))}}

     <div class='form-group'>
            {{ Form::label('degree_id', 'Degree') }}
            {{ Form::select('degree_id',$degree,Input::old('degree_id'),['class'=>'form-control input-sm','required']) }}
     </div>

     {{--<div class='form-group'>--}}
           {{--{{ Form::label('degree_program_id', 'Degree Program') }}--}}
           {{--{{ Form::select('degree_program_id',$degreeProgram,Input::old('degree_program_id'),['class'=>'form-control input-sm']) }}--}}
     {{--</div>--}}


     <div class='form-group'>
         {{ Form::label('course_type', 'Course Type') }}
         {{ Form::select('course_type_id', $courseType, Input::old('course_type_id'),['class'=>'form-control input-sm'] )}}
     </div>

      <div class='form-group'>
           {{ Form::label('course_id', 'Course') }}
           {{ Form::select('course_id',$course,Input::old('course_id'),['class'=>'form-control input-sm'] )}}
      </div>

      <div class='form-group'>

          {{ Form::label('year_id', 'Year') }}
          {{ Form::select('year_id', $year, Input::old('year_id') ,['class'=>'form-control input-sm'])}}
      </div>

      <div class='form-group'>

          {{ Form::label('semester_id', 'Semester') }}
          {{ Form::select('semester_id',$semester,Input::old('semester_id'),['class'=>'form-control input-sm']) }}
      </div>

        <div class='form-group'>

          {{ Form::label('user_id', 'Assigned Faculty') }}
          {{ Form::select('user_id',$facultyList,Input::old('user_id'),['class'=>'form-control input-sm']) }}
        </div>

        <div class='form-group'>

          {{ Form::label('evolution_system', 'Evaluation System') }}
          {{ Form::select ('evolution_system',  array('' => 'Select one',
                  'automatic' => 'Automatic', 'manual' => 'Manual'), Input::old('evolution_system'),
                   array('class' => 'form-control input-sm')) }}
        </div>

        <div class='form-group'>

          {{ Form::label('major_minor', 'Major/Minor') }}
          {{ Form::select ('major_minor',  array('' => 'Select one',
                  'major' => 'Major', 'minor' => 'Minor'), Input::old('major_minor'),
                   array('class' => 'form-control input-sm')) }}
        </div>


        <div class='form-group'>
          {{ Form::label('start_date', 'Start date') }}
            {{ Form::text('start_date', Input::old('start_date'),['class'=>'form-control input-sm datepicker','id'=>'datetimepicker2']) }}
        </div>

        <div class='form-group'>
           {{ Form::label('end_date', 'End date') }}
           {{ Form::text('end_date', Input::old('end_date'),['class'=>'form-control input-sm datepicker','id'=>'datetimepicker2'])  }}
        </div>

        {{ Form::submit('Save ', array('class'=>'pull-right btn btn-primary')) }}

        {{Form::close()}}

</div>

<div class="modal-footer">
  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
  <button type="button" class="btn btn-primary">Save changes</button>
</div>



<script>
  $(function() {
    $( "#datepicker" ).datepicker();
     $( "#datepicker1" ).datepicker();
  });
</script>

