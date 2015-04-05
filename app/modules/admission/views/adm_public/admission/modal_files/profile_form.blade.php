<div class="modal-header">

    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel">Applicant's Profile Information</h4>
</div>

<div class="modal-body">
    <div style="padding: 20px;">

       {{ Form::hidden('applicant_id', $applicant_id=1, array('class'=>'form-control')) }}

       <div>
         {{ Form::label('date_of_birth', 'Date of Birth:') }}
         {{ Form::text('date_of_birth', Input::old('date_of_birth'),['class'=>'form-control date_picker','required'=>'required']) }}
       </div>

       <div>
          {{ Form::label('place_of_birth', 'Birth Place') }}
          {{ Form::text('place_of_birth', Input::old('place_of_birth'),array('class' => 'form-control','placeholder'=>'')) }}
       </div>

       <div>
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

       <div>
         {{ Form::label('profile_image', 'Profile Image') }}
         {{ Form::file('profile_image', Input::old('profile_image'),array('class' => 'form-control','placeholder'=>'')) }}
       </div>

       <div>
         {{ Form::label('city', 'City') }}
         {{ Form::text('city', Input::old('profile_image'),array('class' => 'form-control','placeholder'=>'')) }}
       </div>

       <div>
          {{ Form::label('state', 'State') }}
          {{ Form::text('state', Input::old('state'),array('class' => 'form-control','placeholder'=>'')) }}
       </div>

       <div>
          {{ Form::label('country_id', 'Country') }}
          {{ Form::select('country_id',$countryList,Input::old('country_id'),['class'=>'form-control','required']) }}
       </div>

       <div>
          {{ Form::label('zip_code', 'Zip Code') }}
          {{ Form::text('zip_code', Input::old('zip_code'),array('class' => 'form-control','placeholder'=>'')) }}
       </div>

       <div>
          {{ Form::label('phone', 'Phone') }}
          {{ Form::text('phone', Input::old('phone'),array('class' => 'form-control','placeholder'=>'')) }}
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

