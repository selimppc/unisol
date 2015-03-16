<div style="padding: 10px; width: 90%;">

        <h1>Edit Semester</h1>


    {{ Form::model($type_of_course,array('url'=> array('course_type/update',$type_of_course->id), 'method' => 'POST')) }}

             @include('course_type._form')

    {{ Form::close() }}

</div>