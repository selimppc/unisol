<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h3>Salary Transaction Details: <strong style="color: #002a80">
    {{--{{ $data->relHrEmployee->relUser->relUserProfile->first_name .' '.$data->relHrEmployee->relUser->relUserProfile->middle_name.' '.$data->relHrEmployee->relUser->relUserProfile->last_name }}--}}
    </strong> </h3>
</div>

<div style="padding: 2%; width: 99%;">
    <div class="modal-body">
        <div class="row">
            <table class="table table-striped  table-bordered">
                <tr>
                    <td><strong> Type: </strong></td>
                    <td>{{ ucfirst($data->type) }}</td>
                </tr>

                <tr>
                    <td><strong> Salary Allowance:</strong></td>
                    <td>{{ ucfirst($data->relHrSalaryAllowance->title) }}</td>
                </tr>

                <tr>
                    <td><strong> Salary Deduction:</strong></td>
                    <td>{{ ucfirst($data->relHrSalaryDeduction->title) }}</td>
                </tr>

                {{--<tr>--}}
                    {{--<td><strong> Over Time:</strong></td>--}}
                    {{--<td>{{ $data->relHrOverTime->title }}</td>--}}
                {{--</tr>--}}

                <tr>
                    <td><strong> Bonus:</strong></td>
                    <td>{{ ucfirst($data->relHrBonus->title) }}</td>
                </tr>

                <tr>
                    <td><strong> Percentage:</strong></td>
                    <td>{{ $data->percentage }}</td>
                </tr>

                 <tr>
                    <td><strong> Amount:</strong></td>
                    <td>{{ $data->amount }}</td>
                </tr>
            </table>
        </div>
    </div>
</div>

<div class="modal-footer">
    <a href="" class="pull-right btn btn-info" span class="glyphicon-refresh">Close</a>
</div>