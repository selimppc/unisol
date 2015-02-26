
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel">Edit Time Constraint </h4>
</div>

<div class="modal-body">
    <div style="padding: 20px;">

          {{ Form::open( ['route' => ['deg_waiver_const.update', $time_const_model->id], 'class'=>'form-horizontal', 'files' => true,]) }}


          {{ Form::label('start_date', 'Start Time') }}
          {{ Form::text('start_date', $time_const_model->start_date,['class'=>'form-control date_picker']) }}

          <p>&nbsp;</p>

          {{ Form::label('end_date', 'End Time') }}
          {{ Form::text('end_date',$time_const_model->end_date,['class'=>'form-control date_picker'])  }}

           <p>&nbsp;</p>

           <p>&nbsp;</p>
           <p>&nbsp;</p>

         {{ Form::submit('Update', array('class'=>'pull-right btn btn-primary')) }}

          <p>&nbsp;</p>

         <p>&nbsp;</p>
        {{Form::close()}}

    </div>

</div>

{{ HTML::script('assets/js/custom.js')}}