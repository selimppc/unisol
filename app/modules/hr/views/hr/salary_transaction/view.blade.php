<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h3>Salary Advance: <strong style="color: #002a80">
    {{ $data->relHrEmployee->relUser->relUserProfile->first_name .' '.$data->relHrEmployee->relUser->relUserProfile->middle_name.' '.$data->relHrEmployee->relUser->relUserProfile->last_name }}
    </strong> </h3>
</div>

<div style="padding: 2%; width: 99%;">
    <div class="modal-body">
        <div class="row">
            <table class="table table-striped  table-bordered">
                <tr>
                    <td><strong> Transaction Number: </strong></td>
                    <td>{{ $data->trn_number }}</td>
                </tr>

                <tr>
                    <td><strong> Date:</strong></td>
                    <td>{{ $data->date }}</td>
                </tr>

                <tr>
                    <td><strong> Year:</strong></td>
                    <td>{{ $data->relYear->title }}</td>
                </tr>

                <tr>
                    <td><strong> Period:</strong></td>
                    <td>{{ $data->period }}</td>
                </tr>

                <tr>
                    <td><strong> Total Amount:</strong></td>
                    <td>{{ $data->total_amount }}</td>
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