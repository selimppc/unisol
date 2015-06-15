
{{--<div class='form-group'>
   {{ Form::label('requisition_no', 'Requisition No ') }}
   {{ Form::text('requisition_no', Input::old('requisition_no'),['class'=>'form-control', 'style'=>'text-transform: uppercase;', 'required']) }}
</div>--}}

<div class='form-group'>
   {{ Form::label('account_code', 'Account Code') }}
   {{ Form::text('account_code',  Input::old('account_code'),['class'=>'form-control', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('description', 'Account Title') }}
   {{ Form::text('description', Input::old('description'),['class'=>'form-control', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('account_type', 'Account Type') }}
   {{ Form::select('account_type', [''=>'Select Account Type', 'asset'=>'Asset','liability'=>'Liability', 'income'=>'Income', 'expense'=>'Expense'], Input::old('account_type'),['class'=>'form-control',  'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('account_usage', 'Account Usage') }}
   {{ Form::select('account_usage', [''=>'Select Account Usage', 'ledger'=>'Ledger','ap'=>'AP', 'ar'=>'AR'], Input::old('account_usage'),['class'=>'form-control',  'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('group_one', 'Group One') }}
   {{ Form::text('group_one', Input::old('group_one'),[ 'class'=>'form-control', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('group_two', 'Group Two') }}
   {{ Form::text('group_two', Input::old('group_two'),[ 'class'=>'form-control', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('analytical_code', 'Analytical Code') }}
   {{ Form::select('analytical_code', [''=>'Select', 'non-cash'=>'non-cash','cash'=>'cash'], Input::old('analytical_code'),['class'=>'form-control',  'required']) }}
</div>



{{ Form::submit('Save', array('class'=>'pull-right btn btn-info')) }}
<a href="" class="pull-right btn btn-default" style="margin-right: 5px">Close</a>

<p>&nbsp;</p>
{{--@include('inventory::requisition_head._script')--}}

{{--
{{ HTML::script('assets/js/custom.js')}}
--}}

