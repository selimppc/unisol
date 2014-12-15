    <fieldset>
                <div class="form-group">
                    <div class="span4">{{ Form::label('department_id', 'DepartmentName') }}</div>
                    <div class="span8">{{ Form::select('department_id', Department::orderBy('title')->lists('title', 'id'),'', ['class'=>'form-control span10']) }}</div>
                </div>
                <div class='form-group'>
                    <div class="span4">{{ Form::label('title', 'SubjectName') }}</div>
                    <div class="span8">{{ Form::text('title', Input::old('title'),['class'=>'form-control span10','required'=>'required']) }}</div>

                </div>

                <div class='form-group'>
                    <div class="span4">{{ Form::label('description', 'Description') }}</div>
                    <div class="span8">{{ Form::textarea('description', Input::old('description'),['class'=>'form-control span10','required'=>'required','size'=>'30x10']) }}</div>

                </div>

            {{ Form::submit('Submit', array('class'=>'btn btn-primary')) }}
            
       </fieldset>