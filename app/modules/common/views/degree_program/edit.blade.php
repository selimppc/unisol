<div style="padding: 20px;">
        <h3>Edit {{$degree_program->title}}</h3>

        {{Form::open(array('url'=>'degreeprogram/update/'.$degree_program->id, 'class'=>'form-horizontal'))}}

        {{ Form::label('title','Degree Program Name:') }}
        {{ Form::text('title',$degree_program->title, array('class' => 'form-control')) }}
         <br>
        {{ Form::label('department_id', 'DeptName') }}
        {{ Form::select('department_id',[0=>'Select one'] + Department::lists('title', 'id'),$degree_program->department_id) }}
         <br>
        {{ Form::label('degree_level_id','Degree Level:') }}
        {{ Form::select('degree_level_id',  DegreeLevel::lists('title', 'id')+[''=>'Select Option'] ,$degree_program->degree_level_id) }}
         <br>
        {{ Form::label('description', 'Description:') }}
        {{ Form::textarea('description',$degree_program->description, array('class' => 'form-control')) }}
         <br>
        <p>&nbsp;</p>

        {{ Form::submit('Save Changes', array('class'=>'btn btn-primary')) }}
        <a href="" class="btn btn-default" span class="glyphicon-refresh">Close</a>

        {{Form::close()}}

</div>
