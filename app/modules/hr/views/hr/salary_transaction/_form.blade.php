<div class='form-group'>
   {{ Form::label('hr_employee_id', 'Employee Name') }}
   {{ Form::select('hr_employee_id', $employee_name_list , Input::old('hr_employee_id'),['class'=>'form-control', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::hidden('trn_number', $salary_trn_no, Input::old('trn_number'),['class'=>'form-control']) }}
</div>

<div class='form-group'>
   {{ Form::label('date', 'Date') }}
   {{ Form::text('date', Input::old('date'),['class'=>'form-control date_picker', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('year_id', 'Year') }}
   {{ Form::select('year_id',$year_list ,null,['class'=>'form-control', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('period', 'Month') }}
   {{ Form::select('period', [''=>'Select Month','january'=>'January','february'=>'February','march'=>'March','april'=>'April','may'=>'May','june'=>'June','july'=>'July','august'=>'August','september'=>'September','october'=>'October','november'=>'November','december'=>'December'],Input::old('period'),['class'=>'form-control', 'required']) }}
</div>

{{--<div class='form-group'>--}}
   {{--{{ Form::label('total_amount', 'Total Amount') }}--}}
   {{--{{ Form::text('total_amount', 0,Input::old('total_amount'),['size' => '30x5','class'=>'form-control', 'required']) }}--}}
{{--</div>--}}

<div class='form-group'>
   {{ Form::label('status', 'Status') }}
   {{ Form::select('status',array(''=>'Select Status','open'=>'Open','ask-for-interview'=>'Ask For Interview','approved'=>'Approved','denied'=>'Denied','request-for-update'=>'Request For Update'), Input::old('status'),['class'=>'form-control', 'required']) }}
</div>


{{ Form::submit('Save', array('class'=>'pull-right btn btn-info')) }}
<a href="" class="pull-right btn btn-default" style="margin-right: 5px">Close</a>

<p>&nbsp;</p>
