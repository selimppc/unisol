<div style="padding: 10px; width: 90%;">

        <h1>Edit Target Role</h1>


    {{ Form::model($targetRole,array('url'=> array('target_list_role/update',$targetRole->id), 'method' => 'POST')) }}

             @include('target_list_role._form')

    {{ Form::close() }}

</div>