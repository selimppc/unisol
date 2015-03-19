<div style="padding: 10px; width: 90%;">

 <h1>Manage Admission Test Subject: View</h1>

    {{ Form::open(array('url'=>'admission/amw/view_admtest_subject','method' => '')) }}

        <div class="jumbotron text-center">
            <h2><strong>Degree : </strong>{{ $view_adm_test_subject->relBatch->relDegree->title }}</h2>
            <p>
                <strong> Subject: </strong> {{ $view_adm_test_subject->relAdmTestSubject->title }} <br>
                <strong> Description: </strong> {{ $view_adm_test_subject->description }}<br>
                <strong> Marks: </strong> {{ $view_adm_test_subject->marks}}<br>
                <strong> Qualifying Marks: </strong> {{ $view_adm_test_subject->qualify_marks }}<br>
                <strong> Duration in Minute: </strong> {{ $view_adm_test_subject->duration }} <br>

            </p>
        </div>

    <a href="" class="pull-right btn btn-info" span class="glyphicon-refresh">Close</a>

    &nbsp;
    </br>
    &nbsp;

    {{ Form::close() }}

</div>
