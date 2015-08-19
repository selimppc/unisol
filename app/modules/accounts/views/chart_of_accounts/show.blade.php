<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
     <h3> Chart of Accounts</h3>
</div>

<div style="padding: 2%; width: 99%;">
<div class="modal-body">

    <div class="row">
    <table class="table table-striped  table-bordered">
        <tr>
            <td><strong> Account Code </strong></td>
            <td>{{ $data->account_code}}</td>
        </tr>
        <tr>
            <td><strong> Description </strong></td>
            <td>{{ $data->description }}</td>
        </tr>

        <tr>
            <td><strong> Account Type </strong></td>
            <td>{{ $data->account_type }}</td>
        </tr>

        <tr>
            <td><strong> Account Usage </strong></td>
            <td>{{ $data->account_usage }}</td>
        </tr>
        <tr>
            <td><strong> Group One </strong></td>
            <td>{{ $data->group_one }}</td>
        </tr>
        <tr>
            <td><strong> Group Two </strong></td>
            <td>{{ $data->group_two }}</td>
        </tr>
        <tr>
            <td><strong> Analytical Code </strong></td>
            <td>{{ $data->analytical_code }}</td>
        </tr>
    </table>
    </div>

</div>
</div>

<div class="modal-footer">
    <a href="" class="pull-right btn btn-info" span class="glyphicon-refresh">Close</a>
</div>