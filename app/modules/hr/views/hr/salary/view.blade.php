<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
     <h3>Salary of : <strong style="color: #002a80">{{ $data->relHrEmployee->relUser->relUserProfile->first_name .' '.$data->relHrEmployee->relUser->relUserProfile->middle_name.' '.$data->relHrEmployee->relUser->relUserProfile->last_name }}</strong> </h3>
</div>

<div style="padding: 2%; width: 99%;">
    <div class="modal-body">
        <div class="row">
            <table class="table table-striped  table-bordered">
                <tr>
                    <td><strong> Salary Type:</strong></td>
                    <td>{{ ucfirst($data->salary_type) }}</td>
                </tr>

                <tr>
                    <td><strong> Currency:</strong></td>
                    <td>{{ $data->relHrEmployee->relCurrency->title }}</td>
                </tr>

                <tr>
                    <td><strong> Exchange Rate:</strong></td>
                    <td>{{ $data->exchange_rate }}</td>
                </tr>


                <tr>
                    <td><strong> Gross:</strong></td>
                    <td>{{ $data->gross }}</td>
                </tr>

                <tr>
                    <td><strong> Basic:</strong></td>
                    <td>{{ $data->basic }}</td>
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