
<fieldset style="padding: 10px; width: 90%;">

                <div class='form-group'>
                    <div>{{ Form::label('title', 'Department Name') }}</div>
                    <div>{{ Form::text('title', Input::old('title'),['class'=>'form-control']) }}</div>


                </div>

                <div class='form-group'>
                    <div>{{ Form::label('description', ' Description') }}</div>
                    <div>{{ Form::textarea('description', Input::old('description'),['class'=>'form-control ','spellcheck'=> 'true']) }}</div>

                </div>



            {{ Form::submit('Save', array('class'=>'btn btn-primary')) }}

              <a href="{{URL::to('department/index')}}" class="btn btn-default">Close </a>

    </fieldset>