
    <fieldset style="padding: 10px; width: 90%;">

                <div class='form-group'>
                            <div>{{ Form::label('title', 'Course Name') }}</div>
                            <div>{{ Form::text('title', Input::old('title'),['class'=>'form-control']) }}</div>
                </div>

                <div class='form-group'>
                            <div>{{ Form::label('course_code', 'Course Code') }}</div>
                            <div>{{ Form::text('course_code', Input::old('course_code'),['class'=>'form-control']) }}</div>
                </div>

                 <div class='form-group'>
                    <div>{{ Form::label('subject_id', 'Subject') }}</div>
                    <div>{{ Form::select('subject_id', [''=>'Select Option'] + Subject::orderBy('title')->lists('title', 'id'),'', ['class'=>'form-control']) }}</div>
                 </div>

                  <div class='form-group'>
                             <div>{{ Form::label('description', 'Description') }}</div>
                             <div>{{ Form::text('description', Input::old('description'),['class'=>'form-control']) }}</div>
                   </div>


                  <div class='form-group'>
                             <div>{{ Form::label('course_type', 'Course Type') }}</div>
                             <div>{{ Form::select('course_type', array('1' => 'Theory', '2' => 'Lab','3' => 'Thesis','4' => 'Internship','5' => 'Industrial Tour'));}}</div>

                  </div>

                  <div class='form-group'>
                             <div>{{ Form::label('evaluation_total_marks', 'Evaluation of Total Marks') }}</div>
                             <div>{{ Form::text('evaluation_total_marks', Input::old('evaluation_total_marks'),['class'=>'form-control']) }}</div>
                  </div>

                  <div class='form-group'>
                             <div>{{ Form::label('credit', 'Credit') }}</div>
                             <div>{{ Form::text('credit', Input::old('credit'),['class'=>'form-control']) }}</div>
                  </div>

                  <div class='form-group'>
                             <div>{{ Form::label('hours_per_credit', 'Hours Per Credit') }}</div>
                             <div>{{ Form::text('hours_per_credit', Input::old('hours_per_credit'),['class'=>'form-control']) }}</div>
                  </div>

                  <div class='form-group'>
                             <div>{{ Form::label('cost_per_credit', 'Cost Per Credit') }}</div>
                             <div>{{ Form::text('cost_per_credit', Input::old('cost_per_credit'),['class'=>'form-control']) }}</div>
                  </div>


            {{ Form::submit('Submit', array('class'=>'btn btn-primary')) }}

              <a href="{{URL::to('course/')}}" class="btn btn-default">Close </a>

              <br>
              <br>
              <br>

    </fieldset>
