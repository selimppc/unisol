<div style="padding: 20px;">
        <h3>Edit {{$roletask->title}}</h3>

        {{Form::open(array('url'=>'roletask/update/'.$roletask->id, 'class'=>'form-horizontal'))}}


        {{ Form::label('title','Role Task:') }}
        {{ Form::text('title',$roletask->title, array('class' => 'form-control')) }}
        <br>
        {{ Form::label('target_role_id', 'Target Role') }}
        {{ Form::select('target_role_id',[0=>'Select one'] + TargetRole::lists('title', 'id'),$roletask->target_role_id) }}
        <br>
        {{ Form::label('task_list_id','Task List:') }}
        {{ Form::select('task_list_id',[0=>'Select one'] + TaskListRole::lists('title', 'id'),$roletask->task_list_id) }}
        <br>
        {{ Form::label('status', 'status:') }}
        {{ Form::text('status',$roletask->status, array('class' => 'form-control')) }}
         <br>
        {{ Form::label('description', 'Description:') }}
        {{ Form::textarea('description',$roletask->description, array('class' => 'form-control')) }}
        <p>&nbsp;</p>

        {{ Form::submit('Save Changes', array('class'=>'btn btn-primary')) }}
        <a href="" class="btn btn-default" span class="glyphicon-refresh">Close</a>

        {{Form::close()}}


</div>