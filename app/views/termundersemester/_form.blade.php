  <div class="form-group">
    <div>{{ Form::label('degree_program_id', 'Degree/ProgramName') }}</div>
    <div>{{ Form::select('degree_program_id', [''=>'Select Option'] + DegreeProgram::orderBy('title')->lists('title', 'id'),'', ['class'=>'form-control']) }}</div>
    </div>
      <div class="form-group">
    <div>{{ Form::label('department_id', 'DepartmentName') }}</div>
    <div>{{ Form::select('department_id', [''=>'Select Option'] + Department::orderBy('title')->lists('title', 'id'),'', ['class'=>'form-control']) }}</div>
    </div>
      <div class="form-group">
    <div>{{ Form::label('year_id', 'YearName') }}</div>
    <div>{{ Form::select('year_id', [''=>'Select Option'] + Years::orderBy('title')->lists('title', 'id'),'', ['class'=>'form-control']) }}</div>
    </div>


    <div class="form-group">
    <div>{{ Form::label('semester_id', 'SemesterName') }}</div>
    <div>{{ Form::select('semester_id', [''=>'Select Option'] + Semester::orderBy('title')->lists('title', 'id'),'', ['class'=>'form-control']) }}</div>
    </div> 
  
    <!-- <div class="form-group">
    <div>{{ Form::label('start_date', 'StartDate') }}</div>
    <div>{{ Form::text('start_date', Input::old('start_date'),['class'=>'form-control','id'=>'datetimepicker1','input-group-addon','glyphicon glyphicon-calendar']) }}
    </div> -->

      <!-- <div class="form-group">
                <div class='input-group date' id='datetimepicker1'>
                    <input type='text' class="form-control" />
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
            </div>

      </div>-->
     <!--  <div class="form-group">
      <div class='input-group date' id='datetimepicker1'>
          <input type='text' class="form-control" />
          <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
          </span>
      </div>
      </div> -->


    <div>
        {{ Form::submit('Submit', array('class'=>'btn btn-primary')) }}
    </div>