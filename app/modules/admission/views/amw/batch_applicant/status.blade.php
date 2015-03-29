
<div class="modal-header">

    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel">Change Status</h4>
</div>

<div class="modal-body">
      <div style="padding: 20px;">

          {{Form::open(array('route'=> ['admission.amw.batch-applicant.update',$model->id], 'class'=>'form-horizontal','files'=>true))}}

                <div  class="col-lg-8">{{ Form::label('status', 'Status') }}
                {{ Form::select('status', $status ,$model->status ,['class'=>'form-control','required'])}}</div>
                <p>&nbsp;</p>

          <div>

              {{ Form::submit('Change', array('class'=>'pull-right btn btn-info input-sm')) }}
              <a href="" class="pull-right btn btn-default input-sm" style="margin-right: 5px">Close</a>

          </div>

          <p>&nbsp;</p>
          {{Form::close()}}
      </div>
</div>