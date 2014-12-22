
    <fieldset style="padding: 10px; width: 90%;">

                <div class='form-group'>
                    <div>{{ Form::label('title', 'Course Type Name') }}</div>
                    <div>{{ Form::text('title', Input::old('title'),['class'=>'form-control']) }}</div>


                </div>

                <div class='form-group'>
                    <div>{{ Form::label('description', 'Course Type Description') }}</div>
                    <div>{{ Form::textarea('description', Input::old('description'),['class'=>'form-control ','spellcheck'=> 'true']) }}</div>

                </div>



            {{ Form::submit('Submit', array('class'=>'btn btn-primary')) }}

              <a href="{{URL::to('course_type/')}}" class="btn btn-default">Close </a>

    </fieldset>
