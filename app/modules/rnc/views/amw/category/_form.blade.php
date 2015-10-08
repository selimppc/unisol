<div class='form-group'>
    <div>{{ Form::label('title', 'Category Name') }}<span class="text-danger">*</span></div>
    <div>{{ Form::text('title', Input::old('title'),['class'=>'form-control','spellcheck'=> 'true','required'=>'required']) }}
    </div>
</div>
<div class='form-group'>
    <div>{{ Form::label('description', 'Description') }}</div>
    <div>
        {{ Form::textarea('description', Input::old('description'),[
        'onkeyup'=>"javascript:this.value=this.value.replace(/[<,>]/g,'');",
         'class'=>'form-control','spellcheck'=> 'true','size'=>'30x10']) }}
    </div>
</div>

<div>
    {{ Form::submit('Submit', array('class'=>'btn btn-primary')) }}
    <a href="{{ URL::to('rnc/amw/category/index') }}" class="btn btn-default">Close</a>
</div>
