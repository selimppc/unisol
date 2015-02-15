
<div style="padding: 20px;">


{{Form::open(array('url'=>'applicant/extra_curricular/update/'.$extra_curricular->id, 'class'=>'form-horizontal'))}}

{{ Form::label('title','Title:') }}
{{ Form::text('title',$extra_curricular->title, array('class' => 'form-control')) }}

{{ Form::label('description','Description:') }}
{{ Form::text('description',$extra_curricular->description, array('class' => 'form-control')) }}

{{ Form::label('achivement','Achivement:') }}
{{ Form::text('achivement',$extra_curricular->achievement, array('class' => 'form-control')) }}

<p>&nbsp;</p>
{{ Form::submit('Save Changes', array('class'=>'btn btn-primary')) }}
<a href="" class="btn btn-default" span class="glyphicon-refresh">Close</a>
{{Form::close()}}
</div>
