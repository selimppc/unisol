<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h1>View View Questions</h1>
</div>

<div style="padding-left: 10px; width: 90%;">



    {{ Form::open(array('route'=>'admission.amw.admission-test-question.view-admtest-question-paper','method' => '')) }}


        <div class="span9 well" style="font-size: large; margin-left: 40px">

            <h2><strong>Batch #</strong>{{$view_questions->relBatchAdmtestSubject->relBatch->batch_number }} </h2>

            <p>
                <strong> Degree Name:</strong>{{ $view_questions->relBatchAdmtestSubject->relBatch->relDegree->title }}
                                                   </br>

{{--                <strong> Subject :</strong>{{ $view_questions->relBatchAdmtestSubject->relAdmTestSubject->title }}  <br>--}}

                <strong> Title :</strong> {{ $view_questions->title }} <br>

                <strong> Deadline :</strong> {{ $view_questions->deadline }} <br>

                <strong> Total Marks :</strong> {{ $view_questions->total_marks }} <br>

                <strong> Assigned To:</strong>  {{ $view_questions->examiner_faculty_user_id }}<br>

            </p>
        </div>

    <a href="" class="pull-right btn btn-info" span class="glyphicon-refresh">Close</a>

    &nbsp;
    </br>
    &nbsp;

    {{ Form::close() }}
</div>