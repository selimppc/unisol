
<div style="padding: 0px 20px 20px 20px;">
    {{Form::hidden('user_id',$user_id)}}
    <div class="form-group ">
        <div class="col-lg-6" style="padding-left: 0;">
           {{ Form::label('fathers_name', 'Fathers Name') }}
           {{ Form::text('fathers_name', Input::old('fathers_name'),['class'=>'form-control']) }}
        </div>
        <div class="col-lg-6" style="padding-right: 0;">
             {{ Form::label('mothers_name', ' Mothers Name') }}
             {{ Form::text('mothers_name', Input::old('mothers_name'),['class'=>'form-control ']) }}
        </div>
    </div>

    <div class='form-group'>
        <div class="col-lg-6" style="padding-left: 0;">
            {{ Form::label('fathers_occupation', ' Fathers Occupation') }}
            {{ Form::text('fathers_occupation', Input::old('fathers_occupation'),['class'=>'form-control ']) }}
        </div>
        <div class="col-lg-6" style="padding-right: 0;">
            {{ Form::label('mothers_occupation', ' Mothers Occupation') }}
            {{ Form::text('mothers_occupation', Input::old('mothers_occupation'),['class'=>'form-control ']) }}
        </div>
    </div>

    <div class='form-group'>
          <div class="col-lg-6" style="padding-left: 0;">
            {{ Form::label('fathers_phone', 'Fathers Phone') }}
            {{ Form::text('fathers_phone', Input::old('fathers_phone'),['class'=>'form-control ']) }}
          </div>
          <div class="col-lg-6" style="padding-right: 0;">
           {{ Form::label('mothers_phone', ' Mothers Phone') }}
           {{ Form::text('mothers_phone', Input::old('mothers_phone'),['class'=>'form-control ']) }}
          </div>
    </div>

    <div class='form-group'>
         <div class="col-lg-6" style="padding-left: 0;">
              {{ Form::label('freedom_fighter', 'Is Freedom Fighter ? : (Select One)')}}<span class="text-danger">*</span>
              <div class="form-inline">
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <div class="radio">
                     {{ Form::radio('freedom_fighter', '1', (Input::old('freedom_fighter') == '1'), array('id'=>'1', 'class'=>'radio')) }}
                     {{ Form::label('freedom_fighter', 'Yes') }}
                  </div>
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <div class="radio">
                     {{ Form::radio('freedom_fighter', '0', (Input::old('freedom_fighter') == '0'), array('id'=>'0', 'class'=>'radio')) }}
                     {{ Form::label('freedom_fighter', 'No') }}
                  </div>
              </div>
         </div>
         <div class="col-lg-6" style="padding-right: 0;">
               {{ Form::label('national_id', ' National ID#') }}
               {{ Form::text('national_id', Input::old('national_id'),['class'=>'form-control ']) }}
         </div>
    </div>

    <div class='form-group'>
        <div class="col-lg-6" style="padding-left: 0;">
             {{ Form::label('driving_licence', ' Driving license#') }}
             {{ Form::text('driving_licence', Input::old('driving_licence'),['class'=>'form-control ']) }}
        </div>
        <div class="col-lg-6" style="padding-right: 0;">
              {{ Form::label('passport', ' Passport') }}
              {{ Form::text('passport', Input::old('passport'),['class'=>'form-control ']) }}
        </div>
    </div>

    <div class='form-group'>
        <div class="col-lg-6" style="padding-left: 0;">
             {{ Form::label('place_of_birth', ' Place of birth') }}<span class="text-danger">*</span>
             {{ Form::text('place_of_birth', Input::old('place_of_birth'),['class'=>'form-control ']) }}
        </div>
        <div class="col-lg-6" style="padding-right: 0;">
              {{ Form::label('marital_status', ' Marital status') }}
              {{ Form::select('marital_status', array('0' => 'Select one',
                 'single' => 'Single', 'married' => 'Married','unmarried'=>'Unmarried','divorce'=>'Divorced'),
                 Input::old('marital_status'),
                 array('class' => 'form-control')) }}
        </div>
    </div>

     <div class='form-group'>
            <div class="col-lg-6" style="padding-left: 0;">
                  {{ Form::label('nationality', ' Nationality') }}<span class="text-danger">*</span>
                  {{ Form::text('nationality', Input::old('nationality'),['class'=>'form-control ']) }}
            </div>
            <div class="col-lg-6" style="padding-right: 0;">
                   {{ Form::label('religion', ' Religion') }}<span class="text-danger">*</span>
                   {{ Form::text('religion', Input::old('religion'),['class'=>'form-control ']) }}
            </div>
        </div>

        <div class='form-group'>
            <div class="col-lg-6" style="padding-left: 0;">
                  {{ Form::label('present_address', ' Present Address') }}<span class="text-danger">*</span>
                  {{ Form::textarea('present_address', Input::old('present_address'),['class'=>'form-control ','size' => '30x5']) }}
            </div>
            <div class="col-lg-6" style="padding-right: 0;">
                   {{ Form::label('permanent_address', ' Parmanent Address') }}<span class="text-danger">*</span>
                   {{ Form::textarea ('permanent_address', Input::old('permanent_address'),['class'=>'form-control','size' => '30x5']) }}
            </div>
        </div>
        <p>&nbsp;</p>
    {{ Form::submit('Submit', array('class'=>'pull-right btn btn-info')) }}
    <a href="" class="pull-right btn btn-default" style="margin-right: 5px">Close</a>

    <p>&nbsp;</p>
</div>