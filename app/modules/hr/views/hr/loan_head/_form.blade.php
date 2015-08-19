<div class='form-group'>
   {{ Form::label('hr_employee_id', 'Employee Name') }}
   {{ Form::select('hr_employee_id', $employee_name_list , Input::old('hr_employee_id'),['class'=>'form-control', 'required']) }}
</div>
<div class='form-group'>
   {{ Form::label('title', 'Title') }}
   {{ Form::text('title',  Input::old('title'),['class'=>'form-control']) }}
</div>

<div class='form-group'>
   {{ Form::label('loan_amount', 'Loan Amount') }}
   {{ Form::text('loan_amount', Input::old('loan_amount'),['class'=>'form-control', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('loan_date', 'Loan Date') }}
   {{ Form::text('loan_date', Input::old('loan_date'),['class'=>'form-control date_picker', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('monthly_repayment_amount', 'Monthly Repayment Amount') }}
   {{ Form::text('monthly_repayment_amount', Input::old('monthly_repayment_amount'),['class'=>'form-control', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('payment_start_date', 'Payment Start Date') }}
   {{ Form::text('payment_start_date', Input::old('payment_start_date'),['class'=>'form-control date_picker', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('description', 'Description') }}
   {{ Form::textarea('description', Input::old('description'),['size'=>'30x5','class'=>'form-control', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('number_of_installment', 'Number Of Installment') }}
   {{ Form::text('number_of_installment', Input::old('number_of_installment'),['class'=>'form-control', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('status', 'Status') }}
   {{ Form::select('status',[''=>'Select Status','new'=>'New','running'=>'Running','complete'=>'Complete'], Input::old('status'),['class'=>'form-control', 'required']) }}
</div>

{{ Form::submit('Save', array('class'=>'pull-right btn btn-info')) }}
<a href="" class="pull-right btn btn-default" style="margin-right: 5px">Close</a>

<p>&nbsp;</p>
