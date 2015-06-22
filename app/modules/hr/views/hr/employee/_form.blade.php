<div style="min-height: 400px;overflow: hidden;">
<div class='form-group'>
   {{ Form::label('employee_id', 'Employee Id') }}
   {{ Form::text('employee_id', Input::old('employee_id'),['class'=>'form-control', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('date_of_joining', 'Date of Joining') }}
   {{ Form::text('date_of_joining', Input::old('date_of_joining'),['class'=>'form-control', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('date_of_confirmation', 'Date of Confirmation') }}
   {{ Form::text('date_of_confirmation', Input::old('date_of_confirmation'),['class'=>'form-control', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('hr_salary_grade_id', 'Salary Grade') }}
   {{ Form::text('hr_salary_grade_id', Input::old('hr_salary_grade_id'),['class'=>'form-control', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('department_id', 'Departmnet') }}
   {{ Form::text('department_id', Input::old('department_id'),['class'=>'form-control', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('designation_id', 'Designation') }}
   {{ Form::text('designation_id', Input::old('designation_id'),['class'=>'form-control', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('hr_bank_id', 'Bank') }}
   {{ Form::text('hr_bank_id', Input::old('hr_bank_id'),['class'=>'form-control', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('bank_account_no', 'Bank Account') }}
   {{ Form::text('bank_account_no', Input::old('bank_account_no'),['class'=>'form-control', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('currency_id', 'Currency') }}
   {{ Form::text('currency_id', Input::old('currency_id'),['class'=>'form-control', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('exchange_rate', 'Exchange Rate') }}
   {{ Form::text('exchange_rate', Input::old('exchange_rate'),['class'=>'form-control', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('employee_type', 'Employee Type') }}
   {{ Form::text('employee_type', Input::old('employee_type'),['class'=>'form-control', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('employee_category', 'Employee Category') }}
   {{ Form::text('employee_category', Input::old('employee_category'),['class'=>'form-control', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('work_shift', 'Work Shift') }}
   {{ Form::text('work_shift', Input::old('work_shift'),['class'=>'form-control', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('emergency_contact_person', 'Emergency Contact Person') }}
   {{ Form::text('emergency_contact_person', Input::old('emergency_contact_person'),['class'=>'form-control', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('emergency_contact_number', 'Emergency Contact Number') }}
   {{ Form::text('emergency_contact_number', Input::old('emergency_contact_number'),['class'=>'form-control', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('emergency_contact_relation', 'Emergency Contact Relation') }}
   {{ Form::text('emergency_contact_relation', Input::old('emergency_contact_relation'),['class'=>'form-control', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('status', 'Status') }}
   {{ Form::text('status', Input::old('status'),['class'=>'form-control', 'required']) }}
</div>

{{ Form::submit('Save', array('class'=>'pull-right btn btn-info')) }}
<a href="" class="pull-right btn btn-default" style="margin-right: 5px">Close</a>

<p>&nbsp;</p>
</div>