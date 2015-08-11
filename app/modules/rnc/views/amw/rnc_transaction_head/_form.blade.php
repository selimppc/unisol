<div class='form-group'>
   {{ Form::label('user_id', 'User Name') }}
   {{ Form::select('user_id', $user_list , Input::old('user_id'),['class'=>'form-control', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('issue_date', 'Issue Date') }}
   {{ Form::text('issue_date', Input::old('issue_date'),['class'=>'form-control date_picker','place-holder'=>'ok', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('rnc_research_paper_id', 'Research Paper ') }}
   {{ Form::select('rnc_research_paper_id',$rnc_list ,null,['class'=>'form-control', 'required']) }}
</div>

{{ Form::submit('Save', array('class'=>'pull-right btn btn-info')) }}
<a href="" class="pull-right btn btn-default" style="margin-right: 5px">Close</a>

<p>&nbsp;</p>


{{ HTML::script('assets/js/custom.js')}}