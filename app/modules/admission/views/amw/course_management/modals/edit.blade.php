

<div class="modal-header">

    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel">Edit....</h4>
</div>
<div class="modal-body">
  <div style="padding: 20px;">

        {{Form::open(array('url'=>'course_manage/update/'.$course_model->id, 'class'=>'form-horizontal','files'=>true))}}

        <div class='form-group'>
               <div>{{ Form::label('degree_id', 'Degree') }}</div>
               <div>{{ Form::select('degree_id',$degree,$course_model->degree_id,['class'=>'form-control ']) }}</div>
        </div>

         <div class='form-group'>
              <div>{{ Form::label('course_type', 'Course Type') }}</div>
              <div>{{ Form::select('course_type_id', $courseType,$course_model->course_type_id ,['class'=>'form-control '] )}}</div>
         </div>



         <div class='form-group'>
                <div>{{ Form::label('course_id', 'Course') }}</div>
                <div>{{ Form::select('course_id',$course,$course_model->course_id,['class'=>'form-control '] )}}</div>
         </div>

         <div class='form-group'>

           <div>{{ Form::label('year_id', 'Year') }}</div>
           <div>{{ Form::select('year_id', $year,$course_model->year_id  ,['class'=>'form-control '])}}</div>
         </div>

         <div class='form-group'>

           <div>{{ Form::label('semester_id', 'Semester') }}</div>
           <div>{{ Form::select('semester_id',$semester,$course_model->semester_id,['class'=>'form-control ']) }}</div>
         </div>


         <div class='form-group'>

           <div>{{ Form::label('evolution_system', 'Evaluation System') }}</div>
           <div>{{ Form::select ('evolution_system',  array('' => 'Select one',
                   'automatic' => 'Automatic', 'manual' => 'Manual'), $course_model->evolution_system,
                    array('class' => 'form-control')) }}</div>
         </div>


         <div class='form-group'>

           <div>{{ Form::label('major_minor', 'Major /Minor') }}</div>
           <div>{{ Form::select ('major_minor',  array('' => 'Select one',
                   'major' => 'Major', 'minor' => 'Minor'),  $course_model->major_minor,
                    array('class' => 'form-control')) }}</div>
         </div>

         <div class='form-group'>
         <div >{{ Form::label('start_date', 'Start date') }}</div >
         <div >{{ Form::text('start_date',$course_model->start_date ,['class'=>'form-control ']) }}</div>
         </div>

         <div class='form-group'>
         <div >{{ Form::label('end_date', 'End date') }}</div >
         <div >{{ Form::text('end_date',$course_model->end_date ,['class'=>'form-control ']) }}</div>
         </div>

        <p>&nbsp;</p>

         {{ Form::submit('Save ', array('class'=>'btn btn-primary')) }}
          <a href="{{URL::to('course_manage/amw') }} " class="btn btn-default" span class="glyphicon-refresh">Close</a>

        {{Form::close()}}
  </div>
</div>
{{--<div class="modal-footer">--}}

 {{----}}

{{--</div>--}}


