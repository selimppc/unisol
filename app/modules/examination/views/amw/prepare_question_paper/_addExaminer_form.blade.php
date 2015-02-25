<fieldset style="padding: 10px; width: 90%;">
                {{--Title:</strong>{{ $view_examination_amw->title }}--}}


                <div class="form-group">
                       {{ Form::label('department', 'Department') }}
                       {{ Form::text('department', Input::old('department'), array('class' => 'form-control','required'=>'required')) }}
                </div>

                <div class="form-group">
                        {{ Form::label('subject', 'Subject') }}
                        {{ Form::text('subject', Input::old('subject'), array('class' => 'form-control','required'=>'required')) }}
                </div>

                <div class="form-group">
                        {{ Form::label('', 'Name of Faculty') }}
                        {{ Form::text('', 'DropDown Hobe',Input::old(''), array('class' => 'form-control','required'=>'required') ) }}
                </div>
                <div class="form-group">
                         {{ Form::label('comment', 'Comment') }}
                         {{ Form::textarea('comment', Null, ['size' => '40x6','placeholder'=>'Your Comments Here']) }}

                </div>
            {{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
            <a href="{{URL::to('examination/amw/examiners')}}" class="btn btn-default">Close </a>
</fieldset>
