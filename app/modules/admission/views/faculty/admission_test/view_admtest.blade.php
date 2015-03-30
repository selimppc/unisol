<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
     <h1> View Admission Test </h1>
</div>

<div style="padding-left: 8%; width: 90%;">
    <div class="modal-body">


            <div class="row">
                <h2><strong> Department :</strong>{{ $dept_name }}</h2>
                <table class="table table-striped  table-bordered">
                    <tr>
                        <td><strong> Degree:</strong></td>
                        <td>{{ $view_adm_test->relBatch->relDegree->title }}</td>
                    </tr>
                    <tr>
                        <td><strong> Name of Faculty:</strong></td>
                        <td>{{ $view_adm_test->relUser->relUserProfile->first_name.' '.$view_adm_test->relUser->relUserProfile->middle_name.' '.$view_adm_test->relUser->relUserProfile->last_name }}</td>
                    </tr>
                    <tr>
                        <td><strong> Status:</strong></td>
                        <td>
                            {{ $view_adm_test->status }}

                        </td>
                    </tr>
                    <tr>
                        <td><strong> Comments:</strong></td>
                        <td>
                            {{ $view_adm_test_comments->comment }}

                            <div class="form-group">
                                  {{ Form::textarea('comment', Null, ['size' => '40x6','placeholder'=>'Your Comments Here']) }}
                            </div>

                        </td>
                    </tr>
                </table>
            </div>

        <a href="" class="pull-right btn btn-info" span class="glyphicon-refresh">Close</a>

        &nbsp;
        </br>
        &nbsp;
    </div>
</div>