
<div class='form-group'>
   {{ Form::label('title', 'Title') }}
   {{ Form::text('title', Input::old('title'),['class'=>'form-control', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('description', 'Description') }}
   {{ Form::textarea('description', Input::old('description'),['onkeyup'=>"javascript:this.value=this.value.replace(/[<,>]/g,'');", 'size' => '30x5', 'class'=>'form-control']) }}
</div>



<div class='form-group'>
   {{ Form::label('support_name', 'Support Name') }}
   {{ Form::text('support_name', Input::old('support_name'),[ 'class'=>'form-control', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('support_email', 'Support Email') }}
   {{ Form::text('support_email', Input::old('support_email'),['class'=>'form-control',  'required']) }}
</div>

<div class="form-group">
   {{ Form::label('support_user_id', 'Support User') }}
   {{ Form::select('support_user_id', User::CfoList(),Input::old('support_user_id'), array('class' => 'form-control','required'=>'required') ) }}
</div>

<p>&nbsp;</p>
{{ Form::submit('Save', array('class'=>'pull-right btn btn-info')) }}
<a href="" class="pull-right btn btn-default" style="margin-right: 5px">Close</a>

<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>