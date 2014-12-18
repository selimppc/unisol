

<div style="padding: 10px; width: 90%;">

        <h1>Edit Semester</h1>


    {{ Form::model($term_semester,array('url'=> array('semester/update',$term_semester->id), 'method' => 'POST')) }}

             @include('semester._form')

    {{ Form::close() }}

</div>