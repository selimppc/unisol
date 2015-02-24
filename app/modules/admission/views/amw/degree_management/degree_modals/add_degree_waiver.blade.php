<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel"> Add Degree Waiver</h4>
</div>

<div class="modal-body">
  <div style="padding: 20px;">

   {{ Form::open(['route' => ['degree_waiver.store'], 'class'=>'form-horizontal','files' => true,]) }}

      {{Form::hidden('degree_id', $degree_id)}}
      {{ Form::label('waiver_id', 'Waiver Item') }}
      {{ Form::select('waiver_id',$waiverList,Input::old('waiver_id'),['class'=>'form-control input-sm','required'=>'required']) }}

       <p>&nbsp;</p>

       <p>&nbsp;</p>
       <p>&nbsp;</p>

     {{ Form::submit('Save ', array('class'=>'pull-right btn btn-primary')) }}

    <p>&nbsp;</p>
   {{Form::close()}}

  </div>

</div>


