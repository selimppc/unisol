<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h1>View Questions</h1>
</div>

<div style="padding: 4%; ">

    <table class="table table-striped  table-bordered"  >
        <tr>
            <td> Batch # </td>
            <td> {{$view_questions->relBatchAdmtestSubject->relBatch->batch_number }} </td>
        </tr>
        <tr>
            <td> Degree Name: </td>
            <td>
            {{ $view_questions->relBatchAdmtestSubject->relBatch->relDegree->relDegreeLevel->code }}
            {{ $view_questions->relBatchAdmtestSubject->relBatch->relDegree->relDegreeGroup->code }} in
            {{ $view_questions->relBatchAdmtestSubject->relBatch->relDegree->relDegreeProgram->code }},
            {{ $view_questions->relBatchAdmtestSubject->relBatch->relSemester->title }} -
            {{ $view_questions->relBatchAdmtestSubject->relBatch->relYear->title }}
            </td>
        </tr>
        <tr>
            <td> Subject : </td>
            <td> {{ $view_questions->relBatchAdmtestSubject->relAdmtestSubject->title }} </td>
        </tr>
        <tr>
            <td> Title : </td>
            <td> {{ $view_questions->title }} </td>
        </tr>
        <tr>
            <td> Deadline : </td>
            <td> {{ $view_questions->deadline }} </td>
        </tr>
        <tr>
            <td>Total Marks :</td>
            <td>{{ $view_questions->total_marks }} </td>
        </tr>
        <tr>
            <td> Assigned To: </td>
            <td> {{ isset($view_questions->s_faculty_user_id) ? User::FullName($view_questions->s_faculty_user_id) : '' }} </td>
        </tr>

    </table>

    <a href="" class="pull-right btn btn-info" span class="glyphicon-refresh">Close</a>

    &nbsp;
    </br>
    &nbsp;

</div>