<div style="padding: 10px; width: 90%;">

 <h1>View Batch</h1>

    {{ Form::open(array('url'=>'batch/amw/show','method' => '')) }}


        <div class="jumbotron text-center">
            <h2><strong>Batch Number :</strong>{{ $b_m_course->batch_number }}</h2>
            <p>
                <strong> Degree:</strong> {{ $b_m_course->relDegree->title }} <br>
                <strong> Year:</strong> {{ $b_m_course->relYear->title }}<br>
                <strong> Semester:</strong> {{ $b_m_course->relSemester->title }}<br>
                <strong> Description:</strong> {{ $b_m_course->description }}<br>
                <strong> Total Seat:</strong> {{ $b_m_course->seat_total }}<br>
                <strong> Start Date:</strong> {{ $b_m_course->start_date }}<br>
                <strong> End Date:</strong> {{ $b_m_course->end_date }}<br>
                <strong> Admission Deadline:</strong> {{ $b_m_course->admission_deadline }}<br>
                <strong> Admission Test Date:</strong> {{ $b_m_course->admtest_date }}<br>
                <strong> Admission Test Start Time:</strong> {{ $b_m_course->admtest_start_time }}<br>

            </p>
        </div>

    <a href="" class="pull-right btn btn-info" span class="glyphicon-refresh">Close</a>

    &nbsp;
    </br>
    &nbsp;

    {{ Form::close() }}


</div>
