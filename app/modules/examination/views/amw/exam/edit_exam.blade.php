

 <div class="modal-body">

      {{ Form::model($model,array('url'=>'examination/amw/update-exam-data/'.$model->id, 'class'=>'form-horizontal' )) }}
           @include('examination::amw.exam.add_exam_form')
      {{ Form::close() }}

 </div>

