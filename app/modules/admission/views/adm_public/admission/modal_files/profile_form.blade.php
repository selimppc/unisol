<div class="modal-header">

    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel">Applicant's Profile Information</h4>
</div>

<div class="modal-body">
    <div style="padding: 20px;">
       <div class="row">
          <div class="help-text-top">
             <em><span class="text-danger">  (*) </span>Indicates required field. Please do not skip these fields.</em>
          </div>
       </div>
       <div>
         {{ Form::label('date_of_birth', 'Date of Birth:') }}<span class="text-danger">*</span>
         {{ Form::text('date_of_birth', Input::old('date_of_birth'),['class'=>'form-control date_picker','required'=>'required']) }}
       </div>

       <div>
          {{ Form::label('place_of_birth', 'Birth Place') }}<span class="text-danger">*</span>
          {{ Form::text('place_of_birth', Input::old('place_of_birth'),array('class' => 'form-control','placeholder'=>'')) }}
       </div>

       <div>
          {{ Form::label('phone', 'Phone') }}<span class="text-danger">*</span>
          {{ Form::text('phone', Input::old('phone'),array('class' => 'form-control','placeholder'=>'')) }}
       </div>
       <br>
       <div>
         {{ Form::label('gender', 'Gender') }}<span class="text-danger">*</span>
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

       <div>

          @if(isset($applicant_personal_info->profile_image))
          {{ Form::label('profile_image', 'Profile Image') }}
          {{ HTML::image('applicant_images/profile/' . $applicant_personal_info->profile_image) }}
          @endif
          <p>&nbsp;</p>
          {{ Form::label('profile_image', 'Select Profile Picture :') }}<span class="text-danger">*</span>
          {{ Form::file('profile_image',array('multiple'=>true)) }}
       </div>
       <br>

       <div>
         {{ Form::label('city', 'City') }}
         {{ Form::text('city', Input::old('profile_image'),array('class' => 'form-control','placeholder'=>'')) }}
       </div>

       <div>
          {{ Form::label('state', 'State') }}
          {{ Form::text('state', Input::old('state'),array('class' => 'form-control','placeholder'=>'')) }}
       </div>

       <div>
          {{ Form::label('country_id', 'Country') }}<span class="text-danger">*</span>
          {{ Form::select('country_id',$countryList,Input::old('country_id'),['class'=>'form-control','required']) }}
       </div>

       <div>
          {{ Form::label('zip_code', 'Zip Code') }}<span class="text-danger">*</span>
          {{ Form::text('zip_code', Input::old('zip_code'),array('class' => 'form-control','placeholder'=>'')) }}
       </div>
       <p>&nbsp;</p>

       <div>
        @if(isset($applicant_personal_info->id))
           {{ Form::submit('Update', array('class'=>'pull-right btn btn-primary')) }}
       @else
            {{ Form::submit('Save', array('class'=>'pull-right btn btn-primary')) }}
       @endif
           <a  href="" class="pull-right btn btn-default" style="margin-right: 5px">Close</a>
       </div>

       <p>&nbsp;</p>
    </div>
</div>

{{ HTML::script('assets/js/custom.js')}}

