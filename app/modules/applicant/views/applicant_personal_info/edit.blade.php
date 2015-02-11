
<div style="padding: 20px;">


{{Form::open(array('url'=>'apt/personal_info/update/'.$applicant_personal_info->id, 'class'=>'form-horizontal'))}}

{{ Form::label('fathers_name','Fathers Name:') }}
{{ Form::text('fathers_name',$applicant_personal_info->fathers_name , array('type' => 'text', 'class' => 'form-control datepicker','placeholder' => 'Pick the date this task should be completed', 'id' => 'date')) }}

{{ Form::label('fathers_occupation','Fathers occupation:') }}
{{ Form::text('fathers_occupation', $applicant_personal_info->fathers_occupation, array('class' => 'form-control')) }}

{{ Form::label('mothers_name','Mothers name:') }}
{{ Form::text('mothers_name', $applicant_personal_info->mothers_name, array('class' => 'form-control')) }}

{{ Form::label('mothers_occupation','Mothers occupation:') }}
{{ Form::text('mothers_occupation', $applicant_personal_info->mothers_occupation, array('class' => 'form-control')) }}


{{ Form::label('national_id', 'National ID:') }}
{{ Form::text('national_id',$applicant_personal_info->national_id, array('class' => 'form-control')) }}

{{--{{ Form::label('gender','Gender:') }}--}}
{{--{{ Form::select('gender', array('' => 'Select one',--}}
           {{--'Female' => 'Female', 'Male' => 'Male'),$profile->gender,--}}
           {{--array('class' => 'form-control', 'required'=> true)) }}--}}

{{ Form::label('passport', 'Passport:') }}
{{ Form::text('passport',$applicant_personal_info->passport, array('class' => 'form-control')) }}
{{--{{ Form::label('state','State:') }}--}}
{{--{{ Form::text('state',$profile->state, array('class' => 'form-control')) }}--}}

{{--{{ Form::label('country','Country:') }}--}}
{{--{{ Form::text('country',$profile->country, array('class' => 'form-control')) }}--}}

{{--{{ Form::label('zip_code','Zip Code:') }}--}}
{{--{{ Form::text('zip_code',$profile->zip_code, array('class' => 'form-control')) }}--}}


<p>&nbsp;</p>
{{ Form::submit('Save Changes', array('class'=>'btn btn-primary')) }}
<a href="" class="btn btn-default" span class="glyphicon-refresh">Close</a>
{{Form::close()}}
</div>

