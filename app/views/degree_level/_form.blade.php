
    <fieldset style="padding: 10px; width: 90%;">
                <div class="form-group">
                    <div>{{ Form::label('department_id', 'DepartmentName') }}</div>
                    <div>{{ Form::select('department_id', [''=>'Select Option'] + Department::orderBy('title')->lists('title', 'id'),'', ['class'=>'form-control']) }}</div>
                </div>
                <div class='form-group'>
                    <div>{{ Form::label('title', 'DegreeName') }}</div>
                    <div>{{ Form::text('title', Input::old('title'),['class'=>'form-control']) }}</div>

                </div>

                <div class='form-group'>
                    <div>{{ Form::label('description', 'Description') }}</div>
                    <div>{{ Form::textarea('description', Input::old('description'),['class'=>'form-control ']) }}</div>

                </div>

            {{ Form::submit('Submit', array('class'=>'btn btn-primary')) }}

              <a href="{{URL::to('degree_level/')}}" class="btn btn-default">Close </a>

    </fieldset>
