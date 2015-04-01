<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" style="text-align: center;color: #800080;font-size: x-large">Edit Profile</h4>
</div>
<div class="modal-body">

    <div style="padding: 10px; width: 90%;">

        {{ Form::model($profile,array('url'=> array('applicant/profile/update/'.$profile->id), 'method' => 'POST','class'=>'form-horizontal','files'=>true)) }}

        <div class='form-group'>
            {{ Form::label('date_of_birth', 'Date of Birth:') }}
            {{ Form::text('date_of_birth', Input::old('date_of_birth'),['class'=>'form-control date_picker','required'=>'required']) }}
        </div>
        <div class='form-group'>
            {{ Form::label('place_of_birth', 'Birth Place') }}
            {{ Form::text('place_of_birth', Input::old('place_of_birth'),array('class' => 'form-control','placeholder'=>'')) }}
        </div>
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
            {{ Form::label('profile_image', 'Picture') }}<br>
            {{ HTML::image('/applicant_images/profile/'.$profile->profile_image, $profile->profile_image,['class'=>'col-md-3'])}}
            {{ Form::file('profile_image', Input::old('profile_image'),array('class' => 'form-control','placeholder'=>'')) }}<br>
        </div>
        <div class='form-group'>
            {{ Form::label('city', 'City') }}
            {{ Form::text('city', Input::old('profile_image'),array('class' => 'form-control','placeholder'=>'')) }}
        </div>
        <div class='form-group'>
            {{ Form::label('state', 'State') }}
            {{ Form::text('state', Input::old('state'),array('class' => 'form-control','placeholder'=>'')) }}
        </div>
        <div class='form-group'>
            {{ Form::label('country_id', 'Country') }}
            {{ Form::select('country_id',$countryList,Input::old('country_id'),['class'=>'form-control','required']) }}
        </div>
        <div class='form-group'>
            {{ Form::label('zip_code', 'Zip Code') }}
            {{ Form::text('zip_code', Input::old('zip_code'),array('class' => 'form-control','placeholder'=>'')) }}
        </div>
        <div class='form-group'>
            {{ Form::label('phone', 'Phone') }}
            {{ Form::text('phone', Input::old('phone'),array('class' => 'form-control','placeholder'=>'')) }}
        </div>
        <br><br>
        <div class="modal-footer">
            {{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}
            <a href="{{URL::to('applicant/profile/')}}" class="btn btn-default pull-right">Close </a>
        </div>


        {{ Form::close() }}

    </div>
</div>

<div class="modal-footer">

</div>


{{--@stop--}}