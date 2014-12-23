<div style="padding: 20px;">
        <h3>Edit {{$degree_program->title}}</h3>

        {{Form::open(array('url'=>'degreeprogram/update/'.$degree_program->id, 'class'=>'form-horizontal'))}}


        {{ Form::label('degprorgam_name','Degree Program Name:') }}
        {{ Form::text('degprorgam_name',$degree_program->title, array('class' => 'form-control')) }}

        {{ Form::label('department_id', 'DeptName') }}
        {{ Form::select('department_id',[0=>'Select one'] + Department::lists('title', 'id'),$degree_program->department_id) }}

        {{ Form::label('degree_level_id','Degree Program Name:') }}
        {{ Form::select('degree_level_id',  DegreeLevel::orderBy('title')->lists('title', 'id')+[''=>'Select Option'] ,'', ['class'=>'form-control']) }}


        {{ Form::label('description', 'Description:') }}
        {{ Form::textarea('description',$degree_program->description, array('class' => 'form-control')) }}
        <p>&nbsp;</p>
        {{ Form::submit('Save Changes', array('class'=>'btn btn-primary')) }}
        {{ Form::submit('Close', array('class'=>'btn btn-primary')) }}

        {{Form::close()}}


</div>
