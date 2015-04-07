<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      <h4>View Question Paper</h4>
</div>


<div style="padding-left: 8%; width: 90%;">
    <div class="modal-body">


            <div class="row">
                <table class="table table-striped  table-bordered">
                    <tr>
                        <td><strong> Degree:</strong></td>
                        <td>{{ $view_adm_qp->relBatchAdmTestSubject->relBatch->relDegree->title }}</td>
                    </tr>
                    <tr>
                        <td><strong> Subject:</strong></td>
                        <td>{{ $view_adm_qp->relBatchAdmTestSubject->relAdmTestSubject->title }}</td>
                    </tr>
                    <tr>
                        <td><strong> Title:</strong></td>
                        <td>{{$view_adm_qp->title }}</td>
                    </tr>

                     <tr>
                        <td><strong> Deadline:</strong></td>
                        <td>{{ $view_adm_qp->deadline }}</td>
                     </tr>

                     <tr>
                        <td><strong> Total Marks:</strong></td>
                        <td>{{ $view_adm_qp->total_marks }}</td>
                     </tr>

                    <tr>
                        <td><strong> Assigned Examiner:</strong></td>
                        <td>{{ $view_adm_qp->relUser->relUserProfile->first_name.' '.$view_adm_qp->relUser->relUserProfile->middle_name.' '.$view_adm_qp->relUser->relUserProfile->last_name }}</td>
                        {{--relUser->relUserProfile->first_name.' '.$view_adm_test->relUser->relUserProfile->middle_name.' '.$view_adm_test->relUser->relUserProfile->last_name--}}
                    </tr>
                </table>
            </div>

        <a href="" class="pull-right btn btn-info" span class="glyphicon-refresh">Close</a>

        &nbsp;
        </br>
        &nbsp;
    </div>
</div>