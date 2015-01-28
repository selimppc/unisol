
<div style="padding: 20px;">
<h3>Edit {{$applicant->username}}</h3>
{{Form::open(array('url'=>'applicant/update/'.$applicant->id, 'class'=>'form-horizontal'))}}

{{ Form::label('user_id', 'Applicant ') }}
{{ Form::select('user_id',[0=>'Select one'] + User::lists('username', 'id'),$applicant->user_id) }}
<br>
{{ Form::label('fathers_name','Fathers name:') }}
{{ Form::text('fathers_name',$applicant->fathers_name, array('class' => 'form-control')) }}
<br>

{{ Form::label('mothers_name','mothers_name:') }}
{{ Form::text('mothers_name',$applicant->mothers_name, array('class' => 'form-control')) }}
<br>
{{ Form::label('fathers_occupation','Fathers name:') }}
{{ Form::text('fathers_occupation',$applicant->fathers_occupation, array('class' => 'form-control')) }}
<br>
{{ Form::label('freedom_fighter', 'freedom_fighter:') }}
{{ Form::text('freedom_fighter',$applicant->freedom_fighter, array('class' => 'form-control')) }}
<br>
{{ Form::label('mothers_occupation', 'mothers_occupation:') }}
{{ Form::text('mothers_occupation',$applicant->mothers_occupation, array('class' => 'form-control')) }}

<br>
{{ Form::label('mothers_phone', 'mothers_phone:') }}
{{ Form::text('mothers_phone',$applicant->mothers_phone, array('class' => 'form-control')) }}

<br>
{{ Form::label('national_id', 'national_id:') }}
{{ Form::text('national_id',$applicant->national_id, array('class' => 'form-control')) }}
<br>
{{ Form::label('driving_license', 'driving_license:') }}
{{ Form::text('driving_license',$applicant->driving_license, array('class' => 'form-control')) }}
<br>
{{ Form::label('passport', 'passport:') }}
{{ Form::text('passport',$applicant->passport, array('class' => 'form-control')) }}
<br>
{{ Form::label('religion', 'religion:') }}
{{ Form::text('religion',$applicant->religion, array('class' => 'form-control')) }}
<br>
{{ Form::label('signature', 'signature:') }}
{{ Form::text('signature',$applicant->signature, array('class' => 'form-control')) }}
<br>

{{ Form::label('present_address', 'present_address:') }}
{{ Form::textarea('present_address',$applicant->present_address, array('class' => 'form-control')) }}
<br>
{{ Form::label('parmanent_address', 'parmanent_address:') }}
{{ Form::textarea('parmanent_address',$applicant->parmanent_address, array('class' => 'form-control')) }}
<p>&nbsp;</p>
{{ Form::submit('Save Changes', array('class'=>'btn btn-primary')) }}
<a href="" class="btn btn-default" span class="glyphicon-refresh">Close</a>
{{Form::close()}}
</div>
