
<div style="padding: 20px;">


{{Form::open(array('url'=>'applicant/supporting_docs/update/'.$supporting_docs->id, 'class'=>'form-horizontal','files'=>true))}}

{{ Form::label('academic_goal_statement', 'Profile :') }}<br>
{{ HTML::image('images/goal_statements/' . $supporting_docs->academic_goal_statement) }}
<br><br>
{{ Form::label('academic_goal_statement', 'Select  :') }}
{{ Form::file('academic_goal_statement',array('multiple'=>true)) }}

<p>&nbsp;</p>
{{ Form::submit('change image', array('class'=>'btn btn-primary')) }}
<a href="" class="btn btn-default" span class="glyphicon-refresh">Close</a>
{{Form::close()}}
</div>
