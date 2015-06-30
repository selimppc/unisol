<div class='form-group'>
   {{ Form::hidden('hr_loan_head_id',$loan_head_id , Input::old('hr_loan_head_id'),['class'=>'form-control']) }}
</div>

<div class='form-group'>

   {{ Form::hidden('hr_employee_id',$employee_id, Input::old('hr_employee_id'),['class'=>'form-control']) }}
</div>

{{--$employee--}}

<div class='form-group'>
   {{ Form::label('title', 'Title') }}
   {{ Form::text('title',  Input::old('title'),['class'=>'form-control']) }}
</div>

<div class='form-group'>
   {{ Form::label('type', 'Type') }}
   {{ Form::select('type', array('loan'=>'Loan','salary-advance'=>'Salary Advance','tax'=>'Tax','other'=>'Other'),Input::old('type'),['class'=>'form-control']) }}
</div>

<div class='form-group'>
   {{ Form::label('hr_salary_advance_id', 'Salary Advance') }}
   {{ Form::select('hr_salary_advance_id',$salary_advance_list , Input::old('hr_salary_advance_id'),['class'=>'form-control']) }}
</div>

<div class='form-group'>
   {{ Form::label('amount', 'Amount') }}
   {{ Form::text('amount',  Input::old('amount'),['class'=>'form-control']) }}
</div>

<div class='form-group'>
   {{ Form::label('date', 'Date') }}
   {{ Form::text('date',  Input::old('date'),['class'=>'form-control date_picker']) }}
</div>

<div class='form-group'>
   {{ Form::label('status', 'Status') }}
   {{ Form::select('status', array('active'=>'Active','close'=>'Close') ,Input::old('status'),['class'=>'form-control']) }}
</div>

{{ Form::submit('Save', array('class'=>'pull-right btn btn-info')) }}
<a href="" class="pull-right btn btn-default" style="margin-right: 5px">Close</a>

<p>&nbsp;</p>
