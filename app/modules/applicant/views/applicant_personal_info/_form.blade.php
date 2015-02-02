@extends('layouts.master')

@section('sidebar')
    @include('applicant::_sidebar')
@stop

@section('content')

 <div class='control-group'>
 <legend style="color: #0088cc"></legend>
<div class="span6 well">
<h3>Personal Information</h3>
{{ Form::open(array('class'=>'form-horizontal','url' => 'applicant/personal_info/store', 'method' =>'post', 'files'=>'true','id'=>'signup-form')) }}

 <div class="form-group">
    <span class="text-muted"><em><span style="color:red;">  * </span><b>Indicates required field</b> </em></span>
 </div>

 <div class="form-group">
 {{ Form::label('applicant_id','Name of Applicant' ) }}
 {{ Form::select('applicant_id', Applicant::orderBy('username')->lists('username', 'id')+[''=>'Select Option'] ,'', ['class'=>'form-control']) }}
 </div>

 <div class='form-group'>
 <div>{{ Form::label('fathers_name', 'Fathers name') }}</div>
 <div>{{ Form::text('fathers_name', Input::old('fathers_name'),['class'=>'form-control']) }}</div>
 </div>

 <div class='form-group'>
 <div>{{ Form::label('mothers_name', ' Mothers name') }}</div>
 <div>{{ Form::text('mothers_name', Input::old('mothers_name'),['class'=>'form-control ']) }}</div>
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
 <div>{{ Form::label('freedom_fighter', ' Freedom fighter') }}</div>
 <div>{{ Form::text('freedom_fighter', Input::old('freedom_fighter'),['class'=>'form-control ']) }}</div>
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
 <div>{{ Form::label('national_id', ' National id') }}</div>
 <div>{{ Form::text('national_id', Input::old('national_id'),['class'=>'form-control ']) }}</div>
 </div>
 <div class='form-group'>
 <div>{{ Form::label('driving_licence', ' Driving license') }}</div>
 <div>{{ Form::text('driving_licence', Input::old('driving_licence'),['class'=>'form-control ']) }}</div>
 </div>
 <div class='form-group'>
 <div>{{ Form::label('passport', ' Passport') }}</div>
 <div>{{ Form::text('passport', Input::old('passport'),['class'=>'form-control ']) }}</div>
 </div>

<div class='form-group'>
<div>{{ Form::label('place_of_birth', ' Place of birth') }}</div>
<div>{{ Form::text('place_of_birth', Input::old('place_of_birth'),['class'=>'form-control ']) }}</div>
</div>

<div class='form-group'>
<div>{{ Form::label('marital_status', ' Marital status') }}</div>
{{ Form::select('marital_status', array('0' => 'Select one',
           '1' => 'Single', '2' => 'Married','3'=>'Divorsed'), Input::old('marital_status'),
           array('class' => 'form-control')) }}
</div>

 <div class='form-group'>
<div>{{ Form::label('nationality', ' Nationality') }}</div>
<div>{{ Form::text('nationality', Input::old('nationality'),['class'=>'form-control ']) }}</div>
</div>

<div class='form-group'>
<div>{{ Form::label('religion', ' Religion') }}</div>
<div>{{ Form::text('religion', Input::old('religion'),['class'=>'form-control ']) }}</div>
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
<div>{{ Form::label('permanent_address', ' Parmanent Address') }}</div>
<div>{{ Form::textarea ('permanent_address', Input::old('permanent_address'),['class'=>'form-control','size' => '30x5']) }}</div>
</div>
<br>
<br>
{{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}

<br>
<br>

{{ Form::close() }}

</div>

</div>


<script type="text/javascript">
 $(document).ready(function() {
        $('#firstname').tooltip({  title: 'Write your  firstname.This is a required field',placement : 'right' });
        $('#middlename').tooltip({  title: 'Write your  Middlename.(Optional)',placement : 'right' });
        $('#lastname').tooltip({  title: 'Write your lastname.This is a required field',placement : 'right' });
        $('#email').tooltip({  title: 'Write your email address here to varify your account',placement : 'right' });
        $('#username').tooltip({  title: 'Write your  username here to access your account',placement : 'right' });
        $('#password').tooltip({  title: 'Your Password should be at least 8 charecters.1 uppercase,1 lowercase,1 number,1 special charecter is must',placement : 'right' })
        $('#confirmpassword').tooltip({  title: 'Write again your password  to confirm it',placement : 'right' });
});
</script>

<script>
$(function() {
  // Enable Pickadate on an input field and
  // specifying date format for hidden input field
  $('#date').pickadate({
    formatSubmit : 'yyyy/mm/dd'
  });
});
</script>


@stop
