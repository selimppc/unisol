
<div style="padding: 20px;">


                {{Form::open(array('url'=>'degreeprogram/store', 'class'=>'form-horizontal'))}}


                {{ Form::label('title','Degree Program Name:') }}
                {{ Form::text('title',Input::old('title'), array('class' => 'form-control')) }}


                 {{ Form::label('department_id', 'DeptName') }}
                 {{ Form::select('department_id',  Department::orderBy('title')->lists('title', 'id')+[''=>'Select Option'] ,'', ['class'=>'form-control']) }}

                 {{ Form::label('degree_level_id','Degree Level:') }}
                 {{ Form::select('degree_level_id',  DegreeLevel::orderBy('title')->lists('title', 'id')+[''=>'Select Option'] ,'', ['class'=>'form-control']) }}

                {{ Form::label('description', 'Description:') }}
                {{ Form::text('description',Input::old('description'),array('class' => 'form-control')) }}


                <p>&nbsp;</p>
                {{ Form::submit('Save', array('class'=>'btn btn-primary')) }}

                <a href="{{URL::to('degreeprogram/index')}}" class="btn btn-default">Close </a>

                {{Form::close()}}

        </div>