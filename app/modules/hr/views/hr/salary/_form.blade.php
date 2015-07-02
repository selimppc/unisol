<div class='form-group'>
   {{ Form::label('hr_employee_id', 'Employee Name') }}
   {{ Form::select('hr_employee_id', $employee_name_list , Input::old('hr_employee_id'),['class'=>'form-control', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('salary_type', ' Salary Type') }}
   {{ Form::select('salary_type',[''=>'Select Your Salary Type','monthly'=>'monthly','weekly'=>'weekly','yearly'=>'yearly','hourly'=>'hourly'] ,Input::old('salary_type'),['class'=>'form-control', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('currency_id', 'Currency') }}
   {{ Form::select('currency_id', $lists_currency,Input::old('currency_id'),['class'=>'form-control', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('exchange_rate', 'Exchange Rate') }}
   {{ Form::text('exchange_rate',  Input::old('exchange_rate'),['class'=>'form-control']) }}
</div>

<div class='form-group'>
   {{ Form::label('gross', 'Gross') }}
   {{ Form::text('gross', Input::old('gross'),['class'=>'form-control', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('basic', 'Basic') }}
   {{ Form::text('basic', Input::old('basic'),['class'=>'form-control', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('status', 'Status') }}
   {{ Form::select('status',[''=>'Select Status','active'=>'active','close'=>'close'], Input::old('status'),['class'=>'form-control', 'required']) }}
</div>

{{ Form::submit('Save', array('class'=>'pull-right btn btn-info')) }}
<a href="" class="pull-right btn btn-default" style="margin-right: 5px">Close</a>

<p>&nbsp;</p>
