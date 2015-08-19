<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      <h4>View Question Paper</h4>
</div>


<div style="padding-left: 8%; width: 90%;">
    <div class="modal-body">
            <div class="row">
                <table class="table table-striped  table-bordered">
                    <tr>
                        <td><strong> Name of Examination:</strong></td>
                        <td>{{ $view_exm_qp->relExmExamList->title }}</td>
                    </tr>
                    <tr>
                        <td><strong> Title:</strong></td>
                        <td>{{ $view_exm_qp->title }}</td>
                    </tr>

                     <tr>
                        <td><strong> Deadline:</strong></td>
                        <td>{{ date("d-m-Y", strtotime((isset( $view_exm_qp->deadline)) ?  $view_exm_qp->deadline : '') ) }}</td>
                     </tr>

                     <tr>
                        <td><strong> Total Marks:</strong></td>
                        <td>{{ $view_exm_qp->total_marks }}</td>
                     </tr>

                    <tr>
                        <td><strong> Examiner Type:</strong></td>
                        <td>
                             @if( $view_exm_qp->s_faculty_user_id == $view_exm_qp->e_faculty_user_id )
                                   {{ "Both" }}
                             @elseif( $view_exm_qp->s_faculty_user_id == Auth::user()->get()->id )
                                   {{ "Setter" }}
                             @elseif( $view_exm_qp->e_faculty_user_id == Auth::user()->get()->id )
                                   {{ "Evaluator" }}
                             @endif
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