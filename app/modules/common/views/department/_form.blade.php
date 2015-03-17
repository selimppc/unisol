<fieldset style="padding: 10px; width: 90%;">
    <div class='form-group'>
        <div>{{ Form::label('title', 'Department Name') }}</div>
        <div>{{ Form::text('title', Input::old('title'),['class'=>'form-control']) }}</div>
    </div>
    <div class="form-group">
        <div>{{ Form::label('dept_head_user_id', 'Department Head') }}</div>
        <div>{{ Form::select('dept_head_user_id', $facultyList, Input::old('dept_head_user_id'),['class'=>'form-control','required']) }}</div>
    </div>
    <div class='form-group'>
        <div>{{ Form::label('description', ' Description') }}</div>
        <div>{{ Form::textarea('description', Input::old('description'),['class'=>'form-control ','spellcheck'=> 'true']) }}</div>
    </div>
    {{ Form::submit('Save', array('class'=>'btn btn-primary')) }}
    <a href="{{URL::to('common/department/')}}" class="btn btn-default">Close </a>
</fieldset>