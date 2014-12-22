
    <fieldset style="padding: 10px; width: 90%;">


                <div class='form-group'>
                    <div>{{ Form::label('role_task_id', 'Role Task Name') }}</div>
                    <div>{{ Form::text('role_task_id', Input::old('role_task_id'),['class'=>'form-control','spellcheck'=> 'true']) }}</div>

                </div>

                <div class='form-group'>
                    <div>{{ Form::label('user_id', 'User Name') }}</div>
                    <div>{{ Form::textarea('user_id', Input::old('user_id'),['class'=>'form-control ','spellcheck'=> 'true']) }}</div>

                </div>

                <div class='form-group'>
                    <div>{{ Form::label('status', 'Status') }}</div>
                    <div>{{ Form::text('status', Input::old('status'),['class'=>'form-control','spellcheck'=> 'true']) }}</div>

                </div>



            {{ Form::submit('Submit', array('class'=>'btn btn-primary')) }}

              <a href="{{URL::to('role_task_user/')}}" class="btn btn-default">Close </a>

    </fieldset>


