
{{--<div class='form-group'>
   {{ Form::label('adjust_no', 'Adjust Number ') }}
   {{ Form::text('adjust_no', Input::old('adjust_no'),['class'=>'form-control', 'style'=>'text-transform: uppercase;', 'required']) }}
</div>--}}

<div class='form-group'>
   {{ Form::label('date', 'Date') }}
   {{ Form::text('date', Input::old('date'),['class'=>'form-control date_picker', 'required']) }}
</div>

{{--<div class='form-group'>
   {{ Form::label('store', 'Store') }}
   {{ Form::text('store', Input::old('store'),['class'=>'form-control date_picker', 'required']) }}
</div>--}}

<div class='form-group'>
   {{ Form::label('type', 'Type') }}
   {{ Form::select('type', [''=>'Select Adjustment Type','negative'=>'Negative', 'positive'=>'Positive'],  Input::old('type'),['class'=>'form-control', 'required']) }}
</div>


{{--<div class='form-group'>
   {{ Form::label('confirm_date', 'Confirm Date') }}
   {{ Form::text('confirm_date', Input::old('confirm_date'),['class'=>'form-control date_picker', 'required']) }}
</div>--}}

<div class='form-group'>
   {{ Form::label('note', 'Note') }}
   {{ Form::textarea('note', Input::old('note'),['onkeyup'=>"javascript:this.value=this.value.replace(/[<,>]/g,'');", 'size' => '30x5', 'class'=>'form-control']) }}
</div>

{{--{{ Form::hidden('status', 'open') }}--}}

<div class='form-group'>
   {{ Form::label('status', 'status') }}
   {{ Form::select('status', ['open'=>'Open', 'cancel'=>'Cancel',], Input::old('status'),['class'=>'form-control',  'required']) }}
</div>

{{ Form::submit('Save', array('class'=>'pull-right btn btn-info')) }}
<a href="" class="pull-right btn btn-default" style="margin-right: 5px">Close</a>

<p>&nbsp;</p>
{{--@include('inventory::adjust_head._script')--}}
