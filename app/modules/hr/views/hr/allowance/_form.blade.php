
<div class='form-group'>
   {{ Form::label('title', 'Title') }}
   {{ Form::text('title', Input::old('title'),['class'=>'form-control', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('code', 'Code') }}
   {{ Form::text('code', Input::old('code'),['class'=>'form-control', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('description', 'Description') }}
   {{ Form::textarea('description',  Input::old('description'),['size' => '30x5', 'class'=>'form-control']) }}
</div>

{{ Form::submit('Save', array('class'=>'pull-right btn btn-info')) }}
<a href="" class="pull-right btn btn-default" style="margin-right: 5px">Close</a>

<p>&nbsp;</p>
