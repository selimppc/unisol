<div class='form-group'>
    <div>{{ Form::label('title', 'Title') }}</div>
    <div>{{ Form::text('title', Input::old('title'),['class'=>'form-control','spellcheck'=> 'true','required'=>'required']) }}</div>

</div>
<div>
    {{ Form::submit('Submit', array('class'=>'btn btn-primary')) }}
    <a href="{{URL::to('academic/amw/')}}" class="btn btn-default">Close </a>
</div>

