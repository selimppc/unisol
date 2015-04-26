<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel"> Batch Adm-Test Subject : Edit</h4>
</div>

<div class="modal-body">
  <div style="padding: 0px 20px 20px 20px;">

     <div class="pull-left">
         <strong> Degree: </strong>
         {{ $degree_name->relDegree->relDegreeLevel->code.'  '.$degree_name->relDegree->relDegreeGroup->code.' In '.$degree_name->relDegree->relDegreeProgram->code }},
         {{$degree_name->relSemester->title}} - {{$degree_name->relYear->title}}
     </div>

      {{Form::open(array('url'=> ['admission/amw/batch-adm-test-subject/update_admtest_subject',$batch_edit->id], 'class'=>'form-horizontal','files'=>true))}}
      {{ Form::hidden('batch_id', $batch_id, Input::old('batch_id')) }} </br></br>

        <div class='form-group'>
           {{ Form::label('admtest_subject_id', 'Admission Test Subject') }}
           {{ Form::select('admtest_subject_id', $subject_id_result, $batch_edit->admtest_subject_id,['class'=>'form-control']) }}
        </div>
        <div class='form-group'>
          {{ Form::label('description', 'Description') }}
          {{ Form::textarea('description', $batch_edit->description,['onkeyup'=>"javascript:this.value=this.value.replace(/[<,>]/g,'');",'size' => '30x5','class'=>'form-control','required'=>'required']) }}
        </div>
        <div class='form-group'>
            {{ Form::label('marks', 'Marks') }}
            {{ Form::text('marks', $batch_edit->marks,['class'=>'form-control','required'=>'required']) }}
        </div>
        <div class='form-group'>
            {{ Form::label('qualify_marks', 'Qualify Marks') }}
            {{ Form::text('qualify_marks',$batch_edit->qualify_marks ,['class'=>'form-control','required'=>'required']) }}
        </div>
        <div class='form-group'>
           {{ Form::label('duration', 'Duration in Minutes') }}
           {{ Form::text('duration', $batch_edit->duration, ['class'=>'form-control','required'=>'required']) }}
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