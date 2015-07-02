<div class='form-group'>
   {{ Form::label('hr_employee_id', 'Employee Name') }}
   {{ Form::select('hr_employee_id', $employee_name_list , Input::old('hr_employee_id'),['class'=>'form-control', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('sign_in', 'Sign In') }}
   {{ Form::text('sign_in',  Input::old('sign_in'),['class'=>'form-control date_picker','id'=>'datetimepicker1']) }}
</div>

<div class='form-group'>
   {{ Form::label('sign_out', 'Sign Out') }}
   {{ Form::text('sign_out',  Input::old('sign_out'),['class'=>'form-control date_picker']) }}
</div>

<div class='form-group'>
   {{ Form::label('type', 'Type') }}
   {{ Form::select('type',[''=>'Select Status','active'=>'active','close'=>'close'], Input::old('type'),['class'=>'form-control', 'required']) }}
</div>


{{ Form::submit('Save', array('class'=>'pull-right btn btn-info')) }}
<a href="" class="pull-right btn btn-default" style="margin-right: 5px">Close</a>

<p>&nbsp;</p>
