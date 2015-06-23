<div style="min-height: 400px;overflow: hidden;">
<div class='form-group'>
   {{ Form::label('user_id', 'User Name') }}
   {{ Form::select('user_id', User::FullNameWithRoleNameList() ,Input::old('user_id'),['class'=>'form-control', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('employee_id', 'Employee Id') }}
   {{ Form::text('employee_id', Input::old('employee_id'),['class'=>'form-control', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('date_of_joining', 'Date of Joining') }}
   {{ Form::text('date_of_joining', Input::old('date_of_joining'),['class'=>'form-control date_picker', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('date_of_confirmation', 'Date of Confirmation') }}
   {{ Form::text('date_of_confirmation', Input::old('date_of_confirmation'),['class'=>'form-control date_picker', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('hr_salary_grade_id', 'Salary Grade') }}
   {{ Form::select('hr_salary_grade_id',array('' => 'Select Salary Grade ') + HrSalaryGrade::SalaryGradeLists() ,Input::old('hr_salary_grade_id'),['class'=>'form-control', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('department_id', 'Departmnet') }}
   {{ Form::select('department_id',array('' => 'Select Departmnet ') + Department::GetDepartmentLists() ,Input::old('department_id'),['class'=>'form-control', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('designation_id', 'Designation') }}
   {{ Form::select('designation_id',array('' => 'Select Designation ') + Designation::GetDesignationLists() ,Input::old('designation_id'),['class'=>'form-control', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('hr_bank_id', 'Bank') }}
   {{ Form::select('hr_bank_id',array('' => 'Select Bank ') + HrBank::HrBankLists() ,Input::old('hr_bank_id'),['class'=>'form-control', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('bank_account_no', 'Bank Account') }}
   {{ Form::text('bank_account_no', Input::old('bank_account_no'),['class'=>'form-control', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('currency_id', 'Currency') }}
   {{ Form::select('currency_id',array('' => 'Select Currency ') + Currency::CurrencyLists() ,Input::old('currency_id'),['class'=>'form-control', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('exchange_rate', 'Exchange Rate') }}
   {{ Form::text('exchange_rate', Input::old('exchange_rate'),['class'=>'form-control', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('employee_type', 'Employee Type') }}
   {{ Form::select('employee_type', [''=>'Select Employee Type','permanent'=>'permanent', 'full-time'=>'full-time',
            'contractual'=>'contractual', 'part-time'=>'part-time','one-time'=>'one-time',
            'project'=>'project', 'support'=>'support'], Input::old('employee_type'),
            ['class'=>'form-control', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('employee_category', 'Employee Category') }}
   {{ Form::select('employee_category',[''=>'Select Employee Category','professional'=>'professional','auxiliary'=>'auxiliary',
        'technical'=>'technical'], Input::old('employee_category'),['class'=>'form-control', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('work_shift', 'Work Shift') }}
   {{ Form::select('work_shift',[''=>'Select Employee Work Shift','day'=>'day','evening'=>'evening','night'=>'night'] ,Input::old('work_shift'),['class'=>'form-control', 'required']) }}
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
   {{ Form::label('emergency_contact_relationship', 'Emergency Contact Relation') }}
   {{ Form::text('emergency_contact_relationship', Input::old('emergency_contact_relationship'),['class'=>'form-control', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('status', 'Status') }}
   {{ Form::text('status', Input::old('status'),['class'=>'form-control', 'required']) }}
</div>

{{ Form::submit('Save', array('class'=>'pull-right btn btn-info')) }}
<a href="" class="pull-right btn btn-default" style="margin-right: 5px">Close</a>

<p>&nbsp;</p>
</div>