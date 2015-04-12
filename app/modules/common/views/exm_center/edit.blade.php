<div class="modal-header">

    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel"> Add Exam Center</h4>
</div>

<div class="modal-body">
      <div style="padding: 20px;">

          {{Form::open(array('route'=> ['common.exm-center.update',$model->id], 'class'=>'form-horizontal','files'=>true))}}

          <div class='form-group'>

              <div>{{ Form::label('title', 'Title') }}</div>
              <div>{{ Form::text('title',$model->title ,['class'=>'form-control input-sm','required'])}}</div>
          </div>

          <div class='form-group'>
              <div>{{ Form::label('description', 'Description') }}</div>
              <div>{{ Form::textarea('description', $model->description,['class'=>'form-control input-sm'])}}</div>
          </div>

          <div class='form-group'>

                <div>{{ Form::label('capacity', 'Capacity') }}</div>
                <div>{{ Form::text('capacity' ,$model->capacity,['class'=>'form-control input-sm','required'])}}</div>
          </div>

          <div class='form-group'>

              <div>{{ Form::label('status', 'Status') }}</div>
              <div>{{ Form::select('status', array('' => 'Select one',
                   'Free' => 'Free', 'Engaged' => 'Engaged',' Under-Construction'=>' Under-Construction','not-ready'=>'Not-ready','un-attendent'=>'Un-Attendent'), $model->status,
                    ['class'=>'form-control','required']) }}</div>
          </div>

          <p>&nbsp;</p>

          <div>
          {{ Form::submit('Update', array('class'=>'pull-right btn btn-primary')) }}
          <a  href="" class="pull-right btn btn-default" style="margin-right: 5px">Close</a>
          </div>
          <p>&nbsp;</p>
          {{Form::close()}}
      </div>
</div>
