<div class="form-group">
    <div>{{ Form::label('department_id', 'DepartmentName') }}</div>
    <div>{{ Form::select('department_id', [''=>'Select Option'] + Department::orderBy('title')->lists('title', 'id'),'', ['class'=>'form-control']) }}</div>
</div>
<div class='form-group'>
    <div>{{ Form::label('title', 'SubjectName') }}</div>
    <div>{{ Form::text('title', Input::old('title'),['class'=>'form-control','spellcheck'=> 'true','required'=>'required']) }}</div>
</div>
<div class='form-group'>
    <div>{{ Form::label('description', 'Description') }}</div>
    <div>{{ Form::textarea('description', Input::old('description'),['class'=>'form-control','spellcheck'=> 'true','required'=>'required','size'=>'30x10']) }}</div>
</div>
<div>
    {{ Form::submit('Submit', array('class'=>'btn btn-primary')) }}
    <a href="{{URL::to('common/subject/list')}}" class="btn btn-default">Close </a>
</div>