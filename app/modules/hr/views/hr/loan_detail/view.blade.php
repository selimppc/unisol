<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h3>Loan Detail</h3>
</div>

<div style="padding: 2%; width: 99%;">
    <div class="modal-body">
        <div class="row">
            <table class="table table-striped  table-bordered">
                <tr>
                    <td><strong> Loan Head:</strong></td>
                    <td>{{ $data->relHrLoanHead->title }}</td>
                </tr>

                <tr>
                    <td><strong> Amount:</strong></td>
                    <td>{{ $data->amount }}</td>
                </tr>

                <tr>
                    <td><strong> Date:</strong></td>
                    <td>{{ $data->date }}</td>
                </tr>

            </table>
        </div>
    </div>
</div>

<div class="modal-footer">
    <a href="" class="pull-right btn btn-info" span class="glyphicon-refresh">Close</a>
</div>