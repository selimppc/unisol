
<div style="padding: 20px;">
<h4>Edit Profile Picture </h4>

{{Form::open(array('url'=>'applicant/profile_image/update/'.$profile->id, 'class'=>'form-horizontal','files'=>true))}}

{{ Form::label('profile_image', 'Profile Picture:') }}<br>
{{ HTML::image('images/applicant_profile/' . $profile->profile_image) }}
<br><br>
{{ Form::label('profile_image', 'Select Profile Picture :') }}
{{ Form::file('profile_image',array('multiple'=>true)) }}

<p>&nbsp;</p>
{{ Form::submit('change image', array('class'=>'btn btn-primary')) }}
<a href="" class="btn btn-default" span class="glyphicon-refresh">Close</a>
{{Form::close()}}
</div>

