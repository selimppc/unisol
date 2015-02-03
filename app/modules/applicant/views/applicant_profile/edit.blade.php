
{{ HTML::script('assets/js/bootstrap-datepicker.js') }}
{{ HTML::style('assets/css/datepicker.css')}}
<div style="padding: 20px;">

<h3>Edit {{ Applicant::find($profile->applicant_id)->username; }}'s Profile </h3>

{{Form::open(array('url'=>'applicant/profile/update/'.$profile->id, 'class'=>'form-horizontal','files'=>true))}}

{{ Form::label('date_of_birth','Date of Birth:') }}
{{--{{ Form::text('date_of_birth',$profile->date_of_birth, array('class' => 'form-control')) }}--}}
{{ Form::text('date_of_birth',$profile->date_of_birth , array('type' => 'text', 'class' => 'form-control datepicker','placeholder' => 'Pick the date this task should be completed', 'id' => 'date')) }}

{{ Form::label('birth_place','Birth Place:') }}
{{ Form::text('birth_place', $profile->birth_place, array('class' => 'form-control')) }}

{{ Form::label('gender','Gender:') }}
{{ Form::select('gender', array('' => 'Select one',
           'Female' => 'Female', 'Male' => 'Male','Common'=>'Common'),$profile->gender,
           array('class' => 'form-control', 'required'=> true)) }}
<br>
{{ Form::label('profile_image', 'Profile Picture:') }}<br>
{{ HTML::image('images/applicant_profile/' . $profile->profile_image) }}
<br><br>
{{ Form::label('profile_image', 'Select Profile Picture to change :')  }}
{{ Form::file('profile_image',array('multiple'=>true)) }}
<br>
{{ Form::label('city','City:') }}
{{ Form::text('city',$profile->city, array('class' => 'form-control')) }}

{{ Form::label('state','State:') }}
{{ Form::text('state',$profile->state, array('class' => 'form-control')) }}

{{ Form::label('country','Country:') }}
{{ Form::select('country', array('' => 'Select one',
           'Bangladesh' => 'Bangladesh', 'India' => 'India','Japan'=>'Japan','Napal'=>'Napal'),$profile->country,
           array('class' => 'form-control', 'required'=> true)) }}


{{ Form::label('zip_code','Zip Code:') }}
{{ Form::text('zip_code',$profile->zip_code, array('class' => 'form-control')) }}


<p>&nbsp;</p>
{{ Form::submit('Save Changes', array('class'=>'btn btn-primary')) }}
<a href="" class="btn btn-default" span class="glyphicon-refresh">Close</a>
{{Form::close()}}
</div>

<script>
$(function() {
  // Enable Pickadate on an input field and
  // specifying date format for hidden input field
  $('#date').pickadate({
    formatSubmit : 'yyyy/mm/dd'
  });
});
</script>

{{--@stop--}}