
<div class="modal-header">

    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel">Add</h4>
</div>

<div class="modal-body">
  <div style="padding: 20px;">
        <h4> </h4>

  {{ Form::open(array('class'=>'form-horizontal','url' => 'applicant/profile/store', 'method' =>'post', 'files'=>'true','id'=>'signup-form')) }}

  {{ Form::hidden('applicant_id', $applicant_id = 1, array('class'=>'form-control')) }}

  {{ Form::label('date_of_birth', 'Date of Birth:') }}
  {{ Form::text('date_of_birth', null, array('type' => 'text', 'class' => 'form-control datepicker','placeholder' => 'Pick the date this task should be completed', 'id' => 'date')) }}
          {{--{{ Form::text('date_of_birth',Input::old('date_of_birth'), array('class' => 'form-control','placeholder'=>'')) }}--}}
  {{ Form::label('place_of_birth', 'Birth Place') }}
  {{ Form::text('place_of_birth', Input::old('place_of_birth'),array('class' => 'form-control','placeholder'=>'')) }}

  {{ Form::label('gender', 'Gender') }}
  {{ Form::select('gender', array('' => 'Select one',
                   'Female' => 'Female', 'Male' => 'Male','Common'=>'Common'), Input::old('gender'),
                   array('class' => 'form-control')) }}

  {{ Form::label('profile_image', 'Profile Image') }}
  {{ Form::file('profile_image', Input::old('profile_image'),array('class' => 'form-control','placeholder'=>'')) }}


  {{ Form::label('city', 'City') }}
  {{ Form::text('city', Input::old('profile_image'),array('class' => 'form-control','placeholder'=>'')) }}

  {{ Form::label('state', 'State') }}
  {{ Form::text('state', Input::old('state'),array('class' => 'form-control','placeholder'=>'')) }}

  {{ Form::label('country_id', 'Country') }}
  {{ Form::select('country_id', $countryList,Input::old('country_id'),['class'=>'form-control input-sm','required'])}}


  {{ Form::label('zip_code', 'Zip Code') }}
  {{ Form::text('zip_code', Input::old('zip_code'),array('class' => 'form-control','placeholder'=>'')) }}
   <br><br>
  {{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}

  <br>
  <br>

  {{ Form::close() }}

</div>
</div>
<div class="modal-footer">

</div>


