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
              <div>{{ Form::textarea('description', $edit_adm_test_subject->description,['onkeyup'=>"javascript:this.value=this.value.replace(/[<,>]/g,'');",'class'=>'form-control input-sm','size' => '30x5'])}}</div>
          </div>

          <div class='form-group'>
              {{ Form::label('priority', 'Priority (Top priority 10 to less priority 1)') }}
              {{ Form::select('priority',array('Select Any one'=>'','1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6','7'=>'7','8'=>'8','9'=>'9','10'=>'10'),
                $edit_adm_test_subject->priority,['class'=>'form-control input-sm','required'])}}
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
