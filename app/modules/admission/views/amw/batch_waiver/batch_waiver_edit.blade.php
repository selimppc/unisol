<div class="modal-header">

    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel">Edit Degree Waiver</h4>
</div>

<div class="modal-body">
      <div style="padding: 20px;">

          {{Form::open( array('route'=> ['admission.amw.batch-waiver.update',$model->id], 'class'=>'form-horizontal','files'=>true))}}

         <div class='form-group'>
               <div>{{ Form::label('batch_id', 'Batch') }}</div>
               <div>{{ Form::select('batch_id', $batch, $model->batch_id,['class'=>'form-control input-sm','required']) }}</div>
         </div>
         <div class='form-group'>
             <div>{{ Form::label('waiver_id', 'Waiver') }}</div>
             <div>{{ Form::select('waiver_id', $waiver, $model->waiver_id,['class'=>'form-control input-sm','required']) }}</div>
         </div>

          {{ Form::submit('Update', array('class'=>'pull-right btn btn-primary')) }}
          <a  href="" class="pull-right btn btn-default" style="margin-right: 5px">Close</a>


          </div>
          <p>&nbsp;</p>
          {{Form::close()}}
      </div>
</div>
