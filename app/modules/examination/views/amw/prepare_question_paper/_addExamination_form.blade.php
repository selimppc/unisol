<fieldset style="padding: 10px; width: 90%;">

            <?php

                $year_id = Year::lists('title', 'id');
                $semester_id = Semester::lists('title', 'id');


            ?>



                <div class="form-group">
                       {{ Form::label('title', 'Title') }}
                       {{ Form::text('title', Input::old('title'), array('class' => 'form-control','required'=>'required')) }}
                </div>

                <div class="form-group">
                    {{ Form::label('year', 'year') }}
                    {{ Form::select('year',$year_id, Input::old('year'), array('class' => 'form-control','required'=>'required') ) }}
                </div>
                <div class="form-group">
                     {{ Form::label('semester', 'Semester') }}
                     {{ Form::select('semester',$semester_id, Input::old('semester'), array('class' => 'form-control','required'=>'required')) }}
                </div>

                {{--<div class="form-group">--}}
                    {{--{{ Form::label('exam_type', 'Exam Type') }}--}}
                    {{--{{ Form::text('acm_marks_dist_item_id', Input::old('acm_marks_dist_item_id'), array('class' => 'form-control','required'=>'required')) }}--}}
                {{--</div>--}}



            {{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
            <a href="{{URL::to('examination/amw/examination')}}" class="btn btn-default">Close </a>
</fieldset>
