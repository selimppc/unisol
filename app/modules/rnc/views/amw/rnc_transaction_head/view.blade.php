<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h3>Transaction View: <strong style="color: #002a80">
    {{ $data->relUser->relUserProfile->first_name .' '.$data->relUser->relUserProfile->middle_name.' '.$data->relUser->relUserProfile->last_name }}
    </strong> </h3>
</div>

<div style="padding: 2%; width: 99%;">
    <div class="modal-body">
        <div class="row">
            <table class="table table-striped  table-bordered">
                <tr>
                    <td><strong> Research Paper Name: </strong></td>
                    <td>{{ $data->relRncResearchPaper->title }}</td>
                </tr>

                <tr>
                    <td><strong> Issue Date:</strong></td>
                    <td>{{ $data->issue_date }}</td>
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