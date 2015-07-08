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

<div class='form-group'>
    <div>{{ Form::label('initial', 'Initial') }}</div>
    <div>{{ Form::select('initial',array('' => 'Select One','adm' => 'adm', 'acm' => 'acm','aacm'=>'aacm'),'',['class'=>'form-control']) }}</div>
</div>

<div class='form-group'>
    <div>{{ Form::label('is_unit_qty', 'Is Unit Qty') }}</div>
    <div>{{ Form::text('is_unit_qty', Input::old('is_unit_qty'),['class'=>'form-control']) }}
    </div>
</div>

<div class="modal-footer">
    {{ Form::submit('Submit', array('class'=>' btn btn-success')) }}
    <button class=" btn btn-default" data-dismiss="modal" type="button">Close</button>
</div>
