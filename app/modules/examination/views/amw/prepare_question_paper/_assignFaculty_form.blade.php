<fieldset style="padding: 10px; width: 90%;">

                <div class="form-group">
                      <strong>Question Title : </strong> {{ $data->title }}
                </div>

                <div class="form-group">
                         {{ Form::label('examiner', 'Examiner') }}
                         {{ Form::text('examiner', Input::old('examiner'), array('class' => 'form-control','required'=>'required')) }}
                </div>

                <div class="form-group">
                         {{ Form::label('comments', 'Comments') }}
                         {{ Form::text('comments', Input::old('comments'), array('class' => 'form-control','required'=>'required')) }}
                </div>
            {{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
             <a href="{{URL::previous('examination/amw/index/')}}" class="btn btn-default btn-xs">Close </a>
</fieldset>
