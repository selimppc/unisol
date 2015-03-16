<div style="padding: 10px; width: 90%;">

 <h1>Show Semester</h1>

    {{ Form::open(array('url'=>'course_type/show','method' => '')) }}


        <div class="jumbotron text-center">
            <h2><strong>Name :</strong>{{ $type_of_course->title }}</h2>
            <p>
                <strong> Description:</strong> {{ $type_of_course->description }}
            </p>
        </div>

        <a href="{{URL::to('course_type/')}}" class="btn btn-default">Close </a>

    {{ Form::close() }}


</div>
