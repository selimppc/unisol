

<div style="padding: 10px; width: 90%;">

        <h1>Edit Course</h1>


    {{ Form::model($course_management,array('url'=> array('course/update',$course_management->id), 'method' => 'POST')) }}

             @include('course._form')

    {{ Form::close() }}

</div>