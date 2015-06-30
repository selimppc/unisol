<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h3>Salary Allowance </h3>
</div>

<div style="padding: 2%; width: 99%;">
    <div class="modal-body">
        <div class="row">
            <table class="table table-striped  table-bordered">
                <tr>
                    <td><strong> Allowance: </strong></td>
                    <td>{{ $data->relHrAllowance->title }}</td>
                </tr>

                <tr>
                    <td><strong> Is Percentage ?</strong></td>
                    <td>{{ $data->is_percentage }}</td>
                </tr>

                <tr>
                    <td><strong> Percentage:</strong></td>
                    <td>{{ $data->percentage }}</td>
                </tr>

                <tr>
                    <td><strong> Allowance Type:</strong></td>
                    <td>{{ $data->allowance_type }}</td>
                </tr>

                <tr>
                    <td><strong> Amount:</strong></td>
                    <td>{{ $data->amount }}</td>
                </tr>

                <tr>
                    <td><strong> Status:</strong></td>
                    <td>{{ ucfirst($data->status) }}</td>
                </tr>
            </table>
        </div>
    </div>
</div>

<div class="modal-footer">
    <a href="" class="pull-right btn btn-info" span class="glyphicon-refresh">Close</a>
</div>