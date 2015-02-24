
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel"> Add Time Constraint </h4>
</div>

<div class="modal-body">
    <div style="padding: 20px;">

          {{ Form::open(['route' => ['deg_waiver_const.store'], 'class'=>'form-horizontal','files' => true,]) }}

          {{Form::hidden('degree_waiver_id', $degree_waiver_id)}}
          {{ Form::label('start_date', 'Start Time') }}
          {{ Form::text('start_date', Input::old('start_date'),['class'=>'form-control input-sm','id'=>'datepicker','required'=>'required']) }}

          <p>&nbsp;</p>

          {{ Form::label('end_date', 'End Time') }}
          {{ Form::text('end_date', Input::old('end_date'),['class'=>'form-control input-sm','id'=>'datepicker1','required'=>'required'])  }}

           <p>&nbsp;</p>

           <p>&nbsp;</p>
           <p>&nbsp;</p>

         {{ Form::submit('Save ', array('class'=>'pull-right btn btn-primary')) }}

          <p>&nbsp;</p>

         <p>&nbsp;</p>
        {{Form::close()}}

    </div>

</div>

<script>
  $(function() {
    $( "#datepicker" ).datepicker({
       formatSubmit : 'mm/dd/yyyy'
    });

     $( "#datepicker1" ).datepicker({
        formatSubmit : 'mm/dd/yyyy'
     });


  });
  </script>

