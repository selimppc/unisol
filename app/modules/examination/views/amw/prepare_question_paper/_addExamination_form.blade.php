<fieldset style="padding: 10px; width: 90%;">


            <?php
                $year_id = Year::lists('title', 'id');
                $semester_id = Semester::lists('title', 'id');
                $exam_type = AcmMarksDistItem::lists('title','id');
                $course_name = Course::lists('title','id');

            ?>


                <div class="form-group">
                       {{ Form::label('title', 'Title') }}
                       {{ Form::text('title', Input::old('title'), array('class' => 'form-control','required'=>'required')) }}
                </div>

                <div class="form-group">
                        {{ Form::label('exam_type', 'Exam Type') }}
                        {{ Form::select('acm_marks_dist_item_id',$exam_type, Input::old('acm_marks_dist_item_id'), array('class' => 'form-control','required'=>'required')) }}
                </div>

                <div class="form-group">
                        {{ Form::label('year', 'Year') }}
                        {{ Form::select('year',$year_id, Input::old('year'), array('class' => 'form-control','required'=>'required') ) }}
                </div>
                <div class="form-group">
                         {{ Form::label('semester', 'Semester') }}
                         {{ Form::select('semester',$semester_id, Input::old('semester'), array('class' => 'form-control','required'=>'required')) }}
                </div>

                <div class="form-group">
                         {{ Form::label('course_name', 'Course Name') }}
                         {{ Form::select('course_management_id', $course_name, Input::old('semester'), array('class' => 'form-control','required'=>'required')) }}
                </div>


            {{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
            <a href="{{URL::previous()}}" class="btn btn-default">Close </a>
</fieldset>
