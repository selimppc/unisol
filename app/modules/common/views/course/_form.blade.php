<div class="modal-header">

    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel"> Add Course</h4>
</div>


<?php
        $subject_id_result = Subject::lists('title', 'id');
        $course_type_id_result = CourseType::lists('title', 'id');

?>
<div class="modal-body">
     <div style="padding: 20px;">
        {{Form::open(array('url'=>'common/course/store', 'class'=>'form-horizontal','files'=>true))}}

                <div class='form-group'>
                           {{ Form::label('title', 'Course Name') }}
                           {{ Form::text('title', Input::old('title'),['class'=>'form-control']) }}
                </div>

                <div class='form-group'>
                           {{ Form::label('course_code', 'Course Code') }}
                           {{ Form::text('course_code', Input::old('course_code'),['class'=>'form-control']) }}
                </div>

                <div class='form-group'>
                           {{ Form::label('subject_id', 'Subject Name') }}
                           {{ Form::select('subject_id',$subject_id_result) }}
                </div>

                <div class='form-group'>
                           {{ Form::label('description', 'Description') }}
                           {{ Form::text('description', Input::old('description'),['class'=>'form-control']) }}
                </div>

                <div class='form-group'>
                            {{ Form::label('evaluation_total_marks', 'Evaluation of Total Marks') }}
                            {{ Form::text('evaluation_total_marks', Input::old('evaluation_total_marks'),['class'=>'form-control']) }}
                </div>

                <div class='form-group'>
                            {{ Form::label('credit', 'Credit') }}
                            {{ Form::text('credit', Input::old('credit'),['class'=>'form-control']) }}
                </div>

                <div class='form-group'>
                            {{ Form::label('hours_per_credit', 'Hours Per Credit') }}
                            {{ Form::text('hours_per_credit', Input::old('hours_per_credit'),['class'=>'form-control']) }}
                </div>

                <div class='form-group'>
                            {{ Form::label('cost_per_credit', 'Cost Per Credit') }}
                            {{ Form::text('cost_per_credit', Input::old('cost_per_credit'),['class'=>'form-control']) }}
                </div>

                <div class='form-group'>
                            {{ Form::label('course_type_id', 'Course Type') }}
                            {{ Form::select('course_type_id',$course_type_id_result)}}
                </div>

                <div class='form-group'>
                            {{ Form::label('evaluation_system', 'Evaluation System') }}
                            {{ Form::text('evaluation_system', Input::old('evaluation_system'),['class'=>'form-control']) }}
                </div>


                <p>&nbsp;</p>


              {{ Form::submit('Save', array('class'=>'pull-left btn btn-primary')) }}
              <a  href="{{URL::previous() }}" class="pull-right btn btn-default">Close</a>

              <p>&nbsp;</p>
        {{Form::close()}}
     </div>
</div>