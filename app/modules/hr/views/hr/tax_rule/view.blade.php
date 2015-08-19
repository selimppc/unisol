<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h3> View Tax Rule </h3>
</div>

<div style="padding: 2%; width: 99%;">
    <div class="modal-body">
        <div class="row">
            <table class="table table-striped  table-bordered">
                <tr>
                    <td><strong>Salary From: </strong></td>
                    <td>{{ $data->salary_from}}</td>
                </tr>
                <tr>
                    <td><strong>Salary To: </strong></td>
                    <td>{{ $data->salary_to }}</td>
                </tr>
                <tr>
                    <td><strong>Tax: </strong></td>
                    <td>{{ $data->tax }}</td>
                </tr>
                <tr>
                    <td><strong>Gender: </strong></td>
                    <td>{{ ucfirst($data->gender) }}</td>
                </tr>
                <tr>
                    <td><strong>Nationality: </strong></td>
                    <td>{{ ucfirst($data->nationality) }}</td>
                </tr>
                <tr>
                    <td><strong>Additional Tax Amount: </strong></td>
                    <td>{{ $data->additional_tax_amount }}</td>
                </tr>
            </table>
        </div>
    </div>
</div>

<div class="modal-footer">
    <a href="" class="pull-right btn btn-info" span class="glyphicon-refresh">Close</a>
</div>