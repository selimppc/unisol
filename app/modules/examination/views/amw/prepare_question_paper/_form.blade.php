<fieldset style="padding: 10px; width: 90%;">
            <?php
                $exm_exam_list_id = ExmExamList::lists('title', 'id');
                $course_name = Course::lists('title','id');
            ?>


                <div class="form-group">
                       {{ Form::label('exm_exam_list_id', 'Name of Examination ') }}
                       {{ Form::select('exm_exam_list_id', $exm_exam_list_id, Input::old('exm_exam_list_id') )}}
                </div>
                <div class="form-group">
                       {{ Form::label('title', 'Title') }}
                       {{ Form::text('title', Input::old('title'), array('class' => 'form-control','required'=>'required')) }}
                </div>
                <div class="form-group">
                       {{ Form::label('course_name', 'Course Name') }}
                       {{ Form::select('course_name', $course_name, Input::old('exm_exam_list_id') )}}
                </div>
                <div class="form-group">
                    {{ Form::label('deadline', 'Deadline') }}
                    {{ Form::text('deadline', Input::old('deadline'), array('class' => 'form-control datepicker','required'=>'required')) }}
                </div>
                <div class="form-group">
                     {{ Form::label('total_marks', 'Total Marks') }}
                     {{ Form::text('total_marks', Input::old('total_marks'), array('class' => 'form-control','required'=>'required')) }}
                </div>

                {{--<div class="form-group">--}}
                      {{--{{ Form::label('assign_to', 'Assign To') }}--}}
                      {{--{{ Form::select('assign_to',Input::old('assign_to'), array('class' => 'form-control','required'=>'required'))}}--}}
                {{--</div>--}}

            {{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}

             <a href="{{URL::previous()}}" class="btn btn-default">Close </a>
</fieldset>