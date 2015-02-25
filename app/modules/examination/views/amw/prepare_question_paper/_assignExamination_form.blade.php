<fieldset style="padding: 10px; width: 90%;">

          <?php #$year_id = Year::lists('title', 'id'); ?>

                <div class="form-group">
                       {{ Form::label('title', 'Question Title') }}
                       {{ Form::Text('title', Input::old('title'), array('class' => 'form-control','required'=>'required')) }}
                </div>

                <div class="form-group">
                         {{ Form::label('examiner', 'Examiner') }}
                         {{ Form::select('examiner', Input::old('examiner'), array('class' => 'form-control','required'=>'required')) }}
                </div>

                <div class="form-group">
                         {{ Form::label('comments', 'Comments') }}
                         {{ Form::select('comments', Input::old('comments'), array('class' => 'form-control','required'=>'required')) }}
                </div>
            {{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
             <a href="{{URL::to('examination/amw/examination')}}" class="btn btn-default">Close </a>
</fieldset>
