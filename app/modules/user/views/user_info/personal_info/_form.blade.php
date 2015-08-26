<span class="text-muted "><em style="color:midnightblue"><span style="color:red;">(*)</span> Marked are required fields </em></span>
<div style="padding: 0px 20px 20px 20px;">
    {{Form::hidden('user_id',$user_id)}}
    <div class="form-group">
        <div class="col-lg-4">
           {{ Form::label('first_name', 'First Name:') }}<span class="text-danger">*</span>
           {{ Form::text('first_name',Input::old('first_name'), array('class' => 'form-control','placeholder'=>'Enter First  name','required'=>'required')) }}
        </div>
        <div class="col-lg-4">
             {{ Form::label('middle_name', 'Middle Name:') }}
             {{ Form::text('middle_name',Input::old('middle_name'), array('class' => 'form-control','placeholder'=>'Enter Middle  name')) }}
        </div>
        <div class="col-lg-4">
             {{ Form::label('last_name', 'Last Name:') }}<span class="text-danger">*</span>
             {{ Form::text('last_name',Input::old('last_name'), array('class' => 'form-control','placeholder'=>'Enter Last  name','required'=>'required')) }}
        </div>
    </div>
    <p>&nbsp;</p>
    <div class='form-group'>
        <div class="col-lg-4">
            {{ Form::label('date_of_birth', 'Date of Birth:') }}<span class="text-danger">*</span>
            {{ Form::text('date_of_birth', Input::old('date_of_birth'),['class'=>'form-control date_picker','required'=>'required']) }}
        </div>
        <div class="col-lg-4">
            {{ Form::label('country', 'Country') }}<span class="text-danger">*</span>
            {{ Form::select('country',$countryList,Input::old('country'),['class'=>'form-control','required']) }}
        </div>

        <div class="col-lg-4">
            {{ Form::label('city', 'City') }}
            {{ Form::text('city', Input::old('city'),array('class' => 'form-control','placeholder'=>'')) }}
        </div>
    </div>
    <p>&nbsp;</p>
    <div class='form-group'>
          <div class="col-lg-6">
            {{ Form::label('state', 'State') }}
            {{ Form::text('state', Input::old('state'),array('class' => 'form-control','placeholder'=>'')) }}
          </div>
          <div class="col-lg-6">
            {{ Form::label('zip_code', 'Zip Code') }}<span class="text-danger">*</span>
            {{ Form::text('zip_code', Input::old('zip_code'),array('class' => 'form-control','placeholder'=>'','required'=>'required')) }}
          </div>
    </div>
    <p>&nbsp;</p>
    <div class='form-group'>
        <div class="col-lg-6">
           {{ Form::label('gender', 'Gender') }}<span class="text-danger">*</span>
           <div class="form-inline">
               <div class="radio">
                    <label>{{ Form::radio('gender','male',null) }} Male</label>
               </div>
               <div class="radio">
                    <label>{{ Form::radio('gender','Female',null) }} Female</label>
               </div>
           </div>
        </div>
        <div class="col-lg-6">
            @if(isset($model))
               <div class="col-lg-4">{{ $model->image != null ? HTML::image('/uploads/user_images/profile/'.$model->image) :'' }}</div>
                <p>&nbsp;</p>
                {{ Form::label('image', 'Select Profile Picture :') }}
                {{ Form::file('image',array('multiple'=>true)) }}
            @else
               {{ Form::label('image', 'Select Profile Picture :') }}
               {{ Form::file('image',array('multiple'=>true)) }}
            @endif
        </div>
    </div>
    {{ Form::submit('Submit', array('class'=>'pull-right btn btn-info')) }}
    <a href="" class="pull-right btn btn-default" style="margin-right: 5px">Close</a>
    <p>&nbsp;</p>
</div>

{{ HTML::script('assets/js/custom.js')}}