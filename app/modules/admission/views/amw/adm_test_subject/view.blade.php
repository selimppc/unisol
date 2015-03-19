<div style="padding: 10px; width: 90%;">

 <h1>View Admission Test Subject</h1>

    {{ Form::open(array('url'=>'admission/amw/view-admission-test-subject','method' => '')) }}
        <div class="jumbotron text-center">
            <h2><strong>Title :</strong>{{ $view_admission_test_subject->title }}</h2>
            <p>
                <strong> Priority:</strong> {{ $view_admission_test_subject->priority }} <br>
                <strong> Description:</strong> {{ $view_admission_test_subject->description }}<br>
            </p>
        </div>

    <a href="" class="pull-right btn btn-info" span class="glyphicon-refresh">Close</a>
    &nbsp;
    </br>
    &nbsp;

    {{ Form::close() }}
</div>
