
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel"> Add Time Constraint </h4>
</div>

<div class="modal-body">
    <div style="padding: 20px;">

          {{ Form::open(['route' => ['amw.test'], 'class'=>'form-horizontal', 'files' => true,]) }}

          {{Form::text('degree_waiver_id', $degree_waiver_id)}}
          {{Form::text('is_time_dependent', 1)}}

          {{ Form::label('start_date', 'Start Time') }}
          {{ Form::text('start_date', Input::old('start_date'),['class'=>'form-control date_picker','required'=>'required']) }}

          <p>&nbsp;</p>

          {{ Form::label('end_date', 'End Time') }}
          {{ Form::text('end_date', Input::old('end_date'),['class'=>'form-control date_picker','required'=>'required'])  }}

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