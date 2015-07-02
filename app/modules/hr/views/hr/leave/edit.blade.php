<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel">Edit </h4>
</div>

<div class="modal-body">

 {{Form::model($model, array('route'=>['leave.update',$model->id,'class'=>'form-control','files'=>true]))}}
     @include('hr::hr.leave._form')
 {{ Form::close() }}

</div>

