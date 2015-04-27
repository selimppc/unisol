        <div class='form-group'>
                {{ Form::label('title', 'Title') }}
                {{ Form::text('title', Input::old('title'),['class'=>'form-control','spellcheck'=> 'true','required'=>'required']) }}
        </div>
        <div class='form-group'>
                {{ Form::label('description', 'Description') }}
                {{ Form::textarea('description', Input::old('description'),['class'=>'form-control','spellcheck'=> 'true','required'=>'required','size'=>'30x10']) }}
        </div>
        <div class='form-group'>
                {{ Form::label('class_schedule', 'Date') }}
                {{ Form::select('class_schedule',$date_time,Input::old('class_schedule'),['class'=>'form-control','required']) }}
        </div>
        <div class='form-group'>
                {{ Form::label('images', 'Upload File') }}
                {{ Form::file('images[]', array('multiple'=>true)) }}
        </div>
        <div class="modal-footer">
                {{--{{ Form::submit('Submit', array('class'=>'btn btn-success btn-xs')) }}--}}
                {{--<a href="{{URL::previous()}}" class="btn btn-default btn-xs">Close</a>--}}
            {{ Form::hidden('redirect_url', URL::previous()) }}
            {{ Form::submit('Submit', array('class'=>'btn btn-success btn-xs')) }}
            <a href="{{URL::previous()}}" class="btn btn-default btn-xs">Close</a>
        </div>
