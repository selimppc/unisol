  <div class="form-group">
    <div class="col-sm-4">{{ Form::label('degree_program_id', 'Degree/ProgramName') }}</div>
    <div class="col-sm-8">{{ Form::select('degree_program_id', [''=>'Select Option'] + DegreeProgram::orderBy('title')->lists('title', 'id'),Input::old('degree_program_id'), ['class'=>'form-control']) }}</div>
  </div>

  <div class="form-group">
    <div class="col-sm-4">{{ Form::label('department_id', 'DepartmentName') }}</div>
    <div class="col-sm-8">{{ Form::select('department_id', [''=>'Select Option'] + Department::orderBy('title')->lists('title', 'id'),Input::old('department_id'), ['class'=>'form-control']) }}</div>
  </div>
  <div class="form-group">
    <div class="col-sm-4">{{ Form::label('year_id', 'YearName') }}</div>
    <div class="col-sm-8">{{ Form::select('year_id', [''=>'Select Option'] + Year::orderBy('title')->lists('title', 'id'),Input::old('year_id'), ['class'=>'form-control']) }}</div>
  </div>


    <div class="form-group">
    <div class="col-sm-4">{{ Form::label('semester_id', 'SemesterName') }}</div>
    <div class="col-sm-8">{{ Form::select('semester_id', [''=>'Select Option'] + Semester::orderBy('title')->lists('title', 'id'),Input::old('semester_id'), ['class'=>'form-control']) }}</div>
    </div>

    <div class="form-group">
      <div class="col-sm-4">{{ Form::label('start_date', 'Start Date') }}</div>
      <div class="col-sm-8">{{ Form::text('start_date', Input::old('start_date'), ['class'=> 'form-control datepicker']) }}</div>
    </div>

    <div class="form-group">
      <div class="col-sm-4">{{ Form::label('end_date', 'End Date') }}</div>
      <div class="col-sm-8 input-append">
        {{ Form::text('end_date', Input::old('end_date'), ['class'=> 'form-control datepicker']) }}
        <span class="add-on">
          <i data-time-icon="icon-time" data-date-icon="icon-calendar">
          </i>
        </span>
      </div>
    </div>

    <div>
        {{ Form::submit('Submit', array('class'=>'btn btn-primary')) }}
    </div>