<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h1>View Questions</h1>
</div>

<div style="padding: 4%; ">

    <table class="table table-striped  table-bordered"  >
        <tr>
            <td> Batch # </td>
            <td> {{ isset($batch->batch_number) ? $batch->batch_number : '' }} </td>
        </tr>
        <tr>
            <td> Degree Name: </td>
            <td>
                {{isset( $batch->relVDegree->title) ?$batch->relVDegree->title : ''}} at {{isset( $batch->relYear->title) ? $batch->relYear->title :'' }}
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
            <td> Setter </td>
            <td>{{isset($view_questions->s_faculty_user_id)? $view_questions->relSUser->relUserProfile->first_name." ". $view_questions->relSUser->relUserProfile->middle_name." ".$view_questions->relSUser->relUserProfile->last_name :''}}
                <br> {{ isset($view_questions->s_status) ? ucfirst($view_questions->s_status) : '' }}
            </td>
        </tr>
        <tr>
            <td> Evaluator: </td>
            <td> {{isset($view_questions->e_faculty_user_id)? $view_questions->relEUser->relUserProfile->first_name." ". $view_questions->relEUser->relUserProfile->middle_name." ".$view_questions->relEUser->relUserProfile->last_name :''}}
                <br> {{ isset($view_questions->e_status) ? ucfirst($view_questions->e_status) : '' }}
            </td>
        </tr>

        <tr>
            <td>Status</td>
            <td>{{isset($view_questions->status) ? ucfirst($view_questions->status) : '' }} </td>
        </tr>

    </table>

    <a href="" class="pull-right btn btn-info" span class="glyphicon-refresh">Close</a>

    &nbsp;
    </br>
    &nbsp;

</div>