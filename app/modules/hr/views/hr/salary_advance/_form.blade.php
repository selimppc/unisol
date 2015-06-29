<div class='form-group'>
   {{--{{ Form::label('hr_employee_id', 'Employee Name') }}--}}
   {{ Form::hidden('hr_employee_id', $selected_employee_id , Input::old('hr_employee_id'),['class'=>'form-control', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('title', 'Title') }}
   {{ Form::text('title',  Input::old('title'),['class'=>'form-control']) }}
</div>

<div class='form-group'>
   {{ Form::label('amount', 'Amount') }}
   {{ Form::text('amount', Input::old('amount'),['class'=>'form-control', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('date', 'Date') }}
   {{ Form::text('date', Input::old('date'),['class'=>'form-control date_picker', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('description', 'Description') }}
   {{ Form::textarea('description', Input::old('description'),['size' => '30x5','class'=>'form-control', 'required']) }}
</div>

{{ Form::submit('Save', array('class'=>'pull-right btn btn-info')) }}
<a href="" class="pull-right btn btn-default" style="margin-right: 5px">Close</a>

<p>&nbsp;</p>
