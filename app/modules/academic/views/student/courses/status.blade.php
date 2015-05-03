
{{Form::model($model, array('url'=>'academic/student/courses/change-status/'.$model->id, 'class'=>'form-horizontal'))}}

    {{ Form::hidden('id', $model->id) }}


 {{ Form::close() }}