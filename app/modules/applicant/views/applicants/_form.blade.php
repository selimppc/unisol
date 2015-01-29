
<fieldset style="padding: 10px; width: 90%;">
<div class="form-group">
{{ Form::label('user_id','user_id') }}
{{ Form::select('user_id', User::orderBy('username')->lists('username', 'id')+[''=>'Select Option'] ,'', ['class'=>'form-control']) }}
</div>

<div class='form-group'>

<div>{{ Form::label('fathers_name', 'fathers_name') }}</div>
<div>{{ Form::text('fathers_name', Input::old('fathers_name'),['class'=>'form-control']) }}</div>
</div>
<div class='form-group'>
<div>{{ Form::label('mothers_name', ' mothers_name') }}</div>
<div>{{ Form::text('mothers_name', Input::old('mothers_name'),['class'=>'form-control ']) }}</div>
</div>
<div class='form-group'>
<div>{{ Form::label('fathers_occupation', ' fathers_occupation') }}</div>
<div>{{ Form::text('fathers_occupation', Input::old('fathers_occupation'),['class'=>'form-control ']) }}</div>
</div>
<div class='form-group'>
<div>{{ Form::label('fathers_phone', ' fathers_phone') }}</div>
<div>{{ Form::text('fathers_phone', Input::old('fathers_phone'),['class'=>'form-control ']) }}</div>
</div>
<div class='form-group'>
<div>{{ Form::label('freedom_fighter', ' freedom_fighter') }}</div>
<div>{{ Form::text('freedom_fighter', Input::old('freedom_fighter'),['class'=>'form-control ']) }}</div>
</div>
<div class='form-group'>
<div>{{ Form::label('mothers_phone', ' mothers_phone') }}</div>
<div>{{ Form::text('mothers_phone', Input::old('mothers_phone'),['class'=>'form-control ']) }}</div>
</div>
<div class='form-group'>
<div>{{ Form::label('national_id', ' national_id') }}</div>
<div>{{ Form::text('national_id', Input::old('national_id'),['class'=>'form-control ']) }}</div>
</div>
<div class='form-group'>
<div>{{ Form::label('driving_license', ' driving_license') }}</div>
<div>{{ Form::text('driving_license', Input::old('driving_license'),['class'=>'form-control ']) }}</div>
</div>
<div class='form-group'>
<div>{{ Form::label('passport', ' passport') }}</div>
<div>{{ Form::text('passport', Input::old('passport'),['class'=>'form-control ']) }}</div>
</div>
<div class='form-group'>
<div>{{ Form::label('place_of_birth', ' place_of_birth') }}</div>
<div>{{ Form::text('place_of_birth', Input::old('place_of_birth'),['class'=>'form-control ']) }}</div>
</div>
<div class='form-group'>
<div>{{ Form::label('national_id', ' national_id') }}</div>
<div>{{ Form::text('national_id', Input::old('national_id'),['class'=>'form-control ']) }}</div>
</div>
<div class='form-group'>
<div>{{ Form::label('marital_status', ' marital_status') }}</div>
<div>{{ Form::text('marital_status', Input::old('marital_status'),['class'=>'form-control ']) }}</div>
</div>
<div class='form-group'>
<div>{{ Form::label('nationality', ' nationality') }}</div>
<div>{{ Form::text('nationality', Input::old('nationality'),['class'=>'form-control ']) }}</div>
</div>
<div class='form-group'>
<div>{{ Form::label('religion', ' religion') }}</div>
<div>{{ Form::text('religion', Input::old('religion'),['class'=>'form-control ']) }}</div>
</div>
<div class='form-group'>
<div>{{ Form::label('signature', ' signature') }}</div>
<div>{{ Form::text('signature', Input::old('signature'),['class'=>'form-control ']) }}</div>
</div>
<div class='form-group'>
<div>{{ Form::label('present_address', ' present_address') }}</div>
<div>{{ Form::text('present_address', Input::old('present_address'),['class'=>'form-control ']) }}</div>
</div>
<div class='form-group'>
<div>{{ Form::label('parmanent_address', ' parmanent_address') }}</div>
<div>{{ Form::text('parmanent_address', Input::old('parmanent_address'),['class'=>'form-control ']) }}</div>
</div>

{{ Form::submit('Save', array('class'=>'btn btn-primary')) }}
<a href="{{URL::to('applicant')}}" class="btn btn-default">Close </a>
</fieldset>