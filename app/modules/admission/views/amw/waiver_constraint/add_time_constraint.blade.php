<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel"> Add Time Constraint </h4>
</div>

<div class="modal-body">
    <div style="padding: 20px;">

          {{ Form::open(['route' => ['deg_waiver_const.store'], 'class'=>'form-horizontal', 'files' => true,]) }}

          {{Form::hidden('batch_waiver_id', $batch_waiver_id)}}
          {{Form::hidden('is_time_dependent', 1)}}

          {{ Form::label('start_date', 'Start Time') }}
          {{ Form::text('start_date', Input::old('start_date'),['class'=>'form-control date_picker']) }}

          <p>&nbsp;</p>

          {{ Form::label('end_date', 'End Time') }}
          {{ Form::text('end_date', Input::old('end_date'),['class'=>'form-control date_picker'])  }}

           <p>&nbsp;</p>

           <p>&nbsp;</p>
           <p>&nbsp;</p>

          {{ Form::submit('Save ', array('class'=>'btn btn-primary')) }}
          <a href="{{URL::previous()}}" class="pull-right btn btn-default" span class="glyphicon-refresh">Close</a>

          <p>&nbsp;</p>

         <p>&nbsp;</p>
        {{Form::close()}}

    </div>

</div>
