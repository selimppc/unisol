<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h3>RNC Transaction Confirmed View: <strong style="color: #002a80">
    {{ isset($data->user_id) ? $data->relUser->relUserProfile->first_name .' '.$data->relUser->relUserProfile->middle_name.' '.$data->relUser->relUserProfile->last_name  : ""}}
    </strong> </h3>
</div>

<div style="padding: 2%; width: 99%;">
    <div class="modal-body">
        <div class="row">
            <h4><strong> RNC Transaction Head :</strong></h4>
            <table class="table table-striped  table-bordered">
                {{--<tr>--}}
                    {{--<td><strong> Transaction Number: </strong></td>--}}
                    {{--<td>{{ $data->trn_number }}</td>--}}
                {{--</tr>--}}
                <tr>
                    <td><strong> Issue Date:</strong></td>
                    <td>{{ $data->issue_date }}</td>
                </tr>
                <tr>
                    <td><strong> Research Paper Name:</strong></td>
                    <td>{{ isset($data->rnc_research_paper_id) ? $data->relRnCResearchPaper->title : "" }}</td>
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
        <h4><strong> RNC Transaction Detail(s) :</strong></h4>
            <table class="table table-striped  table-bordered" id="amwCourseConfig">
                <thead>
                    <th>Research Paper Name</th>
                    <th>Transaction Type</th>
                    <th>Amount</th>
                    <th>Status</th>

                </thead>

                <tbody>
                   @foreach($model as $values)
                        <tr>
                           <td>{{ ucfirst($values->transaction_type) }}</td>
                           <td>{{ isset($values->rnc_transaction_id) ? (ucfirst($values->relRnCTransaction->relRnCResearchPaper->title)) : "" }}</td>
                           <td>{{ isset($values->amount) ? round($values->amount,2) : ""}}</td>
                           <td>{{ isset($values->status) }} </td>
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