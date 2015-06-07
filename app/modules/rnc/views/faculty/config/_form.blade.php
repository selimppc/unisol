<div class='form-group'>
    <div>{{ Form::label('title', 'Config Name') }}</div>
    <div>{{ Form::text('title', Input::old('title'),['class'=>'form-control','spellcheck'=> 'true','required'=>'required']) }}</div>
</div>
<div class='form-group'>
    <div>{{ Form::label('value', 'Value') }}</div>
    <div>{{ Form::text('value', Input::old('value'),['class'=>'form-control','spellcheck'=> 'true','required'=>'required' ]) }}</div>
</div>

<div>
    {{ Form::submit('Submit', array('class'=>'btn btn-primary')) }}
    <a href="{{ URL::to('rnc/faculty/config/index') }}" class="btn btn-default">Close</a>
</div>
