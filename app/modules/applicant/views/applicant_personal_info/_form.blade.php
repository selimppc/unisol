   <div class='form-group'>
   <div>{{ Form::label('fathers_name', 'Fathers name') }}</div>
   <div>{{ Form::text('fathers_name', Input::old('fathers_name'),['class'=>'form-control']) }}</div>
   </div>

   <div class='form-group'>
   <div>{{ Form::label('fathers_occupation', ' Fathers occupation') }}</div>
   <div>{{ Form::text('fathers_occupation', Input::old('fathers_occupation'),['class'=>'form-control ']) }}</div>
   </div>

   <div class='form-group'>
   <div>{{ Form::label('fathers_phone', 'Fathers phone') }}</div>
   <div>{{ Form::text('fathers_phone', Input::old('fathers_phone'),['class'=>'form-control ']) }}</div>
   </div>

   <div class='form-group'>
       {{ Form::label('freedom_fighter', 'Is Freedom Fighter?') }}
       <div class="form-inline">
           <div class="radio">
               {{ Form::radio('freedom_fighter', '1', (Input::old('freedom_fighter') == '1'), array('id'=>'1', 'class'=>'radio')) }}
               {{ Form::label('freedom_fighter', 'Yes') }}
           </div>
           <div class="radio">
               {{ Form::radio('freedom_fighter', '0', (Input::old('freedom_fighter') == '0'), array('id'=>'0', 'class'=>'radio')) }}
               {{ Form::label('freedom_fighter', 'No') }}
           </div>
       </div>
   </div>
   <div class='form-group'>
       <div>{{ Form::label('mothers_name', ' Mothers name') }}</div>
       <div>{{ Form::text('mothers_name', Input::old('mothers_name'),['class'=>'form-control ']) }}</div>
   </div>
   <div class='form-group'>
   <div>{{ Form::label('mothers_occupation', ' Mothers Occupation') }}</div>
   <div>{{ Form::text('mothers_occupation', Input::old('mothers_occupation'),['class'=>'form-control ']) }}</div>
   </div>

   <div class='form-group'>
    <div>{{ Form::label('mothers_phone', ' Mothers Phone') }}</div>
    <div>{{ Form::text('mothers_phone', Input::old('mothers_phone'),['class'=>'form-control ']) }}</div>
    </div>

   <div class='form-group'>
   <div>{{ Form::label('national_id', ' National Id') }}</div>
   <div>{{ Form::text('national_id', Input::old('national_id'),['class'=>'form-control ']) }}</div>
   </div>
   <div class='form-group'>
   <div>{{ Form::label('driving_licence', ' Driving License') }}</div>
   <div>{{ Form::text('driving_licence', Input::old('driving_licence'),['class'=>'form-control ']) }}</div>
   </div>

   <div class='form-group'>
   <div>{{ Form::label('passport', ' Passport') }}</div>
   <div>{{ Form::text('passport', Input::old('passport'),['class'=>'form-control ']) }}</div>
   </div>

  <div class='form-group'>
  <div>{{ Form::label('marital_status', ' Marital Status') }}</div>
  {{ Form::select('marital_status', array('' => 'Select one',
             'Single' => 'Single', 'Married' => 'Married','Divorsed'=>'Divorsed'), Input::old('marital_status'),
             array('class' => 'form-control')) }}
  </div>

   <div class='form-group'>
       <div>{{ Form::label('religion', 'Religion') }}</div>
       {{ Form::select('religion', array('' => 'Select one',
                  'Islam' => 'Islam', 'Hindu' => 'Hindu','khristian'=>'khristian'), Input::old('religion'),
                  array('class' => 'form-control')) }}
   </div>

  <div class='form-group'>
  <div>{{ Form::label('signature', ' Signature') }}</div>
  <div>{{ Form::file('signature', Input::old('signature'),['class'=>'form-control ']) }}</div>
  </div>

  <div class='form-group'>
  <div>{{ Form::label('present_address', ' Present Address') }}</div>
  <div>{{ Form::textarea('present_address', Input::old('present_address'),['class'=>'form-control ','size' => '30x5']) }}</div>
  </div>

  <div class='form-group'>
  <div>{{ Form::label('permanent_address', ' Permanent Address') }}</div>
  <div>{{ Form::textarea ('permanent_address', Input::old('permanent_address'),['class'=>'form-control','size' => '30x5']) }}</div>
  </div>

  <div class="modal-footer">
       {{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
       <a href="{{URL::to('applicant/personal_info/')}}" class="btn btn-default pull-right">Close </a>
  </div>


