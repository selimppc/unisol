<div class='form-group'>
   {{ Form::label('salary_from', 'Salary From') }}
   {{ Form::text('salary_from', Input::old('salary_from'),['class'=>'form-control', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('salary_to', 'Salary To') }}
   {{ Form::text('salary_to', Input::old('salary_tov'),['class'=>'form-control', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('tax', 'Tax') }}
   {{ Form::textarea('tax',  Input::old('tax'),['size' => '30x5', 'class'=>'form-control']) }}
</div>

<div class='form-group'>
   {{ Form::label('gender', 'Gender') }}
   {{ Form::text('gender', Input::old('gender'),['class'=>'form-control', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('nationality', 'Nationality') }}
   {{ Form::text('nationality', Input::old('nationality'),['class'=>'form-control', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('additional_tax_amount', 'Additional Tax Amount') }}
   {{ Form::text('additional_tax_amount', Input::old('additional_tax_amount'),['class'=>'form-control', 'required']) }}
</div>

{{ Form::submit('Save', array('class'=>'pull-right btn btn-info')) }}
<a href="" class="pull-right btn btn-default" style="margin-right: 5px">Close</a>

<p>&nbsp;</p>
