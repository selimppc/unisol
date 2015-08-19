<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
     <h3> Salary Transaction </h3>
</div>

<div style="padding: 2%; width: 99%;">
<div class="modal-body">

    <div class="row">
    <h5><strong> Salary Transaction Summary :</strong></h5>
    <table class="table table-striped  table-bordered">
        <tr>
            <td><strong> Transaction NO # </strong></td>
            <td>{{ $hr_trn_head->trn_number}}</td>
        </tr>
        <tr>
            <td><strong> HR Employee </strong></td>
            <td>{{ $hr_trn_head->relHrEmployee->employee_id }}</td>
        </tr>

        <tr>
            <td><strong>  Date </strong></td>
            <td>{{ $hr_trn_head->date }}</td>
        </tr>

        <tr>
            <td><strong> Year </strong></td>
            <td>{{ $hr_trn_head->relYear->title }}</td>
        </tr>
        <tr>
            <td><strong> Month </strong></td>
            <td>{{ ucfirst($hr_trn_head->period) }}</td>
        </tr>

        <tr>
            <td> <strong> Total Amount </strong> </td>
            <td>{{ round($hr_trn_head->total_amount,2) }}</td>
        </tr>

        <tr>
            <td><strong> Status</strong></td>
            <td>{{ ucfirst($hr_trn_head->status) }}</td>
        </tr>

    </table>

    </div>

<p>
    <b> Salary Transaction Detail(s) </b>
</p>
    <div class="row">
        <table id="example" class="table table-striped  table-bordered" >
            <thead>
                <tr>
                    <th> Salary Type </th>
                    <th> Allowance</th>
                    <th> Deduction </th>
                    <th> Over Time </th>
                    <th> Bonus </th>
                    <th> Percentage </th>
                    <th> Amount </th>
                </tr>
            </thead>
            <tbody>
                @if(isset($hr_trn_dt))
                @foreach($hr_trn_dt as $values)
                 <tr>
                    <td>{{ Str::title($values->type) }} </td>
                    <td>{{ isset($values->hr_salary_allowance_id) ? $values->relHrSalaryAllowance->title : "" }}  </td>
                    <td>{{ isset($values->hr_salary_deduction_id) ? $values->relHrSalaryDeduction->title : "" }}  </td>
                    <td>{{ isset($values->hr_over_time_id) ? $values->relHrOverTime->amount : "" }}  </td>
                    <td>{{ isset($values->hr_bonus_id) ? $values->relHrBonus->title : "" }}  </td>
                    <td>{{ $values->percentage }}</td>
                    <td>{{ round($values->amount,2) }}</td>
                 </tr>
                @endforeach
                @else
                    {{ "No Data Found !" }}
                @endif
            </tbody>

        </table>
    </div>

</div>
</div>

<div class="modal-footer">
    <a href="" class="pull-right btn btn-info" span class="glyphicon-refresh">Close</a>
</div>