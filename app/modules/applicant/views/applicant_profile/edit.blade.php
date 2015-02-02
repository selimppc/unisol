
<div style="padding: 20px;">


{{Form::open(array('url'=>'applicant/profile/update/'.$profile->id, 'class'=>'form-horizontal'))}}

{{ Form::label('date_of_birth','date_of_birth:') }}
{{--{{ Form::text('date_of_birth',$profile->date_of_birth, array('class' => 'form-control')) }}--}}

 {{ Form::text('date_of_birth',$profile->date_of_birth , array('type' => 'text', 'class' => 'form-control datepicker','placeholder' => 'Pick the date this task should be completed', 'id' => 'date')) }}

{{ Form::label('birth_place','birth_place:') }}
{{ Form::text('birth_place',$profile->birth_place, array('class' => 'form-control')) }}

{{ Form::label('gender','gender:') }}
{{--{{ Form::select('gender',[0=>'Select one'] + User::lists('username', 'id'),$applicant->user_id) }}--}}

{{ Form::select('gender', array('0' => 'Select one',
           '1' => 'Female', '2' => 'Male'),$profile->gender,
           array('class' => 'form-control')) }}


{{ Form::label('city','city:') }}
{{ Form::text('city',$profile->city, array('class' => 'form-control')) }}

{{ Form::label('state','state:') }}
{{ Form::text('state',$profile->state, array('class' => 'form-control')) }}



{{ Form::label('country','country:') }}
{{ Form::text('country',$profile->country, array('class' => 'form-control')) }}


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