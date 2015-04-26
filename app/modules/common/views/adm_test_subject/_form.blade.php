<div class="modal-header">

    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel"> Add Admission Test Subject</h4>
</div>

<div class="modal-body">
      <div style="padding: 20px;">

          {{Form::open(array('url'=>'common/adm_test_subject/store', 'class'=>'form-horizontal','files'=>true))}}


                  <div class="form-group">
                       {{ Form::label('title', 'Title') }}
                       {{ Form::text('title', Input::old('title'), ['class' => 'form-control','required'=>'required']) }}
                  </div>

                  <div class="form-group">
                       {{ Form::label('description', 'Description') }}
                       {{ Form::textarea('description', Input::old('description'), ['onkeyup'=>"javascript:this.value=this.value.replace(/[<,>]/g,'');",'size' => '30x5','class' => 'form-control','required'=>'required']) }}
                  </div>

                   <div class="form-group">
                       {{ Form::label('priority', 'Priority (Top priority 10 to less priority 1)') }}
                       {{ Form::select('priority', array('Select Any one'=>'','1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6','7'=>'7','8'=>'8','9'=>'9','10'=>'10'),
                       Input::old('priority'), ['class' => 'form-control','required'=>'required']) }}
                  </div>

                  <p>&nbsp;</p>

                  {{ Form::submit('Save', array('class'=>'pull-right btn btn-info')) }}
                  <a href="" class="pull-right btn btn-default" style="margin-right: 5px">Close</a>

          <p>&nbsp;</p>
          {{Form::close()}}
      </div>
</div>