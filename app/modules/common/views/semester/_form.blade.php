<fieldset style="padding: 10px; width: 90%;">
    <div class='form-group'>
        <div>{{ Form::label('title', 'Semester Name') }}</div>
        <div>{{ Form::text('title', Input::old('title'),['class'=>'form-control','spellcheck'=> 'true','required'=>'required']) }}</div>
    </div>
    <div class='form-group'>
        <div class='form-group'>
            <div>{{ Form::label('description', 'Description') }}</div>
            <div>{{ Form::textarea('description', Input::old('description'),['class'=>'form-control','spellcheck'=> 'true','required'=>'required','size'=>'30x10']) }}</div>
        </div>
    {{ Form::submit('Submit', array('class'=>'btn btn-primary')) }}
    <a href="{{URL::to('common/semester/')}}" class="btn btn-default">Close </a>
</fieldset>
