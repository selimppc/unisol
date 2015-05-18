
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4>View Question : {{$model->title}} In {{$model->relCourseConduct->relCourse->title}}</h4>
</div>

<div style="padding: 4%; ">

    <table class="table table-striped  table-bordered"  >

        <tr>
            <td> Name Of Examination : </td>
            <td> {{ $model->relExmExamList->relAcmMarksDistItem->title }} </td>
        </tr>
        <tr>
            <td> Title : </td>
            <td> {{ $model->title }} </td>
        </tr>
        <tr>
            <td> Deadline : </td>
            <td> {{ $model->deadline }} </td>
        </tr>
        <tr>
            <td>Total Marks :</td>
            <td>{{ $model->total_marks }} </td>
        </tr>
        <tr>
            <td> Setter </td>
            <td>{{isset($model->s_faculty_user_id)? $model->relSUser->relUserProfile->first_name." ". $model->relSUser->relUserProfile->middle_name." ".$model->relSUser->relUserProfile->last_name :''}}
                <br> ({{ isset($model->s_status) ? ucfirst($model->s_status) : '' }})
            </td>
        </tr>
        <tr>
            <td> Evaluator: </td>
            <td> {{isset($model->e_faculty_user_id)? $model->relEUser->relUserProfile->first_name." ". $model->relEUser->relUserProfile->middle_name." ".$model->relEUser->relUserProfile->last_name :''}}
                <br> ({{ isset($model->e_status) ? ucfirst($model->e_status) : '' }})
            </td>
        </tr>

        <tr>
            <td>Status</td>
            <td>{{isset($model->status) ? ucfirst($model->status) : '' }} </td>
        </tr>

    </table>

    <a href="" class="pull-right btn btn-info" span class="glyphicon-refresh">Close</a>

    &nbsp;
    </br>
    &nbsp;

</div>