
<fieldset style="padding: 10px; width: 90%;">


                 <?php
                           $role_task_id_result = RoleTask::lists('title', 'id');
                           $user_id_result = User::lists('username', 'id');
                 ?>


                <div class='form-group'>
                    <div>{{ Form::label('role_task_id', 'Role Task Name') }}</div>
                    <div>{{ Form::select('role_task_id',  $role_task_id_result ) }}</div>

                </div>


                <div class='form-group'>
                    <div>{{ Form::label('user_id', 'User Name') }}</div>
                    <div>{{ Form::select('user_id',$user_id_result ) }}</div>

                </div>

                <div class='form-group'>
                    <div>{{ Form::label('status', 'Status') }}</div>
                    <div>{{ Form::text('status', Input::old('status'),['class'=>'form-control','spellcheck'=> 'true']) }}</div>

                </div>



            {{ Form::submit('Submit', array('class'=>'btn btn-primary')) }}

              <a href="{{URL::to('role_task_user/')}}" class="btn btn-default">Close </a>

</fieldset>


