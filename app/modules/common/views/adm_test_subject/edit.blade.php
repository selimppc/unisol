<div class="modal-header">

    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel"> Edit Adm Test Subject</h4>
</div>

<div class="modal-body">
      <div style="padding: 20px;">

          {{Form::open(array('route'=> ['common.adm_test_subject.update',$edit_adm_test_subject->id], 'class'=>'form-horizontal','files'=>true))}}

          <div class='form-group'>

              <div>{{ Form::label('title', 'Title') }}</div>
              <div>{{ Form::text('title',$edit_adm_test_subject->title ,['class'=>'form-control input-sm','required'])}}</div>
          </div>

          <div class='form-group'>
              <div>{{ Form::label('description', 'Description') }}</div>
              <div>{{ Form::text('description', $edit_adm_test_subject->description,['class'=>'form-control input-sm'])}}</div>
          </div>

          <div class='form-group'>

                <div>{{ Form::label('priority', 'Priority') }}</div>
                <div>{{ Form::text('priority' ,$edit_adm_test_subject->priority,['class'=>'form-control input-sm','required'])}}</div>
          </div>

          <p>&nbsp;</p>

          <div>

          {{ Form::submit('Update', array('class'=>'pull-left btn btn-primary')) }}
          <a  href="{{URL::previous() }}" class="pull-right btn btn-default">Close</a>

          </div>
          <p>&nbsp;</p>
          {{Form::close()}}
      </div>
</div>
