@extends('layouts.master')

@section('sidebar')
    @include('applicant::_sidebar')
@stop

@section('content')

<div class='control-group'>
<legend style="color: #0088cc"></legend>

<div class="span6 well">
<h3>Add</h3>

{{ Form::open(array('class'=>'form-horizontal','url' => 'applicant/academic_records/store', 'method' =>'post', 'files'=>'true','id'=>'signup-form')) }}

{{ Form::hidden('applicant_id', $applicant_id = 1, array('class'=>'form-control')) }}
<br><br>
<div>{{ Form::label('level_of_education', 'Level of Education ') }}
{{ Form::select('level_of_education', array('' => 'Select one',
   'PSC' => 'PSC', 'JSC' => 'JSC', 'SSC'=>'SSC','HSC'=>'HSC'), Input::old('level_of_education'),
    array('class' => 'form-control')) }}</div>


<div >{{ Form::label('degree_name', 'Name of Examination') }}</div >
<div >{{ Form::text('degree_name', Input::old('degree_name'),['class'=>'form-control ']) }}</div>

<div >{{ Form::label('institute_name', 'Institute Name') }}</div >
<div >{{ Form::text('institute_name', Input::old('institute_name'),['class'=>'form-control ']) }}</div>

<div >{{ Form::label('group', 'Academic Group') }}</div >
{{ Form::select('group', array('' => 'Select one',
         'Science' => 'Science', 'Arts' => 'Arts', 'Commerce'=>'Commerce'),
          Input::old('group'),
          array('class' => 'form-control')) }}
<br>

<div >{{ Form::label('board_type', 'Board Type') }}   (Select one : Division/ University/Other )</div>

<div id="board"><label class="small">{{ Form::radio('board_type','Board') }} Board </label>
<div style="display:none" class="board">
{{ Form::select('board', array('' => 'Select one',
          'Dhaka' => 'Dhaka', 'Chittagong' => 'Chittagong', 'Comilla'=>'Comilla','Khulna'=>'Khulna','Syllhet'=>'Syllhet'),
          Input::old('board'),
          array('class' => 'form-control')) }}
</div>
</div>

<div id="university"><label class="small">{{ Form::radio('board_type','university') }} University</label>
<div style="display:none" class="university">
{{ Form::select('university', array('' => 'Select one',
          'Dhaka' => 'Dhaka', 'Chittagong' => 'Chittagong', 'Comilla'=>'Comilla','Khulna'=>'Khulna','Syllhet'=>'Syllhet'),
          Input::old('board'),
          array('class' => 'form-control')) }}
</div>
</div>

<div id="other"><label class="small">{{ Form::radio('board_type','Board') }} Other</label>
<div style="display:none" class="other">

{{ Form::text('other', Input::old('other'),['class'=>'form-control ']) }}
</div>
</div>

<div >{{ Form::label('major_subject', 'Major Subject') }}</div >
<div >{{ Form::text('major_subject', Input::old('major_subject'),['class'=>'form-control ']) }}</div>

<br>
<div >{{ Form::label('result_type', 'Result Type') }}   (Select one : Division/Class OR CGPA )</div>

<div id="division"><label class="small">{{ Form::radio('result_type','Division') }} Division/Class </label>
<div style="display:none" class="division">
{{ Form::text('result', Input::old('result'),['class'=>'form-control ','placeholder'=>"3rd Class First"]) }}
</div>

</div>

<div id="gpa"><label class="small">{{ Form::radio('result_type','CGPA') }} CGPA</label>

<div style="display:none" class="gpa">
<div class="col-lg-3">{{ Form::text('gpa', Input::old('gpa'),['class'=>'form-control input-sm','placeholder'=>"3.20"]) }}</div>
<div class="col-lg-3">{{ Form::text('gpa_scale', Input::old('gpa_scale'),['class'=>'form-control input-sm','placeholder'=>"5"]) }}
</div>
</div>

</div>

<br><br>
<div >{{ Form::label('roll_number', 'Roll No') }}</div >
<div >{{ Form::text('roll_number', Input::old('roll_number'),['class'=>'form-control ']) }}</div>

<div >{{ Form::label('registration_number', 'Registration Number') }}</div >
<div >{{ Form::text('registration_number', Input::old('registration_number'),['class'=>'form-control ']) }}</div>



<div >{{ Form::label('year_of_passing', 'Passing Year') }}</div >
<div >{{ Form::text('year_of_passing', Input::old('year_of_passing'),['class'=>'form-control ']) }}</div>

<div >{{ Form::label('duration', 'Duration') }}</div >
<div >{{ Form::text('duration', Input::old('duration'),['class'=>'form-control ']) }}</div>

<div>{{ Form::label('study_at', 'Study At ') }}
{{ Form::select('study_at', array('' => 'Select one',
   'National' => 'National', 'Abroad' => 'Abroad'), Input::old('study_at'),
    array('class' => 'form-control')) }}</div>


{{--<script>--}}
{{--$(document).ready(function(){--}}
    {{--$("#division").click(function(){--}}
        {{--$(".division").show();--}}
        {{--$(".gpa").hide();--}}
    {{--});--}}
    {{--$("#gpa").click(function(){--}}
        {{--$(".division").hide();--}}
        {{--$(".gpa").show();--}}
    {{--});--}}
{{--});--}}
{{--</script>--}}


<script>
$(document).ready(function(){
    $("#board").click(function(){
        $(".board").show();
        $(".university").hide();
        $(".other").hide();
    });
    $("#university").click(function(){
        $(".board").hide();
        $(".other").hide();
        $(".university").show();
    });
});
</script>












<br>
<br>
{{ Form::submit('Save', array('class' => 'btn btn-primary')) }}

<br>
<br>
{{ Form::close() }}

</div>
</div>


@stop
