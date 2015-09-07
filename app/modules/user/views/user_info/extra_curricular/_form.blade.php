<div style="padding: 0px 20px 20px 20px;">
  {{Form::hidden('user_id',$user_id)}}
  <div class="form-group">
      {{ Form::label('title', 'Title') }}
      {{ Form::text('title',Input::old('title'), array('class' => 'form-control','placeholder'=>'','required')) }}
  </div>
  <div class="form-group">
      {{ Form::label('description', 'Description') }}
      {{ Form::textarea('description', Input::old('description'), array('class'=>'form-control','placeholder'=>'','size' => '30x5')) }}
  </div>
  <div class="form-group">
      {{ Form::label('achievement', 'Achievement') }}
      {{ Form::textarea ('achievement', Input::old('achievement'),['class'=>'form-control','size' => '30x5']) }}
  </div>

  <p>&nbsp;</p>
  <div class="form-group">
      <div>{{ Form::label('certificate_medal', 'Certificate Medal') }}</div>
      @if(isset($model))
            <div class="col-lg-4">{{ $model->certificate_medal != null ? HTML::image('/uploads/user_images/docs/'.$model->certificate_medal) :'' }}</div>
            <p>&nbsp;</p>
            {{ Form::label('certificate_medal', 'Select One :') }}
            {{ Form::file('certificate_medal',array('multiple'=>true)) }}
      @else
           {{ Form::label('certificate_medal', 'Select One :') }}
           {{ Form::file('certificate_medal',array('multiple'=>true)) }}
      @endif
  </div>

  <p>&nbsp;</p>
  {{ Form::submit('Submit', array('class'=>'pull-right btn btn-info')) }}
  <a href="" class="pull-right btn btn-default" style="margin-right: 5px">Close</a>
  <p>&nbsp;</p>
</div>