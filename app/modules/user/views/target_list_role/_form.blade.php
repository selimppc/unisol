
    <fieldset style="padding: 10px; width: 90%;">


                <div class='form-group'>
                    <div>{{ Form::label('title', 'Task List Name') }}</div>
                    <div>{{ Form::text('title', Input::old('title'),['class'=>'form-control','spellcheck'=> 'true']) }}</div>

                </div>

                <div class='form-group'>
                    <div>{{ Form::label('description', 'Task List Description') }}</div>
                    <div>{{ Form::textarea('description', Input::old('description'),['class'=>'form-control ','spellcheck'=> 'true']) }}</div>

                </div>



            {{ Form::submit('Submit', array('class'=>'btn btn-primary')) }}

              <a href="{{URL::to('target_list_role/')}}" class="btn btn-default">Close </a>

    </fieldset>
