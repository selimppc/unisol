

<div style="padding: 10px; width: 90%;">
        <h1>Edit Degree Level</h1>


    {{ Form::model($degree,array('url'=> array('degree_level/update',$degree->id), 'method' => 'POST')) }}

             @include('degree_level._form')
    {{ Form::close() }}
</div>