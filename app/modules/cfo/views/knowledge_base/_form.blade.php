
<div class="form-group">
  {{ Form::label('cfo_category_id', 'Cfo Category') }}<span class="text-danger">*</span>
  {{ Form::select('cfo_category_id', $cfo_category_id, Input::old('cfo_category_id'), array('class' => 'form-control','required'=>'required')) }}
</div>

<div class='form-group'>
   {{ Form::label('title', 'Title') }}
   {{ Form::text('title', Input::old('title'),['class'=>'form-control', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('description', 'Description') }}
   {{ Form::textarea('description', Input::old('description'),['onkeyup'=>"javascript:this.value=this.value.replace(/[<,>]/g,'');", 'size' => '30x5', 'class'=>'form-control']) }}
</div>

<div class='form-group'>
   {{ Form::label('keywords', 'Keywords') }}
   {{ Form::text('keywords', Input::old('keywords'),array('class' => 'form-control','required'=>'required')) }}
</div>

{{ Form::submit('Save', array('class'=>'pull-right btn btn-info')) }}
<a href="" class="pull-right btn btn-default" style="margin-right: 5px">Close</a>

<p>&nbsp;</p>
