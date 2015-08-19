
{{--<div class='form-group'>
   {{ Form::label('transfer_number', 'Transfer Number ') }}
   {{ Form::text('transfer_number', Input::old('transfer_number'),['class'=>'form-control', 'style'=>'text-transform: uppercase;', 'required']) }}
</div>--}}

<div class='form-group'>
   {{ Form::label('transfer_to', 'Transfer TO') }}
   {{ Form::select('transfer_to', Department::GetDepartmentLists(), Input::old('transfer_to'),['class'=>'form-control', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('date', 'Date') }}
   {{ Form::text('date', Input::old('date'),['class'=>'form-control date_picker', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('confirm_date', 'Confirm Date') }}
   {{ Form::text('confirm_date', Input::old('confirm_date'),['class'=>'form-control date_picker', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('note', 'Note') }}
   {{ Form::textarea('note', Input::old('note'),['onkeyup'=>"javascript:this.value=this.value.replace(/[<,>]/g,'');", 'size' => '30x5', 'class'=>'form-control']) }}
</div>

<div class='form-group'>
   {{ Form::label('status', 'status') }}
   {{ Form::select('status', ['open'=>'Open', 'close'=>'Close', 'pending-approval'=>'Pending Approval', 'approved'=>'Approved',  'transferred'=>'Transferred'], Input::old('status'),['class'=>'form-control',  'required']) }}
</div>


{{ Form::submit('Save', array('class'=>'pull-right btn btn-info')) }}
<a href="" class="pull-right btn btn-default" style="margin-right: 5px">Close</a>

<p>&nbsp;</p>
@include('inventory::requisition_head._script')
