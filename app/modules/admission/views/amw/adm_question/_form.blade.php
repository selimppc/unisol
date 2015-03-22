<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel"> Admission Test Examiner : Add</h4>
</div>

<div class="modal-body">
     <div style="padding: 20px;">
        {{Form::open(array('url'=>'admission/amw/admission-test-question/store-admission-test-question-paper', 'class'=>'form-horizontal','files'=>true))}}


                <div class='form-group'>
                    {{ Form::label('title', 'Title') }}
                    {{ Form::text('title', Input::old('title'),['class'=>'form-control','required'=>'required']) }}
                </div>



                <div class='form-group'>
                    {{ Form::label('deadline', 'Deadline') }}
                    {{ Form::text('deadline', Input::old('deadline'),['class'=>'form-control date-picker','required'=>'required']) }}
                </div>

                <div class='form-group'>
                    {{ Form::label('note', 'Note') }}
                    {{ Form::textarea('note', Input::old('note'),['size' => '30x5','class'=>'form-control','required'=>'required']) }}
                </div>

              {{ Form::submit('Save', array('class'=>'pull-right btn btn-info')) }}
              <a href="" class="pull-right btn btn-default" style="margin-right: 5px">Close</a>

              <p>&nbsp;</p>
        {{Form::close()}}
     </div>
</div>


