<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
     <h4> GRN from Purchase Order # {{$grn_head->relInvPurchaseOrderHead->purchase_no}} </h4>
</div>
<style>
    .form-control{
        height: 25px;
    }
</style>
<div style="padding: 2%; width: 99%;">
<div class="modal-body " >

<div id="response-msg"></div>
<div class='row' id="refresh_area">
    <div class="col-sm-5" style="line-height: 10px; border: 1px solid #003bb3;  ">
        <h4> GRN Information:  </h4>
        {{Form::open(['route'=>'ajax-grn-detail-store', 'files'=>true, 'id'=>'grn-sub-grn-data'])}}

        <div class='form-group'>
           <input type="hidden" name="inv_grn_head_id" value="{{$grn_head->id}}" id="inv_grn_head_id">
        </div>
        <div class='form-group'>
           {{ Form::label('inv_product_id', 'Product Name') }}
           {{ Form::text('product_name', '',['id'=>'product-name','class'=>'form-control' , 'required']) }}
           {{ Form::hidden('inv_product_id', '', ['id'=>'product-id']) }}
        </div>
        <div class='form-group'>
           {{ Form::label('batch_number', 'Batch Number') }}
           {{ Form::text('batch_number', Input::old('batch_number'),['id'=>'batch_number','class'=>'form-control', 'required']) }}
        </div>
        <div class='form-group'>
           {{ Form::label('expire_date', 'Expiry Date') }}
           {{ Form::text('expire_date', Input::old('expire_date'),['id'=>'expire_date','class'=>'form-control date_picker', 'required']) }}
        </div>

        <div class='form-group'>
           {{ Form::label('unit', 'Unit') }}
           {{ Form::text('unit', Input::old('unit'),['id'=>'unit-id','class'=>'form-control', 'required']) }}
        </div>
        <div class='form-group'>
           {{ Form::label('unit_quantity', 'Unit Qty') }}
{{--           {{ Form::text('unit_quantity', Input::old('unit_quantity'),['id'=>'unit-qty','class'=>'form-control', 'required']) }}--}}
           <input name="unit_quantity" class="form-control" id="unit-qty" required="required" readonly="readonly">
        </div>
        <div class='form-group'>
           {{ Form::label('receive_quantity', 'Receive Quantity') }}
           {{ Form::text('receive_quantity', Input::old('receive_quantity'),['id'=>'rec-qty','class'=>'form-control', 'required']) }}
        </div>
        <div class='form-group'>
           {{ Form::label('cost_price', 'Cost Price') }}
           {{ Form::text('cost_price', Input::old('cost_price'),['id'=>'cost-price','class'=>'form-control', 'required']) }}
        </div>
        <div class='form-group'>
           {{ Form::label('row_amount', 'Amount') }}
           <input name="row_amount" class="form-control" required readonly id="row-amount" value="">
        </div>
        <div class="form-group">
            {{ Form::submit('Submit ( Product ) ', ['class'=>'pull-left btn btn-xs btn-success', 'id'=>'submit-button-form', 'style'=>'padding: 1%;'] ) }}
        </div>
        {{ Form::close() }}
    </div>


    <div class="col-sm-7">
        <div class='row'>
            <div class="col-sm-12" style="background-color: #f9f9f9">
                <h4> Products by PO NO # {{$po_head->purchase_no }} </h4>
                <table class="table table-bordered small-header-table" id="amwCourseConfig">
                    <thead>
                        <th>Product Code</th>
                        <th>Product Name</th>
                        <th>Unit </th>
                        <th>Unit Qty </th>
                        <th>PO Qty</th>
                        <th>PO Rate </th>
                        <th>Total Amount </th>
                    </thead>
                    <tbody class="items">
                    @foreach($po_dt as $key => $value)
                        <tr>
                            <td style="display: none; "> {{ $value->inv_product_id }} </td>
                            <td><b>{{isset($value->inv_product_id) ? $value->relInvProduct->code : ''}}</b></td>
                            <td>{{isset($value->inv_product_id) ? $value->relInvProduct->title : ''}}</td>
                            <td>{{round($value->unit)}}</td>
                            <td>{{round($value->unit_quantity)}}</td>
                            <td>{{round($value->quantity)}}</td>
                            <td>{{round($value->purchase_rate, 2)}}</td>
                            <td>{{round($value->amount, 2)}}</td>
                        </tr>
                   @endforeach
                </table>
            </div>

            <p> &nbsp; </p>

            <div class="col-sm-12" style="background-color: #f9f9f9">
                <h4> GRN Detail(s) </h4> <span class="pull-right" id="something-delete" style="color: orangered; font-weight: bold"></span>
                <table class="table table-bordered small-header-table" id="amwCourseConfig">
                    <thead>
                        <th> Product Code </th>
                        <th> Product Name </th>
                        <th> Expiry Date </th>
                        <th> Rec. Qty. </th>
                        <th> Cost Price </th>
                        <th> Unit </th>
                        <th> Row Amt </th>
                        <th> Action </th>
                    </thead>
                    <tbody>
                    @foreach($grn_dt as $key => $value)
                        <tr id="new_area_id">
                            <td><b>{{ isset($value->inv_product_id) ? $value->relInvProduct->code : '' }}</b></td>
                            <td>{{ isset($value->inv_product_id) ? $value->relInvProduct->title : '' }}</td>
                            <td>{{ $value->expire_date }}</td>
                            <td>{{ round($value->receive_quantity) }}</td>
                            <td>{{ round($value->cost_price, 2) }}</td>
                            <td>{{ round($value->unit) }}</td>
                            <td>{{ round($value->row_amount, 2) }}</td>
                            <td>
                                <a data-href="{{ $value->id }}" class="btn btn-default btn-xs delete-dt" id="delete-dt{{ $value->id }}" ><i class="fa  fa-trash-o" style="font-size: 15px;color: red"></i></a>
                            </td>
                        </tr>
                   @endforeach
                </table>
            </div>
        </div>
    </div>

</div>
<p>&nbsp;</p>

</div>
</div>
@include('inventory::grn._script')
{{ HTML::script('assets/js/custom.js')}}
{{ HTML::script('assets/etsb/etsb_js/jquery/jquery.min.js')}}
{{ HTML::script('assets/etsb/etsb_js/jquery-ui/jquery-ui.min.js')}}