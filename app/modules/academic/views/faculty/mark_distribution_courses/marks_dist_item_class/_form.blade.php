
        <div class='form-group'>
        <div>{{ Form::label('title', 'ClassTitle') }}</div>
        <div>{{ Form::text('title', Input::old('title'),['class'=>'form-control','spellcheck'=> 'true','required'=>'required']) }}</div>
        </div>
        <div class='form-group'>
        <div>{{ Form::label('description', 'Description') }}</div>
        <div>{{ Form::textarea('description', Input::old('description'),['class'=>'form-control','spellcheck'=> 'true','required'=>'required','size'=>'30x10']) }}</div>
        </div>
        <div class='form-group'>
        <div>{{ Form::label('classtime', 'ClassTime') }}</div>
        <div> {{ Form::select('classtime', array(''=>'Select','1' => 'Applicant', '2' => 'Teacher','3'=>'Staff'), '', array('class' => 'form-control','data-parsley-trigger'=>'change','required'=>'required'))}}
        </div>
        </div>
        <div class='form-group'>
        <div>{{ Form::label('imagename', 'Upload File') }}</div>
        <div>{{Form::file('images[]', ['multiple' => true], ['class'=>'form-control'])}}</div>
        </div>


