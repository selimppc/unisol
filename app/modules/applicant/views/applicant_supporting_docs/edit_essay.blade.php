
<div style="padding: 20px;">


{{Form::open(array('url'=>'applicant/supporting_docs_essay/update/'.$supporting_docs->id, 'class'=>'form-horizontal','files'=>true))}}

{{ Form::label('essay', 'Essay :') }}<br>
{{ HTML::image('images/applicant_essay/' . $supporting_docs->essay) }}
<br><br>
{{ Form::label('essay', 'Select  :') }}
{{ Form::file('essay',array('multiple'=>true)) }}

<p>&nbsp;</p>
{{ Form::submit('Update', array('class'=>'btn btn-primary')) }}
<a href="" class="btn btn-default" span class="glyphicon-refresh">Close</a>
{{Form::close()}}
</div>


