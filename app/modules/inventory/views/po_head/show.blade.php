<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
     <h3> Purchase Order Number: {{ $data->purchase_no }}</h3>
</div>

<div style="padding: 2%; width: 99%;">
<div class="modal-body">

    <div class="row">
    <h5><strong> Purchase Order :</strong></h5>
    <table class="table table-striped  table-bordered">
        <tr>
            <td><strong> Requisition No:</strong></td>
            <td>{{ isset($data->inv_requisition_head_id) ? $data->relInvRequisitionHead->requisition_no : ''}}</td>
        </tr>
        <tr>
            <td><strong> Pay Terms:</strong></td>
            <td>{{ $data->pay_terms }}</td>
        </tr>

        <tr>
            <td><strong> Delivery Date:</strong></td>
            <td>{{ $data->delivery_date }}</td>
        </tr>

        <tr>
            <td><strong> Tax (%) :</strong></td>
            <td>{{ $data->tax }}</td>
        </tr>
        <tr>
            <td><strong> Tax Amount:</strong></td>
            <td>{{ $data->tax_amount }}</td>
        </tr>

        <tr>
            <td> <strong> Discount Rate (%) :</strong> </td>
            <td>{{ $data->discount_rate }}</td>
        </tr>

        <tr>
            <td><strong> Discount Amount:</strong></td>
            <td>{{ $data->discount_amount }}</td>
        </tr>

        <tr>
            <td><strong> Amount:</strong></td>
            <td>{{ $data->amount }}</td>
        </tr>

        <tr>
            <td><strong> Status:</strong></td>
            <td>{{ $data->status }}</td>
        </tr>

    </table>

    </div>

<p>
    <b> Purchase Order Detail(s)</b>
</p>
    <div class="row">
        <table id="example" class="table table-striped  table-bordered" >
            <thead>
                <tr>
                    <th> Product Name</th>
                    <th> Qty</th>
                    <th> GRN Qty </th>
                    <th> Tax Rate(%) </th>
                    <th> Tax Amount </th>
                    <th> Unit</th>
                    <th> Unit Qty</th>
                    <th> Purchase Rate</th>
                    <th> Amount </th>
                </tr>
            </thead>
            <tbody>
                @if(isset($po_dt))
                @foreach($po_dt as $values)
                 <tr>
                    <td>{{Str::title($values->relInvProduct->title)}} -{{ $values->relInvProduct->code }}</td>
                    <td>{{ $values->quantity }}  </td>
                    <td>{{$values->grn_quantity}}</td>
                    <td>{{$values->tax_rate}}</td>
                    <td>{{ $values->tax_amount }}  </td>
                    <td>{{$values->unit}}</td>
                    <td>{{$values->unit_quantity}}</td>
                    <td>{{ $values->purchase_rate }}  </td>
                    <td>{{$values->amount}}</td>
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