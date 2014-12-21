<div style="padding: 10px; width: 90%;">

 <h1>Show Course</h1>

    {{ Form::open(array('url'=>'course/show','method' => '')) }}


        <div class="jumbotron text-center">
            <h2>{{ $course_management->title }}</h2>
            <p>
                <strong> Course Code:</strong> {{ $course_management->course_code }} <br>
                <strong> Subject Id:</strong> {{ $course_management->subject_id }}<br>
                <strong> Description:</strong> {{ $course_management->description }}<br>
                <strong> Course type:</strong> {{ $course_management->course_type }}<br>
                <strong> Evaluation:</strong> {{ $course_management->evaluation_total_marks }}<br>
                <strong> Credit:</strong> {{ $course_management->credit }}<br>
                <strong> Hours Per Credit:</strong> {{ $course_management->hours_per_credit }}<br>
                <strong> Cost Per Code:</strong> {{ $course_management->cost_per_credit }}<br>
            </p>
        </div>

    <a href="{{URL::to('course/')}}" class="btn btn-default">Close </a>

    {{ Form::close() }}


</div>
