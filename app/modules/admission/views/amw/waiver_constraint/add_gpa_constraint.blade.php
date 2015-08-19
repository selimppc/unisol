
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel"> Add GPA Constraint </h4>
</div>

<div class="modal-body">
    <div style="padding: 20px;">

          {{ Form::open(['route' => ['admission.amw.waiver-constraint.store'], 'class'=>'form-horizontal','files' => true,]) }}

          {{ Form::hidden('batch_waiver_id', $batch_waiver_id)}}
          {{ Form::hidden('is_time_dependent', 0)}}

          {{ Form::label('level_of_education', 'Level of Education ') }}
          {{ Form::select ('level_of_education',  array('' => 'Select one',
            'PSC' => 'PSC', 'JSC' => 'JSC', 'SSC'=>'SSC','HSC'=>'HSC','GRAD'=>'GRAD','UNDER_GRAD'=>'UNDER GRAD'), Input::old('level_of_education'),
             array('class' => 'form-control','required')) }}

           <p>&nbsp;</p>

           {{ Form::label('gpa', 'GPA') }}
           {{ Form::text('gpa', Input::old('gpa'),['class'=>'form-control','required'])  }}


          <p>&nbsp;</p>
          <p>&nbsp;</p>
          <div>
               {{ Form::submit('Save', array('class'=>'pull-right btn btn-primary')) }}
               <a  href="" class="pull-right btn btn-default" style="margin-right: 5px">Close</a>
          </div>

          <p>&nbsp;</p>

         <p>&nbsp;</p>
        {{Form::close()}}

    </div>

</div>

{{ HTML::script('assets/js/custom.js')}}