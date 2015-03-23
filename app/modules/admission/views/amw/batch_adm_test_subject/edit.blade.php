<div class="modal-header">

    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel"> Batch Adm-Test Subject : Edit</h4>
</div>

<div class="modal-body">
      <div style="padding: 20px;">

           <div class='form-group'>
                <strong> Degree: </strong>{{ $degree_name->relBatch->relDegree->title }}
           </div>

          {{Form::open(array('url'=> ['admission/amw/batch-adm-test-subject/update_admtest_subject',$batch_edit->id], 'class'=>'form-horizontal','files'=>true))}}

                <div class='form-group'>

                           {{ Form::label('batch_id', 'Batch ID : will be hidden field') }}
                           {{ Form::text('batch_id',$batch_id,Input::old('batch_id'),['class'=>'form-control' ]) }} </br>
                 </div>

                <div class='form-group'>
                           {{ Form::label('admtest_subject_id', 'Subjects') }}
                           {{ Form::select('admtest_subject_id', $subject_id_result,$batch_edit->admtest_subject_id,['class'=>'form-control']) }}
                </div>

                <div class='form-group'>
                          {{ Form::label('description', 'Description') }}
                          {{ Form::textarea('description', $batch_edit->description,Input::old('description'),['size' => '30x5','class'=>'form-control','required'=>'required']) }}
                </div>

                <div class='form-group'>
                            {{ Form::label('marks', 'Marks') }}
                            {{ Form::text('marks', $batch_edit->marks,Input::old('evaluation_total_marks'),['class'=>'form-control','required'=>'required']) }}
                </div>

                <div class='form-group'>
                            {{ Form::label('qualify_marks', 'Qualify Marks') }}
                            {{ Form::text('qualify_marks',$batch_edit->qualify_marks ,Input::old('qualify_marks'),['class'=>'form-control','required'=>'required']) }}
                </div>

                <div class='form-group'>
                           {{ Form::label('duration', 'Duration in Minutes') }}
                           {{ Form::text('duration', $batch_edit->duration, Input::old('duration'),['class'=>'form-control','required'=>'required']) }}
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