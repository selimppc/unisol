<div class="modal-header">

    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel"> Add Admission Test Subject</h4>
</div>

<div class="modal-body">
      <div style="padding: 20px;">

          {{Form::open(array('url'=>'common/adm_test_subject/store', 'class'=>'form-horizontal','files'=>true))}}


                  <div class="form-group">
                       {{ Form::label('title', 'Title') }}
                       {{ Form::text('title', Input::old('title'), ['class' => 'form-control']) }}
                  </div>

                  <div class="form-group">
                       {{ Form::label('description', 'Description') }}
                       {{ Form::textarea('description', Input::old('description'), ['class' => 'form-control']) }}
                  </div>

                   <div class="form-group">
                       {{ Form::label('priority', 'Priority') }}
                       {{ Form::text('priority', Input::old('priority'), ['class' => 'form-control']) }}
                  </div>

                  <p>&nbsp;</p>

                  {{ Form::submit('Save', array('class'=>'pull-left btn btn-primary')) }}
                  <a  href="{{URL::previous() }}" class="pull-right btn btn-default">Close</a>

          <p>&nbsp;</p>
          {{Form::close()}}
      </div>
</div>