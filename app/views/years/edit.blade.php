	<div style="padding: 10px; width: 90%;">

 
       {{Form::model($data, array('route'=>['semester.update', $data->id],'method' => 'post', 'class'=>'form-horizontal'))}}

        @include('years._form')

        {{Form::close()}}
    </div>