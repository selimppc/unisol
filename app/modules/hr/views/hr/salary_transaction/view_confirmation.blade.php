<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h3>Salary Transaction: <strong style="color: #002a80">
    {{ $data->relHrEmployee->relUser->relUserProfile->first_name .' '.$data->relHrEmployee->relUser->relUserProfile->middle_name.' '.$data->relHrEmployee->relUser->relUserProfile->last_name }}
    </strong> </h3>
</div>

<div style="padding: 2%; width: 99%;">
    <div class="modal-body">
        <div class="row">
            <h4><strong> Salary Transaction Head :</strong></h4>
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



        <div class="row">
        <h4><strong> Salary Transaction Detail(s) :</strong></h4>
            <table class="table table-striped  table-bordered" id="amwCourseConfig">
                <thead>
                    <th>Type</th>
                    <th>Salary Allowance</th>
                    <th>Salary Deduction</th>
                    <th>Over Time</th>
                    <th>Bonus</th>
                    <th>Percentage(%)</th>
                    <th>Amount</th>

                </thead>

                <tbody>
                   @foreach($model as $values)
                        <tr>
                           <td>{{ ucfirst($values->type) }}</td>
                           <td>{{ isset($values->relHrSalaryAllowance->title) ? (ucfirst($values->relHrSalaryAllowance->title)) : "" }}</td>
                           <td>{{ isset($values->relHrSalaryDeduction->title) ? (ucfirst($values->relHrSalaryDeduction->title)) : "" }}</td>
                           <td>{{ isset($values->relHrOverTime->amount) ? $values->relHrOverTime->amount : "" }}</td>
                           <td>{{ isset($values->relHrBonus->title) ? (ucfirst($values->relHrBonus->title)) : "" }}</td>
                           <td>{{ isset($values->percentage) ? round($values->percentage,2) : ""}}</td>
                           <td>{{ isset($values->amount) ? round($values->amount,2) : ""}}</td>
                        </tr>
                   @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal-footer">
    <a href="" class="pull-right btn btn-info" span class="glyphicon-refresh">Close</a>
</div>