<div style="padding: 10px; width: 90%;">

 <h1>Show Role task User</h1>

    {{ Form::open(array('url'=>'role_task_user/show','method' => '')) }}


        <div class="jumbotron text-center">
            <h2><strong>Role Task Name:</strong>{{  $roleTaskUser->role_task_id }}</h2>
            <p>
                <strong>User Name:</strong> {{ $roleTaskUser->user_id }}
                <br>
                <strong>Status:</strong> {{ $roleTaskUser->status }}

            </p>
        </div>

        <a href="{{URL::to('role_task_user/')}}" class="btn btn-default">Close </a>

    {{ Form::close() }}


</div>
