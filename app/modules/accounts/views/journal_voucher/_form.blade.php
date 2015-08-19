
{{--<div class='form-group'>
   {{ Form::label('requisition_no', 'Requisition No ') }}
   {{ Form::text('requisition_no', Input::old('requisition_no'),['class'=>'form-control', 'style'=>'text-transform: uppercase;', 'required']) }}
</div>--}}

<div class='form-group'>
   {{ Form::label('date', 'Date') }}
   {{ Form::text('date',  Input::old('date'),['class'=>'form-control date_picker', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('reference', 'Reference') }}
   {{ Form::textarea('reference', Input::old('reference'),['size' => '30x4', 'class'=>'form-control', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('year_id', 'Year') }}
   {{ Form::select('year_id', $year, Input::old('year_id'),['class'=>'form-control',  'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('period', 'Period') }}
   {{ Form::select('period', $period, Input::old('account_usage'),['class'=>'form-control',  'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('note', 'Note') }}
   {{ Form::textarea('note', Input::old('note'),['size' => '30x4', 'class'=>'form-control', 'required']) }}
</div>

{{Form::hidden('status', 'open')}}



{{ Form::submit('Save', array('class'=>'pull-right btn btn-info')) }}
<a href="" class="pull-right btn btn-default" style="margin-right: 5px">Close</a>

<p>&nbsp;</p>
{{--@include('inventory::requisition_head._script')--}}

{{--
{{ HTML::script('assets/js/custom.js')}}
--}}

