<div class='form-group'>
    {{ Form::label('title', 'Assignment Title') }}
    {{ Form::text('title', Input::old('title'),['class'=>'form-control','spellcheck'=> 'true','required'=>'required']) }}
</div>
<div class='form-group'>
    {{ Form::label('description', 'Description') }}
    {{ Form::textarea('description', Input::old('description'),['class'=>'form-control','spellcheck'=> 'true','required'=>'required','size'=>'30x10']) }}
</div>
<div class='form-group'>
    {{ Form::label('assignment_date_time', 'Assignment Date') }}
    {{ Form::select('class_time',$date_time,Input::old('class_time'),['class'=>'form-control','required']) }}
</div>
<div class='form-group'>
    {{ Form::label('images', 'Upload File') }}
    {{ Form::file('images[]', array('multiple'=>true)) }}
</div>
<div class="modal-footer">
    {{ Form::submit('Submit', array('class'=>'btn btn-primary')) }}
    <a href="{{URL::previous('academic/faculty/marks/dist/item/assignment/')}}" class="btn btn-default">Close</a>
</div>
