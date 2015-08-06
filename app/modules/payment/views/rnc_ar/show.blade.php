<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
     <h3> RNC AR Transaction </h3>
</div>

<div style="padding: 2%; width: 99%;">
<div class="modal-body">

    <div class="row">
    <h5><strong> RNC AR Transaction Summary :</strong></h5>
    <table class="table table-striped  table-bordered">

        <tr>
            <td><strong> Research Paper ID </strong></td>
            <td>{{ $rnc_head->rnc_research_paper_id }}</td>
        </tr>

        <tr>
            <td><strong>  User  </strong></td>
            <td>{{ $rnc_head->user_id }}</td>
        </tr>

        <tr>
            <td><strong> Issue Date </strong></td>
            <td>{{ $rnc_head->issue_date }}</td>
        </tr>
        <tr>
            <td><strong> Count </strong></td>
            <td>{{ $rnc_head->count }}</td>
        </tr>

        <tr>
            <td> <strong> Total Amount </strong> </td>
            <td>{{ $rnc_head->total_amount }}</td>
        </tr>

        <tr>
            <td><strong> Status</strong></td>
            <td>{{ $rnc_head->status }}</td>
        </tr>

    </table>

    </div>

<p>
    <b> RNC AR Transaction Detail(s) </b>
</p>
    <div class="row">
        <table id="example" class="table table-striped  table-bordered" >
            <thead>
                <tr>
                    <th> transaction_type </th>
                    <th> amount</th>
                </tr>
            </thead>
            <tbody>
                @if(isset($rnc_dt))
                @foreach($rnc_dt as $values)
                 <tr>
                    <td>{{ Str::title($values->transaction_type) }} </td>
                    <td>{{ $values->amount }}</td>
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