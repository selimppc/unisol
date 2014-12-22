<div style="padding: 10px; width: 90%;">

        <h1>Edit Role task User</h1>


    {{ Form::model($roleTaskUser,array('url'=> array('role_task_user/update',$roleTaskUser->id), 'method' => 'POST')) }}

             @include('role_task_user._form')

    {{ Form::close() }}

</div>