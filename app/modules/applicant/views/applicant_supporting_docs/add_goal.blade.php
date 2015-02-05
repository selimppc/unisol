

<div style="padding: 20px;">


{{Form::open(array('url'=>'applicant/goal_statements/store', 'class'=>'form-horizontal','files'=>true))}}

<div class="form-group">
 {{ Form::label('applicant_id','Name of Applicant' ) }}
 {{ Form::select('applicant_id', Applicant::orderBy('username')->lists('username', 'id')+[''=>'Select Option'] ,'', ['class'=>'form-control']) }}
 </div>

 <div class='form-group'>
 <div>{{ Form::label('academic_goal_statement', 'academic_goal_statement') }}</div>
 <div>{{ Form::file('academic_goal_statement', Input::old('academic_goal_statement'),['class'=>'form-control']) }}</div>
 </div>

<p>&nbsp;</p>
{{ Form::submit('change image', array('class'=>'btn btn-primary')) }}
<a href="" class="btn btn-default" span class="glyphicon-refresh">Close</a>
{{Form::close()}}
</div>
