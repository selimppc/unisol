<div class='form-group'>
   {{--{{ Form::label('hr_salary_id', 'Employee Name') }}--}}
   {{ Form::text('hr_salary_id', $s_id , Input::old('hr_salary_id'),['class'=>'form-control', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('hr_allowance_id', 'Allowance Name') }}
   {{ Form::select('hr_allowance_id', $allowance_list , Input::old('hr_allowance_id'),['class'=>'form-control', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('title', 'Title') }}
   {{ Form::text('title', Input::old('title'),['class'=>'form-control']) }}
</div>

<div class='form-group'>
   {{ Form::label('is_percentage', 'Is Percentage ?') }}
   {{ Form::select('is_percentage',array('yes'=>'Yes','no'=>'No') , Input::old('is_percentage'),['class'=>'form-control']) }}
</div>

<div class='form-group'>
   {{ Form::label('percentage', 'Percentage(%)') }}
   {{ Form::text('percentage', Input::old('percentage'),['class'=>'form-control', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('allowance_type', 'Allowance Type') }}
   {{ Form::select('allowance_type' , array(''=>'Select Allowance Type','%-of-basic'=>'% of Basic','fixed-amount'=>'Fixed Amount') , Input::old('allowance_type'),['class'=>'form-control', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('amount', 'Amount') }}
   {{ Form::text('amount', Input::old('amount'),['class'=>'form-control', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('status', 'Description') }}
   {{ Form::select('status',array(''=>'Select Status','active'=>'active','close'=>'close'), Input::old('status'),['class'=>'form-control', 'required']) }}
</div>


{{ Form::submit('Save', array('class'=>'pull-right btn btn-info')) }}
<a href="" class="pull-right btn btn-default" style="margin-right: 5px">Close</a>

<p>&nbsp;</p>
