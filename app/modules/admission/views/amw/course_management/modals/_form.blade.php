{{--{{ HTML::script('assets/js/bootstrap-datepicker.js') }}--}}
{{--{{ HTML::style('assets/css/datepicker.css')}}--}}
<div class="modal-header">

    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel"> Add Degree</h4>
</div>

<div class="modal-body">
 <div style="padding: 20px;">

{{ Form::open(['route' => ['degree_manage.store'], 'class'=>'form-horizontal','files' => true,]) }}

{{ Form::label('title', 'Title') }}
{{ Form::text('title', Input::old('title'),array('class' => 'form-control input-sm','placeholder'=>'Enter your course name')) }}

{{ Form::label('description', 'Description') }}
{{ Form::textarea('description', Input::old('description'),array('class' => 'form-control input-sm','placeholder'=>'Enter Description','size' => '30x5')) }}

{{ Form::label('department_id', 'Department') }}
{{ Form::select('department_id', $department, Input::old('department_id') ,['class'=>'form-control input-sm','required'])}}

{{ Form::label('degree_program_id', 'Degree Program') }}
{{ Form::select('degree_program_id',$degree_program,Input::old('degree_program_id'),['class'=>'form-control input-sm']) }}

{{ Form::label('year_id', 'Year') }}
{{ Form::select('year_id', $year, Input::old('year_id') ,['class'=>'form-control input-sm'])}}

{{ Form::label('semester_id', 'Semester') }}
{{ Form::select('semester_id',$semester,Input::old('semester_id'),['class'=>'form-control input-sm']) }}


{{ Form::label('total_credit', 'Total Credit') }}
{{ Form::text('total_credit', Input::old('total_credit'),array('class' => 'form-control input-sm')) }}



{{ Form::label('duration', 'Duration (In Year)') }}
{{ Form::select ('duration',  array('' => 'Select one',
   '1' => '1', '2' => '2', '3'=>'4','5'=>'5','6'=>'6','7'=>'7'), Input::old('duration'),
    array('class' => 'form-control input-sm')) }}


{{ Form::label('start_date', 'Start date') }}
{{ Form::text('start_date', Input::old('start_date'),['class'=>'form-control input-sm','id'=>'datepicker']) }}


{{ Form::label('end_date', 'End date') }}
{{ Form::text('end_date', Input::old('end_date'),['class'=>'form-control input-sm','id'=>'datepicker1'])  }}


<br>
{{ Form::submit('Save ', array('class'=>'pull-right btn btn-primary')) }}

{{Form::close()}}


</div>

</div>



{{--<script>--}}
  {{--$(function() {--}}
    {{--$( "#datepicker" ).datepicker();--}}
     {{--$( "#datepicker1" ).datepicker();--}}
  {{--});--}}
  {{--</script>--}}