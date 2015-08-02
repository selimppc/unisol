<div style="padding: 0px 20px 20px 20px;">
    {{Form::hidden('user_id',$user_id)}}
    {{ Form::label('title', 'Title') }}
    {{ Form::text('title',Input::old('title'), array('class' => 'form-control','placeholder'=>'','required')) }}
    <br>
    {{ Form::label('description', 'Description') }}
    {{ Form::textarea('description', Input::old('description'), array('class'=>'form-control','placeholder'=>'','size' => '30x5')) }}
     <br>
    {{ Form::label('achievement', 'Achievement') }}
    {{ Form::textarea ('achievement', Input::old('achievement'),['class'=>'form-control','size' => '30x5']) }}
     <br>
    {{ Form::label('certificate_medal', 'Certificate Medal') }}
    {{ Form::file('certificate_medal', Input::old('certificate_medal'),array('class' => 'form-control','placeholder'=>'','multiple'=>true)) }}

    <p>&nbsp;</p>
    {{ Form::submit('Submit', array('class'=>'pull-right btn btn-info')) }}
    <a href="" class="pull-right btn btn-default" style="margin-right: 5px">Close</a>
    <p>&nbsp;</p>
</div>