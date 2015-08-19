
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel">Edit :{{isset($model->title)?$model->title:''}}</h4>
</div>

<div class="modal-body">

 {{Form::model($model, array('route'=>['update.category',$model->id,'class'=>'form-control','files'=>true]))}}
      @include('cfo::.cfo.category._form')
 {{ Form::close() }}

</div>


