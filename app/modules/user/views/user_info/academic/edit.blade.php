
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel" style="text-align: center">Edit </h4>
</div>

<div class="modal-body">
 {{Form::model($model, array('route'=>['user/acm-records/update',$model->id],'files'=>true))}}
     @include('user::user_info.academic._form')
 {{ Form::close() }}
</div>