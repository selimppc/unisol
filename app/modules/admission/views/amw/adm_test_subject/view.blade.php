<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h1>View Admission Test Subject</h1>
</div>

<div style="padding: 10px; width: 90%;">



    {{ Form::open(array('url'=>'admission/amw/admission-test-subject/view-admission-test-subject','method' => '')) }}
        <div class="span9 well" style="font-size: large; margin-left: 40px">
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
