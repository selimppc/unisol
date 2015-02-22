
        <div class='form-group'>
        <div>{{ Form::label('title', 'ClassTitle') }}</div>
        <div>{{ Form::text('title', Input::old('title'),['class'=>'form-control','spellcheck'=> 'true','required'=>'required']) }}</div>
        </div>
        <div class='form-group'>
        <div>{{ Form::label('description', 'Description') }}</div>
        <div>{{ Form::textarea('description', Input::old('description'),['class'=>'form-control','spellcheck'=> 'true','required'=>'required','size'=>'30x10']) }}</div>
        </div>
        {{--This field will come from acm_class_schedule tb day filed--}}
        <div class='form-group'>
        <div>{{ Form::label('classtime', 'ClassTime') }}</div>
                <div>{{ Form::select('classtime',$date_time,Input::old('classtime'),['class'=>'form-control','required']) }}</div>
        </div>
        </div>

        <div class='form-group'>
                {{ Form::label('file', 'Upload File') }}
                {{ Form::file('file', ['multiple' => true], Input::old('file'), array('class'=>'form-control')) }}
        </div>

        <div class="modal-footer">
        {{ Form::submit('Submit', array('class'=>'btn btn-primary')) }}
        <a href="{{URL::previous()}}" class="btn btn-default">Close</a>
        </div>

