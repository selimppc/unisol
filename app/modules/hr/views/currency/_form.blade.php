
<div class='form-group'>
   {{ Form::label('title', 'Title') }}
   {{ Form::text('title', Input::old('title'),['class'=>'form-control', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('code', 'Code') }}
   {{ Form::text('code', Input::old('code'),['class'=>'form-control', 'required']) }}
</div>

<div class='form-group'>
   {{ Form::label('exchange_rate', 'Exchange Rate') }}
   {{ Form::text('exchange_rate',  Input::old('exchange_rate'),['class'=>'form-control', 'required']) }}
</div>

{{ Form::submit('Save', array('class'=>'pull-right btn btn-info')) }}
<a href="" class="pull-right btn btn-default" style="margin-right: 5px">Close</a>

<p>&nbsp;</p>
