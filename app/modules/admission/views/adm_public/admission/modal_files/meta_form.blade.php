
<div class="modal-header">

    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel">Applicant's Biographical Information</h4>
</div>

<div class="modal-body">
    <div style="padding: 20px;">

       {{ Form::hidden('applicant_id', $applicant_id=1, array('class'=>'form-control')) }}

       <div>{{ Form::label('fathers_name', 'Fathers name') }}</div>
       <div>{{ Form::text('fathers_name', Input::old('fathers_name'),['class'=>'form-control']) }}</div>

       <div>{{ Form::label('mothers_name', ' Mothers name') }}</div>
       <div>{{ Form::text('mothers_name', Input::old('mothers_name'),['class'=>'form-control ']) }}</div>

       <div>{{ Form::label('fathers_occupation', ' Fathers occupation') }}</div>
       <div>{{ Form::text('fathers_occupation', Input::old('fathers_occupation'),['class'=>'form-control ']) }}</div>

       <div>{{ Form::label('fathers_phone', 'Fathers phone') }}</div>
       <div>{{ Form::text('fathers_phone', Input::old('fathers_phone'),['class'=>'form-control ']) }}</div>

       <div>{{ Form::label('freedom_fighter', ' Freedom fighter') }}</div>
       <div>{{ Form::text('freedom_fighter', Input::old('freedom_fighter'),['class'=>'form-control ']) }}</div>

       <div>{{ Form::label('mothers_occupation', ' Mothers Occupation') }}</div>
       <div>{{ Form::text('mothers_occupation', Input::old('mothers_occupation'),['class'=>'form-control ']) }}</div>

       <div>{{ Form::label('mothers_phone', ' Mothers Phone') }}</div>
       <div>{{ Form::text('mothers_phone', Input::old('mothers_phone'),['class'=>'form-control ']) }}</div>

       <div>{{ Form::label('national_id', ' National id') }}</div>
       <div>{{ Form::text('national_id', Input::old('national_id'),['class'=>'form-control ']) }}</div>

       <div>{{ Form::label('driving_licence', ' Driving license') }}</div>
       <div>{{ Form::text('driving_licence', Input::old('driving_licence'),['class'=>'form-control ']) }}</div>

       <div>{{ Form::label('passport', ' Passport') }}</div>
       <div>{{ Form::text('passport', Input::old('passport'),['class'=>'form-control ']) }}</div>

       <div>{{ Form::label('place_of_birth', ' Place of birth') }}</div>
       <div>{{ Form::text('place_of_birth', Input::old('place_of_birth'),['class'=>'form-control ']) }}</div>

       <div>{{ Form::label('marital_status', ' Marital status') }}</div>
       <div>
           {{ Form::select('marital_status', array('0' => 'Select one',
           '1' => 'Single', '2' => 'Married','3'=>'Divorsed'), Input::old('marital_status'),
           array('class' => 'form-control')) }}
       </div>

       <div>{{ Form::label('nationality', ' Nationality') }}</div>
       <div>{{ Form::text('nationality', Input::old('nationality'),['class'=>'form-control ']) }}</div>

       <div>{{ Form::label('religion', ' Religion') }}</div>
       <div>{{ Form::text('religion', Input::old('religion'),['class'=>'form-control ']) }}</div>

       <div>{{ Form::label('signature', ' Signature') }}</div>
       <div>
           @if(isset($applicant_meta_records->signature))
              {{ HTML::image('files_public/' . $applicant_meta_records->signature) }}
              <p>&nbsp;</p>
              {{ Form::file('signature',array('multiple'=>true)) }}
           @else
              {{ Form::file('signature',array('multiple'=>true)) }}
           @endif
       </div>

       <div>{{ Form::label('present_address', ' Present Address') }}</div>
       <div>{{ Form::textarea('present_address', Input::old('present_address'),['class'=>'form-control ','size' => '30x5']) }}</div>

       <div>{{ Form::label('permanent_address', ' Parmanent Address') }}</div>
       <div>{{ Form::textarea ('permanent_address', Input::old('permanent_address'),['class'=>'form-control','size' => '30x5']) }}</div>

       <p>&nbsp;</p>
        <div>
        @if(isset($applicant_meta_records->id))
           {{ Form::submit('Update', array('class'=>'pull-right btn btn-primary')) }}
       @else
            {{ Form::submit('Save', array('class'=>'pull-right btn btn-primary')) }}
       @endif
           <a  href="" class="pull-right btn btn-default" style="margin-right: 5px">Close</a>
        </div>

       <p>&nbsp;</p>
    </div>
</div>



