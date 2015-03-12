<fieldset style="padding: 10px; width: 90%;">



                <div class="form-group">
                       <strong> Degree: </strong> {{ $sbjct_dgre_name }}
                </div>

                <div class="form-group">
                        {{ Form::label('admtest_subject_id', 'Subject:') }}
                        {{ Form::select('admtest_subject_id',$admtest_subject_id,Input::old('subject') , array('class' => 'form-control','required'=>'required') ) }}
                </div>

                <div class="form-group">
                     {{ Form::label('description', 'Description') }}
                     {{ Form::textarea('description', Input::old('description'), ['size' => '40x6','class' => 'form-control']) }}
                </div>

                <div class="form-group">
                     {{ Form::label('marks', 'Total marks') }}
                     {{ Form::text('marks', Input::old('marks'), array('class' => 'form-control')) }}
                </div>

                {{--<div class="form-group">--}}
                     {{--{{ Form::label('qualify_marks', 'Qualify marks') }}--}}
                     {{--{{ Form::text('qualify_marks', Input::old('qualify_marks'), array('class' => 'form-control')) }}--}}
                {{--</div>--}}

                <div class="form-group">
                     {{ Form::label('duration', 'Duration in Minutes') }}
                     {{ Form::text('duration', Input::old('duration'), array('class' => 'form-control')) }}
                </div>
            {{ Form::submit('Submit', array('class' => 'btn btn-primary btn-xs')) }}
            <a href="{{ URL::previous() }}" class="btn btn-info btn-xs" style="text-align: left">Close </a>
</fieldset>
