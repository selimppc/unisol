
    <fieldset style="padding: 10px; width: 90%;">

                <div class='form-group'>
                     <div>{{ Form::label('code', 'Target Roles code') }}</div>
                     <div>{{ Form::text('code', Input::old('code'),['class'=>'form-control']) }}</div>

                </div>

                <div class='form-group'>
                    <div>{{ Form::label('title', 'Target Roles Name') }}</div>
                    <div>{{ Form::text('title', Input::old('title'),['class'=>'form-control','spellcheck'=> 'true']) }}</div>

                </div>

                <div class='form-group'>
                    <div>{{ Form::label('description', 'Target Roles Description') }}</div>
                    <div>{{ Form::textarea('description', Input::old('description'),['class'=>'form-control ','spellcheck'=> 'true']) }}</div>

                </div>



            {{ Form::submit('Submit', array('class'=>'btn btn-primary')) }}

              <a href="{{URL::to('target_role/')}}" class="btn btn-default">Close </a>

    </fieldset>
