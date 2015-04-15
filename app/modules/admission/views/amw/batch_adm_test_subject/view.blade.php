<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
   <h1>Batch Adm-Test Subject : View</h1>
</div>

<div style="padding: 10px; width: 90%;">



    {{ Form::open(array('url'=>'admission/amw/batch-adm-test-subject/view_admtest_subject','method' => '')) }}

        <div class="span9 well" style="font-size: large; margin-left: 40px">
            <h2><strong>Degree : </strong>{{ $view_adm_test_subject->relBatch->relDegree->relDegreeLevel->code.'  '.$view_adm_test_subject->relBatch->relDegree->relDegreeGroup->code.' In '.$view_adm_test_subject->relBatch->relDegree->relDegreeProgram->code }}</h2>
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
