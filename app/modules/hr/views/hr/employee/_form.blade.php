<div class="row">
     <div class="col-sm-12">
      <div class="col-sm-6">
        <div class='form-group'>
           {{ Form::label('user_id', 'User Name') }}
           {{ Form::select('user_id', $user_list ,Input::old('user_id'),['class'=>'form-control', 'required']) }}
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
           {{ Form::select('hr_salary_grade_id', $salary_grade ,Input::old('hr_salary_grade_id'),['class'=>'form-control', 'required']) }}
        </div>

        <div class='form-group'>
           {{ Form::label('department_id', 'Departmnet') }}
           {{ Form::select('department_id', $depart ,Input::old('department_id'),['class'=>'form-control', 'required']) }}
        </div>

        <div class='form-group'>
           {{ Form::label('designation_id', 'Designation') }}
           {{ Form::select('designation_id', $designation ,Input::old('designation_id'),['class'=>'form-control', 'required']) }}
        </div>

        <div class='form-group'>
           {{ Form::label('hr_bank_id', 'Bank') }}
           {{ Form::select('hr_bank_id', $bank ,Input::old('hr_bank_id'),['class'=>'form-control', 'required']) }}
        </div>

        <div class='form-group'>
           {{ Form::label('bank_account_no', 'Bank Account') }}
           {{ Form::text('bank_account_no', Input::old('bank_account_no'),['class'=>'form-control', 'required']) }}
        </div>
    </div>
    <div class="col-sm-6">
        <div class='form-group'>
           {{ Form::label('currency_id', 'Currency') }}
           {{ Form::select('currency_id',$currency ,Input::old('currency_id'),['class'=>'form-control', 'required']) }}
        </div>

        <div class='form-group'>
           {{ Form::label('exchange_rate', 'Exchange Rate') }}
           {{ Form::text('exchange_rate', Input::old('exchange_rate'),['class'=>'form-control', 'required']) }}
        </div>

        <div class='form-group'>
           {{ Form::label('employee_type', 'Employee Type') }}
           {{ Form::select('employee_type', [''=>'Select Employee Type','permanent'=>'Permanent', 'full-time'=>'Full Time',
                    'contractual'=>'Contractual', 'part-time'=>'Part Time','one-time'=>'One Time',
                    'project'=>'Project', 'support'=>'Support'], Input::old('employee_type'),
                    ['class'=>'form-control', 'required']) }}
        </div>

        <div class='form-group'>
           {{ Form::label('employee_category', 'Employee Category') }}
           {{ Form::select('employee_category',[''=>'Select Employee Category','professional'=>'Professional','auxiliary'=>'Auxiliary',
                'technical'=>'Technical'], Input::old('employee_category'),['class'=>'form-control', 'required']) }}
        </div>

        <div class='form-group'>
           {{ Form::label('work_shift', 'Work Shift') }}
           {{ Form::select('work_shift',[''=>'Select Employee Work Shift','day'=>'Day','evening'=>'Evening','night'=>'Night'] ,Input::old('work_shift'),['class'=>'form-control', 'required']) }}
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
           {{ Form::select('status', [''=>'Select Status','active'=>'Active','cancel'=>'Cancel'],Input::old('status'),['class'=>'form-control', 'required']) }}
        </div>
    </div>

    {{ Form::submit('Save', array('class'=>'btn btn-info','style'=>'margin: 30px 0px 0px 370px;')) }}
    <a href="" class="btn btn-default" style="margin: 30px 0px 0px 20px">Close</a>

    <p>&nbsp;</p>
    </div>
</div>