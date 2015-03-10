<fieldset style="padding: 10px; width: 90%;">

               {{ Form::text('degree_id', $degree_id) }}

                <div class="form-group">
                       <strong> Degree: </strong>{{ Degree::getDegreeName($degree_id) }}
                </div>


                <div class="form-group">
                       <strong> Department: </strong>{{ $data  }}
                </div>


                <div class="form-group">
                        {{ Form::label('type', 'Examiner Type :') }}
                        {{ Form::select('type',['Question Setter'=>'QS','Question Evaluator'=>'QE','Both'=>'BOTH'],array('class' => 'form-control','required'=>'required') ) }}
                </div>

                <div class="form-group">
                        {{ Form::label('user_id', 'Name of Faculty:') }}
                        {{ Form::select('user_id', User::FacultyList(), array('class' => 'form-control','required'=>'required') ) }}
                </div>
                <div class="form-group">
                         {{ Form::label('comment', 'Comment:') }}
                         {{ Form::textarea('comment', Null, ['size' => '40x6','placeholder'=>'Your Comments Here']) }}
                </div>
            {{ Form::submit('Submit', array('class' => 'btn btn-primary btn-xs')) }}
            <a href="{{ URL::previous() }}" class="btn btn-info btn-xs" style="text-align: left">Close </a>
</fieldset>
