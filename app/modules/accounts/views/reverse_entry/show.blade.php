<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
     <h3> Receipt Voucher </h3>
</div>

<div style="padding: 2%; width: 99%;">
<div class="modal-body">

    <div class="row">
    <table class="table table-striped  table-bordered">
        <tr>
            <td><strong> Voucher Number </strong></td>
            <td>{{ $data->voucher_number}}</td>
        </tr>
        <tr>
            <td><strong> Date </strong></td>
            <td>{{ $data->date }}</td>
        </tr>

        <tr>
            <td><strong> Reference </strong></td>
            <td>{{ $data->reference }}</td>
        </tr>

        <tr>
            <td><strong> Year </strong></td>
            <td>{{ $data->year_id }}</td>
        </tr>
        <tr>
            <td><strong> Period </strong></td>
            <td>{{ $data->period }}</td>
        </tr>
        <tr>
            <td><strong> Note </strong></td>
            <td>{{ $data->note }}</td>
        </tr>
        <tr>
            <td><strong> Status </strong></td>
            <td>{{ $data->status }}</td>
        </tr>
    </table>
    </div>


    <p>
        <b> Reverse Detail(s)</b>
    </p>
        <div class="row">
            <table id="example" class="table table-striped  table-bordered" >
                <thead>
                    <tr>
                        <th> Account Code (COA) </th>
                        <th> Supplier </th>
                        <th> Prime Amount </th>
                        <th> Note </th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($rev_dt))
                    @foreach($rev_dt as $values)
                     <tr>
                        <td>{{ $values->relAccChartOfAccounts->account_code }}  </td>
                        <td>{{ Str::title( $values->relInvSupplier->company_name ) }}  </td>
                        <td>{{ $values->prime_amount }}</td>
                        <td>{{ $values->note }}</td>
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