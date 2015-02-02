

<div style="padding: 20px;">

{{Form::open(array('url'=>'applicant/profile_image/update/'.$profile->id, 'class'=>'form-horizontal','files'=>true))}}

  <tr>
      <td>profile_image</td>
      <td>{{ HTML::image('applicant_images/' . $profile->profile_image) }}</td>
  </tr>

{{ Form::file('profile_image',array('multiple'=>true)) }}

<p>&nbsp;</p>
{{ Form::submit('change image', array('class'=>'btn btn-primary')) }}
<a href="" class="btn btn-default" span class="glyphicon-refresh">Close</a>
{{Form::close()}}
</div>

