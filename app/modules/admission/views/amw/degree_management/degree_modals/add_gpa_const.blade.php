<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel"> Add Degree Waiver GPA Constraint </h4>
</div>

<div class="modal-body">
    <div style="padding: 20px;">

          {{ Form::open(['route' => ['deg_waiver_gpa_const.store'], 'class'=>'form-horizontal','files' => true,]) }}

          {{ Form::hidden('degree_waiver_id', $degree_waiver_id)}}
          {{ Form::hidden('is_time_dependent', 0)}}

          {{ Form::label('level_of_education', 'Level of Education ') }}
          {{ Form::select ('level_of_education',  array('' => 'Select one',
            'psc' => 'PSC', 'jsc' => 'JSC', 'ssc'=>'SSC','hsc'=>'HSC','grad'=>'Grad','under_grad'=>'Under Grad'), Input::old('level_of_education'),
             array('class' => 'form-control')) }}

           {{ Form::label('gpa', 'GPA') }}
           {{ Form::text('gpa', Input::old('gpa'),['class'=>'form-control'])  }}


          <p>&nbsp;</p>


           <p>&nbsp;</p>

           <p>&nbsp;</p>
           <p>&nbsp;</p>

         {{ Form::submit('Save ', array('class'=>'pull-right btn btn-primary')) }}

          <p>&nbsp;</p>

         <p>&nbsp;</p>
        {{Form::close()}}

    </div>

</div>

{{ HTML::script('assets/js/custom.js')}}