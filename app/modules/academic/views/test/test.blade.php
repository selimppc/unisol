{{$mcq}}

<br>

{{ Form::radio('genre', 'M', ($mcq == 'M'), ['id'=>'male', 'class'=>'radio']) }}
{{ Form::radio('genre', 'F', ($mcq == 'F'), ['id'=>'female', 'class'=>'radio']) }}