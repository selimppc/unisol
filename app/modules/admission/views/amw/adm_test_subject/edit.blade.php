<div class="modal-header">

    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel"> Edit Admission Test Subject</h4>
</div>

<div class="modal-body">
      <div style="padding: 20px;">
          {{Form::open(array('route'=> ['admission.amw.update-admission-test-subject',$edit_admission_test_subject->id], 'class'=>'form-horizontal','files'=>true))}}

                <div class='form-group'>
                    {{ Form::label('title', 'Title') }}
                    {{ Form::text('title',$edit_admission_test_subject->title ,['class'=>'form-control input-sm','required'])}}
                </div>

                <div class='form-group'>
                    {{ Form::label('priority', 'Priority') }}
                    {{ Form::text('priority' ,$edit_admission_test_subject->priority,['class'=>'form-control input-sm','required'])}}
                </div>

                <div class='form-group'>
                    {{ Form::label('description', 'Description') }}
                    {{ Form::text('description' ,$edit_admission_test_subject->description,['class'=>'form-control input-sm','required'])}}
                </div>

          <p>&nbsp;</p>

          <div>

          {{ Form::submit('Update', array('class'=>'pull-right btn btn-info')) }}
          <a href="" class="pull-right btn btn-default" style="margin-right: 5px">Close</a>

          </div>
          <p>&nbsp;</p>
          {{Form::close()}}
      </div>
</div>