
<div class='form-group'>
   {{ Form::label('code', 'Transaction Code') }}
   {{ Form::text('code', Input::old('code'),['class'=>'form-control', 'style'=>'text-transform: uppercase;', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('company_name', 'Transaction Name') }}
   {{ Form::text('title', Input::old('title'),['class'=>'form-control', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('last_number', 'Last Number') }}
   {{ Form::text('last_number', Input::old('last_number'),['class'=>'form-control', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('increment', 'Increment') }}
   {{ Form::text('increment',  Input::old('increment'),['class'=>'form-control',  'required']) }}
</div>


{{ Form::submit('Save', array('class'=>'pull-right btn btn-info')) }}
<a href="" class="pull-right btn btn-default" style="margin-right: 5px">Close</a>

<p>&nbsp;</p>
@include('inventory::setup._script')