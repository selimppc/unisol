<fieldset style="padding: 10px; width: 90%;">



                <div class="form-group">
                       <strong> Degree: </strong>
                </div>


                <div class="form-group">
                       <strong> Subject: </strong>
                </div>


                <div class="form-group">
                     {{ Form::label('description', 'Description') }}
                     {{ Form::text('description', Input::old('description'), array('class' => 'form-control')) }}
                </div>

                <div class="form-group">
                     {{ Form::label('marks', 'Total marks') }}
                     {{ Form::text('marks', Input::old('marks'), array('class' => 'form-control')) }}
                </div>


                <div class="form-group">
                     {{ Form::label('duration', 'Duration in Minutes') }}
                     {{ Form::text('duration', Input::old('duration'), array('class' => 'form-control')) }}
                </div>
            {{ Form::submit('Submit', array('class' => 'btn btn-primary btn-xs')) }}
            <a href="{{ URL::previous() }}" class="btn btn-info btn-xs" style="text-align: left">Close </a>
</fieldset>
