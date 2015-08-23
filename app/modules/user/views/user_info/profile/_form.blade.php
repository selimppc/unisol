
<div style="padding: 0px 20px 20px 20px;">
    {{Form::hidden('user_id',$user_id)}}
    <div class="form-group">
        <div class="col-lg-4" style="padding-left: 0;">
           {{ Form::label('first_name', 'First Name:') }}<span style="color:red;">*</span>
           {{ Form::text('first_name',Input::old('first_name'), array('class' => 'form-control','placeholder'=>'Enter First  name')) }}
        </div>
        <div class="col-lg-4" style="padding-right: 0;">
             {{ Form::label('middle_name', 'Middle Name:') }}<span style="color:red;">*</span>
             {{ Form::text('middle_name',Input::old('middle_name'), array('class' => 'form-control','placeholder'=>'Enter Middle  name')) }}
        </div>
        <div class="col-lg-4" style="padding-right: 0;">
             {{ Form::label('last_name', 'Last Name:') }}<span style="color:red;">*</span>
             {{ Form::text('last_name',Input::old('last_name'), array('class' => 'form-control','placeholder'=>'Enter Last  name')) }}
        </div>
    </div>
    <p>&nbsp;</p>

    <div class='form-group'>
        <div class="col-lg-4" style="padding-left: 0;">
            {{ Form::label('date_of_birth', 'Date of Birth:') }}
            {{ Form::text('date_of_birth', Input::old('date_of_birth'),['class'=>'form-control date_picker','required'=>'required']) }}
        </div>
        <div class="col-lg-4" style="padding-right: 0;">
            {{ Form::label('country', 'Country') }}
            {{ Form::select('country',$countryList,Input::old('country'),['class'=>'form-control','required']) }}
        </div>

        <div class="col-lg-4" style="padding-right: 0;">
            {{ Form::label('city', 'City') }}
            {{ Form::text('city', Input::old('city'),array('class' => 'form-control','placeholder'=>'')) }}
        </div>
    </div>
    <p>&nbsp;</p>
    <div class='form-group'>
          <div class="col-lg-6" style="padding-left: 0;">
            {{ Form::label('state', 'State') }}
            {{ Form::text('state', Input::old('state'),array('class' => 'form-control','placeholder'=>'')) }}
          </div>
          <div class="col-lg-6" style="padding-right: 0;">
            {{ Form::label('zip_code', 'Zip Code') }}
            {{ Form::text('zip_code', Input::old('zip_code'),array('class' => 'form-control','placeholder'=>'')) }}
          </div>
    </div>
    <p>&nbsp;</p>
    <div class='form-group'>
       {{ Form::label('gender', 'Gender') }}
       <div class="form-inline">
           <div class="radio">
              {{ Form::radio('gender', 'male', (Input::old('gender') == 'male'), array('id'=>'male', 'class'=>'radio')) }}
              {{ Form::label('male', 'male') }}
           </div>
           <div class="radio">
              {{ Form::radio('gender', 'female', (Input::old('gender') == 'female'), array('id'=>'female', 'class'=>'radio')) }}
              {{ Form::label('female', 'Female') }}
           </div>
       </div>
    </div>
    <div class='form-group'>
        @if(isset($model->image))
             {{ Form::label('image', 'Profile Image') }}
             {{ HTML::image('user_images/profile/' . $model->image) }}
             {{ Form::file('image',array('multiple'=>true,)) }}
             @else
             <p>&nbsp;</p>
             {{ Form::label('image', 'Select Profile Picture :') }}<span class="text-danger">*</span>
             {{ Form::file('image',array('multiple'=>true)) }}
        @endif
    </div>

    {{ Form::submit('Submit', array('class'=>'pull-right btn btn-info')) }}
    <a href="" class="pull-right btn btn-default" style="margin-right: 5px">Close</a>

    <p>&nbsp;</p>
</div>

{{ HTML::script('assets/js/custom.js')}}