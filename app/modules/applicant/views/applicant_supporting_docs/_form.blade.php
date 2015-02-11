@extends('layouts.master')

@section('sidebar')
    @include('applicant::_sidebar')
@stop

@section('content')

 <div class='control-group'>
 <legend style="color: #0088cc"></legend>
<div class="span6 well">
<h3>Personal Information</h3>
{{ Form::open(array('class'=>'form-horizontal','url' => 'applicant/supporting_docs/store', 'method' =>'post', 'files'=>'true','id'=>'signup-form')) }}

{{ Form::hidden('applicant_id', $applicant_id = 1, array('class'=>'form-control')) }}

 <div class="form-group">
    <span class="text-muted"><em><span style="color:red;">  * </span><b>Indicates required field</b> </em></span>
 </div>

 {{--<div class="form-group">--}}
 {{--{{ Form::label('applicant_id','Name of Applicant' ) }}--}}
 {{--{{ Form::select('applicant_id', Applicant::orderBy('username')->lists('username', 'id')+[''=>'Select Option'] ,'', ['class'=>'form-control']) }}--}}
 {{--</div>--}}

 <div class='form-group'>
 <div>{{ Form::label('academic_goal_statement', 'academic_goal_statement') }}</div>
 <div>{{ Form::file('academic_goal_statement', Input::old('academic_goal_statement'),['class'=>'form-control']) }}</div>
 </div>

 <div class='form-group'>
 <div>{{ Form::label('essay', 'Essay') }}</div>
 <div>{{ Form::file('essay', Input::old('essay'),['class'=>'form-control ']) }}</div>
 </div>

 <div class='form-group'>
 <div>{{ Form::label('letter_of_intent', 'Letter of intent') }}</div>
 <div>{{ Form::text('letter_of_intent', Input::old('letter_of_intent'),['class'=>'form-control ']) }}</div>
 </div>

 <div class='form-group'>
 <div>{{ Form::label('personal_statement', 'personal_statement') }}</div>
 <div>{{ Form::text('personal_statement', Input::old('personal_statement'),['class'=>'form-control ']) }}</div>
 </div>

 <div class='form-group'>
 <div>{{ Form::label('research_statement', 'research_statement') }}</div>
 <div>{{ Form::text('research_statement', Input::old('research_statement'),['class'=>'form-control ']) }}</div>
 </div>

 <div class='form-group'>
 <div>{{ Form::label('portfolio', 'portfolio') }}</div>
 <div>{{ Form::text('portfolio', Input::old('portfolio'),['class'=>'form-control ']) }}</div>
 </div>

 <div class='form-group'>
  <div>{{ Form::label('resume', 'Resume') }}</div>
  <div>{{ Form::text('resume', Input::old('resume'),['class'=>'form-control ']) }}</div>
  </div>

 <div class='form-group'>
 <div>{{ Form::label('readmission_personal_details', 'Readmission personal details') }}</div>
 <div>{{ Form::text('readmission_personal_details', Input::old('readmission_personal_details'),['class'=>'form-control ']) }}</div>
 </div>
 <div class='form-group'>
 <div>{{ Form::label('other', 'Others') }}</div>
 <div>{{ Form::textarea ('other', Input::old('other'),['class'=>'form-control','size' => '30x5']) }}</div>
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
