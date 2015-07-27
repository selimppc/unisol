<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h3> View Tax Rule </h3>
</div>
<div style="padding: 2%; width: 99%;">
    <div class="modal-body">
        <div class="row">
            <table class="table table-striped  table-bordered">
                <tr>
                    <td><strong>User Name: </strong></td>
                    <td>{{ $data->user_id}}</td>
                </tr>
                <tr>
                    <td><strong>Employee Id: </strong></td>
                    <td>{{ $data->employee_id}}</td>
                </tr>
                <tr>
                    <td><strong>Joining Date: </strong></td>
                    <td>{{ $data->date_of_joining }}</td>
                </tr>
                <tr>
                    <td><strong>Confirmation Date: </strong></td>
                    <td>{{ $data->date_of_confirmation }}</td>
                </tr>
                <tr>
                    <td><strong>Grade: </strong></td>
                    <td>{{ $data->relHrSalaryGrade->title }}</td>
                </tr>
                <tr>
                    <td><strong>Department: </strong></td>
                    <td>{{ $data->relDepartment->title }}</td>
                </tr>
                <tr>
                    <td><strong>Designation: </strong></td>
                    <td>{{ $data->relDesignation->title }}</td>
                </tr>
                <tr>
                    <td><strong>Bank: </strong></td>
                    <td>{{ ucfirst($data->relHrBank->bank_name) }}</td>
                </tr>
                <tr>
                    <td><strong>Bank Account Number: </strong></td>
                    <td>{{ $data->bank_account_no }}</td>
                </tr>
                <tr>
                    <td><strong>Currency: </strong></td>
                    <td>{{ $data->relCurrency->title }}</td>
                </tr>
                <tr>
                    <td><strong>Exchange Rate: </strong></td>
                    <td>{{ $data->exchange_rate }}</td>
                </tr>
                <tr>
                    <td><strong>Employee Type: </strong></td>
                    <td>{{ ucfirst($data->employee_type) }}</td>
                </tr>
                <tr>
                    <td><strong>Employee Category: </strong></td>
                    <td>{{ ucfirst($data->employee_category) }}</td>
                </tr>
                <tr>
                    <td><strong>Work Shift: </strong></td>
                    <td>{{ ucfirst($data->work_shift) }}</td>
                </tr>
                <tr>
                    <td><strong>Emergency Contact Person: </strong></td>
                    <td>{{ ucfirst($data->emergency_contact_person) }}</td>
                </tr>
                <tr>
                    <td><strong>Emergency Contact Number: </strong></td>
                    <td>{{ $data->emergency_contact_number }}</td>
                </tr>
                <tr>
                    <td><strong>Emergency Contact Relation: </strong></td>
                    <td>{{ ucfirst($data->emergency_contact_relationship) }}</td>
                </tr>
                <tr>
                    <td><strong>Status: </strong></td>
                    <td>{{ ucfirst($data->status) }}</td>
                </tr>
            </table>
        </div>
    </div>
</div>

<div class="modal-footer">
    <a href="" class="pull-right btn btn-info" span class="glyphicon-refresh">Close</a>
</div>