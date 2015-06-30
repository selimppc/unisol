<div class='form-group'>
   {{ Form::hidden('hr_salary_transaction_id', $s_t_id , Input::old('hr_salary_transaction_id'),['class'=>'form-control', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('type', 'Type') }}
   {{ Form::select('type', array(''=>'Select Type','allowance'=>'Allowance','deduction'=>'Deduction','over-time'=>'Over Time','bonus'=>'Bonus','commission'=>'Commission'),Input::old('type'),['class'=>'form-control']) }}
</div>

<div class='form-group'>
   {{ Form::label('hr_salary_allowance_id', 'Salary Allowance') }}
   {{ Form::select('hr_salary_allowance_id',$salary_allowance_list ,null,['class'=>'form-control', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('hr_salary_deduction_id', 'Salary Deduction') }}
   {{ Form::select('hr_salary_deduction_id',$salary_deduction_list ,null,['class'=>'form-control', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('hr_over_time_id', 'Over Time') }}
   {{ Form::select('hr_over_time_id',$over_time_list ,null,['class'=>'form-control', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('hr_bonus_id', 'Bonus') }}
   {{ Form::select('hr_bonus_id',$bonus_list ,null,['class'=>'form-control', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('percentage', 'Percentage') }}
   {{ Form::text('percentage', Input::old('percentage'),['size' => '30x5','class'=>'form-control', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('amount', 'Amount') }}
   {{ Form::text('amount', Input::old('amount'),['class'=>'form-control', 'required']) }}
</div>

{{ Form::submit('Save', array('class'=>'pull-right btn btn-info')) }}
<a href="" class="pull-right btn btn-default" style="margin-right: 5px">Close</a>

<p>&nbsp;</p>
