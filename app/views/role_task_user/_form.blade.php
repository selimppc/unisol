
    <fieldset style="padding: 10px; width: 90%;">


                <div class='form-group'>
                    <div>{{ Form::label('role_task_id', 'Role Task Name') }}</div>
                    <div>{{ Form::select('role_task_id', [''=>'Select Option'] + RoleTask::orderBy('title')->lists('title', 'id'),'', ['class'=>'form-control']) }}</div>

                </div>


                <div class='form-group'>
                    <div>{{ Form::label('user_id', 'User Name') }}</div>
                    <div>{{ Form::select('user_id', [''=>'Select Option'] + User::orderBy('username')->lists('username', 'id'),'', ['class'=>'form-control']) }}</div>

                </div>

                <div class='form-group'>
                    <div>{{ Form::label('status', 'Status') }}</div>
                    <div>{{ Form::text('status', Input::old('status'),['class'=>'form-control','spellcheck'=> 'true']) }}</div>

                </div>



            {{ Form::submit('Submit', array('class'=>'btn btn-primary')) }}

              <a href="{{URL::to('role_task_user/')}}" class="btn btn-default">Close </a>

    </fieldset>


