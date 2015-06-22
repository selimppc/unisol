
<div class='form-group'>
   {{ Form::label('bank_name', 'Bank Name') }}
   {{ Form::text('bank_name', Input::old('bank_name'),['class'=>'form-control', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('branch', 'Branch') }}
   {{ Form::text('branch', Input::old('branch'),['class'=>'form-control', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('address', 'Address') }}
   {{ Form::textarea('address',  Input::old('address'),['size' => '30x5', 'class'=>'form-control']) }}
</div>

{{ Form::submit('Save', array('class'=>'pull-right btn btn-info')) }}
<a href="" class="pull-right btn btn-default" style="margin-right: 5px">Close</a>

<p>&nbsp;</p>
