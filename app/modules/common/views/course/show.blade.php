<div style="padding: 10px; width: 90%;">

 <h1>Show Course</h1>

    {{ Form::open(array('url'=>'course/show','method' => '')) }}


        <div class="jumbotron text-center">
            <h2><strong>Name :</strong>{{ $course->title }}</h2>
            <p>
                <strong> Course Code:</strong> {{ $course->course_code }} <br>
                <strong> Subject Name:</strong> {{ $course->relSubject->title }}<br>
                <strong> Description:</strong> {{ $course->description }}<br>
                <strong> Evaluation Total Marks:</strong> {{ $course->evaluation_total_marks }}<br>
                <strong> Credit:</strong> {{ $course->credit }}<br>
                <strong> Hours Per Credit:</strong> {{ $course->hours_per_credit }}<br>
                <strong> Cost Per Code:</strong> {{ $course->cost_per_credit }}<br>
                <strong> Course type:</strong> {{ $course->relCourseType->title }}<br>
                <strong> Evaluation System:</strong> {{ $course->evaluation_system }}<br>




            </p>
        </div>

    <a href="{{URL::to('common/course/index')}}" class="btn btn-default">Close </a>

    {{ Form::close() }}


</div>
