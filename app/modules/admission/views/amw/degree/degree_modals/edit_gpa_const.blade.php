
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel">Edit Degree Waiver GPA Constraint </h4>
</div>

<div class="modal-body">
    <div style="padding: 20px;">

          {{ Form::open(['route' => ['deg_waiver_const.update', $gpa_const_model->id], 'class'=>'form-horizontal','files' => true,]) }}


          {{ Form::label('level_of_education', 'Level of Education ') }}
          {{ Form::select('level_of_education', ['' => 'Select one',
             'PSC' => 'PSC', 'JSC' => 'JSC', 'SSC'=>'SSC','HSC'=>'HSC','GRAD'=>'GRAD','UNDER_GRAD'=>'UNDER GRAD'],$gpa_const_model->level_of_education,
              ['class'=>'form-control']) }}

           {{ Form::label('gpa', 'GPA') }}
           {{ Form::text('gpa', $gpa_const_model->gpa,['class'=>'form-control'])  }}


          <p>&nbsp;</p>


           <p>&nbsp;</p>

           <p>&nbsp;</p>
           <p>&nbsp;</p>

         {{--{{ Form::submit('Save ', array('class'=>'pull-right btn btn-primary')) }}--}}
          {{ Form::submit('Update ', array('class'=>'btn btn-primary')) }}
          <a href="{{URL::previous()}}" class="pull-right btn btn-default" span class="glyphicon-refresh">Close</a>


          <p>&nbsp;</p>

         <p>&nbsp;</p>
        {{Form::close()}}

    </div>

</div>

{{ HTML::script('assets/js/custom.js')}}