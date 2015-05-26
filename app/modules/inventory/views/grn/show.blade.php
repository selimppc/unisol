<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
     <h3> GRN Details </h3>
</div>

<div style="padding: 2%; width: 99%;">
<div class="modal-body">

    <div class="row">
    <h5><strong> GRN Details :</strong></h5>
    <table class="table table-striped  table-bordered">
        <tr>
            <td><strong> Purchase Order No:</strong></td>
            <td>{{ isset($grn_head->inv_po_head_id) ? $grn_head->relInvPurchaseOrderHead->purchase_no : ''}}</td>
        </tr>
        <tr>
            <td><strong> Voucher Number:</strong></td>
            <td>{{ $grn_head->voucher_no }}</td>
        </tr>

        <tr>
            <td><strong>  Date:</strong></td>
            <td>{{ $grn_head->date }}</td>
        </tr>

        <tr>
            <td><strong> Supplier Name :</strong></td>
            <td>{{ isset($grn_head->inv_supplier_id) ? $grn_head->relInvSupplier->company_name : '' }}</td>
        </tr>
        <tr>
            <td><strong> Requisition No:</strong></td>
            <td>{{ isset($grn_head->inv_requisition_head_id) ? $grn_head->relInvRequisitionHead->requisition_no:'' }}</td>
        </tr>

        <tr>
            <td> <strong> Pay Terms :</strong> </td>
            <td>{{ $grn_head->pay_terms }}</td>
        </tr>

        <tr>
            <td><strong> Status:</strong></td>
            <td>{{ $grn_head->status }}</td>
        </tr>

    </table>

    </div>

<p>
    <b> GRN Detail(s)</b>
</p>
    <div class="row">
        <table id="example" class="table table-striped  table-bordered" >
            <thead>
                <tr>
                    <th> Product Name</th>
                    <th> Batch Number</th>
                    <th> Expiry Date </th>
                    <th> Receive Quantity </th>
                    <th> Cost Price </th>
                    <th> Unit </th>
                    <th> Unit Quantity</th>
                    <th> Tax Rate</th>
                    <th> Tax Amount</th>
                    <th> Row Amount </th>
                </tr>
            </thead>
            <tbody>
                @if(isset($grn_dt))
                @foreach($grn_dt as $values)
                 <tr>
{{--                    <td>{{Str::title($values->relInvProduct->title)}} -{{ $values->relInvProduct->code }}</td>--}}
                    <td>{{ $values->batch_number }}  </td>
                    <td>{{$values->expire_date}}</td>
                    <td>{{$values->receive_quantity}}</td>
                    <td>{{ $values->cost_price }}  </td>
                    <td>{{$values->unit}}</td>
                    <td>{{$values->unit_quantity}}</td>
                    <td>{{ $values->tax_rate }}  </td>
                    <td>{{$values->tax_amount}}</td>
                    <td>{{$values->row_amount}}</td>
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