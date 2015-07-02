<div class='form-group'>
    <div>{{ Form::label('title', 'Title') }}</div>
    <div>{{ Form::text('title', Input::old('title'),['class'=>'form-control','spellcheck'=> 'true','required'=>'required']) }}
    </div>
</div>

<div class='form-group'>
    <div>{{ Form::label('description', 'Description') }}</div>
    <div>{{ Form::textarea('description', Input::old('description'),[
    'onkeyup'=>"javascript:this.value=this.value.replace(/[<,>]/g,'');",
    'class'=>'form-control input-sm','spellcheck'=> 'true','required'=>'required','size'=>'30x10']) }}</div>
</div>

<div class="modal-footer">
    {{ Form::submit('Submit', array('class'=>' btn btn-xs btn-success')) }}
    <button class=" btn btn-default btn-xs" data-dismiss="modal" type="button">Close</button>
</div>
