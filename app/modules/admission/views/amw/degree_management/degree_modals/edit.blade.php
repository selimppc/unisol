
<div class="modal-header">

    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel">Edit....</h4>
</div>
<div class="modal-body">
  <div style="padding: 20px;">

 {{ Form::open(['route' => ['degree_manage.update',$degree_model->id], 'class'=>'form-horizontal','files' => true,]) }}

{{ Form::label('title', 'Title') }}
{{ Form::text('title',$degree_model->title, array('class' => 'form-control input-sm','placeholder'=>'Enter your course name')) }}

{{ Form::label('description', 'Description') }}
{{ Form::textarea('description',$degree_model->description,array('class' => 'form-control input-sm','placeholder'=>'Enter Description','size' => '30x5')) }}

{{ Form::label('department_id', 'Department') }}
{{ Form::select('department_id', $department,$degree_model->department_id  ,['class'=>'form-control input-sm','required'])}}

{{ Form::label('degree_program_id', 'Degree Program') }}
{{ Form::select('degree_program_id',$degree_program,$degree_model->degree_program_id,['class'=>'form-control input-sm']) }}

{{ Form::label('year_id', 'Year') }}
{{ Form::select('year_id', $year,$degree_model->year_id  ,['class'=>'form-control input-sm'])}}

{{ Form::label('semester_id', 'Semester') }}
{{ Form::select('semester_id',$semester,$degree_model->semester_id ,['class'=>'form-control input-sm']) }}

{{ Form::label('1', 'Status') }}
{{ Form::select ('status',  array('' => 'Select one',
          'APLD' => 'Applied', 'DOCC' => 'Docs Checking','AADV'=>'AADV','RADV'=>'RADV',
          'RIAS'=>'RIAS','PDAS'=>'PDAS','CFAT'=>'CFAT','ATAT'=>'ATAT', 'NAAD'=>'NAAD',
          'PAAT'=>'PAAT','NPAT'=>'NPAT','RATE'=>'RATE','MRTL'=>'MRTL','WTGL'=>'WTGL',
          'NAML'=>'NAML','CFAD'=>'CFAD','DNAD'=>'DNAD','ADMD'=>'ADMD'),
           $degree_model->status ,
           array('class' => 'form-control input-sm')) }}


        <p>&nbsp;</p>

         {{ Form::submit('Update', array('class'=>'btn btn-primary')) }}
          <a href="{{URL::to('amw/degree_manage') }} " class="pull-right btn btn-default" span class="glyphicon-refresh">Close</a>

        {{Form::close()}}
  </div>
</div>
{{--<div class="modal-footer">--}}

 {{----}}

{{--</div>--}}


