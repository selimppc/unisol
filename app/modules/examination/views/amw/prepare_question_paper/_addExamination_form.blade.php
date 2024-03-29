<fieldset style="padding: 10px; width: 90%;">
            <?php
                $year_id = Year::lists('title', 'id');
                $semester_id = Semester::lists('title', 'id');
                $exam_type = AcmMarksDistItem::where('is_exam','=',1)->lists('title','id');
                $course_list = ExmExamList::CourseList();
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
                        {{ Form::label('year_id', 'Year') }}
                        {{ Form::select('year_id',$year_id, Input::old('year_id'), array('class' => 'form-control','required'=>'required') ) }}
                </div>

                <div class="form-group">
                         {{ Form::label('semester_id', 'Semester') }}
                         {{ Form::select('semester_id',$semester_id, Input::old('semester_id'), array('class' => 'form-control','required'=>'required')) }}
                </div>

                <div class="form-group">
                         {{ Form::label('course_name', 'Course Name') }}
                         {{ Form::select('course_management_id', $course_list, Input::old('semester'), array('class' => 'form-control','required'=>'required')) }}
                </div>
            {{ Form::submit('Submit', array('class' => 'btn btn-primary btn-xs')) }}
             <a href="{{URL::to('examination/amw/examination')}}" class="btn btn-default btn-xs">Close </a>
                {{--<a class="btn btn-info close">Close </a>--}}
</fieldset>
