<div class="modal-header">

    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel">Add </h4>
</div>
    <div style="padding: 30px;">
       {{Form::hidden('status','new')}}

        <div class="form-group">
          {{ Form::label('cfo_category_id', 'Cfo Category') }}<span class="text-danger">*</span>
          {{ Form::select('cfo_category_id', $cfo_category_id, Input::old('cfo_category_id'), array('class' => 'form-control','required'=>'required')) }}
        </div>

        <div class='form-group'>
           {{ Form::label('name', 'Name') }}
           {{ Form::text('name', Input::old('name'),['class'=>'form-control', 'required','placeholder'=>'Write Your name']) }}
        </div>

        <div class='form-group'>
           {{ Form::label('email', 'Email') }}
           {{ Form::text('email', Input::old('email'),[ 'class'=>'form-control', 'required']) }}
        </div>

        <div class='form-group'>
           {{ Form::label('phone', 'Phone Number') }}
           {{ Form::text('phone', Input::old('phone'),['class'=>'form-control',  'required']) }}
        </div>

        <div class='form-group'>
           {{ Form::label('subject', 'Subject') }}
           {{ Form::textarea('subject', Input::old('subject'),['onkeyup'=>"javascript:this.value=this.value.replace(/[<,>]/g,'');", 'size' => '30x5', 'class'=>'form-control']) }}
        </div>

        <div class='form-group'>
           {{ Form::label('message', 'Message') }}
           {{ Form::textarea('message', Input::old('message'),['onkeyup'=>"javascript:this.value=this.value.replace(/[<,>]/g,'');", 'size' => '30x5', 'class'=>'form-control']) }}
        </div>

        <div class="form-group">
           {{ Form::label('priority', 'Priority') }}<span class="text-danger">*</span>
           {{ Form::select('priority', array('' => 'Select one',
           'high' => 'High', 'low' => 'Low', 'medium'=>'Medium'),Input::old('board_university'),array('class' => 'form-control')) }}
        </div>

        <p>&nbsp;</p>
        {{ Form::submit('Save', array('class'=>'pull-right btn btn-info')) }}
        <a href="" class="pull-right btn btn-default" style="margin-right: 5px">Close</a>

        <p>&nbsp;</p>
    </div>
