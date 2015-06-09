
{{--<div class='form-group'>
   {{ Form::label('purchase_no', 'Purchase Order No ') }}
   {{ Form::text('purchase_no', Input::old('purchase_no'),['class'=>'form-control', 'style'=>'text-transform: uppercase;', 'required']) }}
</div>--}}

{{--<div class='form-group'>
   {{ Form::label('inv_requisition_head_id', 'inv_requisition_head_id') }}
   {{ Form::select('inv_requisition_head_id', InvSupplier::GetSupplier(), Input::old('inv_requisition_head_id'),['class'=>'form-control', 'required']) }}
</div>--}}

<div class='form-group'>
   {{ Form::label('inv_supplier_id', 'Supplier') }}
   {{ Form::select('inv_supplier_id', $supplier_lists, Input::old('inv_supplier_id'),['class'=>'form-control', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('pay_terms', 'Pay Terms') }}
   {{ Form::select('pay_terms', ['cash'=>'cash', 'cheque'=>'cheque'], Input::old('pay_terms'),['class'=>'form-control', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('delivery_date', 'Delivery Date') }}
   {{ Form::text('delivery_date', Input::old('delivery_date'),['class'=>'form-control date_picker', 'required']) }}
</div>


{{--<div class='form-group'>
   {{ Form::label('tax', 'Tax (%)') }}
   {{ Form::text('tax', Input::old('tax'),['class'=>'form-control', 'required']) }}
</div>--}}


{{--<div class='form-group'>
   {{ Form::label('tax_amount', 'Tax Amount') }}
   {{ Form::text('tax_amount', Input::old('tax_amount'),['class'=>'form-control', 'required']) }}
</div>--}}


<div class='form-group'>
   {{ Form::label('discount_rate', 'Discount Rate (%)') }}
   {{ Form::text('discount_rate', Input::old('discount_rate'),['class'=>'form-control', 'required']) }}
</div>


{{--<div class='form-group'>
   {{ Form::label('discount_amount', 'Discount Amount') }}
   {{ Form::text('discount_amount', Input::old('discount_amount'),['class'=>'form-control', 'required']) }}
</div>--}}

{{--<div class='form-group'>
   {{ Form::label('amount', ' Amount') }}
   {{ Form::text('amount', Input::old('amount'),['class'=>'form-control', 'required']) }}
</div>--}}


{{--<div class='form-group'>
   {{ Form::label('status', 'status') }}
   {{ Form::select('status', InvPurchaseOrderHead::getStatus(), Input::old('status'),['class'=>'form-control',  'required']) }}
</div>--}}

{{ Form::hidden('status', 'open') }}


{{ Form::submit('Save', array('class'=>'pull-right btn btn-info')) }}
<a href="" class="pull-right btn btn-default" style="margin-right: 5px">Close</a>

<p>&nbsp;</p>
@include('inventory::po_head._script')
{{ HTML::script('assets/js/custom.js')}}