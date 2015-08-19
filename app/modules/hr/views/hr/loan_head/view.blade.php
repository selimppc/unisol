<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h3>Loan Head of : <strong style="color: #002a80">{{ $data->relHrEmployee->relUser->relUserProfile->first_name .' '.$data->relHrEmployee->relUser->relUserProfile->middle_name.' '.$data->relHrEmployee->relUser->relUserProfile->last_name }}</strong> </h3>
</div>

<div style="padding: 2%; width: 99%;">
    <div class="modal-body">
        <div class="row">
            <table class="table table-striped  table-bordered">
                <tr>
                    <td><strong> Title: </strong></td>
                    <td>{{ ucfirst($data->title) }}</td>
                </tr>

                <tr>
                    <td><strong> Loan Amount:</strong></td>
                    <td>{{ $data->loan_amount }}</td>
                </tr>

                <tr>
                    <td><strong> LoanDate:</strong></td>
                    <td>{{ $data->loan_date }}</td>
                </tr>


                <tr>
                    <td><strong> Monthly Repayment Amount:</strong></td>
                    <td>{{ $data->monthly_repayment_amount }}</td>
                </tr>

                <tr>
                    <td><strong> Repayment Start Date:</strong></td>
                    <td>{{ $data->repayment_start_date }}</td>
                </tr>

                <tr>
                    <td><strong> Description:</strong></td>
                    <td>{{ $data->description }}</td>
                </tr>

                <tr>
                    <td><strong> Number Of Installment:</strong></td>
                    <td>{{ $data->number_of_installment }}</td>
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