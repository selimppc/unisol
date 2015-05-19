
<div class='form-group'>
   {{ Form::label('purchase_no', 'Purchase Order No ') }}
   {{ Form::text('purchase_no', Input::old('purchase_no'),['class'=>'form-control', 'style'=>'text-transform: uppercase;', 'required']) }}
</div>

{{--<div class='form-group'>
   {{ Form::label('inv_requisition_head_id', 'inv_requisition_head_id') }}
   {{ Form::select('inv_requisition_head_id', InvSupplier::GetSupplier(), Input::old('inv_requisition_head_id'),['class'=>'form-control', 'required']) }}
</div>--}}

<div class='form-group'>
   {{ Form::label('pay_terms', 'Pay Terms') }}
   {{ Form::select('pay_terms', ['cash'=>'cash', 'cheque'=>'cheque'], Input::old('pay_terms'),['class'=>'form-control', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('date', 'Date') }}
   {{ Form::text('date', Input::old('date'),['class'=>'form-control date_picker', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('note', 'Note') }}
   {{ Form::textarea('note', Input::old('note'),['onkeyup'=>"javascript:this.value=this.value.replace(/[<,>]/g,'');", 'size' => '30x5', 'class'=>'form-control']) }}
</div>

<div class='form-group'>
   {{ Form::label('requisition_type', 'Requisition Type') }}
   {{ Form::select('requisition_type', InvRequisitionHead::getRequisitionType(), Input::old('requisition_type'),['class'=>'form-control',  'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('status', 'status') }}
   {{ Form::select('status', InvRequisitionHead::getStatus(), Input::old('status'),['class'=>'form-control',  'required']) }}
</div>


{{ Form::submit('Save', array('class'=>'pull-right btn btn-info')) }}
<a href="" class="pull-right btn btn-default" style="margin-right: 5px">Close</a>

<p>&nbsp;</p>
@include('inventory::requisition_head._script')
