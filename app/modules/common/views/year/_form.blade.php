<div class='form-group'>
    <div>{{ Form::label('title', 'YearsName') }}</div>
    <div>{{ Form::text('title', Input::old('title'),['class'=>'form-control','spellcheck'=> 'true','required'=>'required']) }}
    </div>
</div>
<div class='form-group'>
    <div>{{ Form::label('description', 'Description') }}</div>
    <div>{{ Form::textarea('description', Input::old('description'),['class'=>'form-control','spellcheck'=> 'true','required'=>'required','size'=>'30x10']) }}</div>
</div>
<div>
    {{ Form::submit('Submit', array('class'=>'btn btn-primary')) }}
    <a href="{{URL::to('common/year/')}}" class="btn btn-default">Close </a>
    {{--<button type="button" class="close btn btn-default" data-dismiss="modal">Close</button>--}}
</div>